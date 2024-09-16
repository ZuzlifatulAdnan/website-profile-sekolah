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
        Schema::create('ppdbs', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255)->nullable();
            $table->text('deskripsi')->nullable();
            // $table->date('tanggal_upload')->nullable();
            $table->string('kategori')->nullable();
            // $table->enum('kategori', ['Alur', 'Kuota', 'Brosur'])->nullable();
            $table->string('image', 255)->nullable();
            $table->foreignId('users_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppdbs');
    }
};
