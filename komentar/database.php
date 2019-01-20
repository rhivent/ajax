<?php
$host = 'localhost'; //127.0.0.1
$user = 'root';
$pass = '';
$db = 'ajax';

$link = mysqli_connect($host,$user,$pass,$db) or die(mysqli_error());

if(!$link){
  echo "gagal konek!";}
else{
  echo "";
}

$_SESSION['user'] = 1;
?>
