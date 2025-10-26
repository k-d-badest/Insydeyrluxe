<?php
session_start();
include('../includes/db.php');
include('../includes/header.php');

$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT cart.id, products.name, products.price, products.image, cart.quantity 
                        FROM cart JOIN products ON cart.product_id = products.id 
                        WHERE cart.user_id = $user_id");

$total = 0;
echo "<h2>Your Cart</h2><table>";
while ($row = $result->fetch_assoc()) {
  $subtotal = $row['price'] * $row['quantity'];
  $total += $subtotal;
  echo "<tr>
          <td><img src='../uploads/product-images/{$row['image']}' width='50'></td>
          <td>{$row['name']}</td>
          <td>₦{$row['price']}</td>
          <td>
            <form method='POST' action='update-cart.php'>
              <input type='hidden' name='cart_id' value='{$row['id']}'>
              <input type='number' name='quantity' value='{$row['quantity']}' min='1'>
              <button type='submit'>Update</button>
            </form>
          </td>
          <td>
            <form method='POST' action='remove-cart.php'>
              <input type='hidden' name='cart_id' value='{$row['id']}'>
              <button type='submit'>Remove</button>
            </form>
          </td>
        </tr>";
}
echo "</table><h3>Total: ₦$total</h3>";
echo "<a href='checkout.php' class='btn'>Proceed to Checkout</a>";
include('../includes/footer.php');
?>
