<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    protected $fillable = ['nama','id_mahaiswa'];
    public $timestamp= true;
    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa','id_mahasiswa');
    }
}
