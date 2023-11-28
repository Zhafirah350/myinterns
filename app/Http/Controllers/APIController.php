<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mahasiswa;
use App\Models\akademik;
use App\Models\rekomendasi;
use Illuminate\Support\Facades\DB;

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

        return redirect()->intended('/admin-mhs');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Request $request){
    //     $datamhs = mahasiswa::all()->where("id_mhs", $request->id_mhs)->first();
    //     return $datamhs;
    // }

    public function showDataMhs()
    {
        $datamhs = mahasiswa::all();
                    // ->join('api_datas','sertifikats.nim_mhs','=','api_datas.nim')
                    // ->get();
        return view('data.admin-mhs',compact('datamhs'));
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
    public function destroy($id)
    {
        $datamhs = mahasiswa::where('id', $id)->first();
        $datamhs->delete();
        DB::statement('SET @var := 0');
        DB::statement('UPDATE mahasiswa SET id = (@var := @var+1)');
        DB::statement('ALTER TABLE mahasiswa AUTO_INCREMENT=1');
        return redirect()->intended('/admin-mhs');
    }
}
