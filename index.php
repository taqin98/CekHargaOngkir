


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cek Ongkir By Taqin</title>
  <link type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<style type="text/css">
body {
    color: #757575;
    font-family : 'Open Sans', sans-serif;
    font-style : normal;
    font-weight : 400;

}
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=number] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.btn {
    width: 100%;
    background-color: #039be5;
    border: none;
    border-radius: 5px;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    letter-spacing: 1px;

    transition-property: box-shadow;
    transition-duration: 0.2s;
    transition-timing-function: ease;
    transition-delay: 0s;
}

.container {
    padding: 2px 16px;
    display: flex;
}

.box {
  float: left;
    width: 100%;
    height: auto;
    border-radius: 5%;
    margin: 10px;
}
.colored {
        width: 100%;
        height: 5px;
        border-radius: 3px;
        float: left;
        background-color: #ffa000;
}

img {
    border-radius: 5px 5px 0 0;
}
.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 360px;
    border-radius: 5px;
}

@media screen and (max-width: 360px){
    .card {
      
      height: 800px;
    }
    div.colored { margin-top: 100%;  }
}

@media screen and (min-width: 360px){
  body {
    background-color: #f7f3f3;
  }
  .card {
    background-color: white;
    width: 580px;
      height: auto;
      margin: auto;
    }
    div.colored { margin-top: 5.9%;  }
    .box {
      margin: auto;
    }
}   
</style>
</head>
<body>

<div class="card">
  <div class="container">
    <div class="box">
      <?php

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "key: 1376e153b9b9c474f07901ed26d710ae"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      echo "Provinsi Asal<br>";
      echo "<select name='provinsi' id='provinsiasal'>";
      echo "<option>Pilih Provinsi Asal</option>";
      $data = json_decode($response, true);
      for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
        echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
      }
      echo "</select><br><br>";
  //Get Data Provinsi

      ?>
    </div>
  </div>
  <div class="container">
    <div class="box">
      <?php
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "key: 1376e153b9b9c474f07901ed26d710ae"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
//  echo $response;
      }


//Get Data Kabupaten
      echo "<form method='POST'>";
      echo "<label>Kota Asal</label><br>";
      echo "<select name='asal' id='asal'>";
      echo "<option>Pilih Kota Asal</option>";
      $data = json_decode($response, true);
      for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
        echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['type']." ".$data['rajaongkir']['results'][$i]['city_name']."</option>";
      }
      echo "</select><br>";

      ?>
    </div>
  </div>
  <div class="container">
    <div class="box">
      <?php

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "key: 1376e153b9b9c474f07901ed26d710ae"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      echo "Provinsi Tujuan<br>";
      echo "<select name='provinsi' id='provinsi'>";
      echo "<option>Pilih Provinsi Tujuan</option>";
      $data = json_decode($response, true);
      for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
        echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
      }
      echo "</select><br><br>";
  //Get Data Provinsi

      ?>
    </div>
  </div>
  <div class="container">
    <div class="box">
      <label>Kabupaten Tujuan</label>
      <select id="kabupaten" name="kabupaten">
        <option>Belum pilih provinsi tujuan</option>
      </select>
    </div>
  </div>
  <div class="container">
    <div class="box">
      <label>Kurir</label><br>
      <select id="kurir" name="kurir">
        <option value="jne">JNE</option>
        <option value="tiki">TIKI</option>
        <option value="pos">POS INDONESIA</option>
      </select>
    </div>
  </div>
  <div class="container">
    <div class="box">
      <label>Berat (gram)</label><br>
      <input id="berat" type="text" name="berat" value="500" />
    </div>
  </div>

  <div class="container">
    <div class="box">
      <button type="submit" class="btn" name="kirim">SUBMIT</button>
    </div>
  </div>
  </form>
  <div class="container">
    <div class="box" style="overflow-x: auto; max-height: 250px;">
        <?php
        if (isset($_POST['kirim'])) {
  # code...
          $asal = $_POST['asal'];
          $id_kabupaten = $_POST['kabupaten'];
          $kurir = $_POST['kurir'];
          $berat = $_POST['berat'];

          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$id_kabupaten."&weight=".$berat."&courier=".$kurir."",
            CURLOPT_HTTPHEADER => array(
              "content-type: application/x-www-form-urlencoded",
              "key: 1376e153b9b9c474f07901ed26d710ae"
            ),
          ));

          $response = curl_exec($curl);
          $err = curl_error($curl);

          curl_close($curl);

          if ($err) {   echo "cURL Error #:" . $err;
          } else {



            $data = json_decode($response,true);

// change the variable name to devices which is clearer.
            echo "<br>";
            echo "<table border='1' style='width:100%; text-align:center;'>";

            echo "<tr>";
            echo "<td><b>Kab/Kota Asal</b></td>";
            //echo "<td><b>Provinsi Tujuan</b></td>";
            echo "<td><b>Kab/kota Tujuan</b></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>" . $data['rajaongkir']['origin_details']['city_name'] . "</td>";
            //echo "<td>" . $data['rajaongkir']['destination_details']['province'] . "</td>";
            echo "<td>" . $data['rajaongkir']['destination_details']['city_name'] . "</td>";
            echo "</tr>";

            echo "</table>";
            echo "<br>";

            for ($i=0; $i < count($data['rajaongkir']['results']); $i++) 
            { 

              echo "Code : " . $data['rajaongkir']['results'][$i]['code'] . "<br>";
              echo "Nama Ekspedisi : " . $data['rajaongkir']['results'][$i]['name'] . "<br>";
      

              for ($i=0; $i < count($data['rajaongkir']['results'][0]['costs']); $i++) 
              { 
        
                echo "Service : " . $data['rajaongkir']['results'][0]['costs'][$i]['service'] . "<br>";
                echo "Deskripsi " . $data['rajaongkir']['results'][0]['costs'][$i]['description'] . "<br>";
                echo "Harga : " . $data['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['value'] . "<br>";
                echo "Etd : " . $data['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['etd'] . "<br>";
                echo "<br>";



              }

            }

          }
        }
        ?>
    </div>
  </div>
  
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">

      $(document).ready(function(){
        $('#provinsiasal').change(function(){

      //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax 
      var prov = $('#provinsiasal').val();

      $.ajax({
        type : 'GET',
        //url : 'http://localhost/latihan/rajaongkir/cek_kabupaten.php',
        url : 'http://rajaongkir.indoweb.xyz/cek_kabupaten.php',
        data :  'prov_id=' + prov,
        success: function (data) {

          //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
          $("#asal").html(data);
        }
      });
    });


        $('#provinsi').change(function(){

      //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax 
      var prov = $('#provinsi').val();

      $.ajax({
        type : 'GET',
        url : 'http://rajaongkir.indoweb.xyz/cek_kabupaten.php',
        data :  'prov_id=' + prov,
        success: function (data) {

          //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
          $("#kabupaten").html(data);
        }
      });
    });

        $("#cek").click(function(){
      //Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax 
      var asal = $('#asal').val();
      var kab = $('#kabupaten').val();
      var kurir = $('#kurir').val();
      var berat = $('#berat').val();

      $.ajax({
        type : 'POST',
        dataType : 'json',
        url : 'http://rajaongkir.indoweb.xyz/cek_ongkir.php',
        data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
        success: function (data) {

          //jika data berhasil didapatkan, tampilkan ke dalam element p ongkir
          $("#ongkir").html(JSON.parse(data));
          //document.getElementsByTagName('textarea')[0].value = data.length;
          //document.getElementsByTagName('textarea')[0].value = JSON.stringify(data);
          var jsonData = JSON.parse(data);
          for (var i = 0; i < jsonData.counters.length; i++) {
              var counter = jsonData.counters[i];
              console.log(counter.counter_name);
          }

        }
      });
    });
      });
    </script>
</body>
</html>