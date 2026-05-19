<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';

    protected $fillable = [
        'nama_klien',
        'nama_cabang',
        'nama_tad',          // 🔥 kolom baru
        'kategori_1',
        'kategori_2',
        'kategori_3',
        'condition',
        'keterangan',
        'document_path',
        'tanggal_pengerjaan',
        'jam_pengerjaan',    // 🔥 kolom baru
    ];
}
