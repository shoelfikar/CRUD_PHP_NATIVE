<?php

session_start();

if (!$_SESSION["login"]) {
  header("Location : login.php");
  exit;
}

require 'functions.php';

$karyawan = query("SELECT * FROM kary");


if ( isset($_POST["search"])) {
  $karyawan = search($_POST["keyword"]);
  
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Halaman Utama</title>
  </head>
  <body>
    

    <div class="container">
    <h3>Data Karyawan</h3>
    <?php if (isset ($delete) ) : ?>
    <div class="alert alert-success" role="alert">
      Data Karyawan Berhasil di Hapus!
    </div>
    <?php endif; ?>
    <?php if (isset ($error) ) : ?>
    <div class="alert alert-danger" role="alert">
      Gagal Menambahkan Data Karyawan!
    </div>
    <?php endif; ?>
    <a href="addKaryawan.php" class="btn btn-primary mb-4">Add Karyawan</a>

        <form class="form-inline" action="" method="post">
            <label class="sr-only" for="keyword">Name</label>
            <input type="text" class="form-control mb-3 mr-sm-2 col-md-3" id="keyword" placeholder="Masukkan Keyword Pencarian" autofocus name="keyword">
            <button type="submit" class="btn btn-primary mb-3" name="search">Search</button>
        </form>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Karyawan</th>
                <th scope="col">Foto</th>
                <th scope="col">Email</th>
                <th scope="col">Hp</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach($karyawan as $row) : ?>
                <tr>
                <th scope="row"><?= $no ?></th>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["foto"] ?></td>
                <td><?= $row["email"] ?></td>
                <td><?= $row["hp"] ?></td>
                <td><?= $row["jabatan"] ?></td>
                <td>
                <a href="update.php?id=<?= $row["id"]; ?>" class="btn btn-outline-primary">Edit</a>
                <a href="delete.php?id=<?= $row["id"]; ?>" class="btn btn-outline-danger" onclick="return confirm('Yakin Ingin Menghapus Data?')">Delete</a>
                </td>
                </tr>
                <?php $no++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>