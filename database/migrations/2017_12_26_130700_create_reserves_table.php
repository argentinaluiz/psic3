<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_pacient_id')->unsigned();
            $table->integer('agenda_id')->unsigned();
            $table->date('date_reserved');

            $table->enum('status',array_keys(\App\Models\Painel\Reserve::STATUS))->nullable();
            $table->timestamps();

            $table->foreign('client_pacient_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('agenda_id')->references('id')->on('agendas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserves');
    }
}
