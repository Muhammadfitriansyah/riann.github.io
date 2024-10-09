<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $password = $_POST['password'];

    $sql = "INSERT INTO orders (name, quantity, password) VALUES ('$name', '$quantity', '$password')";

    if (mysqli_query($conn, $sql)) {
        header('Location: order.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
