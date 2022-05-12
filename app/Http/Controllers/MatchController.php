<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\SearchProfile;
use App\Models\PropertyField;

class MatchController extends Controller
{
    private $countStrictMatch = 0;
    private $countLooseMatch = 0;
    
    public function getMatchedProperties(Property $propertyId)
    {
    	$data = array();
    	$propertyField = PropertyField::where('id', $propertyId->fields)->first();
    	$searchProfiles = SearchProfile::with('searchField')->where('property_type', $propertyId->property_type)->get();

        if(!empty($searchProfiles)){
	    foreach ($searchProfiles as $searchProfile) {
	    	$this->matchedFields($searchProfile->searchField, $propertyField);
	        $data[] = [
	            'searchProfileId' => $searchProfile->id,
	            'score' => ($this->countStrictMatch * 10) + ($this->countLooseMatch),
	            'strictMatchesCount' => $this->countStrictMatch,
	            'looseMatchesCount' => $this->countLooseMatch
	        ];
	    }
	}
	
	// usort($data, fn($d1, $d2) => $d1['score'] <=> $d2['score']);
	usort($data, function ($d1, $d2) {
            if ($d1['score'] == $d2['score']) {
                return 0;
            }
            return ($d1['score'] < $d2['score']) ? 1 : -1;
        });
	return response()->json(['data' => $data], 200);
    }
    
    private function matchedFields($searchField, $propertyField)
    {
        $propertyFields = json_decode($propertyField, true);
        
        foreach (json_decode($searchField, true) as $fieldKey => $fieldValue) {
                if(isset($propertyFields[$fieldKey])) {
                    if($this->strictMatch($fieldValue, $propertyFields[$fieldKey])) {
                        $this->countStrictMatch++;
                    }
                    if ($this->looseMatch($fieldValue, $propertyFields[$fieldKey])) {
                        $this->countLooseMatch++;
                    }
                }
        }
    }
    
    private function strictMatch($searchFieldValue, $propertyValue)
    {
    	if(is_numeric($searchFieldValue) && is_numeric($propertyValue)){
            $searchFieldValue = $searchFieldValue * 1;
            $propertyValue = $propertyValue * 1;
        }
    
    	// If for range field type (100;258) and else for direct field type (524)
    	if(strpos($searchFieldValue, ';') !== false){
	    list($min, $max) = explode(';', $searchFieldValue, 2);
	    if(is_numeric($min) && is_numeric($max)){
                $min = $min * 1;
                $max = $max * 1;
                
                return ($min === null || $propertyValue >= $min) && ($max === null || $propertyValue <= $max);
            }
            return ($min === null || $propertyValue === $min) && ($max === null || $propertyValue === $max);
	}else{
            if(is_null($searchFieldValue)){
               return true;
            }
            
            if($searchFieldValue === $propertyValue ){
                return true;
            }
            return false;
	}
    }
    
    private function looseMatch($searchFieldValue, $propertyValue)
    {
    	if(is_numeric($searchFieldValue) && is_numeric($propertyValue)){
            $searchFieldValue = $searchFieldValue * 1;
            $propertyValue = $propertyValue * 1;
        }
    
    	// If for range field type (100;258) and else for direct field type (524)
    	if(strpos($searchFieldValue, ';') !== false){
	    list($min, $max) = explode(';', $searchFieldValue, 2);
	    if(is_numeric($min) && is_numeric($max)){
                $min = $min * 1;
                $max = $max * 1;
                
                return ($min === null || $propertyValue >= $this->valueDeviated($min)) && ($max === null || $propertyValue <= $this->valueDeviated($max, true));
            }
            return ($min === null || $propertyValue === $min) && ($max === null || $propertyValue === $max);
	}else{
            if(is_null($searchFieldValue)){
               return true;
            }
            
            if($searchFieldValue === $propertyValue ){
                return true;
            }
            return false;
	}
    }
    
    private function valueDeviated($value, $increment = false)
    {
        if($increment) {
            return (int)((0.25 * $value) + $value);
        }
        return (int)((0.25 * $value) - $value);
    }
}
