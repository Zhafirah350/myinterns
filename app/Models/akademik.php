<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akademik extends Model
{
    use HasFactory;
    protected $table = 'akademik';
    public $timestamps = false;
    protected $primarykey = 'id_ak';
    protected $fillable = [
        // 'id_ak',
        'id_mhs',
        'nim',
        'nama',
        'matkul',
        'nilai_akhir',
    ];
}
