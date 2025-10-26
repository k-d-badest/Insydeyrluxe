<?php
session_start();
include('../includes/db.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();
  if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $hashed);
    $stmt->fetch();
    if (password_verify($password, $hashed)) {
      $_SESSION['user_id'] = $id;
      header("Location: home.php");
    } else {
      echo "Invalid credentials.";
    }
  } else {
    echo "User not found.";
  }
}
?>
<form method="POST">
  <input type="email" name="email" placeholder="Email" required>
  <input type="password" name="password" placeholder="Password" required>
  <button type="submit">Login</button>
</form>
