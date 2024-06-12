<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;

class LoginController extends Controller
{
    public function prosesLogin(Request $request)
    {
        $username = request('username');
        $password = request('password');

        $user = userModel::where('username', $username)->where('password', md5($password))->first();
        if ($user) {
            session()->put('username', $username);
            session()->put('password', $password);
            session()->flash('icon', 'success');
            session()->flash('title', 'Berhasil');
            session()->flash('message', 'Selamat Datang ' . $username);

            return redirect('/');
        } else {
            session()->flash('icon', 'error');
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Username atau password salah');

            return redirect('/login');
        }
    }
}
