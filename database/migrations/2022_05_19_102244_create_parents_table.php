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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('fullName')->virtualAs("CONCAT(firstname , ' ' , lastname)");
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone_number');
            $table->timestamp('last_login_date')->nullable();
            $table->ipAddress('last_login_ip')->nullable();
            $table->string('profile_image')->nullable();
            $table->date('date_of_birth');
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
        Schema::dropIfExists('parents');
    }
};
