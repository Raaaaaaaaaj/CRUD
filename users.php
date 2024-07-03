<?php
include "db_conn.php";
if(isset($_POST['submit'])){
    $name = $_POST['fname'];
    $email = $_POST['email'];
    $mobile = $_POST['phone'];
    $pass = $_POST['password'];


$sql = "INSERT INTO tbluser (fname, phone, email, pass) VALUES ('$name','$email','$mobile','$pass')";

if(mysqli_query($connection,$sql)){
    echo "Record inserted successfully.";
}else{
    die("There is something wrong" .mysqli_error($connection));
}
}

$show = "SELECT * FROM tbluser";
$result = mysqli_query($connection,$show);

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    body {
        background: #70e1f5;
        background: -webkit-linear-gradient(to right, #ffd194, #70e1f5);  
        background: linear-gradient(to right, #ffd194, #70e1f5);
        }
  </style>
  </head>
  <body>

    <center>
    <h1>Welcome to user dashboard</h1>
    </center>

        <table class="table table-dark table-striped">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Mobiler number</th>
                <th>Email address</th>
                <th>Password</th>
                <th>Actions</th>

            </tr>

            <?php while( $row = mysqli_fetch_assoc($result)) {?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['fname'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><?php echo $row['pass'];?></td>
                <td><a href="edit_user.php?id=<?php echo $row['id']?>"><button class="btn btn-primary" name="edit">Update</button></a>
                <a href="delete_user.php?id=<?php echo $row['id']?>"><button class="btn btn-danger" name="delete">Delete</button></a></td>

            </tr>
            <?php }?>
        </table>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>