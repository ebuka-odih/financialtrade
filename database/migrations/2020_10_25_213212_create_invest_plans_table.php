<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invest_plans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('desc')->nullable();
            $table->string('leverage')->nullable();
            $table->string('acct_base_currency')->nullable();
            $table->decimal('min_amount', 11, 2);
            $table->decimal('max_amount', 11, 2);
            $table->integer('term_days');
            $table->integer('daily_return');
            $table->string('spread')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invest_plans');
    }
}
