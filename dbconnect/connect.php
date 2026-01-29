<?php
$server = "localhost";
$username = "root";
$password = "MySQL#012AJ";
$database = "emswb";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
//     echo "success";
// }
// else{
    die("Error". mysqli_connect_error());
}

?>

