<?php
session_start();
if (!isset($_SESSION['reset_email'])) {
  header("Location: forgot_password.html");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/login_style.css">
  <title>Answer Security Question</title>
</head>

<body>
  <div class="container">
    <div class="form-container">
      <form method="POST" action="verify_security_answer.php">
        <h1>Answer Security Question</h1>
        <p><?php echo $_SESSION['security_question']; ?></p>
        <input type="text" name="security_answer" placeholder="Answer" required>
        <button type="submit">Submit</button>
      </form>
    </div>
  </div>
</body>

</html>