<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    public $timestamps = false;
    // protected $primarykey = 'nim';
    protected $fillable = [
        // 'id_mhs',
        'nim',
        'nama',
        'prodi',
        'alamat',
    ];
}
