<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mahasiswa;
use App\Models\magang;
use App\Models\nilai;

class RekomController extends Controller
{
    //
    public function showDataMhs()
    {
        $datamhs = mahasiswa::all();
                    // ->join('api_datas','sertifikats.nim_mhs','=','api_datas.nim')
                    // ->get();
        return view('data.rekomendasi',compact('datamhs'));
    }

    public function showAll()
    {
        $datamhs = mahasiswa::all();
        return response()->json($datamhs);
    }

    public function tampilRekomendasi($id){
        $nilaiMhs = nilai::where('nim',$id)->orderBy('kode_matkul', 'asc')->get();
        $bobotPos1 = [
            'SIB213003' => 5,
            'SIB213005' => 7,
            'SIB213007' => 2,
            'SIB213008' => 4,
            'SIB214001' => 4,
            'SIB214002' => 6,
            'SIB214004' => 16,
            'SIB214005' => 18,
            'SIB214006' => 13,
            'SIB214007' => 15,
        ];
        $bobotPos2 = [
            'SIB213003' => 15,
            'SIB213005' => 13,
            'SIB213007' => 19,
            'SIB213008' => 13,
            'SIB214001' => 12,
            'SIB214002' => 8,
            'SIB214004' => 7,
            'SIB214005' => 1,
            'SIB214006' => 7,
            'SIB214007' => 5,
        ];

        $hasilPos1 = 0;
        $hasilPos2 = 0;

        foreach ($nilaiMhs as $nilai) {
            $hasilPos1 += $nilai->nilai_akhir * $bobotPos1[$nilai->kode_matkul];
            $hasilPos2 += $nilai->nilai_akhir * $bobotPos2[$nilai->kode_matkul];
        }
        

        $posisi = $hasilPos1 > $hasilPos2 ? 'P01' : 'P02';
        
        $tempatMagang = magang::where('magang.id_posisi',$posisi)
                        ->join('posisi','magang.id_posisi','=','posisi.id_posisi')
                        ->get();
        return response()->json($tempatMagang);
    }
}
