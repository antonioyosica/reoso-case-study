<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_field', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->decimal('price_start', 8, 2)->nullable();
            $table->decimal('price_end', 8, 2)->nullable();
            $table->integer('area_start')->nullable();
            $table->integer('area_end')->nullable();
            $table->integer('year_construction_start')->nullable();
            $table->integer('year_construction_end')->nullable();
            $table->integer('rooms_start')->nullable();
            $table->integer('rooms_end')->nullable();
            $table->decimal('return_actual_start', 8, 2)->nullable();
            $table->decimal('return_actual_end', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('search_field');
    }
}
