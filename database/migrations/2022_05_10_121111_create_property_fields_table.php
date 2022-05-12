<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyFieldsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('property_field', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->integer('area')->nullable();
      $table->integer('year_construction')->nullable();
      $table->integer('rooms')->nullable();
      $table->string('heating_type')->nullable();
      $table->boolean('parking')->nullable();
      $table->decimal('return_actual', 8, 2)->nullable();
      $table->decimal('price', 8, 2)->nullable();
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
    Schema::dropIfExists('property_field');
  }
}
