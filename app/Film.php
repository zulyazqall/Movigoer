<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    //
    protected $fillable = [
        'id_kategori', 'judul', 'sinopsis', 'poster'
    ];
}
