<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id('address_id'); 
            $table->string('name');
            $table->string('tel')->nullable();
            $table->unsignedBigInteger('PROVINCE_ID');
            $table->foreign('PROVINCE_ID')->references('PROVINCE_ID')->on('province')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('AMPHUR_ID');
            $table->foreign('AMPHUR_ID')->references('AMPHUR_ID')->on('amphur')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('DISTRICT_ID');
            $table->foreign('DISTRICT_ID')->references('DISTRICT_ID')->on('district')->onDelete('cascade')->onUpdate('cascade');
            $table->string('postcode');
            $table->string('address');
            $table->integer('serial')->nullable();
            $table->integer('unit');
            $table->string('status')->default(1);
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
        Schema::dropIfExists('address');
    }
}
