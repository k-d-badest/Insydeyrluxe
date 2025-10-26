<?php
session_start();
include('../includes/db.php');

if (isset($_POST['cart_id']) && isset($_POST['quantity'])) {
  $cart_id = intval($_POST['cart_id']);
  $quantity = intval($_POST['quantity']);
  $conn->query("UPDATE cart SET quantity = $quantity WHERE id = $cart_id");
  echo "updated";
}
?>