<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\SearchField;
use Illuminate\Database\Eloquent\Factories\Factory;

class SearchFieldFactory extends Factory
{
    protected $model = SearchField::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Str::uuid()->toString(),
            'price_start' =>  $this->faker->randomElement([$this->faker->numberBetween(1, 100000), null]),
            'price_end' =>  $this->faker->randomElement([$this->faker->numberBetween(100000, 200000), null]),
            'area_start' => $this->faker->randomElement([$this->faker->numberBetween(30, 15000), null]),
            'area_end' => $this->faker->randomElement([$this->faker->numberBetween(15000, 30000), null]),
            'year_construction_start' => $this->faker->randomElement([$this->faker->year('-5 years'), null]),
            'year_construction_end' => $this->faker->randomElement([$this->faker->year('+5 years'), null]),
            'rooms_start' =>  $this->faker->randomElement([$this->faker->numberBetween(1, 7) , null]),
            'rooms_end' =>  $this->faker->randomElement([$this->faker->numberBetween(8, 15) , null]),
            'return_actual_start' =>  $this->faker->randomElement([$this->faker->randomFloat(2, 1, 25), null]),
            'return_actual_end' =>  $this->faker->randomElement([$this->faker->randomFloat(2, 26, 50), null])
        ];
    }
}
