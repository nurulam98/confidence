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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('no_handphone');
            $table->string('address');
            $table->string('kota');
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('isAdmin')->default(false);
            $table->boolean('isIT')->default(false);
            $table->boolean('isUser')->default(true);
            $table->string('password');
            $table->boolean('isDeleted')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
