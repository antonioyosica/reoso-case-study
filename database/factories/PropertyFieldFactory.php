<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\PropertyField;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFieldFactory extends Factory
{
    protected $model = PropertyField::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Str::uuid()->toString(),
            'area' => $this->faker->randomElement([$this->faker->numberBetween(30, 30000), null]),
            'year_construction' => $this->faker->randomElement([$this->faker->year(), null]),
            'rooms' =>  $this->faker->randomElement([$this->faker->numberBetween(1, 15) , null]),
            'heating_type' =>  $this->faker->randomElement([$this->faker->randomElement(['electric', 'geothermal', 'radiant heat']), null]),
            'parking' =>  $this->faker->randomElement([$this->faker->boolean(), null]),
            'return_actual' =>  $this->faker->randomElement([$this->faker->randomFloat(2, 1, 50), null]),
            'price' =>  $this->faker->randomElement([$this->faker->numberBetween(1,100000), null])
        ];
    }
}
