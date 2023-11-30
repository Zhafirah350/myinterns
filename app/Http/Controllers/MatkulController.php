<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\matkul;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matkul = matkul::all();
        return $matkul;
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
        $save = new matkul;
        $save->kode_matkul = $request->kode_matkul;
        $save->nama_matkul = $request->nama_matkul;
        $save->save();

        return redirect()->intended('/admin-matkul');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $datamhs = matkul::all();
                    // ->join('api_datas','sertifikats.nim_mhs','=','api_datas.nim')
                    // ->get();
        return view('data.admin-matkul',compact('datamatkul'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        $del = matkul::all()->where('kode_matkul', $request->kode_matkul)->first();
        $del->delete();
        return 'Berhasil Menghapus Data Mata Kuliah';
    }
}
