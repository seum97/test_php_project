<?php
include "db_connection.php";

// Check if 'id' is passed
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
} else {
    die("Error: ID Missing !");
}

$sql = "DELETE FROM `users` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  // header("Location: index.php?msg=Data deleted successfully");

    session_start();
    $_SESSION['msg'] = "User deleted successfully";
    header("Location: index.php");
    exit();
} else {
  echo "Failed: " . mysqli_error($conn);
}
?>