<?php
session_start();
include 'config.php';

header('Content-Type: application/json');

$response = array('status' => '', 'message' => '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!isset($_SESSION['user_id'])) {
    $response['status'] = 'error';
    $response['message'] = 'User not logged in';
    echo json_encode($response);
    exit();
  }

  $user_id = $_SESSION['user_id'];
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  // Validate email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response['status'] = 'error';
    $response['message'] = 'Invalid email format';
    echo json_encode($response);
    exit();
  }

  // Validate name (example: not empty)
  if (empty($name)) {
    $response['status'] = 'error';
    $response['message'] = 'Name cannot be empty';
    echo json_encode($response);
    exit();
  }

  // Using prepared statements to prevent SQL injection
  if (!empty($password)) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE users SET name=?, email=?, password=? WHERE id=?");
    $stmt->bind_param('sssi', $name, $email, $hashed_password, $user_id);
  } else {
    $stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
    $stmt->bind_param('ssi', $name, $email, $user_id);
  }

  if ($stmt->execute()) {
    $_SESSION['user_name'] = $name;
    $_SESSION['user_email'] = $email;
    $response['status'] = 'success';
    $response['message'] = 'Settings updated successfully!';
  } else {
    $response['status'] = 'error';
    $response['message'] = 'Error: ' . $stmt->error;
  }

  $stmt->close();
  $conn->close();
} else {
  $response['status'] = 'error';
  $response['message'] = 'Invalid request method';
}

echo json_encode($response);
?>