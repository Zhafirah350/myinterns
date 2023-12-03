<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MagangController;
?>

@extends ('sidebar')
@section('title', 'Magang')

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
            <h1 style="font-size: 27px;">MAGANG</h1>
        </div>
    </div>


    <!-- Tabel dengan kelas Bootstrap -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
    <div class="row">
        <div class="col-md-6 text-left">
            <h4 class="m-0 font-weight-bold text-primary">Data Magang</h4>
        </div>
        <div class="col-md-6 text-right">
            <!-- <div class="button">
                <a href="/inputmhs" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
            </div> -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
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
                <th>Kode Perusahaan</th>
                <th>Nama Perusahaan</th>
                <th>Pekerjaan</th>
                <th>Alamat</th>
                <th style="width:200px">Aksi</th> <!-- Tambahkan kolom Aksi -->
            </tr>
        </thead>
        <!-- Inside your table body -->
<tbody>
    @foreach($datamg as $mg)
        <tr class="table-light">
        <td>{{ $mg->id }}</td>
        <td>{{ $mg->nama_tempat }}</td>
        <td>{{ $mg->posisi }}</td>
        <td>{{ $mg->alamat }}</td>
            <td>
            <!-- <a href="/editmhs" class="btn btn-warning text-white">Edit</a> -->
            <button type="button" class="btn btn-warning text-white" data-toggle="modal" data-target="#modal{{ $mg->id }}">Edit</button>
                <form class="d-inline" action="/admin-magang/hapus/{{ $mg->id }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        <!-- modal edit -->
<div class="modal fade" id="modal{{ $mg->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $mg->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel{{ $mg->id }}">Edit Data Magang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/admin-magang/{{ $mg->id }}" method="POST">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="form-group">
              <label for="id">Kode Perusahaan</label>
              <input type="text" class="form-control" id="id" name="id" value="{{ $mg->id }}" readonly>
            </div>
            <div class="form-group">
              <label for="nama">Nama Perusahaan</label>
              <input type="text" class="form-control" id="nama_tempat" name="nama_tempat" value="{{ $mg->nama_tempat }}">
            </div>
            <div class="form-group">
              <label for="nama">Pekerjaan</label>
              <input type="text" class="form-control" id="posisi" name="posisi" value="{{ $mg->posisi }}">
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $mg->alamat }}">
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Magang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin-magang/tambah" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="id"><b>Kode Perusahaan</b></label>
                        <input class="form-control" type="text" name="id" id="id" placeholder="Masukkan Kode Perusahaan">
                    </div>
                    <div class="form-group">
                        <label for="nama_tempat"><b>Nama Perusahaan</b></label>
                        <input class="form-control" type="text" name="nama_tempat" id="nama_tempat" placeholder="Masukkan Nama Perusahaan">
                    </div>
                    <div class="form-group">
                        <label for="posisi"><b>Pekerjaan</b></label>
                        <input class="form-control" type="text" name="posisi" id="posisi" placeholder="Masukkan Pekerjaan">
                    </div>
                    <div class="form-group">
                        <label for="alamat"><b>Alamat</b></label>
                        <input class="form-control" type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat">
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