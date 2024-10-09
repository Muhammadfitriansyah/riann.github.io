<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM orders WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header('Location: order.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
