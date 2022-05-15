<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('password_confirmation');
            $table->date('dob');
            $table->string('phone');
            $table->string('status')->default('teacher');
            $table->string('profile_image');
            $table->string('profile_bio');
            $table->date('last_login_date')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->string('gender');
            $table->string('address');
            $table->integer('number');
            $table->string('city');
            $table->integer('zip');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
