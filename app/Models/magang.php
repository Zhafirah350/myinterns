<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class magang extends Model
{
    use HasFactory;
    protected $table = 'magang';
    public $timestamps = false;
    protected $primarykey = 'kode_tempat';
    protected $fillable = [
        'kode_tempat',
        'nama_tempat',
        'posisi',
        'alamat',
    ];
}
