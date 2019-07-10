<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_post_collections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('neighborhood_id');
            $table->foreign('neighborhood_id')->references('id')->on('shift_neighborhoods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shift_post_collections');
    }
}
