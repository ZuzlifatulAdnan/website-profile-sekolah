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
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 150)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('alt_text', 255)->nullable();
            $table->string('display_order', 20)->nullable();
            $table->string('status')->nullable();
            // $table->enum('status', ['Aktif', 'Tidak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
