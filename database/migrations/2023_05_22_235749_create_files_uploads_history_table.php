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
        Schema::create('files_uploads_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_file');
            $table->foreign('id_file')->references('id')->on('files_uploads');
            $table->unsignedBigInteger('id_user_down');
            $table->foreign('id_user_down')->references('id')->on('users');
            $table->string('ip_user')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files_uploads_history');
    }
};
