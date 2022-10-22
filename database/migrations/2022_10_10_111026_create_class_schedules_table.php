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
        Schema::create('class_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->string('starting_hour');
            $table->string('starting_minute');
            $table->string('ending_hour');
            $table->string('ending_minute');
            $table->time('start_time')->virtualAs("CONCAT(starting_hour, ':', starting_minute)");
            $table->time('end_time')->virtualAs("CONCAT(ending_hour, ':', ending_minute)");
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
        Schema::dropIfExists('class_schedules');
    }
};
