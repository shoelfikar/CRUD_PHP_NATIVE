<?php 

require 'functions.php';

if (isset ($_POST["submit"]) ) {

  if (addKaryawan($_POST) > 0) {
    header('Location: index.php');
  }else{
    $error = true;
  }
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

    <title>Tambah Data Karyawan</title>
    <style>
      .container{
        margin-top: 40px;
      }
      .cancel-btn{
        text-decoration: none;
        color: #fff;
      }
      .cancel-btn:hover{
        text-decoration: none;
        color: #fff;
      }
    </style>
  </head>
  <body>
        <div class="container">
          <div class="row justify-content-center">
            <h3 class="col-md-8 text-center">Form Tambah Data Karyawan</h3>
            <div class="col-md-6">
              <?php if (isset ($error) ) : ?>
              <div class="alert alert-danger" role="alert">
                Gagal Menambahkan Data Karyawan!
              </div>
              <?php endif; ?>
              <div class="card mb-5">
                <div class="card-body">
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="nama">Nama Lengkap</label>
                      <input type="text" class="form-control" id="nama" aria-describedby="emailHelp"
                      name="nama">
                    </div>
                    <div class="form-group">
                      <label for="email">Alamat Email</label>
                      <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                      name="email">
                    </div>
                    <div class="form-group">
                      <label for="jabatan">Jabatan</label>
                      <input type="text" class="form-control" id="jabatan" aria-describedby="emailHelp"
                      name="jabatan">
                    </div>
                    <div class="form-group">
                      <label for="hp">Nomor Handphone</label>
                      <input type="text" class="form-control" id="hp" aria-describedby="emailHelp"
                      name="hp">
                    </div>
                    <div class="custom-file mb-5 mt-2">
                      <input type="file" class="custom-file-input" id="foto" name="foto">
                      <label class="custom-file-label" for="foto">Choose file...</label>
                      <?php if (isset($noFile)) : ?>
                      <small class="text-danger"><?= $noFile ?></small>
                      <?php endif; ?>
                      <?php if (isset($notValid)) : ?>
                      <small class="text-danger"><?= $notValid ?></small>
                      <?php endif; ?>
                      <?php if (isset($toBig)) : ?>
                      <small class="text-danger"><?= $toBig ?></small>
                      <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    <button type="submit" class="btn btn-danger" name="cancel"><a href="index.php" class="cancel-btn">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      









    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>