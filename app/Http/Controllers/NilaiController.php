<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mahasiswa;
use App\Models\nilai;

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

        return redirect()->intended('/admin-nilai');
    }

    public function show(Request $request, $id)
    {
        $datanilai = nilai::where('nim', $id)
                    ->join('matkul','akademik.kode_matkul', '=', 'matkul.kode_matkul')
                    ->get();
        $mahasiswa = mahasiswa::where('id', $id)->first();

        return view('data.admin-nilai', compact('datanilai', 'mahasiswa'));
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
        $datanilai->delete();
        return redirect()->intended('/admin-nilai');
    }
}
