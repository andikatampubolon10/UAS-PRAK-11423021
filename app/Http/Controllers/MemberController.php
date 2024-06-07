<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index()
    {   
        $member = DB::table('users')
                ->where('id_lokasi', '=', Auth::user()->id_lokasi)
                ->where('role', '=', 'player')
                ->get();
        return view('daftarmember',compact('member'));
    }

    public function tambah()
    {
        return view('tambahmember');
    }
    public function store(Request $request)
    {
        $member = new User;
        $member->name = $request->name;
        $member->username = $request->username;
        $member->password = $request->password;
        $member->role = 'player';
        $member->id_lokasi = Auth::user()->id_lokasi;
        $member->created_by = Auth::id();
        $member->update_by = Auth::id();
        $member->save();
        return redirect('daftarmember')->with('status', 'Blog Post Form Data Has Been inserted');
    
    }
    public function delete($member)
    {
        $delete = User::find($member);
        if ($delete->delete()) {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $member = User::find($id);
        return view('editmember', compact('member'));
    }
    public function update(Request $request, $id)
    {
        $update = User::find($id);
        $update->name = $request->name;
        $update->username = $request->username;
        $update->password = $request->password;
        $update->update_by = Auth::id();
       
        $update->save();
        return redirect('daftarmember');
    }
}
