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
        Schema::create('documents', function (Blueprint $table) {
        $table->id();
        $table->string('nama_klien');
        $table->string('nama_cabang');
        $table->string('nama_tad')->nullable();
        $table->integer('kategori_1');
        $table->string('kategori_2');
        $table->string('kategori_3');
        $table->string('condition');
        $table->string('keterangan')->nullable();
        $table->string('document_path');
        $table->date('tanggal_pengerjaan')->nullable();
        $table->time('jam_pengerjaan')->nullable();
        $table->timestamps();

            $table->unique(
                ['nama_klien', 'nama_cabang', 'nama_tad', 'tanggal_pengerjaan', 'jam_pengerjaan'],
                'documents_unique_index'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
            Schema::table('documents', function (Blueprint $table) {
            $table->dropUnique('documents_unique_index');
        });
    }
};
