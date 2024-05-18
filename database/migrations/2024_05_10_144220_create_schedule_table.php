<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('bus_no');
            $table->string('driver_name');
            $table->string('password');
            $table->string('license_no');
            $table->string('insurance');
            $table->string('monitor');
            $table->string('policy_no');
            $table->string('bus_plate');
            $table->string('color');
            $table->string('phone_number');
            $table->string('school_to_home');
            $table->string('home_to_school');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');

        //change
    }
};
