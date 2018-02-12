<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('url');
            $table->integer('order');
            $table->enum('deleted',["N","S"])->default("N");
            $table->integer('product_id')->unsigned()->default(1);
            $table->integer('imagem_id')->unsigned()->default(1);

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('imagem_id')->references('id')->on('imagens');
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
        Schema::dropIfExists('galleries');
    }
}
