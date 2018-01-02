<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_clinic_id')->unsigned();
            $table->integer('room_id')->unsigned();
            $table->integer('client_psychoanalyst_id')->unsigned();
            $table->date('date');
            $table->time('time');
            $table->double('old_price', 10, 2);
            $table->double('price', 10, 2);
            $table->integer('stallments');
            $table->boolean('is_promotion')->default(false);
            $table->integer('qty_sessions')->default(1);
            $table->text('description')->nullable();
            $table->timestamps();


            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('client_clinic_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('client_psychoanalyst_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendas');
    }
}
