<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lokasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengelolaController extends Controller
{
    public function index()
{
    $pengelola = DB::table('users')
                   ->join('lokasi', 'users.id_lokasi', '=', 'lokasi.id_lokasi')
                   ->where('users.role', 'Pengelola')
                   ->select('users.*', 'lokasi.nama_lokasi')
                   ->get();

    return view('daftarpengelolalapangan', compact('pengelola'));
}

    

    public function tambah()
    {   
        $lokasi = DB::table('lokasi')
                ->where('status', '=', 0)
                ->get();
        return view('tambahpengelola',compact('lokasi'));
    }
    public function store(Request $request)
    {
        $pengelola = new User;
        $pengelola->name = $request->name;
        $pengelola->username = $request->username;
        $pengelola->password = $request->password;
        $pengelola->id_lokasi = $request->id_lokasi;
        $pengelola->role = 'Pengelola'; 
        $pengelola->created_by = Auth::id();
        $pengelola->update_by = Auth::id();
        if ($pengelola->save())
        {
            $lokasi = Lokasi::find($request->id_lokasi);
            $lokasi->status = 1;
            $lokasi->save();
        };
        return redirect('daftarpengelolalapangan')->with('status', 'Blog Post Form Data Has Been inserted');
    
    }
    public function delete($pengelola)
    {
        $delete = User::find($pengelola);
        if ($delete->delete()) {
            return redirect()->back();
        }
    }

    public function edit($id)
    {   
        $lokasi = DB::table('lokasi')
                ->where('status', '=', 0)
                ->get();
        $pengelola = User::find($id);
        return view('editpengelola', compact('pengelola', 'lokasi'));
    }
    public function update(Request $request, $id)
    {
        $update = User::find($id);
        $update->name = $request->name;
        $update->username = $request->username;
        $update->password = $request->password;
        
        $update->role = 'Pengelola'; 
        $update->update_by = Auth::id();
       
        $update->save();
        return redirect('daftarpengelolalapangan');
    }
}
