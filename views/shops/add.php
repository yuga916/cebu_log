<?php
 if (!empty($_POST)) {
$results=$_POST['result_lat'].$_POST['result_lng'];
var_dump($results);
} ?>
<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="shortcut icon" href="../assets/ico/favicon.png">

      <title>Sigh In</title>

<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
            <script src="/cebu_log/webroot/assets/google_map/google_map.js"></script>
      <link href="/cebu_log/webroot/assets/google_map/google_map.css" rel="stylesheet">
    
      <script src="assets/js/modernizr.custom.js"></script>

    <!-- googleaddress　MAP css -->
    <link type="text/css" rel="stylesheet" href="/cebu_log/webroot/assets/google_map/google_place_map.css"></script>



    </head>

<body>

   <div class="container">
     <div class="row">
       <div class="col-md-6 col-md-offset-3 content-margin-top">


        <br>
        <br>
        <br>
         <legend>新規shopの作成</legend>
         <form method="POST" action="/cebu_log/shops/post_validation" class="form-horizontal" role="form" enctype="multipart/form-data">
          <input type="hidden" name="owner_id" value="1">


           <!--お店名-->
           <div class="form-group">
             <label class="col-sm-4 control-label">店名</label>
             <div class="col-sm-8">
               <input type="text" name="shop_name" class="form-control" placeholder="Ex： Samurai" value="">
             </div>
           </div>

           <!--紹介-->
           <div class="form-group">
             <label class="col-sm-4 control-label">紹介文</label>
             <div class="col-sm-8">
               <input type="text" name="intro_shop" class="form-control" placeholder="Ex： samurai@net.com" value="">
              
             </div>
           </div>

           <!-- 平均予算 -->
           <div class="form-group">
             <label class="col-sm-4 control-label">平均予算</label>
             <div class="col-sm-8">
               <input type="text" name="email" class="form-control" placeholder="Ex： samurai@net.com" value="">
             </div>
           </div>

           <!-- 地図 -->
           <div class="form-group">
             <label class="col-sm-4 control-label">地図</label>
             <div class="col-sm-8">
               <!--<form>-->
               <input type="number" value="555" id="address" name="address">
               <input type="button" value="地図検索" id="button">
               <!--</form>-->



              <input type="text" name="result_lat" id="result_lat">
              <input type="text" name="result_lng" id="result_lng">
              <input id="pac-input" class="controls" type="text" placeholder="Search Box">


                             <!-- 地図を表示させる要素 -->
               <div id="map"></div>

<script>
//地図の表示
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

</script>



             </div>
           </div>
          

          <input type="submit" class="btn btn-default" value="トップ画像登録へ">
         </form>
       </div>
     </div>
   </div>

     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) 
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
 <!--    <script src="js/bootstrap.min.js"></script>

       <!-- Bootstrap core JavaScript
       ================================================== -->
       <!-- Placed at the end of the document so the pages load faster -->
<!--       <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
       <script src="../assets/js/bootstrap.min.js"></script>
       <script src="../assets/js/main.js"></script>
     <script src="../assets/js/masonry.pkgd.min.js"></script>
     <script src="../assets/js/imagesloaded.js"></script>
       <script src="../assets/js/classie.js"></script>
     
           <!-- googleaddress　MAP -->    
    <script scr="/cebu_log/webroot/assets/google_map/google_place_map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6-NLDf0FhhazUiJYsEoiUWETMYTTwpDg&libraries=places&callback=initMap"　async defer></script>

   </body>
 </html>
