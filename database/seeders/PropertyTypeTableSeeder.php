<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\PropertyType;
use Illuminate\Database\Seeder;

class PropertyTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [ 'id' => Str::uuid()->toString(), 'name' => 'commercial' ],
            [ 'id' => Str::uuid()->toString(), 'name' => 'residential' ]
        ];

        foreach ($types as $type) {
            PropertyType::create($type);
        }
    }
}
