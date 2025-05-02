<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('galleries', function (Blueprint $table) {
        $table->id();
        $table->string('photo_path');
        $table->string('category');
        $table->string('description');
        $table->timestamp('uploaded_at')->nullable();
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
