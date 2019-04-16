<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<!-- Used Bootstrap here for the table, as I have previously! -->
<?php

$dbhost = 'mysql.eecs.ku.edu';
$dbuser = 'jkissick';
$dbpass = 'AhVid7ie';
$dbname = 'jkissick';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// should return true if the username has been declared, found here https://www.php.net/manual/en/function.isset.php
// listen for the post then set the value

if($conn->connect_errno) // if conn returns an error code, found on php.net
{
   die('Could not connect: ' . $conn->connect_errno);
}

//echo 'Connected successfully!<br>';

$qry2 = 'SELECT * FROM Pidata';

if($result = $conn->query($qry2))
{
    echo "<br><br><table class=table>";
    echo "<tr> <td><b>GPS Data<b></td> <td><b>Time<b></td> </tr>";
    while($row = $result->fetch_assoc())
    {
      echo "<tr><td>" . $row["GPSDATA"] . "</td><td>" . $row['DATETS'] . "</td></tr>";
    }
    echo "</table>";
    $result->free();
 }

 echo "<form action='https://people.eecs.ku.edu/~jkissick/carpi/test.html'> <input type='submit' value='TEST BUTTON' /></form>";

$conn->close();
?>
