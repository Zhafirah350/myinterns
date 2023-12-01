<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mahasiswa;
use App\Models\magang;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function s()
    {
        $datamg = magang::all();
                    // ->join('api_datas','sertifikats.nim_mhs','=','api_datas.nim')
                    // ->get();

                    return 1;
        // return view('data.admin-magang',compact('datamg'));
    }

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
        $save->id = $request->id;
        $save->nama = $request->nama;
        $save->prodi = $request->prodi;
        $save->alamat = $request->alamat;
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
    
    // public function getMahasiswa($nim)
    // {
    //     $mahasiswa = mahasiswa::where('nim', $nim)->first();
    //     if ($mahasiswa) {
    //         return response()->json($mahasiswa);
    //     } else {
    //         return response()->json(['message' => 'Mahasiswa not found.'], 404);
    //     }
    //                 // ->join('api_datas','sertifikats.nim_mhs','=','api_datas.nim')
    //                 // ->get();
    //     return view('data.editmhs',compact('datamhs'));
    // }

    public function getMahasiswa($nim)
    {
        $mahasiswa = mahasiswa::where('id', $nim)->first();
        if ($mahasiswa) {
            return response()->json($mahasiswa);
        } else {
            return response()->json(['message' => 'Mahasiswa not found.'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editmhs($id)
    {
        $datamhs = mahasiswa::where('id', $id);
        return view('data.editmhs',compact('datamhs'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function updatemhs(Request $request, $id)
    // {
    //     $datamhs = mahasiswa::where('nim', $id);
    //     $datamhs->nim = $request->nim;
    //     $datamhs->nama = $request->nama;
    //     $datamhs->prodi = $request->prodi;
    //     $datamhs->alamat = $request->alamat;
    //     $datamhs->save();
    //     return redirect()->intended('data');
    // }

    public function updatemhs(Request $request, $id)
{
    $mahasiswa = mahasiswa::where('id', $id)->first();
    if ($mahasiswa) {
        $mahasiswa->nama = $request->nama;
        $mahasiswa->prodi = $request->prodi;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->save();
        return redirect()->intended('/admin-mhs');
    } else {
        return response()->json(['message' => 'Mahasiswa not found.'], 404);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroymhs($id)
    {
        $datamhs = mahasiswa::where('id', $id);
        $datamhs->delete();
        // DB::statement('SET @var := 0');
        // DB::statement('UPDATE mahasiswa SET id = (@var := @var+1)');
        // DB::statement('ALTER TABLE mahasiswa AUTO_INCREMENT=1');
        return redirect()->intended('/admin-mhs');
    }
}
