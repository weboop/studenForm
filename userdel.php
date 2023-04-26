<?php
include "connection.php";
$id =$_GET['id'];

$sql = "DELETE FROM userslogin WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

include "userList.php";
