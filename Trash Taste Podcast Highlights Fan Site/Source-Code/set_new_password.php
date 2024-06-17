<?php
session_start();
include 'config.php';

if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
  header("Location: forgot_password.html");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_SESSION['reset_email'];
  $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
  $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

  $sql = "UPDATE users SET password='$hashed_password' WHERE email='$email'";

  if (mysqli_query($conn, $sql)) {
    session_unset();
    session_destroy();
    echo "Password reset successful. You can now <a href='index.php'>login</a>.";
  } else {
    echo "Error updating password.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/login_style.css">
  <title>Set New Password</title>
</head>

<body>
  <div class="container">
    <div class="form-container">
      <form method="POST" action="">
        <h1>Set New Password</h1>
        <input type="password" name="new_password" placeholder="New Password" required>
        <button type="submit">Submit</button>
      </form>
    </div>
  </div>
</body>

</html>