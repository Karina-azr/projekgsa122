<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign('order_items_bibit_id_foreign');

            $table->foreign('bibit_id')
                ->references('id')
                ->on('bibits')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign('order_items_bibit_id_foreign');

            $table->foreign('bibit_id')
                ->references('id')
                ->on('bibit')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }
};