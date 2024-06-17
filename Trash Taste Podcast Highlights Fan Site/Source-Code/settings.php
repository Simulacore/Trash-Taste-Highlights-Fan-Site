<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit();
}

$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';
$user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Settings</title>
  <link rel="stylesheet" href="assets/css/login_style.css">
  <style>
    .settings-container {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      color: #333;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
      font-size: 16px;
      outline: none;
    }

    button[type="submit"] {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 5px;
      background-color: #512da8;
      color: #fff;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      outline: none;
    }

    button[type="submit"]:hover {
      background-color: #311b92;
    }

    #responseMessage {
      text-align: center;
      margin-top: 20px;
      color: #512da8;
      font-weight: bold;
    }

    .back-button {
      display: block;
      text-align: center;
      margin-top: 20px;
    }

    .back-button a {
      color: #333;
      text-decoration: none;
    }

    .back-button a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="settings-container">
    <h1>Update Settings</h1>
    <form id="settingsForm">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user_name); ?>" required>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user_email); ?>" required>
      <label for="password">Password (leave blank to keep current):</label>
      <input type="password" id="password" name="password">
      <button type="submit">Update</button>
    </form>
    <div id="responseMessage"></div>
    <div class="back-button">
      <a href="index.php">Go back to main page</a>
    </div>
  </div>

  <script>
    document.getElementById("settingsForm").addEventListener("submit", function (event) {
      event.preventDefault();

      const formData = new FormData(this);

      fetch("update_settings.php", {
        method: "POST",
        body: formData,
      })
        .then((response) => response.json())
        .then((data) => {
          const responseMessage = document.getElementById("responseMessage");
          responseMessage.textContent = data.message;
        })
        .catch((error) => console.error("Error:", error));
    });
  </script>
</body>

</html>