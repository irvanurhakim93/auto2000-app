<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DocumentImport;
use App\Models\Document;
use App\Exports\DocumentExport;
use Maatwebsite\Excel\Excel as ExcelFormat;

class DocumentController extends Controller
{
    // public function index()
    // {
    //     $dataDocument = Document::all();
    //     return view('document',compact('dataDocument'));    
    // }

    public function index(Request $request)
    {
        $query = Document::query();

            // filter tanggal berdasarkan tanggal_pengerjaan
            if ($request->start_date && $request->end_date) {

                $query->whereBetween('tanggal_pengerjaan', [
                    $request->start_date,
                    $request->end_date
                ]);
            }

            // filter cabang
            if ($request->nama_cabang) {
                $query->where('nama_cabang', $request->nama_cabang);
            }

            $dataDocument = $query->get();

            $listCabang = Document::select('nama_cabang')
                ->distinct()
                ->orderBy('nama_cabang')
                ->pluck('nama_cabang');
            //akhir filter cabang

            //filter kondisi
            if ($request->condition) {
                $query->where('condition', $request->condition);
            }

            $dataDocument = $query->get();

            $listKondisi = Document::select('condition')
                ->distinct()
                ->orderBy('condition')
                ->pluck('condition');


            //akhir filter kondisi

            return view('document', compact(
                'dataDocument',
                'listCabang',
                'listKondisi'
            ));
    }

    public function storeDoc(Request $request)
    {
    // dd('MASUK CONTROLLER');

    // 🔐 Optional: hanya admin
    // if (!auth()->user() || !auth()->user()->hasRole('admin')) {
    //     abort(403);
    // }

    // // ✅ Validasi
    $request->validate([
        'file' => 'required|file|mimes:xls,xlsx,csv|max:10240'
    ]);

    $file = $request->file('file');

    // // ✅ Rename biar unik
    $filename = time() . '_' . $file->getClientOriginalName();

    // // ✅ Simpan ke storage/app/documents
    $path = $file->storeAs('documents', $filename);

    // // ✅ Simpan ke DB
    $doc =  Excel::import(new DocumentImport($path), $file);

    return response()->json([
        'message' => 'Upload berhasil',
        'data' => $doc
    ]);
}



    public function downloadExcel(Request $request)
    {
        return Excel::download(new DocumentExport($request), 'documents.xlsx');
    }

    public function downloadJson(Request $request)
    {
         $query = Document::query();

            if ($request->start_date) {
                $query->whereDate(
                    'tanggal_pengerjaan',
                    '>=',
                    $request->start_date
                );
            }

            if ($request->end_date) {
                $query->whereDate(
                    'tanggal_pengerjaan',
                    '<=',
                    $request->end_date
                );
            }

            if ($request->nama_cabang) {
                $query->where(
                    'nama_cabang',
                    $request->nama_cabang
                );
            }

            return $query->get();        
    }

    public function downloadCsv(Request $request)
    {
         return Excel::download(
        new DocumentExport($request),
        'documents.csv',
        ExcelFormat::CSV
    );   
    }




        public function logout(Request $request)
    {
        Log::info('User logged out.');
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');


    }

}
