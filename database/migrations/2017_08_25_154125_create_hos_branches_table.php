<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHosBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hos_branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id',15)->nallable(false)->index();
            $table->string('name');
            $table->string('email');
            $table->string('phone',15);
            $table->text('address');
            $table->text('about');
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
        Schema::dropIfExists('hos_branches');
    }
}
