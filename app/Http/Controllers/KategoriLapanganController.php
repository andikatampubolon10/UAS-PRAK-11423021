<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriLapangan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class KategoriLapanganController extends Controller
{
    public function index()
    {   $kategori = DB::table('kategori_lapangan')
                    ->where('id_lokasi', '=', Auth::user()->id_lokasi)
                    ->get();
        $lokasi = DB::table('lokasi')
                    ->where('id_lokasi', '=', Auth::user()->id_lokasi)
                    ->first(); 
        return view('daftarkategorilapangan', compact('kategori','lokasi'));
    }

    public function tambah()
        {
            return view('tambahkategorilapangan');
        }
        public function store(Request $request)
    {
        $kategori = new KategoriLapangan;
        $kategori->nama_katlapangan = $request->namalapangan;
        $kategori->waktu_buka = $request->waktu_buka;
        $kategori->waktu_tutup = $request->waktu_tutup;
        $kategori->id_lokasi = Auth::user()->id_lokasi;
        $kategori->created_by = Auth::id();
        $kategori->update_by = Auth::id();
    
            if ($request->hasFile('file_olahraga')) {
                $file = $request->file('file_olahraga');
                $filename = $file->getClientOriginalName();
                $file->move(public_path('folderimages'), $filename);
                $kategori->file_katlapangan = $filename;
            } else {
                $kategori->file_katlapangan = null;
            }
    
         $kategori->save();
    
        return redirect('daftarkategorilapangan')->with('status', 'Kategori Lapangan berhasil ditambahkan.');
}

    public function delete($kategori)
    {
        $delete = KategoriLapangan::find($kategori);
        if ($delete->delete()) {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $kategori = KategoriLapangan::find($id);
        return view('editkategorilapangan', compact('kategori'));
    }
    public function update(Request $request, $id)
{
    $update = KategoriLapangan::find($id);

    // Jika ada file gambar yang diunggah
    if ($request->hasFile('file_katlapangan')) {
        $file = $request->file('file_katlapangan');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('folderimages'), $filename); // Simpan gambar ke dalam folder public/folderimages
        $update->file_katlapangan = $filename;
    }

    // Update data lainnya
    $update->nama_katlapangan = $request->namalapangan;
    $update->waktu_buka = $request->waktu_buka;
    $update->waktu_tutup = $request->waktu_tutup;
    $update->update_by = Auth::id();

    // Simpan perubahan ke dalam database
    $update->save();

    // Redirect ke halaman daftar kategori lapangan
    return redirect('daftarkategorilapangan');
}

}
