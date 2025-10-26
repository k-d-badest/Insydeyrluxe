<?php include('../includes/header.php'); ?>
<main>
    <section class="hero">
        <video autoplay muted loop id="heroVideo">
            <source src="../assets/videos/hero.mp4" type="video/mp4">
        </video>
        <div class="hero-overlay">
            <h1>INSYDEYR LUXE</h1>
            <p>Where Elegance Meets Eternity</p>
            <a href="shop.php" class="btn">Shop Now</a>
        </div>
    </section>
    <section class="about-us">
        <h2>About Insydeyr Luxe</h2>
        <p>At Insydeyr Luxe, we believe that jewelry is more than just an accessory; it's a statement of individuality and a celebration of life's precious moments. Our curated collection features exquisite designs crafted with the finest materials, ensuring that each piece is as unique as the person wearing it.</p>
        <a href="about.php" class="btn">Learn More</a>
    </section>
    <section class="featured-products">
        <h2>Featured Pieces</h2>
        <div class="product-grid">
            <?php
            include('../includes/db.php');
            $result = $conn->query("SELECT * FROM products ORDER BY created_at DESC LIMIT 4");
            while ($row = $result->fetch_assoc()) {
                echo "<div class='product-card'>
                <img src='../uploads/product-images/{$row['image']}' alt='{$row['name']}'>
                <h3>{$row['name']}</h3>
                <p>₦{$row['price']}</p>
                <a href='product.php?id={$row['id']}' class='btn'>View</a>
              </div>";
            }
            ?>
        </div>
    </section>
    <div class="product-card" data-aos="fade-up">
        <!-- Product content -->
    </div>

    <section class="featured-products" data-aos="zoom-in">
        <!-- Section content -->
    </section>

</main>
<?php include('../includes/footer.php'); ?>