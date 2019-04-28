<?php
$dbhost = 'mysql.eecs.ku.edu';
$dbuser = 'jkissick';
$dbpass = 'AhVid7ie';
$dbname = 'jkissick';
$mysqli = new mysqli($dbhost, $dbuser,$dbpass,$dbname);

/* check connection */
if ($mysqli->connect_errno)
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$username=$_Post['username'];
$password=$_Post['password'];
$sql="SELECT * FROM CarSecurity WHERE user='$username' AND password='$password' LIMIT 1";

$query = $mysqli->prepare($sql);


$query->execute();

  // Return row as an array indexed by both column name
$returned_row = $query->fetch();

if ($query->num_rows() > 0)
{
  session_start();
  $_SESSION['auth']='true';
  header('location:index.php');
}
?>

<?php
include('resources/includes/header.php');
include('resources/includes/footer.php');
?>
