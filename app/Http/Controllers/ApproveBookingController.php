<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriLapangan;
use App\Models\BookingOlahraga;
use Illuminate\Support\Facades\DB;

class ApproveBookingController extends Controller
{


    public function index()
    {   
        $kategori = DB::table('users')
        ->join('booking_olahraga', 'users.id', '=', 'booking_olahraga.id_user')
        ->get();

// Tampilkan view lihatpesanan dan kirim datanya ke view tersebut
        return view('approvebooking')->with('kategori', $kategori);
        }
}
