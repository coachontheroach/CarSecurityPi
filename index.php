<? php
  session_start();
  if(!$_SESSION['auth'])
  {
    header("location:login.php");
  }
  else
  {
    include('resources/includes/headerMap.php');
    include('resources/includes/footerMap.php');
  }
?>
