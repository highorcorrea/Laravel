<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('password', 60);
            $table->boolean('is_admin')->default(0);
            $table->string('street')->nullable();
            $table->integer('number')->nullable();
            $table->string('complement', 25)->nullable();
            $table->string('neighborh', 40)->nullable();
            $table->string('city', 60)->nullable();
            $table->char('uf', 2)->nullable();
            $table->string('cep', 15)->nullable();
            $table->string('phone', 15)->nullable();
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
        Schema::drop('users');
    }
}
