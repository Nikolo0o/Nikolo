<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "12345";
$dbname = "myself";

if (!$con = mysqli_connect ($dbhost, $dbuser, $dbpass , $dbname))
{
    die("panget mo");

}


?>
