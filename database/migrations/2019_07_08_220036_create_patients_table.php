<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name');
            $table->date('birthdate');
            $table->longtext('address');
            $table->unsignedBigInteger('neighborhood_id');
            $table->foreign('neighborhood_id')->references('id')->on('shift_neighborhoods');
            $table->unsignedBigInteger('gender_id');
            $table->foreign('gender_id')->references('id')->on('shift_ngenders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shift_patients');
    }
}
