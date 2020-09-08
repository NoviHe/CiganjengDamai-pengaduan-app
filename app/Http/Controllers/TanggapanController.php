<?php

namespace App\Http\Controllers;

use App\Pengaduan;
use App\Tanggapan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tanggapan::get();
        // foreach ($datas as $data);
        // dd($data->);
        return view('petugas.tanggapan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id_pengaduan = $id;
        $data = Pengaduan::findOrFail($id);
        return view('petugas.tanggapan.create', compact('id_pengaduan', 'data'));
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
            'status' => 'required',
            'tanggapan' => 'required'
        ]);

        $data = new Tanggapan();
        $data->id_pengaduan = $request->id_pengaduan;
        $data->tgl_tanggapan = $request->tgl_tanggapan;
        $data->tanggapan = $request->tanggapan;
        $data->id_petugas = $request->id_petugas;
        $save = $data->save();
        $update = Pengaduan::findOrFail($request->id_pengaduan);
        $update->update(['status' => $request->status]);
        if ($save) {
            Alert::success('Success Saved!', 'Data Berhasil di Save');
            return redirect()->route('pengaduan.index');
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
        $data = Tanggapan::findOrFail($id);
        return view('petugas.tanggapan.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Tanggapan::findOrFail($id);
        $id2 = $data->id_pengaduan;
        $get_data = Pengaduan::findOrFail($id2);
        $get_data->update(['status' => 'proses']);
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
