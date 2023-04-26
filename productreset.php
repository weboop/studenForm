<?php
include "header.php" ;
include "connection.php";
if (isset($_GET['id'])){
    $id= $_GET['id'];
}else{
    $id= "";
}
$query = "SELECT * FROM product WHERE id= $id";

if ($results= $conn->query($query)){
while ($row = $results->fetch_assoc()) {
$image1= $row['image'];
$image2= $row['image2'];
$image3= $row['image3'];
$image4= $row['image4'];

?>

<div class="container product-add-form">
    <div class="add-product">
        <h1 class="text-center">Reset Product ( ID # <?php echo $id ;?> ) </h1> <br>
        <div class="row">
            <div class="col-md-3" id="image1-del">
                <img class="w-100" src="images/product/<?php echo $image1?>" alt="Image 1" style="border: 1px solid black; border-radius: 6px; height: 20vh">
                <form method="post"  >
                    <input class="form-control bg-danger mt-3 text-white" type="submit" value=" X " name="delete1" id="delete1">
                </form>
                <?php
                if (isset($_POST['delete1'])){
                    include "connection.php";
                    $path= "images/product/".$image1;
                    if (file_exists($path)){
                        unlink($path);
                        echo "Deleted";
                        echo "<script>
                                document.getElementById('image1-del').style.display = 'none';
                           </script>";
                    }else{
                        echo "not deleted";
                        echo "<script>
                                document.getElementById('image1-del').style.display = 'none';
                           </script>";


                    }
                }
                ?>
            </div>
            <div class="col-md-3" id="image2-del">
                <img class="w-100" src="images/product/<?php echo $image2?>" alt="Image 2" style="border: 1px solid black; border-radius: 6px; height: 20vh">
                <form method="post" >
                    <input class="form-control bg-danger mt-3 text-white" type="submit" value=" X " name="delete2" id="delete2">
                </form>
                <?php
                if (isset($_POST['delete2'])){
                    $path= "images/product/".$image2;
                    if (file_exists($path)){
                        unlink($path);
                        echo "Deleted";
                        echo "<script>
                                document.getElementById('image2-del').style.display = 'none';
                               document.getElementById('image1-del').style.display = 'none';
                           </script>";
                    }else{
                        echo "not deleted";
                        echo "<script>
                                document.getElementById('image2-del').style.display = 'none';
                                document.getElementById('image1-del').style.display = 'none';

                           </script>";
                    }

                }
                ?>
            </div>
            <div class="col-md-3" id="image3-del">
                <img class="w-100" src="images/product/<?php echo $image3?>" alt="Image 3" style="border: 1px solid black; border-radius: 6px; height: 20vh">
                <form method="post" >
                    <input class="form-control bg-danger mt-3 text-white" type="submit" value=" X " name="delete3" id="delete3">
                </form>
                <?php
                if (isset($_POST['delete3'])){
                    $path= "images/product/".$image3;
                    if (file_exists($path)){
                        unlink($path);
                        echo "Deleted";
                        echo "<script>
                                document.getElementById('image3-del').style.display = 'none';
                                document.getElementById('image2-del').style.display = 'none';
                                document.getElementById('image1-del').style.display = 'none';
                           </script>";
                    }else{
                        echo "not deleted";
                        echo "<script>
                                document.getElementById('image3-del').style.display = 'none';
                                document.getElementById('image2-del').style.display = 'none';
                                document.getElementById('image1-del').style.display = 'none';
                           </script>";
                    }

                }
                ?>
            </div>
            <div class="col-md-3" id="image4-del">
                <img class="w-100" src="images/product/<?php echo $image4?>" alt="Image 4" style="border: 1px solid black; border-radius: 6px; height: 20vh">
                <form method="post" >
                    <input class="form-control bg-danger mt-3 text-white" type="submit" value=" X " name="delete4" id="delete4">
                </form>
                <?php
                if (isset($_POST['delete4'])){
                    $path= "images/product/".$image4;
                    if (file_exists($path)){
                        unlink($path);
                        echo "Deleted";
                        echo "<script>
                                document.getElementById('image3-del').style.display = 'none';
                                document.getElementById('image2-del').style.display = 'none';
                                document.getElementById('image1-del').style.display = 'none';
                                document.getElementById('image4-del').style.display = 'none';
                           </script>";

                    }else{
                        echo "not deleted";
                        echo "<script>
                                document.getElementById('image3-del').style.display = 'none';
                                document.getElementById('image2-del').style.display = 'none';
                                document.getElementById('image1-del').style.display = 'none';
                                document.getElementById('image4-del').style.display = 'none';
                           </script>";
                    }

                }
                ?>
            </div>
        </div>



        <form method="POST" action="productreset.php?id=<?php echo $id?>" enctype="multipart/form-data">

            <div class="row">
                <div class="col-md-6 p-2">
                    <div class="form-group">
                        <lable class="lable-products" for="newproductname"><span class="text-danger">*</span> Product Name</lable>
                        <input class="form-control" type="text" name="newproductname" id="newproductname" value="<?php echo $row['productname']; ?>" required>
                    </div>
                </div>
                <div class="col-md-6 p-2">
                    <div class="form-group">
                        <lable class="lable-products" for="newproductslug"><span class="text-danger">*</span> Product Slug</lable>
                        <input class="form-control" type="text" name="newproductslug" id="newproductslug" value="<?php echo $row['productslug']; ?>" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <div class="form-group">
                            <lable class="lable-products" for="productcategories"><span class="text-danger">*</span> Product Categories</lable>
                            <select class="form-control" id="productcategories" name="productcategories">
                                <option name="Electronics" value="Electronics" <?php if($row['categorie'] == "Electronics"){echo "selected";} ?>>Electronics</option>
                                <option name="Fashion & Beauty" value="Fashion & Beauty"<?php if($row['categorie'] == "Fashion & Beauty"){echo "selected";} ?>>Fashion & Beauty</option>
                                <option name="Bikes" value="Bikes"<?php if($row['categorie'] == "Bikes"){echo "selected";} ?>>Bikes</option>
                                <option name="Cars" value="Cars"<?php if($row['categorie'] == "Cars"){echo "selected";} ?>>Cars</option>
                                <option name="Propertie" value="Propertie"<?php if($row['categorie'] == "Propertie"){echo "selected";} ?>>Propertie</option>
                                <option name="Animal" value="Animal"<?php if($row['categorie'] == "Animal"){echo "selected";} ?>>Animal</option>
                                <option name="Home Appliences" value="Home Appliences"<?php if($row['categorie'] == "Home Appliences"){echo "selected";} ?>>Home Appliences</option>
                                <option name="Furniture" value="Furniture"<?php if($row['categorie'] == "Furniture"){echo "selected";} ?>>Furniture</option>
                                <option name="Kids" value="Kids"<?php if($row['categorie'] == "Kids"){echo "selected";} ?>>Kids</option>
                                <option name="Books" value="Books"<?php if($row['categorie'] == "Books"){echo "selected";} ?>>Books</option>
                                <option name="Others" value="Others"<?php if($row['categorie'] == "Others"){echo "selected";} ?>>Others</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 p-2">
                    <div class="form-group">
                        <lable class="lable-products" for="newcurrentdate"><span class="text-danger">*</span> Published Date</lable>
                        <input class="form-control" type="date" name="newcurrentdate" id="newcurrentdate"  value="<?php echo $row['date']; ?>">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <lable class="lable-products" for="newproductdesctiption"><span class="text-danger">*</span>Description</lable>
                        <textarea class="form-control" id="newproductdesctiption" name="newproductdesctiption" rows="6"  required><?php echo $row['discription']; }}?></textarea>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="productimage"> Product Image 1</label>
                    <input class="form-control" type="file" name="image" id="image">
                    <label for="productimage"> Product Image 2</label>
                    <input class="form-control" type="file" name="image2" id="image2">
                    <label for="productimage"> Product Image 3</label>
                    <input class="form-control" type="file" name="image3" id="image3">
                    <label for="productimage"> Product Image 4</label>
                    <input class="form-control" type="file" name="image4" id="image4">
                </div>
            </div>


            <div class="row mt-4 " >
                <div class="col-md-12 " >
                    <input class="form-control bg-primary text-white submit-btn" type="submit" name="resubmit" id="resubmit">
                </div>
            </div>
            <?php

            if (isset($_POST['resubmit'])) {

                if (isset($_POST['newproductname'])) {
                    $newproductname = $_POST['newproductname'];
                } else {
                    $newproductname = "";
                }

                if (isset($_POST['newproductslug'])) {
                    $newproductslug = $_POST['newproductslug'];
                } else {
                    $newproductslug = "";
                }

                if (isset($_POST['productcategories'])) {
                    $productcategories = $_POST['productcategories'];
                } else {
                    $productcategories = "";
                }

                if (isset($_POST['newcurrentdate'])) {
                    $newcurrentdate = $_POST['newcurrentdate'];
                } else {
                    $newcurrentdate = "";
                }

                if (isset($_POST['newproductdesctiption'])) {
                    $newproductdesctiption = $_POST['newproductdesctiption'];
                } else {
                    $newproductdesctiption = "";
                }

                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    $target_directory = "images/product/";
                    $target_file = $target_directory . basename($_FILES['image']['name']);
                    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                    //            save image as new file name
                    $newfilename = "$newproductname." . $imageFileType;
                    $target_file = $target_directory . $newfilename;

                    if (file_exists($target_file)) {
                        echo "Sorry, file already exists.";
                    } else {
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                            echo "The File " . $newfilename . " has been uploaded.<br>";

//                second image
                            if (isset($_FILES['image2']) && $_FILES['image2']['error'] == 0) {
                                $target_directory = "images/product/";
                                $target_file = $target_directory . basename($_FILES['image2']['name']);
                                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                                // Save image as new file name
                                $newfilename2 = "$newproductname" . "_image2." . $imageFileType;
                                $target_file = $target_directory . $newfilename2;

                                if (file_exists($target_file)) {
                                    echo "Sorry, file already exists.";
                                } else {
                                    if (move_uploaded_file($_FILES['image2']['tmp_name'], $target_file)) {
                                        echo "2nd, ";
                                    }
                                }
                            }
                            //                third image
                            if (isset($_FILES['image3']) && $_FILES['image3']['error'] == 0) {
                                $target_directory = "images/product/";
                                $target_file = $target_directory . basename($_FILES['image2']['name']);
                                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                                // Save image as new file name
                                $newfilename3 = "$newproductname" . "_image3." . $imageFileType;
                                $target_file = $target_directory . $newfilename3;

                                if (file_exists($target_file)) {
                                    echo "Sorry, file already exists.";
                                } else {
                                    if (move_uploaded_file($_FILES['image3']['tmp_name'], $target_file)) {
                                        echo "3rd ";
                                    }
                                }
                            }
                            //                fourth image
                            if (isset($_FILES['image4']) && $_FILES['image4']['error'] == 0) {
                                $target_directory = "images/product/";
                                $target_file = $target_directory . basename($_FILES['image2']['name']);
                                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                                // Save image as new file name
                                $newfilename4 = "$newproductname" . "_image4." . $imageFileType;
                                $target_file = $target_directory . $newfilename4;

                                if (file_exists($target_file)) {
                                    echo "Sorry, file already exists.";
                                } else {
                                    if (move_uploaded_file($_FILES['image4']['tmp_name'], $target_file)) {
                                        echo "4rd Uploaded <br>";
                                    }
                                }
                            }

                            $sql = "UPDATE product SET 
                            productname = '$newproductname',
                            productslug = '$newproductslug',
                            categorie = '$productcategories',
                            discription = '$newproductdesctiption',
                            date = '$newcurrentdate',
                            image = '$newfilename',
                            image2 = '$newfilename2',
                            image3 = '$newfilename3',
                            image4 = '$newfilename4'
                           WHERE id=$id";

                            if ($conn->query($sql) === TRUE) {
                                echo "Record updated successfully";
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




<script>
    CKEDITOR.replace('newproductdesctiption');
</script>
<?php

include "footer.php" ;
?>


