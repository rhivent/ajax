<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <p> ini bagian atas </p>
    <div class="" id="kotak"></div>
    <p> ini bagian bawah </p>

    <button type="button" name="button" id="btn">Ambil data</button>
    <!-- menggunakan jquery 3.3.1 -->
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript">
      /*
      inisialisasi jika document html semua ready maka akan ada fungsi yg dijalankan.

      */

      $(document).ready(function(){
        // method load(),post(),get(),ajax()

        //===== 1. load()
        /*utk load isi file.html seluruhnya di bagian div di atas
        dan juga untuk load isi file.php yg di echo, print atau die() dengan function(3parameters: response,status,xhr)
        */
        // $('#kotak').load('file.html',function(response,status,xhr){
        // $('#kotak').load('file.php',function(response,status,xhr){
        //   if(status == 'success'){
        //     console.log('berhasil!');
        //   }else{
        //     console.log('gagal!');
        //   }
        // });

        //====== 2. get(url [,data][,success][,dataType])
        /* tanda kurung siku artinya parameter optional, boleh di isi atau tidak, sedangkan yg tidak artinya parameter
        tsb wajib diisi
        */

        // $.get('file.php', {"name":"jaon" , "time":"2pm"})
        //   .done(function(data){
        //     $('#kotak').html(data);
        // });

        //====== 3. post(url [,data][,success][,dataType])
        /* tanda kurung siku artinya parameter optional, boleh di isi atau tidak, sedangkan yg tidak artinya parameter
        tsb wajib diisi

        mirip dengan get tetapi untukk data yg tidak aman seperti password
        */
        // $.post('file.php', {"name1":"wml" , "time1":"3pm"})
        //   .done(function(data){
        //     $('#kotak').html(data);
        // });

        //====== 4. ajax(url [,setting])
        /* tanda kurung siku artinya parameter optional, boleh di isi atau tidak, sedangkan yg tidak artinya parameter
        tsb wajib diisi

        misal case mengambil data dari file.php dengan method POST pada parameter setting dengan data yg sudah ada
        key dan value.
        ketika button diklik maka akan tampil data yg sudah di post
        */

        $('#btn').click(function(){

          $.ajax({
            url : 'file.php',
            method : "POST",
            data  : {'name1' : 'Riventus' , 'time1' : '3pm'}
          }).done(function(hasil){
            $('#kotak').html(hasil);
          });

        });

      });
    </script>
  </body>
</html>
