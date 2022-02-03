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
            $table->foreignUuid('num_command')->constrained('commands', 'num_command');
            $table->foreignUuid('num_product')->constrained('products', 'num_product');
            $table->integer('quantity');
            $table->integer('unit_price');
            $table->integer("TVA")->default(21);
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
