<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    protected $table = 'masyarakats';
    protected $fillable = [
        'id',
        'nik',
        'nama',
        'username',
        'password',
        'telp'
    ];
}
