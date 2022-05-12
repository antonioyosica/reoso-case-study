<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyField extends Model
{
    use HasFactory;
    
    protected $table = 'property_field';
    protected $keyType = 'string';
    
    public function property()
    {
        return $this->belongsTo(Property::class, 'fields', 'id');
    }
}
