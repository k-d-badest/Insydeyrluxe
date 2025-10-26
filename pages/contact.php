<?php include('../includes/header.php'); include('../includes/db.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $message);
  $stmt->execute();
  mail("support@insydeyr.com", "New Contact Message", $message);
  echo "<p>Message sent!</p>";
}
?>

<h2>Contact Us</h2>
<form method="POST">
  <input name="name" placeholder="Your Name" required>
  <input name="email" placeholder="Your Email" required>
  <textarea name="message" placeholder="Your Message" required></textarea>
  <button type="submit">Send</button>
</form>
<?php include('../includes/footer.php'); ?>
