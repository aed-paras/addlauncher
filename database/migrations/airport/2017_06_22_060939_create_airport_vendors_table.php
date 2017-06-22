<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirportVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airport_vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vendor_name');
            $table->string('company_name');
            $table->string('contact_number');
            $table->string('contact_number2')->nullable();
            $table->string('description', 5000)->nullable();
            $table->string('address', 500)->nullable();
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
        Schema::dropIfExists('airport_vendors');
    }
}
