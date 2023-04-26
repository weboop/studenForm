<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div id="particle-container">
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
</div>


<div class="wrapper">
    <div class="logo">
        <img src="images/admin.png" alt="admin-image">
    </div>
    <div class="text-center mt-4 name">
        Admin Login
    </div>
    <form class="p-3 mt-3" method="post" action="login.php">
        <div class="form-field d-flex align-items-center">
            <span class="far fa-user"></span>
            <input type="text" name="userName" id="userName" placeholder="Username">
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="fas fa-key"></span>
            <input type="password" name="password" id="pwd" placeholder="Password">
        </div>

        <input class="form-control bg-primary text-white" type="submit" name="submit" id="submit" style="border-radius: 30px">
    </form>
    <div class="text-center fs-6">
        <a href="admin.php">Forget password?</a> or <a href="#">Sign up</a>
    </div>
</div>

<?php
include "connection.php";
session_start();
          if (isset($_POST['submit'])){
              if (isset($_POST['userName'])){
                  $username =$_POST['userName'];
              }else{
                  $username="";
              }
              if (isset($_POST['password'])){
                  $userpassword =$_POST['password'];
              }else{
                  $userpassword="";
              }
             $select = mysqli_query($conn, "SELECT * FROM userslogin WHERE username ='$username' AND password = '$userpassword'");
              $row =mysqli_fetch_array($select);
              if (is_array($row)){
                  $_SESSION['username']=$row['username'];
                  $_SESSION['password']=$row['password'];
                  echo "<script>window.location.href='admin.php'</script>";
              }else{
                  echo "Inavalid User name and Password";
              }


          }
?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>