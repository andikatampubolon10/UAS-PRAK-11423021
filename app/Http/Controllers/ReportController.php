<?php

namespace App\Http\Controllers;

use App\Exports\ExportBooking;
use Illuminate\Http\Request;
use App\Models\KategoriLapangan;
use App\Models\BookingOlahraga;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {   
        $data = DB::table('booking_olahraga')
                ->join('kategori_lapangan', 'booking_olahraga.id_katlapangan', '=', 'kategori_lapangan.id_katlapangan')
                ->join('users', 'booking_olahraga.id_user', '=', 'users.id') // Join with users table
                ->where('booking_olahraga.status', 'Approved')
                ->select(
                    'booking_olahraga.*', 
                    'kategori_lapangan.nama_katlapangan', 
                    'kategori_lapangan.harga_katlapangan', 
                    'kategori_lapangan.file_katlapangan',
                    'users.username'
                )
                ->orderBy('booking_olahraga.tanggal_booking', 'asc')
                ->get();
                
        return view('report',compact('data'));
    }

    public function export_excel(){
        return Excel::download(new ExportBooking,"report.xlsx");
    }
}
