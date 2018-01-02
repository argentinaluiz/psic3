<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->enum('expertise',array_keys(\App\Models\Painel\Client::EXPERTISE))->nullable();
            $table->string('document_number');
            $table->string('email', 50);
            $table->string('phone', 50);
            $table->boolean('defaulter', 2); // inadimplente
            $table->date('date_birth', 50)->nullable();
            $table->char('sex', 10)->nullable(); //m ou f
            $table->enum('marital_status',array_keys(\App\Models\Painel\Client::MARITAL_STATUS))->nullable();
            $table->string('physical_disability')->nullable();
            $table->string('company_name')->nullable();
            $table->string('client_type')->default(\App\Models\Painel\Client::TYPE_INDIVIDUAL); //NOT NULL
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
        Schema::dropIfExists('clients');
    }
}
