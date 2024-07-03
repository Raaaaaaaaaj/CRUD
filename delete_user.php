<?php
include "db_conn.php";
$id = $_GET['id'];


$sql = "DELETE FROM tbluser WHERE id = $id";
if(mysqli_query($connection, $sql)){
    header('Location: users.php'); 
}
else{
    echo "Error deleting record: " . mysqli_error($connection);
}
?>