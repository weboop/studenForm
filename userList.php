<?php
include "header.php" ;
?>

    <div class="container-fluid mt-5">
        <h1>User List</h1>
        <table class="table table-bordered">
            <tr class="bg-dark text-white">
                <th scope="col">ID</th>
                <th scope="col">Profile Image</th>
                <th scope="col">User Name</th>
                <th scope="col">Password</th>
                <th scope="col">E-mail</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Function</th>
            </tr>


            <?php
            include "connection.php";
            $query= "SELECT * FROM userslogin";
            $results= $conn->query($query);
            while($row = $results->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                $imagename= $row['userimg'];
                echo "<td class='p-0 text-center' width=60px'><img src='images/users/".$imagename."' style='width: 50px;height: 50px'></td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                $id = $row['id'];


                ?>
                <td>
                    <button style="border: none; background-color: white"><a href="userdel.php?id=<?php echo $id?>"><img src="images/delete.png" alt="delete basket" style="width: 30px; "></a></button>
                    <button style="border: none; background-color: white"><a href="userreset.php?id=<?php echo $id?>"><img src="images/reset.png" alt="reset basket" style="width: 25px; "></a></button>
                </td>



                <?php
                echo "</tr>";
            }
            ?>

        </table>
    </div>


<?php

include "footer.php" ;
?>