<?php
namespace App\Http\Controllers;
use App\Http\Controllers\RekomController;
use App\Http\Controllers\Controller;
?>

@extends ('sidebar')
@section('title', 'Rekomendasi')

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
            <h1 style="font-size: 27px;">REKOMENDASI</h1>
        </div>
    </div>


    <!-- Tabel dengan kelas Bootstrap -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
    <div class="row">
        <div class="col-md-6 text-left">
            <h4 class="m-0 font-weight-bold text-primary">Data Rekomendasi</h4>
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
                <th>Aksi</th> <!-- Tambahkan kolom Aksi -->
            </tr>
        </thead>
        <!-- Inside your table body -->
<tbody>
    @foreach($datamhs as $mhs)
        <tr class="table-light">
        <td>{{ $mhs->id }}</td>
        <td>{{ $mhs->nama }}</td>
            <td>
              <button type="button" class="btn btn-warning text-white" data-toggle="modal" data-target="#modalRekomendasi" data-id="{{ $mhs->id }}" data-nama="{{ $mhs->nama }}">Tampil Rekomendasi</button>
            </td>
        </tr>
    @endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>

<div class="modal fade" id="modalRekomendasi" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Rekomendasi Magang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Isi modal akan diisi di sini -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JavaScript and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>


jQuery(document).ready(function($) {
  $('#modalRekomendasi').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button yang memicu modal
  var id = button.data('id'); // Mengambil data 'id'
  var nama = button.data('nama'); // Mengambil data 'nama'

  // Panggil metode 'tampilRekomendasi' dengan AJAX
  $.get('/rekomendasi/' + id, function(data) {
     
    // Buat daftar tempat magang
    var list = '<p>Rekomendasi tempat magang untuk ' + nama + ':</p><ol>';
    for (var i = 0; i < data.length; i++) {
      list += '<li>' + data[i].nama_tempat + ' - ' + data[i].nama_posisi +'</li>';
    }
    list += '</ol>';

    // Isi modal dengan daftar tempat magang
    $('#modalRekomendasi .modal-body').html(list);
  });

  });
});
</script>
@endsection