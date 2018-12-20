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
    "key: 7fb635e0af3f71677a6081e432358cd0"
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
  echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
}
echo "</select><br><br><br>";

?>
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
    "key: 7fb635e0af3f71677a6081e432358cd0"
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

<!DOCTYPE html>
<html>
  <head>
    <title>Belajar Ongkir</title>
  </head>
  
  <body>
      <label>Kabupaten Tujuan</label><br>
      <select id="kabupaten" name="kabupaten"></select><br><br>

      <label>Kurir</label><br>
      <select id="kurir" name="kurir">
        <option value="jne">JNE</option>
        <option value="tiki">TIKI</option>
        <option value="pos">POS INDONESIA</option>
      </select><br><br>

      <label>Berat (gram)</label><br>
      <input id="berat" type="text" name="berat" value="500" />
      <br><br>

      <input id="cekz" type="submit" name="kirim" value="Cek"/>
    </form>

    <p id="ongkir"></p>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">

      $(document).ready(function(){
        $('#provinsi').change(function(){

      //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax 
      var prov = $('#provinsi').val();

      $.ajax({
        type : 'GET',
        url : 'http://localhost/latihan/rajaongkir/cek_kabupaten.php',
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
        url : 'http://localhost/latihan/rajaongkir/cek_ongkir.php',
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



    <!--<script type="text/javascript">
      fetch('x.php')
      .then(function(response) {
        return response.json();
      })
      .then(function(res) {
        console.log(JSON.stringify(res.rajaongkir.results[0].name));
      });
    </script>-->
  </body>
</html>


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
      "key: 7fb635e0af3f71677a6081e432358cd0"
    ),
  ));
 
  $response = curl_exec($curl);
  $err = curl_error($curl);
 
  curl_close($curl);
 
  if ($err) {   echo "cURL Error #:" . $err;
  } else {



  $data = json_decode($response,true);

// change the variable name to devices which is clearer.

    echo "Asal : " . $data['rajaongkir']['origin_details']['city_name'] . "<br>";
    echo "Provinsi Tujuan : " . $data['rajaongkir']['destination_details']['province'] . "<br>";
    echo "Kabupaten Tujuan : " . $data['rajaongkir']['destination_details']['city_name'] . "<br>";

    $results = $data['rajaongkir']['results'];
    foreach ($results as $result)
    {
      echo "Kode : " . $result['code'] . "<br>";
      echo "Nama : " . $result['name'] . "<br>";
    }

    $results = $data['rajaongkir']['results'][0]['costs'];
    foreach ($results as $result)
    {
      echo "Service : " . $result['service'] . "<br>";
    }

    $results = $data['rajaongkir']['results'][0]['costs'][0]['cost'];
    foreach ($results as $result)
    {
      echo "Harga : " . $result['value'] . "<br>";
      echo "Estimasi : " . $result['etd'] . "<br>";
    } 

  }
}
?>