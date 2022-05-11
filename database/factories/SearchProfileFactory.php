<?php

namespace Database\Factories;

use App\Models\SearchField;
use App\Models\SearchProfile;
use App\Models\PropertyType;
use Illuminate\Database\Eloquent\Factories\Factory;

class SearchProfileFactory extends Factory
{
    protected $model = SearchProfile::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->sentence(),
            'property_type' => PropertyType::all()->random()->id,
            'fields' => SearchField::all()->random()->id
        ];
    }
}
