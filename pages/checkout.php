<?php
session_start();
include('../includes/db.php');
include('../includes/header.php');

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT cart.product_id, cart.quantity, products.price 
                        FROM cart JOIN products ON cart.product_id = products.id 
                        WHERE cart.user_id = $user_id");

$total = 0;
while ($row = $result->fetch_assoc()) {
  $total += $row['price'] * $row['quantity'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $conn->query("INSERT INTO orders (user_id, total) VALUES ($user_id, $total)");
  $conn->query("DELETE FROM cart WHERE user_id = $user_id");
  echo "<p>Thank you for your purchase! Your order has been placed.</p>";
  include('../includes/footer.php');
  exit;
}
?>

<h2>Checkout</h2>
<p>Total: ₦<?= $total ?></p>
<form method="POST">
  <button type="submit">Confirm Payment</button>
</form>

<?php include('../includes/footer.php'); ?>
