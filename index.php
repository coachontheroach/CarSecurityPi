<?php
session_start();
if(!$_SESSION['auth'])
{
  header("location:login.php");
}
else
{
  $dbhost = 'mysql.eecs.ku.edu';
  $dbuser = 'jkissick';
  $dbpass = 'AhVid7ie';
  $dbname = 'jkissick';
  $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  /* check connection */
if ($conn->connect_errno)
{
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}
$query="SELECT latitude, longitude,speed from Pidata  ORDER BY latitude desc";

if($result = $conn->query($query))
{
  $lat;
  $long;
  $speed;
  while($row = $result->fetch_assoc())
  {
    if($row["latitude"]=='' && $row['longitude']=='' && $row['speed']=='')
    {
      break;
    }
    $lat=(float)$row["latitude"];
    $long=(float)$row['longitude'];
    $speed=(float)$row['speed'];
  }
}
$result->free();
$conn->close();
include('resources/includes/headerMap.php');
include('resources/includes/footerMap.php');
}
?>
