<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('order');
            $table->string('pair');
            $table->decimal('buy_at', 11, 2);
            $table->decimal('opening_price', 11, 2)->nullable();
            $table->decimal('closing_price', 11, 2)->nullable();
            $table->decimal('price', 11, 2);
            $table->bigInteger('user_id')->nullable();
            $table->decimal('profit', 11, 2)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trades');
    }
}
