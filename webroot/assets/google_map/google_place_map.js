function initMap() {
        //mapクラスのオプション
        //Mapオブジェクトに地図表示要素情報(地図を出力する)とオプション情報(オプションのオブジェクト)を渡し、インスタンス生成
        //地図の設定：zoom＝マップの解像度,center:地図の中心座標の設定(lat:緯度,lng:経度)
          latlng = new google.maps.LatLng(10.327353350123191,123.9061689376831);
          var map = new google.maps.Map(document.getElementById
            ('map'), {
            zoom: 15,
            center:latlng
          });
          // clickイベントを取得するListenerを追加
          //クリック後、clickEventFunc関数を実行
          google.maps.event.addListener(map, 'click', clickEventFunc);   
          // Create the search box and link it to the UI element.inputに入力された文字を変数に代入
          var input = document.getElementById('pac-input');
          //inputでデータの呼び出し
          var searchBox = new google.maps.places.SearchBox(input);
          map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);


          // Bias the SearchBox results towards current map's viewport.
          map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
          });

          var markers = [];
          // [START region_getplaces]
          // Listen for the event fired when the user selects a prediction and retrieve
          // more details for that place.
          searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
              return;
            }

            // Clear out the old markers.
            markers.forEach(function(marker) {
              marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
              var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
              };

              // Create a marker for each place.
              markers.push(new google.maps.Marker({
                map: map,
                icon: icon,
                title: place.name,
                position: place.geometry.location
              }));

              if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
              } else {
                bounds.extend(place.geometry.location);
              }
            });
            map.fitBounds(bounds);
          });
          // [END region_getplaces]

        //gecoderオブジェクトにインスタンス生成 
          //var geocoder = new google.maps.Geocoder();
          //document.getElementById('submit').addEventListener('click', function() {
            //geocodeAddress(geocoder, map);
         //});

}

function clickEventFunc(event) {

  var latlng =event.latLng.toString();
  console.log(latlng);
  var lat = event.latLng.lat();
  var lng = event.latLng.lng();
  //alert("緯度は"+lat+"、経度は"+lng+"です");
      //  画面に出力する
  var result_lng=document.getElementById("result_lng");
  //result_lng.innerHTML=lng;
  result_lng.setAttribute("value",lng);

  var result_lat=document.getElementById("result_lat");
  //result_lat.innerHTML=lat;
  result_lat.setAttribute("value",lat);
      //alert(event.latLng.toString());
}

function geocodeAddress(geocoder, resultsMap) {
  var address = document.getElementById('address').value;
  //geocode(住所から緯度経度を取得)
  geocoder.geocode({'address': address}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      //地図の中心点を変更
      resultsMap.setCenter(results[0].geometry.location);
      console.log('location = ');
      console.log(results[0].geometry.location['lat']);
      //マーカー
      var marker = new google.maps.Marker({
        map: resultsMap,
        position: results[0].geometry.location
      });

      // console.log(location)

    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}
