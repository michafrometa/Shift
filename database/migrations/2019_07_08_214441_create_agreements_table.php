<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_agreements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->longText('description')->nullable();
            /*todo examprice 1 to 1 , serviceorder 1 to 1*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shift_agreements');
    }
}
