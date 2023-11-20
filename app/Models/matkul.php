<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matkul extends Model
{
    use HasFactory;
    protected $table = 'matkul';
    public $timestamps = false;
    protected $primarykey = 'kode_matkul';
    protected $fillable = [
        'kode_matkul',
        'nama_matkul',
    ];
}
