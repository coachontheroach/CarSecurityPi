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
$query="SELECT latitude, longitude from Pidata  ORDER BY latitude desc";

if($result = $conn->query($query))
{
  $lat;
  $long;
  while($row = $result->fetch_assoc())
  {
    if($row["latitude"]=='' && $row['longitude']=='')
    {
      break;
    }
    $lat=(float)$row["latitude"];
    $long=(float)$row['longitude'];
  }
}
$result->free();
$conn->close();
include('resources/includes/headerMap.php');
include('resources/includes/footerMap.php');
}
?>
