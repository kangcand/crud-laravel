<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa','id_mahasiswa');
    }
}
