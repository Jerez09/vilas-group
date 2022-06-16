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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->decimal('price', 20, 2);
            $table->string('currency')->default('USD');
            $table->string('location');
            $table->string('operation');
            $table->foreignId('property_type_id')->constrained();
            $table->foreignId('country_id')->constrained();
            $table->decimal('area', 10, 2);
            $table->decimal('bedrooms', 10, 0);
            $table->decimal('bathrooms', 10, 1);
            $table->decimal('parking_lots', 10, 0);
            $table->text('description');
            $table->text('description_translated');
            $table->text('map');
            $table->string('thumbnail');
            $table->json('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
