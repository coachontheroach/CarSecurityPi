<?php

$test=$_POST["test"];

$dbhost = 'mysql.eecs.ku.edu';
$dbuser = 'jkissick';
$dbpass = 'AhVid7ie';
$dbname = 'jkissick';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if($conn->connect_errno) // if conn returns an error code, found on php.net
{
   die('Could not connect: ' . $conn->connect_errno);
}

echo 'Connected successfully!<br>';

if($test == "")
{
  echo "Test data cannot be blank! Go back and try again!<br>";
}
else
{
    $qry = 'SELECT (GPSDATA) FROM Pidata';

    if($result = $conn->query($qry))
    {
      while($row = $result->fetch_assoc())
      {
        if($row["GPSDATA"]==$test)
        {
            $isDuplicateName = true;
        }
      }

    }
    else
    {
      echo "Failed To Query the Database, my bad :(<br>";
    }
    if($isDuplicateName)
    {
      echo "Test data is already in the database! Go back and try again!<br>";
    }
    else
    {

      $sql = "INSERT INTO Pidata(GPSDATA, DATETS) VALUES('".$test."', (NOW() - INTERVAL 4 HOUR + INTERVAL 7 MINUTE - INTERVAL 40 SECOND))";
      if($result = $conn->query($sql))
      {
        echo "Your test data " . $test . " has been created successfully!<br>";
      }
      else
      {
         echo "I have failed at life and as a programmer.<br>";
      }

      // $sql1= "INSERT INTO Pidata(DATETS) VALUES(NOW())";
      // if($result = $conn->query($sql1))
      // {
      //   echo "Time Added!<br>";
      // }
      // else
      // {
      //    echo "I have failed at life and as a programmer.<br>";
      // }
     }


    $result->free();
 }

$isClosed = $conn->close();

if($isClosed)
{
  echo "Connection was closed successfully.";
}
?>
