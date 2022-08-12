<?php  

$host = "localhost";
$username = "root";
$password = "";
$database = "student_db";

if(!$conn = mysqli_connect($host, $username, $password, $database)){
    echo ("failed to connect");
    exit;
}
?>