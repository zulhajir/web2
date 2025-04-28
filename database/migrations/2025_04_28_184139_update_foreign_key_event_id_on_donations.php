<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('donations', function (Blueprint $table) {
            // Hapus foreign key lama
            $table->dropForeign(['event_id']);

            // Tambah foreign key baru dengan CASCADE
            $table->foreign('event_id')
                  ->references('id')
                  ->on('events')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('donations', function (Blueprint $table) {
            // Kalau rollback, hapus dulu
            $table->dropForeign(['event_id']);

            // Balikin ke foreign biasa (tanpa cascade)
            $table->foreign('event_id')
                  ->references('id')
                  ->on('events');
        });
    }
};
