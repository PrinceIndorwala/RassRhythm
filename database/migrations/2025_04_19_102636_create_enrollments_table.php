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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // User who enrolled
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('class_level');
            $table->decimal('course_fee', 8, 2); // For storing course fee
            $table->string('time_slot');
            $table->text('days'); // To store selected days (comma separated)
            $table->string('photo'); // To store the path to the uploaded photo
            $table->timestamps();

             // Set foreign key relationship if needed
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
