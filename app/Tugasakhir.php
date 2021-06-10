<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugasakhir extends Model
{
    protected $fillable = ['mahasiswa_id','judul'];

    public function mahasiswa(){
        return $this->belongsTo('App\Mahasiswa');
    }
}
