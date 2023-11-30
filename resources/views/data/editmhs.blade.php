<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>MyInterns||Admin Kampus</title>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-12 mt-1">
                <h3>Form Edit Mahasiswa</h3>
                <form method="POST" action="/data/{{ $datamhs->nim }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input class="form-control" type="text" name="nim" id="nim" value="{{ $datamhs->nim }}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Mahasiswa</label>
                        <input class="form-control" type="text" name="nama" id="nama" value="{{ $datamhs->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="prodi">Progam Studi</label><br>
                        <input type="radio" id="prodi" name="prodi" value="TI">
                        <label for="html">Teknik Informatika</label>
                        <input type="radio" id="prodi" name="prodi" value="SIB">
                        <label for="html">Sistem Informasi Bisnis</label>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input class="form-control" type="text" name="alamat" id="alamat" value="{{ $datamhs->alamat }}">
                    </div>
                    <div class="form-group float-right">
                        <button class="btn btn-lg btn-danger" type="reset">Reset</button>
                        <button class="btn btn-lg btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<!-- <form method="POST" action="/data/{{ $datamhs->id }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nim">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim" value="{{ $datamhs->nim }}">
    </div>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ $datamhs->nama }}">
    </div>
    <div class="form-group">
        <label for="prodi">Prodi</label>
        <input type="text" class="form-control" id="prodi" name="prodi" value="{{ $datamhs->prodi }}">
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $datamhs->alamat }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form> -->
