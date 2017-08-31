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

            $table->time('sat_s');
            $table->time('sat_e');

            $table->time('sun_s');
            $table->time('sun_e');

            $table->time('mon_s');
            $table->time('mon_e');

            $table->time('tue_s');
            $table->time('tue_e');

            $table->time('wed_s');
            $table->time('wed_e');

            $table->time('thu_s');
            $table->time('thu_e');

            $table->time('fri_s');
            $table->time('fri_e');

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
