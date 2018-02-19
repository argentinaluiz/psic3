<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('research_id')->unsigned()->default(1);
            $table->integer('user_id')->unsigned()->default(1);

            $table->foreign('research_id')->references('id')->on('researches');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('research_user');
    }
}
