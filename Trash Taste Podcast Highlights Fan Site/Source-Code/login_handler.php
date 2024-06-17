<?php
session_start();
include 'config.php'; // Ensure this file includes database connection setup

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  if (empty($email) || empty($password)) {
    $_SESSION['login_error'] = 'Please fill in both email and password.';
    header('Location: login.php');
    exit();
  }

  // Query to fetch user data based on the email
  $stmt = $conn->prepare("SELECT id, name, email, password FROM users WHERE email = ?");
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows == 1) {
    $stmt->bind_result($user_id, $user_name, $user_email, $hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
      // Password is correct, set session variables
      $_SESSION['user_id'] = $user_id;
      $_SESSION['user_name'] = $user_name;
      $_SESSION['user_email'] = $user_email;
      header('Location: index.php');
      exit();
    } else {
      // Invalid password
      $_SESSION['login_error'] = 'Invalid email or password.';
    }
  } else {
    // No user found with this email
    $_SESSION['login_error'] = 'Invalid email or password.';
  }

  $stmt->close();
  $conn->close();
  header('Location: login.php');
  exit();
} else {
  header('Location: login.php');
  exit();
}
?>