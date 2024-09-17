<?php 
// parameters for connections
$server = "localhost";
$user = "root";
$password = "";
$db = "institute";
// starting connection
$conn = mysqli_connect($server,$user,$password,$db);

// testing connection
if(!$conn){
    echo "connection is not oky";
}