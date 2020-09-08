<?php

namespace App\Http\Controllers;

use App\Jenis;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jenis::get();
        return view('petugas.jenis.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.jenis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3'
        ]);

        $data = new Jenis();
        $data->nama = $request->nama;
        $save = $data->save();
        if ($save) {
            Alert::success('Success Saved!', 'Data Berhasil di Simpan');
            return redirect()->route('jenis.index');
        } else {
            Alert::error('Failed Saved!', 'Periksa Kembali Data');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Jenis::findOrFail($id);
        return view('petugas.jenis.edit', compact('data'));
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
            'nama' => 'required|min:3'
        ]);

        $data = Jenis::findOrFail($id);
        $update = $data->update(['nama' => $request->nama]);
        if ($update) {
            Alert::success('Success Updated!', 'Data Berhasil di Edit');
            return redirect()->route('jenis.index');
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
        $data = Jenis::findOrFail($id);
        $delete = $data->delete();
        if ($delete) {
            Alert::success('Success Deleted!', 'Data Berhasil di Hapus');
            return redirect()->route('jenis.index');
        } else {
            Alert::error('Failed Deleted!', 'Periksa Kembali Data');
            return redirect()->back();
        }
    }
}
