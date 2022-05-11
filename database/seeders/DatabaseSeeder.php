<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PropertyTypeTableSeeder::class
        ]);
        \App\Models\PropertyField::factory(100)->create();
        \App\Models\Property::factory(100)->create();
        \App\Models\SearchField::factory(50)->create();
        \App\Models\SearchProfile::factory(50)->create();
    }
}
