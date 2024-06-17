<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_SESSION['reset_email'];
  $security_answer = mysqli_real_escape_string($conn, $_POST['security_answer']);

  $sql = "SELECT security_answer FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($security_answer, $row['security_answer'])) {
      $_SESSION['authenticated'] = true;
      header("Location: set_new_password.php");
      exit();
    } else {
      echo "Incorrect security answer.";
    }
  } else {
    echo "Error in the process.";
  }
}
?>