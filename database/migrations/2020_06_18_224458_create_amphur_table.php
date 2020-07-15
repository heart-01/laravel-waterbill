<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmphurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amphur', function (Blueprint $table) {
            $table->id('AMPHUR_ID');
            $table->string('AMPHUR_CODE');
            $table->string('AMPHUR_NAME');
            $table->integer('GEO_ID');
            $table->integer('PROVINCE_ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amphur');
    }
}
