<?php

include_once 'database.php';

if(!isset($_SESSION['user'])){
  die('0');
}

/* ===========================================
  Jangan lupa setiap data dari luar seperti $_POST atau $_GET
  harus di escape terlebih dahulu! mysqli_real_escape_string($var).
  Pada contoh ini baru pada bagian insert, sdngkan delete dan update belum
==============================================*/

if($_POST['type'] == 'insert'){
  $komentar = mysqli_real_escape_string($link,$_POST['isi_komentar']);

  $query = "INSERT INTO komentar (isi_komentar,id_user) VALUES ('$komentar',1)";

  if(mysqli_query($link,$query)){
    $last_id = mysqli_insert_id($link);
    echo "<div id='div_".$last_id."'>
    <p class='komentar_text' id='komentar_".$last_id."' data-id='".$last_id."'>".$komentar."</p>
    <button type='button' class='edit_komentar' data-id='".$last_id."'>Edit</button>
    <button type='button' class='hapus_komentar' data-id='".$last_id."'>Hapus</button>
    </div>";
  }else {
    echo "error";
  }
}

if($_POST['type'] == 'delete'){
  $query = "DELETE FROM komentar WHERE id=".$_POST['hapus_data_this_id']  ;

  if(mysqli_query($link,$query)){
    echo "1";
  }else {
    echo "-1";
  }
}

if($_POST['type'] == 'update'){
  $query = "UPDATE komentar SET id_user=1, isi_komentar='".$_POST['edit_data_komen']."' WHERE id=".$_POST['id_komen']  ;

  if(mysqli_query($link,$query)){
    echo "1";
  }else {
    echo "-1";
  }
}

 ?>
