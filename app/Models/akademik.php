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
        'kode_matkul',
        'nim',
        'nilai_akhir',
    ];
}
