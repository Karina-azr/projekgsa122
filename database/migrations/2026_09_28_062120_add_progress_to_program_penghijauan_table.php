<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('program_penghijauan', function (Blueprint $table) {

            $table->unsignedInteger('pohon_tertanam')
                ->default(0)
                ->after('target_pohon');

            $table->dateTime('waktu_mulai')
                ->nullable()
                ->after('status');

        });
    }

    public function down(): void
    {
        Schema::table('program_penghijauan', function (Blueprint $table) {

            $table->dropColumn([
                'pohon_tertanam',
                'waktu_mulai',
            ]);

        });
    }
};
