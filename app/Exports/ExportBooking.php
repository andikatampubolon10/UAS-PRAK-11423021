<?php

namespace App\Exports;

use App\Models\BookingOlahraga;
use App\Models\KategoriLapangan;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class ExportBooking implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = DB::table('booking_olahraga')
        ->join('kategori_lapangan', 'booking_olahraga.id_katlapangan', '=', 'kategori_lapangan.id_katlapangan')
        ->join('users', 'booking_olahraga.id_user', '=', 'users.id')
        ->where('booking_olahraga.status', 'Approved')
        ->select(
            'booking_olahraga.tanggal_booking',
            'kategori_lapangan.nama_katlapangan', 
            'booking_olahraga.waktu_mulai_booking',
            'booking_olahraga.waktu_selesai_booking',
            'users.username',
            DB::raw('CEIL(TIMESTAMPDIFF(MINUTE, booking_olahraga.waktu_mulai_booking, booking_olahraga.waktu_selesai_booking) / 60) as total_hours'),
            DB::raw('CEIL(TIMESTAMPDIFF(MINUTE, booking_olahraga.waktu_mulai_booking, booking_olahraga.waktu_selesai_booking) / 60) * 55000 as total_price')
        )
        ->get();

        // Calculate total revenue
        $totalRevenue = $data->sum('total_price');

        return view('table', compact('data', 'totalRevenue'));
    }
}
