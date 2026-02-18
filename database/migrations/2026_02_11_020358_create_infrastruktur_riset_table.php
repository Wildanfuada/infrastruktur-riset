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
        Schema::create('infrastruktur_risets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_laboratorium');
            $table->string('lembaga');
            $table->string('jenis_akreditasi')->nullable();
            $table->boolean('terakreditasi')->default(false);
            $table->text('fasilitas');
            $table->string('lokasi');
            $table->string('biaya_pengujian');
            $table->string('contact_person');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infrastruktur_risets');
    }
};
