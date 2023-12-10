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
        $save->id = $request->id;
        $save->nama_tempat = $request->nama_tempat;
        $save->posisi = $request->posisi;
        $save->alamat = $request->alamat;
        $save->save();

        return redirect()->intended('/admin-magang');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $datamg = magang::join('posisi','magang.id_posisi','=','posisi.id_posisi')
                    ->get();
        return view('data.admin-magang',compact('datamg'));
    }

    public function getMagang($id)
    {
        $magang = magang::where('kode_tempat', $id)->first();
        if ($magang) {
            return response()->json($magang);
        } else {
            return response()->json(['message' => 'Perusahaan not found.'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editmagang($id)
    {
        $datamg = magang::where('kode_tempat', $id);
        return view('data.editmg',compact('datamagang'));
    }

    // public function edit(Request $request)
    // {
    //     $data = magang::all()->where('kode_tempat', $request->kode_tempat)->first();
    //     $data->kode_tempat = $request->kode_tempat;
    //     $data->nama_tempat = $request->nama_tempat;
    //     $data->posisi = $request->posisi;
    //     $data->alamat = $request->alamat;
    //     $data->save();
    //     return 'Berhasil Mengubah Data Magang';
    // }

    /**
     * Update the specified resource in storage.
     */
    public function updatemagang(Request $request, $id)
{
    $magang = magang::where('id', $id)->first();
    if ($magang) {
        $magang->nama_tempat = $request->nama_tempat;
        $magang->posisi = $request->posisi;
        $magang->alamat = $request->alamat;
        $magang->save();
        return redirect()->intended('/admin-magang');
    } else {
        return response()->json(['message' => 'Magang not found.'], 404);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $datamg = magang::where('id', $id);
        $datamg->delete();
        // DB::statement('SET @var := 0');
        // DB::statement('UPDATE mahasiswa SET id = (@var := @var+1)');
        // DB::statement('ALTER TABLE mahasiswa AUTO_INCREMENT=1');
        return redirect()->intended('/admin-magang');
    }
}
