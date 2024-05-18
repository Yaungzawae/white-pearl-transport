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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->string('identification_code');
            $table->string('password');
            $table->string("first_name");
            $table->string("last_name");
            $table->string("age");
            $table->string("sex");
            $table->string("class");
            $table->string('g1_first_name');
            $table->string('g2_first_name');
            $table->string('g3_first_name');
            $table->string('g1_last_name');
            $table->string('g2_last_name');
            $table->string('g3_last_name');
            $table->string('g1_city');
            $table->string('g2_city');
            $table->string('g1_address');
            $table->string('g2_address');
            $table->string('g1_zip');
            $table->string('g2_zip');
            $table->string('g1_email');
            $table->string('g2_email');
            $table->string('g1_home_phone');
            $table->string('g2_home_phone');
            $table->string('g3_home_phone');
            $table->string('g1_mobile_phone');
            $table->string('g2_mobile_phone');
            $table->string('g3_mobile_phone');
            $table->string('school_to_home');
            $table->string('home_to_school');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
