<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_service_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date');
            $table->unsignedBigInteger('agreement_id');
            $table->foreign('agreement_id')->references('id')->on('shift_agreements');
            $table->unsignedBigInteger('post_collection_id');
            $table->foreign('post_collection_id')->references('id')->on('shift_post_collections');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('shift_patients');
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('shift_doctors');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shift_service_orders');
    }
}
