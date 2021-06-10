<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    public function dosens()
    {
        return $this->hasMany('App\Dosen');
    }
    public function mahasiswas()
    {
        return $this->hasMany('App\Mahasiswa');
    }
    public function matakuliahs()
    {
        return $this->hasMany('App\Mahasiswa');
    }
}
