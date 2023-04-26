<?php
include "header.php";
?>
<div class="container mt-2">
    <h1>Add A Blog Post</h1>

    <form METHOD="post" action="">
        <textarea class="form-control " id="blog" name="blog" ></textarea>
        <input class="form-control mt-3 bg-warning text-white" type="submit" name="saveblog" id="saveblog">

    </form>
    <a class="" href="adminbloglist.php" style="text-decoration: none">
    <button class="form-control mt-3 bg-success text-white">Previous Blogs</button>
    </a>
</div>
<?php
include "connection.php";
if (isset($_POST['saveblog'])){
    if (isset($_POST['blog'])){
        $blog= $_POST['blog'];
    }else{
        $blog="";
    }

    $sql = "INSERT INTO  blog (blogpost)
                 VALUES ('$blog')";



    if ($conn->query($sql) === TRUE) {
        echo "File name saved to database successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }



}
?>









<script>
    CKEDITOR.replace('blog');
</script>
<?php
include "footer.php";
?>
