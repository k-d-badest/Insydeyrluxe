<?php include('../includes/auth.php'); include('../includes/db.php'); ?>
<h2>Customer Orders</h2>
<table>
  <tr><th>User ID</th><th>Total</th><th>Date</th></tr>
  <?php
  $result = $conn->query("SELECT * FROM orders");
  while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['user_id']}</td><td>₦{$row['total']}</td><td>{$row['created_at']}</td></tr>";
  }
  ?>
</table>
