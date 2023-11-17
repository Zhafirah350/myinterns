<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class magang extends Model
{
    use HasFactory;
    protected $table = 'magang';
    public $timestamps = false;
    protected $primarykey = 'id_magang';
    protected $fillable = [
        // 'id_magang',
        'nama_tempat',
        'posisi',
        'alamat',
    ];
}
