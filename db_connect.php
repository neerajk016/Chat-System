<?php


$servername="localhost";
$username="root";
$password="";
$database="chatroom";


$conn= new mysqli($servername ,$username, $password, $database);

if(!$conn){
    die("failed".mysqli_connect_error());
}




?>


