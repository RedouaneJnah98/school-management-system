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
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
//            $table->foreignId('teacher_id');
            $table->foreignId('grade_id')->unique();
            $table->string('branch_id');
            $table->year('year');
            $table->string('status');
            $table->string('remark')->default('Amazing');
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
        Schema::dropIfExists('classrooms');
    }
};
