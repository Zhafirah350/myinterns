<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mahasiswa;
use App\Models\akademik;
use App\Models\magang;
use App\Models\rekomendasi;

class APIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = mahasiswa::all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return "hello";
        $save = new mahasiswa;
        $save->NIM = $request->NIM;
        $save->Nama = $request->Nama;
        $save->Prodi = $request->Prodi;
        $save->Alamat = $request->Alamat;
        $save->save();

        return "Berhasil Menyimpan Data Mahasiswa";
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request){
        $data = mahasiswa::all()->where("id_mhs", $request->id)->first();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $data = mahasiswa::all()->where('id_mhs', $request->id_mhs)->first();
        $data->NIM = $request->NIM;
        $data->Nama = $request->Nama;
        $data->Prodi = $request->Prodi;
        $data->Alamat = $request->Alamat;
        $data->save();
        return 'Berhasil Mengubah Data Mahasiswa';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $del = mahasiswa::all()->where('id_mhs', $request->id_mhs)->first();
        $del->delete();
        return 'Berhasil Menghapus Data Mahasiswa';
    }
}
