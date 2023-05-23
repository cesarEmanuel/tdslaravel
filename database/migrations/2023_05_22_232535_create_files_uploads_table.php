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
        Schema::create('files_uploads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('namefile')->nullable();
            $table->string('sizefile')->nullable();
            $table->string('typefile')->nullable();
            $table->string('md5file')->nullable();
            $table->integer('version')->nullable();
            $table->string('displayfile')->nullable();
            $table->string('statusfile')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files_uploads');
    }
};
