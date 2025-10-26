<?php
session_start();
include('../includes/db.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $stmt = $conn->prepare("SELECT id, password FROM admins WHERE username=?");
  $stmt->bind_param("s", $user);
  $stmt->execute();
  $stmt->store_result();
  if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $hash);
    $stmt->fetch();
    if (password_verify($pass, $hash)) {
      $_SESSION['admin_id'] = $id;
      header("Location: dashboard.php");
    } else echo "Invalid login.";
  } else echo "Admin not found.";
}
?>
<form method="POST">
  <input name="username" placeholder="Admin Username">
  <input name="password" type="password" placeholder="Password">
  <button type="submit">Login</button>
</form>
