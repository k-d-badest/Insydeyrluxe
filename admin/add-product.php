<?php
session_start();
include('../includes/db.php');
if (!isset($_SESSION['admin_id'])) {
  header("Location: login.php");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $category = $_POST['category'];
  $price = $_POST['price'];
  $desc = $_POST['description'];
  $code = 'INSYDEYR-' . strtoupper(uniqid());

  $image = $_FILES['image']['name'];
  $target = "../uploads/product-images/" . basename($image);
  move_uploaded_file($_FILES['image']['tmp_name'], $target);

  $stmt = $conn->prepare("INSERT INTO products (product_code, name, category, price, description, image) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssiss", $code, $name, $category, $price, $desc, $image);
  $stmt->execute();
  echo "<p>Product added successfully!</p>";
}
?>

<h2>Add Product</h2>
<form method="POST" enctype="multipart/form-data">
  <input type="text" name="name" placeholder="Product Name" required>
  <input type="text" name="category" placeholder="Category" required>
  <input type="number" name="price" placeholder="Price" required>
  <textarea name="description" placeholder="Description" required></textarea>
  <input type="file" name="image" required>
  <button type="submit">Add Product</button>
</form>
