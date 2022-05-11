<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\PropertyType;
use App\Models\PropertyField;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    protected $model = Property::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->sentence(),
            'address' => $this->faker->address(),
            'property_type' => PropertyType::all()->random()->id,
            'fields' => PropertyField::all()->random()->id
        ];
    }
}
