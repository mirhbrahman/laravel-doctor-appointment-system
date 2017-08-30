<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHosDocFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hos_doc_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('relation_id',false,true)->length(10)->index();
            $table->string('fee');
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
        Schema::dropIfExists('hos_doc_fees');
    }
}
