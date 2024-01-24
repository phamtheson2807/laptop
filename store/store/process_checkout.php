<?php
// Your payment processing code goes here

if ($payment_successful) {
    header("Location: checkout.php?message=success");
} else {
    header("Location: checkout.php?message=error");
}
?>