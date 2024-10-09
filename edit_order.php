<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the existing data
    $query = "SELECT * FROM orders WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $order = mysqli_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];

        $sql = "UPDATE orders SET name = '$name', quantity = '$quantity' WHERE id = $id";

        if (mysqli_query($conn, $sql)) {
            header('Location: order.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">

    <div style="max-width: 600px; margin: 0 auto; background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center; margin-bottom: 20px;">Edit Order</h2>
        <form action="" method="POST">
            <div style="margin-bottom: 15px;">
                <label for="name" style="display: block; margin-bottom: 5px;">Nama Lengkap:</label>
                <input type="text" id="name" name="name" value="<?php echo $order['name']; ?>" required 
                style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="quantity" style="display: block; margin-bottom: 5px;">Jumlah Pesanan:</label>
                <input type="number" id="quantity" name="quantity" value="<?php echo $order['quantity']; ?>" required 
                style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <button type="submit" 
            style="display: block; width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
                Update
            </button>
        </form>
    </div>

</body>
</html>
