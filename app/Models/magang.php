<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class magang extends Model
{
    use HasFactory;
    protected $table = 'magang';
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'nama_tempat',
        'posisi',
        'alamat',
    ];
}
