<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "companydb";

$connection = mysqli_connect($servername, $username, $password, $dbName);

if(!$connection){
    die("Connection failed: ". mysqli_connect_error());
}

?>