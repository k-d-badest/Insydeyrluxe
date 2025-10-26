<?php include('../includes/header.php'); ?>
<main>
  <h2>Shop Our Collection</h2>
  <form method="GET" class="filters">
    <select name="category">
      <option value="">All Categories</option>
      <option value="rings">Rings</option>
      <option value="necklaces">Necklaces</option>
      <option value="bracelets">Bracelets</option>
    </select>
    <select name="price">
      <option value="">All Prices</option>
      <option value="low">Under ₦50,000</option>
      <option value="mid">₦50,000 - ₦150,000</option>
      <option value="high">Above ₦150,000</option>
    </select>
    <button type="submit">Filter</button>
  </form>

  <div class="product-grid">
    <?php
    include('../includes/db.php');
    $query = "SELECT * FROM products WHERE 1";
    if (!empty($_GET['category'])) {
      $cat = $_GET['category'];
      $query .= " AND category='$cat'";
    }
    if (!empty($_GET['price'])) {
      if ($_GET['price'] == 'low') $query .= " AND price < 50000";
      if ($_GET['price'] == 'mid') $query .= " AND price BETWEEN 50000 AND 150000";
      if ($_GET['price'] == 'high') $query .= " AND price > 150000";
    }
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) {
      echo "<div class='product-card'>
              <img src='../uploads/product-images/{$row['image']}' alt='{$row['name']}'>
              <h3>{$row['name']}</h3>
              <p>₦{$row['price']}</p>
              <small>Code: {$row['product_code']}</small>
              <a href='product.php?id={$row['id']}' class='btn'>View</a>
            </div>";
    }
    ?>
  </div>
</main>
<?php include('../includes/footer.php'); ?>
