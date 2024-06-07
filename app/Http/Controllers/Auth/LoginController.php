<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // Import Request

class LoginController extends Controller
{
        use AuthenticatesUsers;

    protected $redirectTo = '/daftarkategorilapangan';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        
        if (auth()->attempt(['username' => $input['username'], 'password' => $input['password']])) {
            if (auth()->user()->role == "admin") {
                return redirect('/daftarlokasi')->with('success', "Berhasil masuk!");
            } elseif (auth()->user()->role == "player") {
                return redirect('/daftarkategorilapanganplayer')->with('success', "Berhasil masuk!");
            } elseif (auth()->user()->role == "Pengelola") {
                return redirect('/daftarkategorilapangan')->with('success', "Berhasil masuk!");
            } 
        } else {
            return redirect()->route('login')->with('error', 'Invalid username or password');
        }
    }
}
