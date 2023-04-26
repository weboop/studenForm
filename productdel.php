<?php
include "connection.php";
$id =$_GET['id'];

$sql = "DELETE FROM product WHERE id=$id";

$query = "SELECT * FROM product WHERE id= $id";

if ($results= $conn->query($query)){
    while ($row = $results->fetch_assoc()) {

        $image1 = $row['image'];
        $image2 = $row['image2'];
        $image3 = $row['image3'];
        $image4 = $row['image4'];
        $path1= "images/product/".$image1;
        $path2= "images/product/".$image2;
        $path3= "images/product/".$image3;
        $path4= "images/product/".$image4;

        if (file_exists($path1)){
            unlink($path1);
        }
        if (file_exists($path1)){
            unlink($path2);
        }
        if (file_exists($path1)){
            unlink($path3);
        }
        if (file_exists($path1)){
            unlink($path4);
        }



    }}


if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

include "productList.php";
