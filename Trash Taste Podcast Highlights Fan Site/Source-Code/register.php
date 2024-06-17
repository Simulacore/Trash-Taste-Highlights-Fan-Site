<?php
session_start();
include 'config.php';

header('Content-Type: application/json');

$response = array('status' => '', 'message' => '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $security_question = mysqli_real_escape_string($conn, $_POST['security_question']);
  $security_answer = mysqli_real_escape_string($conn, $_POST['security_answer']);
  $captcha = mysqli_real_escape_string($conn, $_POST['captcha']);

  if ($captcha === $_SESSION['captcha']) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $hashed_answer = password_hash($security_answer, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password, security_question, security_answer, verified) VALUES ('$name', '$email', '$hashed_password', '$security_question', '$hashed_answer', true)";

    if (mysqli_query($conn, $sql)) {
      $response['status'] = 'success';
      $response['message'] = 'Registration successful!';
    } else {
      $response['status'] = 'error';
      $response['message'] = 'Error: ' . mysqli_error($conn);
    }
  } else {
    $response['status'] = 'error';
    $response['message'] = 'CAPTCHA verification failed. Please try again.';
  }
}

echo json_encode($response);
?>