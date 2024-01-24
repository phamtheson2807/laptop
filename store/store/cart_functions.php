<?php

session_start();

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case 'add':
            addToCart();
            break;
        case 'clear':
            clearCart();
            break;
        // Add more cases for other actions if needed
    }
}

function addToCart() {
    $product = [
        'name' => $_POST['product_name'],
        'cost' => $_POST['product_cost'],
        'quantity' => $_POST['product_quantity'],
        'image' => $_POST['product_image'], // Add image information
    ];

    $_SESSION['cart'][] = $product;
}

function clearCart() {
    unset($_SESSION['cart']);
    $_SESSION['cart'] = [];
}

?>
