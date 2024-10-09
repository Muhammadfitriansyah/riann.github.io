<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Sparepart Motor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="light-mode">
    <!-- Header -->
    <header>
        <div class="container">
            <h1>Order Sparepart Motor</h1>
            <nav>
                <ul id="navbar">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">Tentang Kami</a></li>
                    <li><a href="order.php">Order</a></li>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="theme-toggle" />
                            <span class="slider"></span>
                        </label>
                    </li>
                </ul>
                <button class="hamburger" id="hamburger">&#9776;</button>
            </nav>
        </div>
    </header>

    <!-- CRUD Table -->
    <section class="crud">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: 20px;">Daftar Pemesanan</h2>
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 30px;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">ID</th>
                        <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Nama</th>
                        <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Jumlah Pesanan</th>
                        <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'connection.php';
                    $query = "SELECT * FROM orders";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td style='border: 1px solid #ddd; padding: 8px;'>{$row['id']}</td>
                                <td style='border: 1px solid #ddd; padding: 8px;'>{$row['name']}</td>
                                <td style='border: 1px solid #ddd; padding: 8px;'>{$row['quantity']}</td>
                                <td style='border: 1px solid #ddd; padding: 8px; text-align: center;'>
                                    <a href='edit_order.php?id={$row['id']}' style='text-decoration: none; color: blue;'>Edit</a> | 
                                    <a href='delete_order.php?id={$row['id']}' style='text-decoration: none; color: red;'>Hapus</a>
                                </td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Order Form Section -->
    <section class="order">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: 20px;">Formulir Pemesanan</h2>
            <form id="orderForm" action="submit_order.php" method="POST" style="max-width: 600px; margin: 0 auto;">
                <div class="form-group" style="margin-bottom: 15px;">
                    <label for="name" style="display: block; margin-bottom: 5px;">Nama Lengkap:</label>
                    <input type="text" id="name" name="name" required placeholder="Masukkan Nama Anda" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>
                <div class="form-group" style="margin-bottom: 15px;">
                    <label for="quantity" style="display: block; margin-bottom: 5px;">Jumlah Pesanan:</label>
                    <input type="number" id="quantity" name="quantity" required placeholder="Jumlah Sparepart" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>
                <div class="form-group" style="margin-bottom: 15px;">
                    <label for="password" style="display: block; margin-bottom: 5px;">Kata Sandi:</label>
                    <input type="password" id="password" name="password" required placeholder="Masukkan Kata Sandi" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>
                <button type="submit" style="display: block; width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">Submit</button>
            </form>

            <div id="orderResult" style="margin-top: 20px; text-align: center;"></div>
        </div>
    </section>

    <!-- Footer -->
    <footer style="text-align: center; padding: 20px 0; background-color: #f1f1f1; margin-top: 30px;">
        <p>&copy; 2024 Toko Sparepart Motor. All Rights Reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
