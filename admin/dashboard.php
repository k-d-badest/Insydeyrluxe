<?php
session_start();
include('../includes/db.php');
if (!isset($_SESSION['admin_id'])) {
  header("Location: login.php");
  exit;
}
?>
<h2>Admin Dashboard</h2>
<a href="add-product.php">Add New Product</a>
<table>
  <tr><th>Image</th><th>Name</th><th>Price</th><th>Actions</th></tr>
  <?php
  $result = $conn->query("SELECT * FROM products");
  while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td><img src='../uploads/product-images/{$row['image']}' width='50'></td>
            <td>{$row['name']}</td>
            <td>₦{$row['price']}</td>
            <td>
              <a href='edit-product.php?id={$row['id']}'>Edit</a> |
              <a href='delete-product.php?id={$row['id']}'>Delete</a>
            </td>
          </tr>";
  }
  ?>
</table>
