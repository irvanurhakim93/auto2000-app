<?php

namespace App\Imports;

use App\Models\Document;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class DocumentImport implements ToModel, WithHeadingRow
{

    protected $path;
    public function __construct($path)
    {
        $this->path = $path;
    }
    public function model(array $row)
    {
        if (empty($row['nama_klien'])) {
        return null;
        }   

            // buang key numerik yang tidak perlu
            // $row = array_filter($row, function($key) {
            //     return !is_int($key);
            // }, ARRAY_FILTER_USE_KEY);
             $row = collect($row)->mapWithKeys(function ($value, $key) {
            return [strtolower(trim($key)) => $value];
        })->toArray();

           return new Document([
            'nama_klien' => $row['nama_klien'] ?? null,
            'nama_cabang' => $row['nama_cabang'] ?? null,
            'nama_tad' => $row['nama_tad'] ?? null,
            'kategori_1' =>(string) ($row['kategori_1'] ?? null),
            'kategori_2' => (string) ($row['kategori_2'] ?? null),
            'kategori_3' => (string) ($row['kategori_3'] ?? null),
            'condition' => $row['condition'] ?? null,
            'keterangan' => $row['keterangan'] ?? null,
            'document_path'     => $this->path,

            // tanggal
            'tanggal_pengerjaan' =>
            is_numeric($row['tanggal_pengerjaan'] ?? null)
                ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_pengerjaan'])->format('Y-m-d')
                : ($row['tanggal_pengerjaan'] ?? null),

            // jam
            'jam_pengerjaan' =>
            is_numeric($row['jam_pengerjaan'] ?? null)
                ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['jam_pengerjaan'])->format('H:i:s')
                : ($row['jam_pengerjaan'] ?? null),

            // 'jam_pengerjaan' => $row['jam_pengerjaan'] ?? null,

            // dd($row)
            ]);
    }

    // public function model(array $row)
    // {
    //     dd($row);
    // }

}
