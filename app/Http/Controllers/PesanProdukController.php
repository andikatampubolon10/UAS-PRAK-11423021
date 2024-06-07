<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukOlahraga;
use App\Models\PesanProduk;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PesanProdukController extends Controller
{
    public function index()
    {
        $kategori = ProdukOlahraga::all();
        return view('daftarprodukolahragaplayer',compact('kategori'));
    }

    public function form($id)
    {
        $kategori = ProdukOlahraga::find($id);
        return view('formpesan', compact('kategori'));
    }

    public function store(Request $request)
    {
        $data = new PesanProduk;
        $data->id_produkolahraga = $request->id_produkolahraga;
        $data->id_user = Auth::id();
        $data->jumlah = $request->jumlah;
        $data->status = "Terkonfirmasi";
        $data->created_by = Auth::id();
        $data->update_by = Auth::id();
        $data->save();

        $update = ProdukOlahraga::find($request->id_produkolahraga);
        $update->stok_produkolahraga  =  $update->stok_produkolahraga - $request->jumlah;
       
        $update->save();
        return redirect('daftarprodukolahragaplayer')->with('status', 'Blog Post Form Data Has Been inserted');
    
    }

    protected $table = 'pesan_produk';

    public function produkOlahraga()
    {
        return $this->belongsTo(ProdukOlahraga::class, 'id_produkolahraga', 'id_produkolahraga');
    }

    public function view() {
        // Mengambil data dari database menggunakan DB::table() dan disimpan ke dalam $data
        // Menggunakan ->join() untuk menggabungkan tabel lainnya
        // Di akhir get() untuk mengambil data array
    
        $data = DB::table('pesan_produk')
                ->join('produk_olahraga', 'pesan_produk.id_produkolahraga', '=', 'produk_olahraga.id_produkolahraga')
                ->join('users', 'pesan_produk.id_user', '=', 'users.id')
                ->get();

    
        // Hitung total untuk setiap item
        foreach($data as $datas) {
            $datas->total = $datas->jumlah * $datas->harga_produkolahraga;
        }
    
        // Tampilkan view lihatpesanan dan kirim datanya ke view tersebut
        return view('lihatpesanan')->with('data', $data);
    }

    public function lihat() {
        // Mengambil data dari database menggunakan DB::table() dan disimpan ke dalam $data
        // Menggunakan ->join() untuk menggabungkan tabel lainnya
        // Di akhir get() untuk mengambil data array
    
        $data = DB::table('pesan_produk')
                ->join('produk_olahraga', 'pesan_produk.id_produkolahraga', '=', 'produk_olahraga.id_produkolahraga')
                ->where('pesan_produk.id_user', Auth::id())
                ->get();

    
        // Hitung total untuk setiap item
        foreach($data as $datas) {
            $datas->total = $datas->jumlah * $datas->harga_produkolahraga;
        }
    
        // Tampilkan view lihatpesanan dan kirim datanya ke view tersebut
        return view('lihatpesananplayer')->with('data', $data);
    }
    
    
}
