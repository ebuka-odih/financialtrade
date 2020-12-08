<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToNotifyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifies', function (Blueprint $table) {
            $table->string('title');
            $table->text('message')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->integer('read')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notifies', function (Blueprint $table) {
           $table->dropColumn(['title', 'message', 'read']);
        });
    }
}
