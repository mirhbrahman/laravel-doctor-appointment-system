<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocBasicInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_basic_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id',15)->index();
            $table->string('degree');
            $table->string('phone',15);
            $table->datetime('dob');
            $table->text('address');
            $table->text('about');
            $table->string('image');
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
        Schema::dropIfExists('doc_basic_infos');
    }
}
