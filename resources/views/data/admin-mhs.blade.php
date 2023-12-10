<?php
namespace App\Http\Controllers;
use App\Http\Controllers\APIController;
use App\Http\Controllers\Controller;
?>

@extends ('sidebar')
@section('title', 'Mahasiswa')

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
            <h1 style="font-size: 27px;">MAHASISWA</h1>
        </div>
    </div>


    <!-- Tabel dengan kelas Bootstrap -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
    <div class="row">
        <div class="col-md-6 text-left">
            <h4 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h4>
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
                <th>NIM</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Alamat</th>
                <th>Aksi</th> <!-- Tambahkan kolom Aksi -->
            </tr>
        </thead>
        <!-- Inside your table body -->
<tbody>
    @foreach($datamhs as $mhs)
        <tr class="table-light">
        <td>{{ $mhs->id }}</td>
        <td>{{ $mhs->nama }}</td>
        <td>{{ $mhs->prodi }}</td>
        <td>{{ $mhs->alamat }}</td>
            <td>
            <!-- <a href="/editmhs" class="btn btn-warning text-white">Edit</a> -->
            <!-- <button class="btn btn-warning text-white" data-toggle="modal" data-target="#editModal" data-nim="{{ $mhs->nim }}">Edit</button> -->
            <!-- <button class="btn btn-warning text-white edit-btn" data-toggle="modal" data-target="#editModal" data-nim="{{ $mhs->nim }}" data-nama="{{ $mhs->nama }}" data-prodi="{{ $mhs->prodi }}" data-alamat="{{ $mhs->alamat }}">Edit</button> -->
            <a href="{{ url('/admin-mhs/admin-nilai/' . $mhs->id) }}"><button type="button" class="btn btn-primary text-white">Detail</button></a>
            <button type="button" class="btn btn-warning text-white" data-toggle="modal" data-target="#modal{{ $mhs->id }}">Edit</button>
                <form class="d-inline" action="/admin-mhs/hapus/{{ $mhs->id }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        <!-- modal edit -->
<div class="modal fade" id="modal{{ $mhs->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $mhs->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel{{ $mhs->id }}">Edit Mahasiswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/admin-mhs/{{ $mhs->id }}" method="POST">
          @csrf
          @method('PUT')
          <div class="modal-body">
          <div class="form-group">
              <label for="nama"><b>NIM</b></label>
              <input type="text" class="form-control" id="nim" name="nim" value="{{ $mhs->id }}" readonly>
            </div>
            <div class="form-group">
              <label for="nama"><b>Nama</b></label>
              <input type="text" class="form-control" id="nama" name="nama" value="{{ $mhs->nama }}">
            </div>
            <div class="form-group">
              <label for="prodi"><b>Program Studi</b></label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="prodi" id="prodi1" value="TI" {{ $mhs->prodi == 'TI' ? 'checked' : '' }}>
                <label class="form-check-label" for="prodi1">
                  Teknologi Informasi
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="prodi" id="prodi2" value="SIB" {{ $mhs->prodi == 'SIB' ? 'checked' : '' }}>
                <label class="form-check-label" for="prodi2">
                  Sistem Informasi Bisnis
                </label>
              </div>
            </div>
            <div class="form-group">
              <label for="alamat"><b>Alamat</b></label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $mhs->alamat }}">
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin-mhs/tambah" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="id"><b>NIM</b></label>
                        <input class="form-control" type="text" name="id" id="id" placeholder="Masukkan Nim">
                    </div>
                    <div class="form-group">
                        <label for="Nama"><b>Nama Mahasiswa</b></label>
                        <input class="form-control" type="text" name="nama" id="nama" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="Prodi"><b>Program Studi</b></label><br>
                        <input type="radio" id="Prodi_TI" name="prodi" value="TI">
                        <label for="Prodi_TI">Teknik Informatika</label>
                        <input type="radio" id="Prodi_SIB" name="prodi" value="SIB">
                        <label for="Prodi_SIB">Sistem Informasi Bisnis</label>
                    </div>
                    <div class="form-group">
                        <label for="Alamat"><b>Alamat</b></label>
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