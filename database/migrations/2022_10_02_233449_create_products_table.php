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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('mglt', '10')->default(null)->nullable();
            $table->string('cargo_capacity', '15')->default(null)->nullable();
            $table->string('consumables', '10')->default(null)->nullable();
            $table->string('cost_in_credits', '15')->default(null)->nullable();
            $table->string('crew', '10')->default(null)->nullable();
            $table->string('hyperdrive_rating', '10')->default(null)->nullable();
            $table->string('length', '10')->default(null)->nullable();
            $table->text('manufacturer')->default(null)->nullable();
            $table->string('max_atmosphering_speed', '10')->default(null)->nullable();
            $table->string('model', '75');
            $table->string('passengers', '10')->default(null)->nullable();
            $table->string('starship_class', '75')->default(null)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};
