<?php 

require 'functions.php';

if (isset ($_POST["register"]) ) {

  if (registrasi($_POST) > 0) {
    header('Location: login.php');
  }else{
    if ($registred !== '') {
       $messages = $registred;
    }else {
      $error = true;
    }
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

    <title>Registrasi User</title>
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
      .row{
        height: 600px;
        display:flex;
        flex-direction: column;
        justify-content:center;
      }
      .form-regis{
        width:380px;
        margin-bottom:20px;
      }
    </style>
  </head>
  <body>
        <div class="container">
          <div class="row">
            <h3 class="text-center form-regis">Register</h3>
            <div class="col-md-4">
              <?php if (isset($messages)) : ?>
                <div class="alert alert-danger" role="alert">
                  <?= $messages; ?>
                </div>
              <?php endif; ?>
              <div class="card text-white bg-info mb-5">
                <div class="card-body">
                  <form action="" method="post">
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" id="username" aria-describedby="emailHelp"
                      name="username">
                    </div>
                    <div class="form-group">
                      <label for="email">Alamat Email</label>
                      <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                      name="email">
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" aria-describedby="emailHelp"
                      name="password">
                    </div>
                    <div class="form-group">
                      <label for="confirm">Konfirmasi Password</label>
                      <input type="password" class="form-control" id="confirm" aria-describedby="emailHelp"
                      name="confirm">
                      <?php if (isset ($error) ) : ?>
                        <small class="text-danger">Konfirmasi Password Salah!</small>
                      <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-outline-light" name="register">Register</button>
                    <button type="submit" class="btn btn-outline-light" name="login">Login</button>
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