<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('command_product', function (Blueprint $table) {
            $table->id();
            $table->uuid('num_command_id');
            $table->uuid('num_product_id');
            $table->integer('quantity');
            $table->integer('unit_price');
            $table->integer("TVA")->default(21);
            $table->foreign('num_command_id')->references('num_command')->on('commands');
            $table->foreign('num_product_id')->references('num_product')->on('products');
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
        Schema::dropIfExists('command_product');
    }
}
