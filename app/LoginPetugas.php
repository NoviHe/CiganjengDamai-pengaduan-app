<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class LoginPetugas extends Authenticatable
{
    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';
}
