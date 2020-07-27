<?php 
require 'functions.php';
session_start();

if (isset($_COOKIE["id"]) && isset($_COOKIE["remember"])) {

  $id = $_COOKIE["id"];
  $remember = $_COOKIE["remember"];

  $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
  if ($remember === hash('sha256', $row["username"])) {
    $_SESSION["login"] = true;
  }
  
}

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}


if (isset ($_POST["login"]) ) {

  if (login($_POST)) {
    header('Location: index.php');
  }else{
    if ($invailid !== '') {
        $message = $invailid;
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

    <title>Login Admin</title>
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
        height: 500px;
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
            <h3 class="text-center form-regis">Login</h3>
            <div class="col-md-4">
                <?php if (isset($message)) : ?>
                    <div class="alert alert-danger" role="alert">
                    <?= $message; ?>
                    </div>
                <?php endif; ?>
              <div class="card mb-5">
                <div class="card-body">
                  <form action="" method="post">
                    <div class="form-group">
                      <label for="email">Alamat Email</label>
                      <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                      name="email">
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" aria-describedby="emailHelp"
                      name="password">
                      <?php if (isset ($error) ) : ?>
                        <small class="text-danger">Password yang anda masukkan salah!</small>
                      <?php endif; ?>
                    </div>
                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="remember" name="remember">
                      <label class="form-check-label" for="remember">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-outline-primary" name="login">Login</button>
                    <button type="submit" class="btn btn-outline-primary" name="register">Register</button>
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