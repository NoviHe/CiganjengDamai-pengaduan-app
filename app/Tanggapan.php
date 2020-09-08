<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'tanggapans';
    protected $primaryKey = 'id_tanggapan';
    protected $fillable = [
        'id_tanggapan',
        'id_pengaduan',
        'tgl_tanggapan',
        'tanggapan',
        'id_petugas'
    ];
    public function getAdmin()
    {
        return $this->belongsTo('App\Petugas', 'id_petugas', 'id_petugas');
    }
    public function getData()
    {
        return $this->belongsTo('App\Pengaduan', 'id_pengaduan', 'id_pengaduan');
    }
}
