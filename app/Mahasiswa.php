<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['nim','nama','jurusan_id'];

    protected $guarded =['id'];
    public function jurusan()
    {
        return $this->belongsTo('App\Jurusan');
    }
    public function matakuliahs()
    {
        return $this->belongsToMany('App\Matakuliah')->withTimestamps();
    }
    public function tugasakhir(){
        return $this->hasOne('App\Tugasakhir');
    }
}
