<?php
include "header.php" ;
?>

<div class="container-fluid mt-5">
    <h1>Product List</h1>
    <table class="table table-bordered">
        <tr class="bg-dark text-white">
            <th scope="col">ID</th>
            <th scope="col">Image</th>
            <th scope="col">Product name</th>
            <th scope="col">Slug</th>
            <th scope="col">Categorie</th>
            <th scope="col">Description</th>
            <th scope="col">Date</th>
            <th scope="col">Function</th>
        </tr>


        <?php
        include "connection.php";
        $query= "SELECT * FROM product";
        $results= $conn->query($query);
        while($row = $results->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            $productimage= $row['image'];
            echo "<td class='p-0 text-center' width=60px'><img src='images/product/".$productimage."' style='width: 50px; height: 40px'></td>";

            echo "<td>" . $row['productname'] . "</td>";
            echo "<td>" . $row['productslug'] . "</td>";
            echo "<td>" . $row['categorie'] . "</td>";
            $description = $row['discription'];
            $description = implode(' ', array_slice(explode(' ', $description), 0,  5));
            echo "<td>" . $description . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            $id = $row['id'];


        ?>
        <td>
         <button style="border: none; background-color: white"><a href="productdel.php?id=<?php echo $id?>"><img src="images/delete.png" alt="delete basket" style="width: 30px; "></a></button>
         <button style="border: none; background-color: white"><a href="productreset.php?id=<?php echo $id?>"><img src="images/reset.png" alt="delete basket" style="width: 25px; "></a></button>
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