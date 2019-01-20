<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Comment Ajax</title>
    <script type="text/javascript" src="jquery.min.js"></script>
    <style media="screen">
      *{
        font-family: 15px sans-serif;
      }

      body{
        width:80%;
        margin:10% auto;
      }
      button{
        background-color: red;
        color:white;
        border:none;
      }
    </style>
  </head>
  <body>
    <!-- memakai custom atribut sejak html5
    yang penting ada "data-nama_atribut", sifatnya bebas
    nama yg kita pakai yaitu data-id
   -->
    <h1>Artikel <kbd>Riventus</kbd> </h1>
    <p>Isi artikel ini adalah: </p>
    <textarea name="textarea_komen" id="textarea_komen" required rows="8" cols="40"></textarea><br/>
    <input type="submit" name="submit_komen" id="submit_komen" value="SUBMIT">

    <div class="" id="kotak_wrapper">
      <?php
      include_once 'database.php';
      $query = "SELECT * FROM komentar ORDER BY id DESC";
      $comments = mysqli_query($link,$query);

      foreach ($comments as $comment) {?>
        <div id="div_<?=$comment['id'];?>">
          <p class="komentar_text" id="komentar_<?=$comment['id'];?>" data-id="<?=$comment['id'];?>"><?=$comment['isi_komentar'];?></p>
          <button type="button" class="edit_komentar" data-id="<?=$comment['id'];?>">Edit</button>
          <button type="button" class="hapus_komentar" data-id="<?=$comment['id'];?>">Hapus</button>
        </div>
      <?php } ?>
    </div>

    <script type="text/javascript">
      $('#submit_komen').on('click',function(){
        var isi = $('#textarea_komen').val();
        $.ajax({
          url : "komentar_ajax.php",
          method : "POST",
          data : { isi_komentar: isi , type:"insert"},
          success: function(data){
            if( data == '0'){
              alert('Anda harus login!');
            }
            else{
            /* prepend untuk menampilkan isi diatas tag p yg sudah ada
              sedangkan append utk menampilkan isi dibawah tag p yg sudah ada
            */
              $('#textarea_komen').val("");
              $('#kotak_wrapper').prepend(data);
            }
          }
        });
      });

      $(document).on('click','.hapus_komentar',function(){
        var id = $(this).attr('data-id');
        $.ajax({
          url : "komentar_ajax.php",
          method : "POST",
          data : { hapus_data_this_id: id , type:"delete"},
          success: function(data){
            if( data == '0'){
              alert("Anda harus login!");
            }
            else if(data == '1'){
              $("#div_"+id).fadeOut();
            }
          }
        });
      });

      $(document).on('click','.komentar_text',function(){
        var id = $(this).attr('data-id');
        var textbox = $(document.createElement('textarea')).attr('id','textarea_'+id,);
        $(this).replaceWith(textbox);
      });

      //melakukan hal yg terbalik dari awal saat kita klik element tag p
      $(document).on('click','.edit_komentar',function(){
        var id = $(this).attr('data-id');
        var isi = $('#textarea_'+id).val();
        //membuat attribut lebih dr 1 untuk tag p dgn array { key:value}
        var text = $(document.createElement('p')).attr({
                        'id':'textarea_'+id,
                        'class':'komentar_text',
                        'data-id' :id
                      }).text(isi);
        $.ajax({
          url : "komentar_ajax.php",
          method : "POST",
          data : { edit_data_komen: isi ,id_komen:id , type:"update"},
          success: function(data){
            if( data == '0'){
              alert("Anda harus login!");
            }
            else if(data == '1'){
              $('#textarea_'+id).replaceWith(text);
            }
          }
        });
      });

    </script>
  </body>
</html>
