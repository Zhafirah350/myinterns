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
        $datamk = matkul::all();
                    // ->join('api_datas','sertifikats.nim_mhs','=','api_datas.nim')
                    // ->get();
        return view('data.admin-matkul',compact('datamk'));
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
    public function update(Request $request, $id)
    {
        $datamk = matkul::where('kode_matkul', $id)->first();
        if ($datamk) {
            $datamk->kode_matkul = $request->kode_matkul;
            $datamk->nama_matkul = $request->nama_matkul;
            $datamk->save();
            return redirect()->intended('/admin-matkul');
        } else {
            return response()->json(['message' => 'Mata Kuliah not found.'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $datamk = matkul::where('kode_matkul', $id);
        $datamk->delete();
        return redirect()->intended('/admin-matkul');
    }
}
