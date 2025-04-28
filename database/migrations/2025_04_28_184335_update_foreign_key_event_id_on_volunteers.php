<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('volunteers', function (Blueprint $table) {
            // Hapus foreign key lama
            $table->dropForeign(['event_id']);

            // Tambahkan foreign key baru dengan CASCADE
            $table->foreign('event_id')
                  ->references('id')
                  ->on('events')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('volunteers', function (Blueprint $table) {
            // Kembalikan foreign key tanpa cascade
            $table->dropForeign(['event_id']);
            $table->foreign('event_id')
                  ->references('id')
                  ->on('events');
        });
    }
};
