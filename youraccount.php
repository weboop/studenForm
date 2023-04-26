<?php
include "header.php" ;
include "connection.php";
 $currentusername =$_SESSION['username'];

$sql = "SELECT * FROM userslogin WHERE username LIKE '%$currentusername%'";
$result = mysqli_query($conn, $sql);

// Step 6: Display results
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
       $id= $row['id'];
?>
    <div class=" your-account  mx-auto d-block">
        <div class="userimage">
            <img src="images/users/<?php echo $currentusername.'.jpg'?>" class=" mx-auto d-block your-account-img" alt="user image">
        </div>
        <form class="mt-4 p-3" >
            <label class="labe-your-account" for="username"><span class="text-danger">* </span>User name</label>
            <input class="form-control" type="text" name="username" id="username" value="<?php echo $row['username'];?>" disabled>

            <label class="labe-your-account" for="password"><span class="text-danger">* </span>Password</label>
            <input class="form-control" type="text" name="password" id="password" value="<?php echo $row['password']?>" disabled>

            <label class="labe-your-account" for="email"><span class="text-danger">* </span>Email</label>
            <input class="form-control" type="text" name="email" id="email" value="<?php echo $row['email']?>" disabled>

            <label class="labe-your-account" for="phone"><span class="text-danger">* </span>Phone Number</label>
            <input class="form-control" type="text" name="phone" id="phone" value="<?php echo $row['phone']?>" disabled>

            <div class="labe-your-account"><button class="form-control bg-warning text-white"><a href="userreset.php?id=<?php echo $id ?>" style="color: white">Edit User</a> </button></div>


        </form>
    </div>


<?php
    }
include "footer.php" ;
}?>