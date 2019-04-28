<script>
  var map;
  function initMap() {
    var myLatLng = {lat:  38.9717, lng: -95.2353};
    map = new google.maps.Map(document.getElementById('map'), {
      center: myLatLng,
      zoom: 15
    });
    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      title: 'Vehicle'
    });
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyNY9wczzLoKAGzvvCsKcEz20gOOKtqlI&callback=initMap"
async defer></script>
</body>
</html>
