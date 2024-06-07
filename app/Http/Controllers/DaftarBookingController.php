<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriLapangan;
use App\Models\BookingOlahraga;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DaftarBookingController extends Controller
{

    protected $table = 'booking_olahraga';

    public function kategoriLapangan()
    {
        return $this->belongsTo(KategoriLapangan::class, 'id_katlapangan', 'id_katlapangan');
    }

    public function index(){
    
        //mengambil data darri database menggunakan db::table() dan disimpan ke dalam $data
        //menggunakan ->join() untuk menggabungkan tabel lainnya
        //diakhir get() untuk mengambil data array

        //diakhir first() jika hanya satu data yang diambil

        $data = DB::table('kategori_lapangan')
                ->join('booking_olahraga', 'booking_olahraga.id_katlapangan', '=', 'kategori_lapangan.id_katlapangan')
                ->where('booking_olahraga.id_user', '=', Auth::id())
                ->get();
        

        //tampilkan view barang dan kirim datanya ke view tersebut
        return view('daftarbooking')->with('data', $data);
    }
}
