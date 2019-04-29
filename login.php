<?php
include('resources/includes/header.php');
include('resources/includes/footer.php');

$dbhost = 'mysql.eecs.ku.edu';
$dbuser = 'jkissick';
$dbpass = 'AhVid7ie';
$dbname = 'jkissick';
$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

$username=$_POST['username'];
$password=$_POST['password'];
$query="SELECT * FROM CarSecurity WHERE user='$username' AND password='$password'";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)==1)
{
  session_start();
  $_SESSION['auth']='true';
  header('location:index.php');
}
else
{
  $_SESSION['auth']='false';
}
?>
