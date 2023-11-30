<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\magang;

class MagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = magang::all();
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
        $save = new magang;
        $save->kode_tempat = $request->kode_tempat;
        $save->nama_tempat = $request->nama_tempat;
        $save->posisi = $request->posisi;
        $save->alamat = $request->alamat;
        $save->save();

        return redirect()->intended('/admin-magang');
    }

    /**
     * Display the specified resource.
     */
    public function showMagang(Request $request)
    {
        $datamg = magang::all();
                    // ->join('api_datas','sertifikats.nim_mhs','=','api_datas.nim')
                    // ->get();
        return view('data.admin-magang',compact('datamagang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $data = magang::all()->where('kode_tempat', $request->kode_tempat)->first();
        $data->kode_tempat = $request->kode_tempat;
        $data->nama_tempat = $request->nama_tempat;
        $data->posisi = $request->posisi;
        $data->alamat = $request->alamat;
        $data->save();
        return 'Berhasil Mengubah Data Magang';
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
        $del = magang::all()->where('kode_tempat', $request->kode_tempat)->first();
        $del->delete();
        return 'Berhasil Menghapus Data Magang';
    }
}
