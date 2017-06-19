<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetroPanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metro_panels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('metro_station_id')->unsigned();
            $table->integer('metro_area_id')->unsigned();
            $table->integer('metro_panel_type_id')->unsigned();
            $table->float('width');
            $table->float('height');
            $table->integer('units')->unsigned();
            $table->integer('available')->unsigned();
            $table->string('description', 4000)->nullable();
            $table->string('image')->nullable();
            $table->float('charges')->unsigned();
            $table->float('actual_charges')->unsigned();
            $table->boolean('visibility')->default(1);
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
        Schema::dropIfExists('metro_panels');
    }
}
