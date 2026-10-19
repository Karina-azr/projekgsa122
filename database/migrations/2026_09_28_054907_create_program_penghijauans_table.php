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
        Schema::create('program_penghijauan', function (Blueprint $table) {
            $table->id();

            $table->string('nama_program');

            $table->string('lokasi');

            $table->text('deskripsi')->nullable();

            $table->date('tanggal_mulai');

            $table->date('tanggal_selesai')->nullable();

            $table->integer('target_pohon')->default(0);

            $table->enum('status', [
                'Akan Datang',
                'Berlangsung',
                'Selesai'
            ])->default('Akan Datang');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_penghijauan');
    }
};
