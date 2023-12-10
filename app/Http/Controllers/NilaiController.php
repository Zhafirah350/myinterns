<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mahasiswa;
use App\Models\nilai;
use App\Models\matkul;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = nilai::all();
        return $nilai;
    }

    public function store(Request $request)
    {
        $save = new nilai;
        $save->kode_matkul = $request->kode_matkul;
        $save->nim = $request->nim;
        $save->nilai_akhir = $request->nilai_akhir;
        $save->save();

        return redirect()->back();
        // return redirect()->intended('/admin-mhs/admin-nilai/', $request->nim);
    }

    public function show(Request $request, $id)
    {
        $datanilai = nilai::where('nim', $id)
                    ->join('matkul','akademik.kode_matkul', '=', 'matkul.kode_matkul')
                    ->get();
        $mahasiswa = mahasiswa::where('id', $id)->first();
        $nimMahasiswa = $id; // ganti dengan NIM mahasiswa

        $kodeMatkulDiAkademik = nilai::where('nim', $nimMahasiswa)->pluck('kode_matkul');
        $datamk = matkul::whereNotIn('kode_matkul', $kodeMatkulDiAkademik)->get();
        // $datamk = matkul::all();

        return view('data.admin-nilai', compact('datanilai', 'mahasiswa', 'datamk'));
        // $datanilai = nilai::all();
        //             // ->join('api_datas','sertifikats.nim_mhs','=','api_datas.nim')
        //             // ->get();
        // return view('data.admin-nilai',compact('datanilai'));
    }

    public function update(Request $request, $id)
    {
        $datanilai = matkul::where('id_ak', $id)->first();
        if ($datanilai) {
            $datanilai->kode_matkul = $request->kode_matkul;
            $datanilai->nim = $request->nim;
            $datanilai->nilai_akhir = $request->nilai_akhir;
            $datanilai->save();
            return redirect()->intended('/admin-nilai');
        } else {
            return response()->json(['message' => 'Nilai not found.'], 404);
        }
    }

    public function destroy($id)
    {
        $datanilai = nilai::where('id_ak', $id);
        // $nim = $datanilai->nim;
        $datanilai->delete();
        // return redirect()->intended('/admin-mhs');
        return redirect()->back();
        // return redirect()->intended('/admin-mhs/admin-nilai/id');
    //     Route::delete('/admin-mhs/admin-nilai/hapus', function (Request $request) {
    //         $nim = $request->input('nim');
    //         $matkul = $request->input('matkul');
        
    //         // Temukan nilai berdasarkan nim dan matkul
    //         $nilai = Nilai::where('nim', $nim)->where('matkul', $matkul)->first();
        
    //         // Jika nilai ditemukan, hapus
    //         if ($nilai) {
    //             $nilai->delete();
    //         }
        
    //         // Redirect kembali ke halaman sebelumnya
    //         return redirect()->back();
    //     }
    // );
    }
}
