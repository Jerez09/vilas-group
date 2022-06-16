<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLuxuriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luxuries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->decimal('price', 20, 2);
            $table->string('currency')->default('USD');
            $table->string('location');
            $table->string('operation');
            $table->foreignId('luxury_type_id')->constrained();
            $table->foreignId('country_id')->constrained();
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
        Schema::dropIfExists('luxuries');
    }
}
