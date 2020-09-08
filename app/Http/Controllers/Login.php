<?php

namespace App\Http\Controllers;

use App\Masyarakat;
use App\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class Login extends Controller
{
    function Login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->username;
        $password = $request->password;
        if (Auth::guard('petugas')->attempt(['username' => $username, 'password' => $password])) {
            Alert::toast('Success Login!', 'success');
            return redirect()->route('petugas');
        } elseif (Auth::guard('masyarakat')->attempt(['username' => $username, 'password' => $password])) {
            Alert::toast('Success Login!', 'success');
            return redirect()->route('welcome');
        } else {
            Alert::error('Failed Login!', 'Periksa Kembali Data');
            return redirect()->back();
        }

        // $data1 = Masyarakat::where('username', $request->username)->where('password', $password)
        //     ->get();
        // $data2 = Petugas::where('username', $request->username)->where('password', $password)
        //     ->get();
        // if (count($data1) > 0) {
        //     //sukses login masyarakat
        //     Auth::guard('masyarakat')->loginUsingId($data1[0]['id']);
        //     return redirect('/masyarakat');
        // } elseif (count($data2) > 0) {
        //     //sukses login petugas
        //     Auth::guard('petugas')->loginUsingId($data2[0]['id_petugas']);
        //     return redirect('/petugas');
        // } else {
        //     //fail login
        //     return "Login GAGAL!!";
        // }
    }

    function Logout()
    {
        if (Auth::guard('masyarakat')->check()) {
            Auth::guard('masyarakat')->logout();
        } elseif (Auth::guard('petugas')->check()) {
            Auth::guard('petugas')->logout();
        }
        Alert::toast('Success Logout!', 'success');
        return redirect()->route('login');
    }
}
