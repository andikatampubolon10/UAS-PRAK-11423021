<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lokasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LokasiController extends Controller
{
    public function index()
    {
        $lokasi = Lokasi::all();
        return view('daftarlokasi',compact('lokasi'));

    }

    public function store(Request $request)
    {
        $lokasi = new Lokasi;
        $lokasi->nama_lokasi = $request->nama_lokasi;
        $lokasi->created_by = Auth::id();
        $lokasi->update_by = Auth::id();
         $lokasi->save();
    
        return redirect('daftarlokasi')->with('status', 'Lokasi berhasil ditambahkan.');
}
public function tambah()
{   
    
    return view('tambahlokasi');
}

public function delete($lokasi)
{
    $delete = Lokasi::find($lokasi);
    if ($delete->delete()) {
        return redirect()->back();
    }
}

public function edit($id)
{
    $lokasi = Lokasi::find($id);
    return view('editlokasi', compact('lokasi'));
}
public function update(Request $request, $id)
{
$update = Lokasi::find($id);

// Update data lainnya
$update->nama_lokasi = $request->nama_lokasi;
$update->update_by = Auth::id();

// Simpan perubahan ke dalam database
$update->save();

// Redirect ke halaman daftar lokasi lapangan
return redirect('daftarlokasi');
}
}
