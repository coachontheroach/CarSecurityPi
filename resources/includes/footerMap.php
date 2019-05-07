<script>
  var map;
  function initMap() {
    var myLatLng = {lat: <?php echo $lat; ?>, lng: <?php echo $long; ?>};
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
<br><br>
<div class="container-btn">
  <a href="logout.php" class="btn btn-info btn-lg">
      <span class="glyphicon glyphicon-log-out"></span> Log out
  </a>
</div>
</body>
</html>
