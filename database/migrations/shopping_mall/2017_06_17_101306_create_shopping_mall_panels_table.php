<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingMallPanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_mall_panels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ad_code')->unique();
            $table->integer('shopping_mall_id')->unsigned();
            $table->integer('shopping_mall_area_id')->unsigned();
            $table->integer('shopping_mall_panel_type_id')->unsigned();
            $table->float('width');
            $table->float('height');
            $table->integer('units')->unsigned();
            $table->integer('available')->unsigned();
            $table->string('description', 10000)->nullable();
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
        Schema::dropIfExists('shopping_mall_panels');
    }
}
