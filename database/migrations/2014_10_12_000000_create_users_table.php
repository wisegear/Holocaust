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
            $table->boolean('email_visible')->default(false);
            $table->string('avatar')->default('default.png');
            $table->String('bio', 500)->nullable();
            $table->string('website')->nullable();
            $table->string('location')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('trusted')->default(false);
            $table->boolean('lock')->default(true);
            $table->String('notes')->nullable();
            $table->string('password');
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
