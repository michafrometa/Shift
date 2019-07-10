<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_exam_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->double('price');
            $table->unsignedBigInteger('agreement_id');
            $table->foreign('agreement_id')->references('id')->on('shift_agreements');
            $table->unsignedBigInteger('exam_id');
            $table->foreign('exam_id')->references('id')->on('shift_exams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shift_exam_prices');
    }
}
