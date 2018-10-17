<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHosDocVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hos_doc_visits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('relation_id',false,true)->index();

            $table->time('sat_s')->nullable();
            $table->time('sat_e')->nullable();

            $table->time('sun_s')->nullable();
            $table->time('sun_e')->nullable();

            $table->time('mon_s')->nullable();
            $table->time('mon_e')->nullable();

            $table->time('tue_s')->nullable();
            $table->time('tue_e')->nullable();

            $table->time('wed_s')->nullable();
            $table->time('wed_e')->nullable();

            $table->time('thu_s')->nullable();
            $table->time('thu_e')->nullable();

            $table->time('fri_s')->nullable();
            $table->time('fri_e')->nullable();

            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('relation_id')->references('id')->on('relations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hos_doc_visits');
    }
}
