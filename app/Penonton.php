<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penonton extends Model
{
    //
    protected $fillable = [
        'id_bioskop', 'user', 'kategori', 'film', 'tgl_tayang', 'jml_penonton', 'poster', 'status'
    ];
}
