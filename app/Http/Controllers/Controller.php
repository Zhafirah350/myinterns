<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // public function showDataMhs()
    // {
    //     $datamhs = mahasiswa::all();
    //                 // ->join('api_datas','sertifikats.nim_mhs','=','api_datas.nim')
    //                 // ->get();
    //     return view('data.admin-mhs',compact('mahasiswa'));
    // }
}
