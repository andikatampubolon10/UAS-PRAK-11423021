<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukOlahraga;
use Illuminate\Support\Facades\Auth;

class ProdukOlahragaController extends Controller
{
    public function index()
    {
        $produk = ProdukOlahraga::all();
        return view('daftarprodukolahraga',compact('produk'));
    }

    public function tambah()
    {
        return view('tambahprodukolahraga');
    }
    public function store(Request $request)
{
    $produk = new ProdukOlahraga;
    $produk->nama_produkolahraga = $request->namaproduk;
    $produk->harga_produkolahraga = $request->hargaproduk;
    $produk->stok_produkolahraga = $request->stokproduk;
    $produk->created_by = Auth::id();
    $produk->update_by = Auth::id();
    
    if ($request->hasFile('file_olahraga')) {
        $file = $request->file('file_olahraga');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('folderimages'), $filename);
        $produk->file_olahraga = $filename;
    } else {
        $produk->file_olahraga = null;
    }
    
    $produk->save();
    
    return redirect('daftarprodukolahraga')->with('status', 'Produk Olahraga berhasil ditambahkan.');
}

    public function delete($produk)
    {
        $delete = ProdukOlahraga::find($produk);
        if ($delete->delete()) {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $produk = ProdukOlahraga::find($id);
        return view('editprodukolahraga', compact('produk'));
    }
    public function update(Request $request, $id)
{
    $update = ProdukOlahraga::find($id);
    
    // Jika ada file gambar yang diunggah
    if ($request->hasFile('file_olahraga')) {
        $file = $request->file('file_olahraga');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('folderimages'), $filename);
        $update->file_olahraga = $filename;
    }

    // Update data lainnya
    $update->nama_produkolahraga = $request->namaproduk;
    $update->harga_produkolahraga = $request->hargaproduk;
    $update->stok_produkolahraga = $request->stokproduk;
    $update->update_by = Auth::id();
   
    $update->save();
    
    return redirect('daftarprodukolahraga');
}

}
