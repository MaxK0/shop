<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();

            $table->boolean('active')->default(1);

            $table->string('name');
            $table->string('lastname');
            $table->string('patronymic')->nullable();

            $table->tinyInteger('age')->unsigned()->nullable();
            $table->string('address')->nullable();
            $table->string('phone', 11)->nullable();
            $table->tinyInteger('gender')->unsigned()->nullable();

            $table->unsignedBigInteger('role_id')->default(0);
            $table->foreign('role_id')->references('id')->on('roles')->noActionOnDelete()->cascadeOnUpdate();

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            $table->string('password');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
