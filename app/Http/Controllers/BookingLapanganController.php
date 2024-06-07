<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriLapangan;
use App\Models\BookingOlahraga;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class BookingLapanganController extends Controller
{
    public function index()
    {
        $kategori = DB::table('kategori_lapangan')
                    ->where('id_lokasi', '=', Auth::user()->id_lokasi)
                    ->get();

        $lokasi = DB::table('lokasi')
                    ->where('id_lokasi', '=', Auth::user()->id_lokasi)
                    ->first(); 
        return view('daftarkategorilapanganplayer',compact('kategori','lokasi'));
    }

    public function form($id)
    {
        $kategori = KategoriLapangan::find($id);
        return view('formbooking', compact('kategori'));
    }

    public function store(Request $request)
    {
        $booking = new BookingOlahraga;
        $booking->id_katlapangan = $request->id_katlapangan;
        $booking->id_user = Auth::id();
        $booking->tanggal_booking = $request->tanggal_booking;
        $booking->waktu_mulai_booking = $request->waktumulai;
        $booking->waktu_selesai_booking = $request->waktuselesai;
        $booking->status = "waiting";
        $booking->created_by = Auth::id();
        $booking->update_by = Auth::id();
        $booking->save();
        return redirect('daftarkategorilapanganplayer')->with('status', 'Blog Post Form Data Has Been inserted');
    
    }

    protected $table = 'booking_olahraga';

    public function kategoriLapangan()
    {
        return $this->belongsTo(KategoriLapangan::class, 'id_katlapangan', 'id_katlapangan');
    }

    public function view()
    {
        // Mengambil data dari database menggunakan DB::table() dan disimpan ke dalam $data
        // Menggunakan ->join() untuk menggabungkan tabel lainnya
        // Di akhir get() untuk mengambil data array
        // Di akhir first() jika hanya satu data yang diambil
        
        $data = DB::table('booking_olahraga')
                ->join('kategori_lapangan', 'booking_olahraga.id_katlapangan', '=', 'kategori_lapangan.id_katlapangan')
                ->join('users', 'booking_olahraga.id_user', '=', 'users.id') // Join with users table
                ->where('booking_olahraga.status', 'waiting') 
                ->where('kategori_lapangan.id_lokasi', '=', Auth::user()->id_lokasi) // Menambahkan klausa where
                ->select(
                    'booking_olahraga.*', 
                    'kategori_lapangan.nama_katlapangan', 
                    'kategori_lapangan.harga_katlapangan', 
                    'kategori_lapangan.file_katlapangan',
                    'users.username' // Select user name
                )
                ->get();
    
        // Tampilkan view approvebooking dan kirim datanya ke view tersebut
        return view('approvebooking')->with('data', $data);
    }
    

    public function update(Request $request, $id)
    {
        $update = BookingOlahraga::find($id);
        if ($request->has('approve')) {
        $update->status = "Approved";
        } elseif ($request->has('reject')) {
        $update->status = "Rejected";
        }
    $update->update_by = Auth::id();
       
        $update->save();
        return redirect('approvebooking');
    }

    
      
}
