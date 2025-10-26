<?php
session_start();

// Redirect logic
if (isset($_SESSION['user_id'])) {
  header("Location: pages/home.php");
  exit;
} else {
  header("Location: pages/login.php");
  exit;
}
?>
