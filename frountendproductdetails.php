

<?php
include "clientheader.php";
if (isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id ="";
}

include "connection.php";
$query = "SELECT * FROM product WHERE id= $id";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = $result->fetch_assoc()) {
//       echo  $row['productname'];
?>
    <div class=" m-5 ">

    <div class="row">
            <div class="col-md-6 ">
                <img class="w-100 product-img" src="images/product/<?php echo $row['image']?>" alt="prodct image" >

                <img class="product-img" src="images/product/<?php echo $row['image']?>" alt="prodct image" style="width: 23% ; height: 9vh ;border: 1px solid black">
                <img class="product-img"   src="images/product/<?php echo $row['image2']?>" alt="prodct image" style="width: 24.5% ;height: 9vh ; border: 1px solid black">
                <img class="product-img"  src="images/product/<?php echo $row['image3']?>" alt="prodct image" style="width: 24.5% ;height: 9vh ; border: 1px solid black">
                <img class="product-img"  src="images/product/<?php echo $row['image4']?>" alt="prodct image" style="width: 24.5% ;height: 9vh ; border: 1px solid black">

            </div>
            <div class="col-md-6 p-4 " style="border: 1px solid black">
                <p>Product Slug : <span class="text-danger fw-bold"><?php echo $row['productslug']?></span> </p>
                <h1><?php echo $row['productname']?></h1>
                <p style="text-align: justify"><?php echo $row['discription']?></p>
                <p><span style="font-weight: bold">Published Date : </span><?php echo $row['date']?></p>

            </div>



        </div>



<?php
    }
}
?>
</div>
