<?php

namespace App\Http\Controllers;

use App\Jenis;
use App\Masyarakat;
use App\Pengaduan;
use App\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengaduan::get();
        return view('petugas.pengaduan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = Jenis::get();
        return view('masyarakat.pengaduan.create', compact('jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (empty($request->foto)) {
            $request->validate([
                'isi_laporan' => 'required',
                'tgl_pengaduan' => 'required',
                'jenis' => 'required'
            ]);
        } else {
            $request->validate([
                'isi_laporan' => 'required',
                'tgl_pengaduan' => 'required',
                'jenis' => 'required',
                'foto' => 'required|mimes:jpeg,png|'
            ]);
        }

        // Auto Name Based ID.
        $id = Pengaduan::getID();
        foreach ($id as $val);
        if (!empty($val->id_pengaduan)) {
            $idLm = $val->id_pengaduan;
        } else {
            $idLm = 0;
        }
        $idBaru = $idLm + 1;
        $blt = date('Y-m-d', strtotime($request->tgl_pengaduan));
        $kode = 'Foto_' . $blt . '_' . $idBaru;

        if (!empty($request->foto)) {
            // Uploda File
            $file = $request->file('foto');

            $folder = 'data_file';
            $name_file = $kode . '.' . $file->getClientOriginalExtension();
            $file->move($folder, $name_file);
        } else {
            $name_file = 'no_image.jpg';
        }

        // dd($name_file);
        $data = new Pengaduan();
        $data->tgl_pengaduan = $request->tgl_pengaduan;
        $data->nik = $request->nik;
        $data->isi_laporan = $request->isi_laporan;
        $data->foto = $name_file;
        $data->status = 'proses';
        $data->id_jenis = $request->jenis;
        $save = $data->save();
        if ($save) {
            Alert::success('Success Saved!', 'Data Berhasil di Save');
            return redirect()->route('pengaduan.daftar');
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
        $data = Pengaduan::findOrFail($id);
        $datas = Tanggapan::where('id_pengaduan', $id)->get();
        foreach ($datas as $dat);
        if (empty($dat)) {
            $dt = $data;
        } else {
            $dt = $dat;
        }
        // dd($dt);
        return view('petugas.pengaduan.show', compact('data', 'dt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pengaduan::findOrFail($id);
        $jenis = Jenis::get();
        return view('masyarakat.pengaduan.edit', compact('data', 'jenis'));
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
            'isi_laporan' => 'required',
            'tgl_pengaduan' => 'required',
            'jenis' => 'required'
        ]);
        $update = DB::table('pengaduans')->where('id_pengaduan', $id)
            ->update([
                'id_jenis' => $request->jenis,
                'isi_laporan' => $request->isi_laporan,
                'tgl_pengaduan' => $request->tgl_pengaduan,
            ]);
        if ($update) {
            Alert::success('Success Updated!', 'Data Berhasil di Edit');
            return redirect()->route('pengaduan.daftar');
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
        $data = Pengaduan::findOrFail($id);
        $delete = $data->delete();
        if ($delete) {
            Alert::success('Success Deleted!', 'Data Berhasil di Hapus');
            return redirect()->back();
        } else {
            Alert::error('Failed Deleted!', 'Periksa Kembali Data');
            return redirect()->back();
        }
    }

    public function daftar()
    {
        $nik = Auth::user()->nik;
        // dd($nik);
        $data = Pengaduan::where('nik', $nik)->orderBy('id_pengaduan', 'DESC')->paginate(5);
        return view('masyarakat.pengaduan.daftar', compact('data'));
    }

    public function detail($id)
    {
        $data = Pengaduan::findOrFail($id);
        $datas = Tanggapan::where('id_pengaduan', $id)->get();
        foreach ($datas as $dat);
        if (empty($dat)) {
            $dt = $data;
        } else {
            $dt = $dat;
        }
        // dd($dt);
        return view('masyarakat.pengaduan.show', compact('data', 'dt'));
    }
}
