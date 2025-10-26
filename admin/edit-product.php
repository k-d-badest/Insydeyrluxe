<?php include('../includes/auth.php'); include('../includes/db.php');
$id = $_GET['id'];
$product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $desc = $_POST['description'];
  $conn->query("UPDATE products SET name='$name', price=$price, description='$desc' WHERE id=$id");
  echo "<p>Product updated!</p>";
}
?>

<form method="POST">
  <input name="name" value="<?= $product['name'] ?>">
  <input name="price" value="<?= $product['price'] ?>">
  <textarea name="description"><?= $product['description'] ?></textarea>
  <button type="submit">Update</button>
</form>
