<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'nama',
        'prodi',
        'alamat',
    ];

    public function mk()
    {
        return $this->belongsToMany(MatkulController::class);
    }
}
