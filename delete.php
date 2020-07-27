<?php 

require 'functions.php';

$id = $_GET["id"];

if ( delete($id) > 0) {
  $delete = true;
  header('Location: index.php');
}else{
  $error = true;
}


?>