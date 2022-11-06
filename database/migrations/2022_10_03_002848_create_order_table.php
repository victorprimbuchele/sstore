<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('shopping_cart_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('payment_method_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('delivery_address_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('credit_card_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
};
