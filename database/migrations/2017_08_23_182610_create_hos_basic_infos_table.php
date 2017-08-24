<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHosBasicInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hos_basic_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id',15)->nullable(false)->index();
            $table->string('name',255);
            $table->string('email')->unique();
            $table->string('phone',255);
            $table->text('address');
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hos_basic_infos');
    }
}
