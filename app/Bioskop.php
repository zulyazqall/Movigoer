<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bioskop extends Model
{
    //
    protected $fillable = [
        'id_akun', 'nama', 'email', 'telp', 'image', 'namacp', 'telpcp', 'alamat'
    ];
}
