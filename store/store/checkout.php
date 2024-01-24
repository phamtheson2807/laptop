<!DOCTYPE html>
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

$successMessage = '';
$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paymentMethod = $_POST["payment_method"];
    
    if ($paymentMethod == "credit_card") {
        // Xử lý thanh toán bằng thẻ tín dụng
        // ...

        // Gán thông báo thành công hoặc lỗi
        $successMessage = "Thanh toán thành công!";
        $errorMessage = "Có lỗi xảy ra khi xử lý thanh toán.";
    } elseif ($paymentMethod == "paypal") {
        // Xử lý thanh toán bằng PayPal
        // ...

        // Gán thông báo thành công hoặc lỗi
        $successMessage = "Thanh toán thành công!";
        $errorMessage = "Có lỗi xảy ra khi xử lý thanh toán qua PayPal.";
    }
}
?>

<html lang="en">

<head>
    <title>Cửa hàng sửa chữa máy tính | Sửa chữa tại nhà</title>

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body id="home">

    <?php include_once('includes/header.php');?>

    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- Common jquery plugin -->
    <!--bootstrap working-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- //bootstrap working-->
    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function () {
            $('.navbar-toggler').click(function () {
                $('body').toggleClass('noscroll');
            })
        });
    </script>

    <html>

    <head>
        <title>Thanh toán</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }

            form {
                width: 300px;
                margin: 0 auto;
            }

            label {
                display: block;
                margin-top: 20px;
            }

            input[type="text"] {
                width: 100%;
                padding: 10px;
                margin-top: 5px;
            }

            .credit-card-fields {
                display: block;
                /* Ban đầu hiển thị các trường thẻ tín dụng */
            }

            .paypal-fields {
                display: none;
                /* Ban đầu ẩn các trường PayPal */
            }

            input[type="submit"] {
                margin-top: 20px;
                padding: 10px 20px;
            }
        </style>
    </head>

    <body>
        <h1>Thanh toán</h1>

        <form id="paymentForm" method="post" onsubmit="return confirmPurchase()">
            <label for="payment_method">Phương thức thanh toán:</label>
            <select id="payment_method" name="payment_method" onchange="updatePaymentMethod()" required>
                <option value="credit_card">Thẻ tín dụng</option>
                <option value="paypal">PayPal</option>
            </select><br><br>

            <div class="credit-card-fields">
                <label for="card_number">Số thẻ:</label>
                <input type="text" id="card_number" name="card_number" required><br><br>

                <label for="expiry_date">Ngày hết hạn:</label>
                <input type="text" id="expiry_date" name="expiry_date" maxlength="5" placeholder="MM/YY"
                    oninput="formatExpiryDate(this)" required><br><br>

                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" required><br><br>
            </div>

            <div id="paypalFields" class="paypal-fields">
                <label for="paypal_email">Email PayPal:</label>
                <input type="text" id="paypal_email" name="paypal_email" required><br><br>
            </div>

            <input type="submit" value="Thanh toán">
        </form>
        <body onload="displaySelectedProduct()">
    <!-- Checkout page content -->
    <div id="checkoutContent"></div>
</body>

        <script>
            function confirmPurchase(totalAmount) {
    return confirm("Bạn có chắc muốn thanh toán " + totalAmount + " VNĐ?");
}


            function updatePaymentMethod() {
                var paymentMethod = document.getElementById("payment_method").value;
                var creditCardFields = document.querySelector('.credit-card-fields');
                var paypalFields = document.getElementById("paypalFields");

                if (paymentMethod === "paypal") {
                    creditCardFields.style.display = "none";
                    paypalFields.style.display = "block";
                } else {
                    creditCardFields.style.display = "block";
                    paypalFields.style.display = "none";
                }
            }

            function formatExpiryDate(input) {
                var value = input.value.replace(/\D/g, '');
                if (value.length > 2) {
                    input.value = value.slice(0, 2) + '/' + value.slice(2, 4);
                } else {
                    input.value = value;
                }
            }

            // Hiển thị thông báo thành công hoặc lỗi
            var successMessage = "<?php echo isset($successMessage) ? $successMessage : ''; ?>";
            var errorMessage = "<?php echo isset($errorMessage) ? $errorMessage : ''; ?>";

            if (successMessage) {
                alert(successMessage);
            } else if (errorMessage) {
                alert(errorMessage);
            }
        </script>
    </body>

    </html>
</body>

</html>
