<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "miniproject";

$conn = mysqli_connect($server,$username,$password,$dbname);

if(!$conn)
{
//     echo "Connection Succesfull";
// }
// else{
    die("Error".mysqli_connect_error());
}

?>
