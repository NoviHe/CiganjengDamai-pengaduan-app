<?php

namespace App\Http\Controllers;

use App\Masyarakat;
use App\Pengaduan;
use App\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Petugas::get();
        return view('petugas.data.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.data.create');
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
            'nama_petugas' => 'required|min:3|max:35',
            'telp' => 'required|min:10|max:14',
            'username' => 'required|min:3|max:25|unique:masyarakats,username|unique:petugas,username',
            'password' => 'required|min:6',
            'rePassword' => 'required|same:password',
            'level' => 'required'
        ]);

        $data = new Petugas();
        $data->nama_petugas = $request->nama_petugas;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->telp = $request->telp;
        $data->level = $request->level;
        $save = $data->save();
        if ($save) {
            Alert::success('Success Saved!', 'Data Berhasil di Save');
            return redirect()->route('petugas.index');
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
        $data = Petugas::findOrFail($id);
        return view('petugas.data.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Petugas::findOrFail($id);
        return view('petugas.data.edit', compact('data'));
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
        if (!empty($request->password)) {
            $request->validate([
                'nama_petugas' => 'required|min:3|max:35',
                'telp' => 'required|min:10|max:14',
                'password' => 'required|min:6',
                'rePassword' => 'required|same:password',
                'level' => 'required'
            ]);
        } else {
            $request->validate([
                'nama_petugas' => 'required|min:3|max:35',
                'telp' => 'required|min:10|max:14',
                'level' => 'required'
            ]);
        }

        if (!empty($request->password)) {
            $field = [
                'nama_petugas' => $request->nama_petugas,
                'telp' => $request->telp,
                'password' => $request->password,
                'level' => $request->level
            ];
        } else {
            $field = [
                'nama_petugas' => $request->nama_petugas,
                'telp' => $request->telp,
                'level' => $request->level
            ];
        }

        $data = Petugas::findOrFail($id);
        $update = $data->update($field);
        if ($update) {
            Alert::success('Success Updated!', 'Data Berhasil di Ubah');
            return redirect()->route('petugas.index');
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
        $data = Petugas::findOrFail($id);
        $delete = $data->delete();
        if ($delete) {
            Alert::success('Success Deleted!', 'Data Berhasil di Ubah');
            return redirect()->route('petugas.index');
        } else {
            Alert::error('Failed Deleted!', 'Periksa Kembali Data');
            return redirect()->back();
        }
    }

    public function dashboard()
    {
        $now = date('Y-m-d');
        $pengaduan = Pengaduan::get();
        $newUser = Masyarakat::where('created_at', 'LIKE', '%' . $now . '%')->get();
        $masyarakat = Masyarakat::get();
        $petugas = Petugas::get();

        // for Chart Pengaduans per Bulan
        // $bulan = DB::select('SELECT EXTRACT(MONTH FROM tgl_pengaduan) bulan FROM pengaduans GROUP BY bulan ORDER BY bulan ASC');
        $bulan = DB::select('SELECT DATE_FORMAT(tgl_pengaduan,"%Y-%m") AS bulans FROM pengaduans GROUP BY DATE_FORMAT(tgl_pengaduan,"%Y-%m")');
        // dd($bulan);
        foreach ($bulan as $key) {
            $dt_bln[] = date('M', strtotime($key->bulans));
        }
        $count_bln = DB::select('SELECT DATE_FORMAT(tgl_pengaduan,"%Y-%m") AS bulans, COUNT(*) AS total FROM pengaduans GROUP BY DATE_FORMAT(tgl_pengaduan,"%Y-%m")');
        foreach ($count_bln as $key) {
            $res[] = $key->total;
        }
        if (!empty($res)) {
            $a = json_encode($res);
            $b = json_encode($dt_bln);
        } else {
            $a = json_encode(array(0, 0, 0));
            $b = json_encode(array('Jan', 'Feb', 'Mar'));
        }
        // dd($a);
        $jsonData = $a;
        $jsonDtBln = $b;

        // for Chart Pengaduans per Hari

        // dd($pengaduan);
        return view('petugas.index', compact('pengaduan', 'masyarakat', 'newUser', 'petugas', 'jsonDtBln', 'jsonData'));
    }
}
