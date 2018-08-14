<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    //
    protected $fillable = [
        'id_bioskop', 'user', 'kategori', 'judul_film', 'jml_penonton'
    ];
}
