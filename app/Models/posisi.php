<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posisi extends Model
{
    use HasFactory;
    protected $table = 'posisi';
    public $timestamps = false;
    protected $primaryKey = 'id_posisi';
    public $incrementing = false;
    protected $fillable = [
        'id_posisi',
        'nama_posisi',
    ];
}
