<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekomendasi extends Model
{
    use HasFactory;
    protected $table = 'rekomendasi';
    public $timestamps = false;
    protected $primaryKey = 'id_rekom';
    protected $fillable = [
        // 'id_rekom',
        'id_ak',
        'kode_tempat',
        'hasil_rekom',
    ];
}
