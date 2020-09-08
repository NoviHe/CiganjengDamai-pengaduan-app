<?php

namespace App\Http\Controllers;

use App\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Register extends Controller
{
    public function regist(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3|max:35',
            'nik' => 'required|min:10|max:16|unique:masyarakats,nik',
            'telp' => 'required|min:10|max:14',
            'username' => 'required|min:3|max:25|unique:masyarakats,username|unique:petugas,username',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        $data = new Masyarakat();
        $data->nik = $request->nik;
        $data->nama = $request->nama;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->telp = $request->telp;
        $save = $data->save();
        if ($save) {
            Auth::guard('masyarakat')->attempt(['username' => $request->username, 'password' => $request->password]);
            Alert::toast('Success Register!', 'success');
            return redirect()->route('petugas');
            // return redirect()->route('login');
        } else {
            Alert::error('Failed Register!', 'Periksa Kembali Data');
            return back();
        }
        // dd($data);
    }
}
