<?php
namespace App\Http\Controllers;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\Controller;
?>

@extends ('sidebar')
@section('title', 'Mata Kuliah')

@section('content')
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>MyInterns||Admin Kampus</title>
</head>
<body> -->
<div class="container mt-6">
    <div class="row">
        <div class="col-md-6 text-left">
            <h1 style="font-size: 27px;">MATA KULIAH</h1>
        </div>
    </div>


    <!-- Tabel dengan kelas Bootstrap -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
    <div class="row">
        <div class="col-md-6 text-left">
            <h4 class="m-0 font-weight-bold text-primary">Data Matkul</h4>
        </div>
        <div class="col-md-6 text-right">
            <!-- <div class="button">
                <a href="/inputmhs" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
            </div> -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> Add
            </button>
        </div>
    </div>
    </div>
        <div class="card-body">
            <div class="table-responsive">
    <table class="table table-bordered mx-auto">
        <thead>
            <tr>
                <th>Kode MK</th>
                <th>Nama MK</th>
                <th>Aksi</th> <!-- Tambahkan kolom Aksi -->
            </tr>
        </thead>
        <!-- Inside your table body -->
<tbody>
    @foreach($datamk as $mk)
        <tr class="table-light">
        <td>{{ $mk->kode_matkul }}</td>
        <td>{{ $mk->nama_matkul }}</td>
            <td>
            <button type="button" class="btn btn-warning text-white" data-toggle="modal" data-target="#modal{{ $mk->kode_matkul }}">Edit</button>
                <form class="d-inline" action="/admin-matkul/hapus/{{ $mk->kode_matkul }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        <!-- modal edit -->
<div class="modal fade" id="modal{{ $mk->kode_matkul }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $mk->kode_matkul }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel{{ $mk->kode_matkul }}">Edit Mata Kuliah</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/admin-matkul/{{ $mk->kode_matkul }}" method="POST">
          @csrf
          @method('PUT')
          <div class="modal-body">
          <div class="form-group">
              <label for="kode_matkul">Kode MK</label>
              <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" value="{{ $mk->kode_matkul }}">
            </div>
            <div class="form-group">
              <label for="nama_matkul">Nama MK</label>
              <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" value="{{ $mk->nama_matkul }}">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
    @endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
<!-- Modal Add-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="AddModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Kuliah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin-matkul/tambah" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="kode_matkul"><b>Kode MK</b></label>
                        <input class="form-control" type="text" name="kode_matkul" id="kode_matkul" placeholder="Masukkan Kode MK">
                    </div>
                    <div class="form-group">
                        <label for="nama_matkul"><b>Nama MK</b></label>
                        <input class="form-control" type="text" name="nama_matkul" id="nama_matkul" placeholder="Masukkan Nama MK">
                    </div>
                    <div class="form-group float-right">
                        <button class="btn btn-danger" type="reset">Reset</button>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection