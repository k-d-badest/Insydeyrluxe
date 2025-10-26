<?php include('../includes/header.php'); include('../includes/db.php');
$id = $_GET['id'];
$product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
?>

<h2><?= $product['name'] ?></h2>
<img src="../uploads/product-images/<?= $product['image'] ?>" width="300">
<p><?= $product['description'] ?></p>
<p>₦<?= $product['price'] ?></p>
<small>Code: <?= $product['product_code'] ?></small>

<form method="POST" action="add-to-cart.php">
  <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
  <input type="number" name="quantity" value="1" min="1">
  <button type="submit">Add to Cart</button>
</form>

<?php include('../includes/footer.php'); ?>
