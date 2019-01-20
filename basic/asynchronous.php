<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Belajar Ajax</title>
  </head>
  <body>

    <div id="kotak"></div>
    <input type="text" name="name" id="inputText">
    <button type="button" id="button">Ambil Data</button>
    <!-- disini kita mau melihat efek asynchronous atau ambil data tanpa harus mereload halaman,
   -->

    <script type="text/javascript">
      function load_ajax(url,callback){
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = cekStatus;

        function cekStatus(){
          if( xhr.readyState === 4 && xhr.status === 200 ){
            callback(xhr.responseText);
          }
        }

        xhr.open('GET',url,true)
        //metode yg kedua untuk melakukan request yaitu: send() untuk mengirim request
        xhr.send();

      }

      /*
      kita harus membuat event onclick, untuk memngambil data dan ditampilkan saat button di tekan.
      jadi dibuat event button kemudian di klik maka meload otomatis datanya.
      */

      /*
      document.getElementById('button').onclick = function(){
        load_ajax('data.json',function(data){
          console.log(data);
          data = JSON.parse(data);
          document.getElementById('kotak').innerHTML = 'nama: ' + data.nama + ', umur: ' + data.umur + ' tahun';
        });
      };
      */

      /*
      Kita akan coba mengambil data dari file PHP
      nah di File data.php nanti apapunyg dihasilkan dari echo, print, die() maka itu yg akan di tangkap oleh
      parameter data di function (data){
      .... }

      kemudian datanya kita mau apakan its up to you.. so
      kita coba memakai sebuah fitur seperti fitur search

      data.php?q=nama dmn q adlh key, nama adlh value

      kita buat jika ingin sesuai dengan yg user input maka buat tag input dengn id="inputText"
       sehingga ajax ini bisa mengambil data2 dan menampilkan tanpa reload halaman sama sekali.

      */
      document.getElementById('button').onclick = function(){
        text = document.getElementById('inputText').value;
        load_ajax('data.php?q=' + text ,function(data){
          document.getElementById('kotak').innerHTML = data;
        });
      };

    </script>
  </body>
</html>
