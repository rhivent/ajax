<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Belajar Ajax</title>
  </head>
  <body>

    <div id="kotak">

    </div>

    <script type="text/javascript">
      function load_ajax(url,callback){
        /*
        kita buat objek xmlhttprequest karena bnyak fungsi yg akan kita gunakan

        */
        var xhr = new XMLHttpRequest();
        //melihat suatu kondisi onreadystatechange
        //akan selalu mengawasi gimn statusnya dengan fungsi yg ada di variabel cek status
        xhr.onreadystatechange = cekStatus;

        function cekStatus(){
          if( xhr.readyState === 4 && xhr.status === 200 ){
            //setelah kita sudah bisa akses datanya kita bisa melakukan response
            /*
            responseText ini adlh method yg sudah ada sehingga tidak pelu dibuat, sehingga kita bisa mengeluarkan
            Textnya. Untuk bisa diterima oleh fungsi load_ajax() maka pada bagian callback function diberikan parameter
            untuk menerima data yaitu ... function(data){ console.log(data)}
            */
            callback(xhr.responseText);
          }
        }

        /*
        melakukan requestnya, caranya ada 2 macam yaitu pertama open () untuk membukanya.
        di dalam open(3parameters) yaitu pertama: GET atau POST, kedua: url (parameter yg didapat dari fungsi load_ajax),
        ketiga : synchronous atau asynchronous, jika asynchronous maka true, jika tidak false
        */
        xhr.open('GET',url,true)
        //metode yg kedua untuk melakukan request yaitu: send() untuk mengirim request
        xhr.send();

      }

      //memanggil otomatis
      /* butuh 2 parameter :
      1. url
      2. callback (function)

      setelah kita buat fungsi diatas tinggal tentukan url yg mau diakses atau file dengan data json
      yaitu data.json

      kedua fungsi callbacknya yaitu pada parameter ke 2:

      */
      load_ajax('data.json',function(data){
        console.log(data);

        /*
        untuk memainkan data JSON nya dengan cara JSON.parse();
        */
        data = JSON.parse(data);
        // document.getElementById('kotak').innerHTML = data;
        /*
        yang keluar adalah [objek Objek], hal ini dikarenakan format dr JSON / tipe datanya adalah objek,
        meskipun sudah kita parse() sehingga utk mendapatkan data detailnya maka dibuat data.nama dst,
        */

        document.getElementById('kotak').innerHTML = 'nama: ' + data.nama + ', umur: ' + data.umur + ' tahun';

        /*
         disini kita melihat 2 hal :
         1. Cara request Ajax
         2. cara menggunakan file json
         intinya JSON adalah format data, sehingga bisa request dr halaman PHP lain atau XML lain juga bisa,
         di atas adalah cara normal yg dilakukan di javascript,
         kita bisa menggunakan JQuery untuk menggunakan AJAX, dengan cara lebih simple.
        */

      });
    </script>
  </body>
</html>
