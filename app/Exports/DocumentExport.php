<?php

namespace App\Exports;

use App\Models\Document;
use Maatwebsite\Excel\Concerns\FromCollection;

class DocumentExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Document::all();
    // }

    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = Document::query();

        // 🔥 filter tanggal
        if ($this->request->start_date && $this->request->end_date) {
            $query->whereBetween('created_at', [
                $this->request->start_date . ' 00:00:00',
                $this->request->end_date . ' 23:59:59'
            ]);
        }

        // 🔥 filter cabang
        if ($this->request->nama_cabang) {
            $query->where('nama_cabang', 'like', '%' . $this->request->nama_cabang . '%');
        }

        return $query->get();
    }
}
