<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>MyInterns|Admin Kampus</title>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-12 mt-1">
                <h3>Form Tambah Data Magang</h3>
                <form action="/tambahmg" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama_tempat">Nama Perusahaan</label>
                        <input class="form-control" type="text" name="nama_tempat" id="nama_tempat" placeholder="Masukkan Nama Perusahaan">
                    </div>
                    <div class="form-group">
                        <label for="posisi">Posisi</label>
                        <input class="form-control" type="text" name="posisi" id="posisi" placeholder="Masukkan Posisi">
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat</label>
                        <input class="form-control" type="text" name="Alamat" id="Alamat" placeholder="Masukkan Alamat">
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
