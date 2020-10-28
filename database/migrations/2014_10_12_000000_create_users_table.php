<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->string('title')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->text('bio')->nullable();
            $table->string('btc_wallet')->nullable();
            $table->decimal('acct_wallet', 7)->nullable()->default(0);
            $table->string('id_type')->nullable();
            $table->string('id_image_1')->nullable();
            $table->string('id_image_2')->nullable();

            $table->string('status')->default('pending');
            $table->string('user_role')->default('client');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
