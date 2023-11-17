<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    public $timestamps = false;
    protected $primarykey = 'id_mhs';
    protected $fillable = [
        // 'id_mhs',
        'NIM',
        'Nama',
        'Prodi',
        'Alamat',
    ];
}