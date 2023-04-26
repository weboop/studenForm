<?php
include "header.php" ;
include "connection.php";
if (isset($_GET['id'])){
    $id=$_GET['id'];
}else{
    $id="";
}
$query = "SELECT * FROM userslogin WHERE id= $id";

if ($results= $conn->query($query)){
while ($row = $results->fetch_assoc()) {


?>

<div class="container product-add-form">
    <div class="add-product">

        <div class="mx-auto d-block">
            <div class="userimage">
                <img src="images/users/<?php echo $row['userimg']?>" class=" mx-auto d-block your-account-img" alt="user image">
            </div>
        </div>


        <h1 class="text-center">Reset User ( ID # <?php echo $id;?> )</h1> <br>

        <form method="post" action="userreset.php?id=<?php echo $id;?>" enctype="multipart/form-data">

            <div class="row">
                <div class="col-md-6 p-2">
                    <div class="form-group">
                        <lable class="lable-products" for="newusername"><span class="text-danger">*</span> User Name</lable>
                        <input class="form-control" type="text" name="newusername" id="newusername" value="<?php echo $row['username']?>" required>
                    </div>
                </div>
                <div class="col-md-6 p-2">
                    <div class="form-group">
                        <lable class="lable-products" for="newemail"><span class="text-danger">*</span> E-Mail</lable>
                        <input class="form-control" type="email" name="newemail" id="newemail" value="<?php echo $row['email']?>"  required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 p-2">
                    <div class="form-group">
                        <lable class="lable-products" for="newpassword"><span class="text-danger">*</span> Password</lable>
                        <input class="form-control" type="text" name="newpassword" id="newpassword" value="<?php echo $row['password']?>"  required>
                    </div>
                </div>
                <div class="col-md-6 p-2">
                    <div class="form-group">
                        <lable class="lable-products" for="newphone"><span class="text-danger">*</span> Phone Number</lable>
                        <input class="form-control" type="number" name="newphone" id="newphone" value="<?php echo $row['phone']; }}?>"  required>
                    </div>
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
            <input class="form-control bg-primary text-white submit-btn "  type="submit" name="resubmit" id="resubmit">
        </div>
    </div>



    <?php

    if (isset($_POST['resubmit'])){

        if (isset($_POST['newusername'])){
            $newusername = $_POST['newusername'];
        }else{
            $newusername= "";
        }

        if (isset($_POST['newemail'])){
            $newemail= $_POST['newemail'];
        }else{
            $newemail= "";
        }

        if (isset($_POST['newpassword'])){
            $newpassword= $_POST['newpassword'];
        }else{
            $newpassword = "";
        }

        if (isset($_POST['newphone'])){
            $newphone= $_POST['newphone'];
        }else{
            $newphone= "";
        }



        include "connection.php";
        $sql = "UPDATE userslogin SET 
                            username = '$newusername',
                            password = '$newpassword',
                            email = '$newemail',
                            phone = '$newphone'
                           WHERE id= '$id'";


        // Execute the SQL statement
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    ?>

    </form>

</div>
</div>







<?php

include "footer.php" ;
?>


