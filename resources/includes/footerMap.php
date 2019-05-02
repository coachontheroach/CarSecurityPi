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
<div id="Log">
  <form>
    <button href="logout.php">LogOut</button>
  </form>
</div>
</body>
</html>
