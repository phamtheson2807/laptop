<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cửa hàng sửa chữa máy tính | Sửa chữa tại nhà</title>

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>

<body id="home">
    <?php include_once('includes/header.php'); ?>

    <style>
        /* Your existing styles here */

        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .cart-table th,
        .cart-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .cart-actions {
            display: flex;
            align-items: center;
        }

        .checkout-cart {
            margin-top: 20px;
            text-align: right;
        }

        .checkout-cart a {
            text-decoration: none;
            background-color: #333;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            display: inline-block;
        }
    </style>

    <!-- Your existing HTML content -->

    <main>
        <h2>Shopping Cart</h2>

        <table class="cart-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Cost</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="cartBody">
                <?php
                // Fetch products from the database based on the user's cart
                $cart = json_decode($_SESSION['cart'], true);

                foreach ($cart as $item) {
                    $productId = $item['ID'];

                    // Fetch product details from the database
                    $query = "SELECT * FROM tblservices WHERE ID = $productId";
                    $result = mysqli_query($conn, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = $result->fetch_assoc();

                        echo '<tr>';
                        echo '<td><img src="admin/images/' . $product['Image'] . '" alt="' . $product['ServiceName'] . '" width="50"></td>';
                        echo '<td>' . $product['ServiceName'] . '</td>';
                        echo '<td>' . $product['Cost'] . '</td>';
                        echo '<td>' . $item['Quantity'] . '</td>';
                        echo '<td>' . ($product['Cost'] * $item['Quantity']) . '</td>';
                        echo '<td><button onclick="removeFromCart(' . $product['ID'] . ')">Remove</button></td>';
                        echo '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>

        <div class="checkout-cart">
            <a href="checkout.php">Proceed to Checkout</a>
        </div>
    </main>

    <!-- Existing JavaScript code in your main page -->

    <script>
    function displayCart() {
        // Get the cart from localStorage
        var cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Find the cart body element
        var cartBody = document.getElementById('cartBody');

        // Clear existing content
        cartBody.innerHTML = '';

        // Loop through cart items and display them
        cart.forEach(function(item) {
            var row = document.createElement('tr');
            row.innerHTML = `
                <td><img src="admin/images/${item.Image}" alt="${item.ServiceName}" width="50"></td>
                <td>${item.ServiceName}</td>
                <td>${item.Cost}</td>
                <td>${item.Quantity}</td>
                <td>${item.Cost * item.Quantity}</td>
                <td><button onclick="removeFromCart(${item.ID})">Remove</button></td>
            `;
            cartBody.appendChild(row);
        });
    }

    function removeFromCart(serviceId) {
        // Get the cart from localStorage
        var cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Remove the item from the cart
        var updatedCart = cart.filter(function(item) {
            return item.ID !== serviceId;
        });

        // Save the updated cart back to localStorage
        localStorage.setItem('cart', JSON.stringify(updatedCart));

        // Update the cart display
        displayCart();
    }

    // Display the cart when the page loads
    window.onload = function() {
        displayCart();
        // Add any additional initialization code here
    };
</script>

</body>

</html>
