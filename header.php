<?php
include "session.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
<!--    ck editor -->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="admin.php">Admin DashBord</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Products
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="productList.php">Product Lists</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="productAdd.php">Add Products</a></li>

                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Users
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="userList.php">List Users</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="userAdd.php">Add User</a></li>
                    </ul>

                <li class="nav-item">
                    <a class="nav-link" href="adminblog.php">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Documents</a>
                </li>



                </li>



            </ul>
            <div class="dropdown float-end" >
                <a class="btn  dropdown-toggle float-end" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span style="font-size: 25px;font-weight: bold; color: white";><?php echo $_SESSION['username'] ?></span>

                    <span style="padding-left: 10px"><?php
                        echo '<img class="userimages"
                                    src="images/users/'.$_SESSION['username'].'.jpg" style="width: 30px; border-radius: 100%;" >';
                        ?></span>
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="youraccount.php">Your Account</a></li>
                    <li><a class="dropdown-item" href="#">Delete Account</a></li>
                    <li><a class="dropdown-item" href="sessiondistroy.php">Logout</a></li>
                </ul>
            </div>



        </div>
    </div>
</nav>

