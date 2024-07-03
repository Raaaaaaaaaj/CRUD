<?php
include "db_conn.php";
$id = $_GET['id'];

$sql = "SELECT * FROM tbluser WHERE id = $id";
$result = mysqli_query($connection, $sql);

$fetch = mysqli_fetch_assoc($result);

if(isset($_POST['edit'])){
    $fname = $_POST['fname'];
    $mail = $_POST['email'];
    $mob = $_POST['phone'];
    $pass = $_POST['password'];

    $sql = "UPDATE `tbluser` SET fname='$fname', email='$mail', phone='$mob', pass='$pass' WHERE id=$id";

    if(mysqli_query($connection, $sql)){
        header('Location: users.php');
    }
    else{
        echo "Error updating record" . mysqli_error($connection);
    }
}


?>





<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit use here</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <center>
    <h1>Update User Data</h1>
    </center>
    <div class="container">
        <form action="" method="post">
           <div class="form-group">
            <label for="fname">Full Name :</label>
            <input type="text" class="form-control" name="fname" value="<?php echo $fetch['fname']; ?>">
          </div>
          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" class="form-control" name="phone" value="<?php echo $fetch['phone']; ?>">
          </div>  
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" value="<?php echo $fetch['email']; ?>">
          </div>
           
          <div class="form-group">
            <label for="password">Password :</label>
            <input type="password" class="form-control" name="password" value="<?php echo $fetch['pass']; ?>">
          </div>
            <button type="submit" class="btn btn-primary" style="float:right" name="edit">Update User</button>
           </form>
      </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>