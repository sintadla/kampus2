<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'dosen';

    // protected $table = 'dosens';
    // protected $primaryKey = 'id';
    protected $fillable = [
        'jurusan_id',
        'nama_dosen',
        'jenis_kelamin',
        'nomor_telepon',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id' ,'id' );
    }

}
