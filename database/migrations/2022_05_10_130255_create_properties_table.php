<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('property', function (Blueprint $table) {
      $table->id();
      $table->string("name");
      $table->string("address");
      $table->foreignUuid('property_type')->nullable();
      $table->foreign('property_type')
      ->references('id')
      ->on('property_type')
      ->nullOnDelete();
      $table->foreignUuid('fields')->nullable();
      $table->foreign('fields')
      ->references('id')
      ->on('property_field')
      ->nullOnDelete();
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
    Schema::dropIfExists('property');
  }
}
