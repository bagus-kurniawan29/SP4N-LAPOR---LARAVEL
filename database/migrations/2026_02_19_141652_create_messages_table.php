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
    Schema::create('messages', function (Blueprint $table) {
        $table->id();
        $table->foreignId('laporan_id')->constrained()->onDelete('cascade'); // Terhubung ke laporan mana
        $table->foreignId('user_id')->constrained()->onDelete('cascade');    // Siapa yang kirim (Admin/Warga)
        $table->text('message');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message');
    }
};
