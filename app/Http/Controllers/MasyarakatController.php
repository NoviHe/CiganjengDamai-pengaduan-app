<?php

namespace App\Http\Controllers;

use App\Masyarakat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Masyarakat::get();
        return view('masyarakat.data.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Masyarakat::findOrFail($id);
        return view('masyarakat.data.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Masyarakat::findOrFail($id);
        return view('masyarakat.data.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|min:3|max:25',
            'telp' => 'required|min:10|max:13'
        ]);

        $field = [
            'nama' => $request->nama,
            'telp' => $request->telp
        ];
        // dd($field);

        $data = Masyarakat::findOrFail($id);
        $update = $data->update($field);
        if ($update) {
            Alert::success('Success Updated!', 'Data Berhasil di Ubah');
            return redirect()->route('masyarakat.index');
        } else {
            Alert::error('Failed Updated!', 'Periksa Kembali Data');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Masyarakat::findOrFail($id);
        $delete = $data->delete();
        if ($delete) {
            Alert::success('Success Deleted!', 'Data Berhasil di Hapus');
            return redirect()->route('masyarakat.index');
        } else {
            Alert::error('Failed Deleted!', 'Periksa Kembali Data');
            return redirect()->back();
        }
    }

    public function setting($id)
    {
        $data = Masyarakat::findOrFail($id);
        return view('masyarakat.data.setting', compact('data'));
    }

    public function settingUpdate(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|min:3|max:25',
            'telp' => 'required|min:10|max:13'
        ]);

        $field = [
            'nama' => $request->nama,
            'telp' => $request->telp
        ];
        // dd($field);

        $data = Masyarakat::findOrFail($id);
        $update = $data->update($field);
        if ($update) {
            Alert::success('Success Updated!', 'Data Berhasil di Ubah');
            return redirect()->route('welcome');
        } else {
            Alert::error('Failed Updated!', 'Periksa Kembali Data');
            return redirect()->back();
        }
    }
}
