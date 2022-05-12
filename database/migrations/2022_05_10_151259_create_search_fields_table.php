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
            $table->string('price')->nullable();
            $table->string('area')->nullable();
            $table->string('year_construction')->nullable();
            $table->string('rooms')->nullable();
            $table->string('return_actual')->nullable();
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
