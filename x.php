{"rajaongkir":{"query":{"origin":"10","destination":"22","weight":500,"courier":"jne"},"status":{"code":200,"description":"OK"},"origin_details":{"city_id":"10","province_id":"21","province":"Nanggroe Aceh Darussalam (NAD)","type":"Kabupaten","city_name":"Aceh Timur","postal_code":"24454"},"destination_details":{"city_id":"22","province_id":"9","province":"Jawa Barat","type":"Kabupaten","city_name":"Bandung","postal_code":"40311"},"results":[{"code":"jne","name":"Jalur Nugraha Ekakurir (JNE)","costs":[{"service":"OKE","description":"Ongkos Kirim Ekonomis","cost":[{"value":32000,"etd":"2-3","note":""}]},{"service":"REG","description":"Layanan Reguler","cost":[{"value":36000,"etd":"1-2","note":""}]}]}]}}



$response = json_decode($response, true);
  
  for ($i=0; $i < count($response['rajaongkir']['results']); $i++) { 

    print_r($response['rajaongkir']['results'][$i]['code']);
    print_r($response['rajaongkir']['results'][$i]['name']);
    
    for ($i=0; $i < count($response['rajaongkir']['results'][0]['costs']); $i++) { 
      print_r($response['rajaongkir']['results'][0]['costs'][0]['service']);

      for ($i=0; $i < ount($response['rajaongkir']['results'][0]['costs'][0]['cost']); $i++) { 
        print_r($response['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value']);
      }
    }
  }