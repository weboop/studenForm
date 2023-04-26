<?php
include "clientheader.php";
include "connection.php";
$query = "SELECT * FROM blog";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
while ($row = $result->fetch_assoc()) {
?>
<div class="container " style="text-align: justify">
    <?php
    echo $row['blogpost'];

    ?>
</div>

<?php
}
}
include "clientfooter.php";
?>
