<?php
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

$username=$_POST['username'];
$password=$_POST['password'];

$query="SELECT * FROM CarSecurity WHERE user='$username' AND password='$password'";

if($result = $conn->query($query))
{
  session_start();
  $_SESSION['auth']='true';
  header('location:index.php');
  $result->free();
}
else
{
  echo "Post was not saved because it was not written by an existing user.";
}
$conn->close();
?>

<?php
include('resources/includes/header.php');
include('resources/includes/footer.php');
?>
