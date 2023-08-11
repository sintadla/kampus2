<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = "jurusan";
    // protected $primaryKey = 'id';
    // protected $fillable =[
    //     'fakultas',
    // ];

    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'jurusan_id');
    }

    // public function jurusan()
    // {
    //     return $this->belongsTo(jurusan::class, 'fakultas', 'id');
    // }

    protected $fillable =  [
        'fakultas',
    ];
}
