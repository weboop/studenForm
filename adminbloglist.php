<?php
include "header.php" ;
?>

    <div class="container-fluid mt-5">
        <h1>Blogs List</h1>
        <table class="table table-bordered">
            <tr class="bg-dark text-white">
                <th scope="col">ID</th>
                <th scope="col">Blog Text</th>
                <th scope="col">Function</th>

            </tr>


            <?php
            include "connection.php";
            $query= "SELECT * FROM blog";
            $results= $conn->query($query);
            while($row = $results->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                $blog= $row['blogpost'];
                $blog = implode(' ', array_slice(explode(' ', $blog), 0,  5));

                echo "<td>" . $blog . "</td>";
                $id = $row['id'];


                ?>
                <td>
                    <button style="border: none; background-color: white"><a href="adminblogdel.php?id=<?php echo $id?>"><img src="images/delete.png" alt="delete basket" style="width: 30px; "></a></button>
                    <button style="border: none; background-color: white"><a href="adminblogreset.php?id=<?php echo $id?>"><img src="images/reset.png" alt="reset basket" style="width: 25px; "></a></button>
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