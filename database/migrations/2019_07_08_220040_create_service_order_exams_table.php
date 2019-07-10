<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceOrderExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_service_order_exams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->double('price');
            $table->timestamp('deliver_date')->nullable();
            $table->unsignedBigInteger('exam_id');
            $table->foreign('exam_id')->references('id')->on('shift_exams');
            $table->unsignedBigInteger('service_order_id');
            $table->foreign('service_order_id')->references('id')->on('shift_service_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shift_service_order_exams');
    }
}
