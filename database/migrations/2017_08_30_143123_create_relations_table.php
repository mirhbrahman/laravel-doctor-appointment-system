<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hos_id',15)->index();
            $table->string('doc_id',15)->index();
            $table->integer('branch_id')->default(0);
            $table->integer('dept_id')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->string('action_user_id',15)->default(0)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relations');
    }
}
