<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassInformationPatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_information_patient', function (Blueprint $table) {
            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patients');

            $table->integer('class_information_id')->unsigned();
            $table->foreign('class_information_id')->references('id')->on('class_informations');

            $table->unique(['patient_id','class_information_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_information_patient');
    }
}
