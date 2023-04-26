<?php
include "header.php" ;
?>

<div class="container product-add-form">
    <div class="add-product">
        <h1 class="text-center">Add User</h1> <br>

        <form method="post" action="userAdd.php" enctype="multipart/form-data">

            <div class="row">
                <div class="col-md-6 p-2">
                    <div class="form-group">
                        <lable class="lable-products" for="username"><span class="text-danger">*</span> User Name</lable>
                        <input class="form-control" type="text" name="username" id="username" required>
                    </div>
                </div>
                <div class="col-md-6 p-2">
                    <div class="form-group">
                        <lable class="lable-products" for="email"><span class="text-danger">*</span> E-Mail</lable>
                        <input class="form-control" type="email" name="email" id="email" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 p-2">
                    <div class="form-group">
                        <lable class="lable-products" for="password"><span class="text-danger">*</span> Password</lable>
                        <input class="form-control" type="text" name="password" id="password" required>
                    </div>
                </div>
                <div class="col-md-6 p-2">
                    <div class="form-group">
                        <lable class="lable-products" for="phone"><span class="text-danger">*</span> Phone Number</lable>
                        <input class="form-control" type="number" name="phone" id="phone" required>
                    </div>
                </div>
            </div>

            <div class="row  mt-3">
                <div class="form-group">
                    <lable class="lable-products" for="image"><span class="text-danger">*</span> Upload Image</lable>
                    <input class="form-control" type="file" name="image" id="image">
                </div>
            </div>

            <div class="row mt-4" style="margin-left: 20px">
                <button class=" text-center border-0" style="width: 5%;height: 4vh; border-radius: 10px"><?php echo rand(1, 9); ?></button>
                <input type="text" name="plus" id="plus" value=" + " style="width: 50px; border: none" >
                <button class=" text-center border-0" style="width: 5%; height: 4vh; border-radius: 10px"><?php echo rand(1, 9); ?></button>
                <input type="text" name="equal" id="equal" value=" = " style="width: 50px; border: none" >
                <input class="" type="text" name="" id="" style="width: 50px; border: none ;border-bottom: 1px dashed black">


            </div>

            </div>


            <div class="row mt-4 " >
                <div class="col-md-12 " >
                    <input class="form-control bg-primary text-white submit-btn "  type="submit" name="submit" id="submit">
                </div>
            </div>



    <?php
    include "connection.php";
    if (isset($_POST['submit'])){

        if (isset($_POST['username'])){
            $username= $_POST['username'];
        }else{
            $username="";
        }
        if (isset($_POST['email'])){
            $email= $_POST['email'];
        }else{
            $email="";
        }
        if (isset($_POST['password'])){
            $password= $_POST['password'];
        }else{
            $password="";
        }
        if (isset($_POST['phone'])){
            $phone= $_POST['phone'];
        }else{
            $phone="";
        }

        //image k lya
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_directory = "images/users/";
            $target_file = $target_directory . basename($_FILES['image']['name']);
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

//            save image as new file name
            $newfilename = "$username." . $imageFileType;
            $target_file = $target_directory . $newfilename;

            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
            } else {
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    echo "The File " . $newfilename . " has been uploaded.";

                    $sql = "INSERT INTO  userslogin( username, password, email, phone, userimg )
                 VALUES ('$username', '$password','$email', '$phone', '$newfilename')";


                    if ($conn->query($sql) === TRUE) {
                        echo "File name saved to database successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    $conn->close();
                }else{
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }else{
            echo "Error: No file uploaded.";
        }
    }
    ?>

        </form>

</div>
</div>







<?php
include "footer.php" ;
?>


