<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pengaduan extends Model
{
    protected $table = 'pengaduans';
    protected $primaryKey = 'id_pengaduan';
    protected $fillable = [
        'id_pengaduan',
        'tgl_pengaduan',
        'nik',
        'isi_laporan',
        'foto',
        'status',
        'id_jenis'
    ];

    public function getUser()
    {
        return $this->belongsTo('App\Masyarakat', 'nik', 'nik');
    }
    public function getJenis()
    {
        return $this->belongsTo('App\Jenis', 'id_jenis', 'id_jenis');
    }
    public static function getID()
    {
        return $getId = DB::table('pengaduans')->orderBy('id_pengaduan', 'DESC')->take('1')->get();
    }
}
