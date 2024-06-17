<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = mysqli_real_escape_string($conn, $_POST['email']);

  // Check if email exists
  $sql = "SELECT security_question FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $security_question = $row['security_question'];
    $_SESSION['reset_email'] = $email;
    $_SESSION['security_question'] = $security_question;
    header("Location: answer_security_question.php");
    exit();
  } else {
    echo "Email not found.";
  }
}
?>