<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('tracker')->unique();
            $table->decimal('discount', 6, 2)->default(0);
            $table->enum('discount_mode', ['value', 'porc'])->default('porc');
            $table->decimal('limit', 6, 2)->default(0);
            $table->enum('limit_mode', ['value', 'qtd'])->default('qtd');
            $table->dateTime('expiry_dthr');
            $table->enum('ativo', ['S', 'N'])->default('S');
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
        Schema::dropIfExists('discount_coupons');
    }
}
