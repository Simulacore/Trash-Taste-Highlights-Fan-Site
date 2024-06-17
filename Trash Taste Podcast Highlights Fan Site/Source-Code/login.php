<?php
session_start();
if (isset($_SESSION['user_id'])) {
  header('Location: index.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="stylesheet" href="assets/css/login_style.css" />
  <title>Trash Taste Login</title>
  <link rel="shortcut icon" href="favicon.jpg" type="image/svg+xml" />
  <style>
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 500px;
      text-align: center;
    }
  </style>
</head>

<body style="background: url('trash_taste_logo.png') no-repeat center center fixed; background-size: cover;">

  <div class="container" id="container">
    <div class="form-container sign-up">
      <form id="registerForm">
        <h1>Create Account</h1>
        <input type="text" name="name" placeholder="Name" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <div class="security-question-container">
          <select name="security_question" id="security_question" required>
            <option value="" disabled selected>Select a security question</option>
            <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
            <option value="What was the name of your first pet?">What was the name of your first pet?</option>
            <option value="What is your favorite book?">What is your favorite book?</option>
            <option value="What city were you born in?">What city were you born in?</option>
            <option value="other">Other</option>
          </select>
          <input type="text" name="custom_security_question" id="custom_security_question"
            placeholder="Enter your custom security question" style="display: none; margin-top: 10px" />
        </div>
        <input type="text" name="security_answer" placeholder="Answer" required />
        <div class="captcha-container">
          <img src="generate_captcha_copy.php" alt="CAPTCHA" />
          <input type="text" name="captcha" placeholder="Enter CAPTCHA" required />
        </div>
        <button type="submit">Sign Up</button>
      </form>
    </div>
    <div class="form-container sign-in">
      <form method="POST" action="login_handler.php">
        <h1>Sign In</h1>
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <a href="forgot_password.html">Forgot Your Password?</a>
        <button type="submit">Sign In</button>
      </form>
    </div>
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1>Welcome Back!</h1>
          <p>Enter your personal details to use all of site features</p>
          <button class="hidden" id="login">Sign In</button>
        </div>
        <div class="toggle-panel toggle-right">
          <h1>Hello, Friend!</h1>
          <p>Register with your personal details to use all of site features</p>
          <button class="hidden" id="register">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal for login error -->
  <?php if (isset($_SESSION['login_error'])): ?>
    <div id="loginModal" class="modal" style="display: block;">
      <div class="modal-content">
        <p><?php echo $_SESSION['login_error']; ?></p>
        <button onclick="closeLoginModal()">Close</button>
      </div>
    </div>
    <?php unset($_SESSION['login_error']); endif; ?>

  <!-- Modal for register feedback -->
  <div id="registerModal" class="modal">
    <div class="modal-content">
      <p id="modalMessage"></p>
      <button onclick="closeRegisterModal()">Close</button>
    </div>
  </div>

  <script>
    const container = document.getElementById("container");
    const registerBtn = document.getElementById("register");
    const loginBtn = document.getElementById("login");
    const securityQuestionSelect = document.getElementById("security_question");
    const customSecurityQuestionInput = document.getElementById("custom_security_question");

    registerBtn.addEventListener("click", () => {
      container.classList.add("active");
    });

    loginBtn.addEventListener("click", () => {
      container.classList.remove("active");
    });

    securityQuestionSelect.addEventListener("change", function () {
      if (this.value === "other") {
        customSecurityQuestionInput.style.display = "block";
        customSecurityQuestionInput.required = true;
      } else {
        customSecurityQuestionInput.style.display = "none";
        customSecurityQuestionInput.required = false;
      }
    });

    document.getElementById("registerForm").addEventListener("submit", function (event) {
      event.preventDefault();

      const formData = new FormData(this);

      fetch("register.php", {
        method: "POST",
        body: formData,
      })
        .then((response) => response.json())
        .then((data) => {
          const modal = document.getElementById("registerModal");
          const modalMessage = document.getElementById("modalMessage");

          modalMessage.textContent = data.message;
          modal.style.display = "block";
        })
        .catch((error) => console.error("Error:", error));
    });

    function closeLoginModal() {
      document.getElementById("loginModal").style.display = "none";
    }

    function closeRegisterModal() {
      document.getElementById("registerModal").style.display = "none";
    }
  </script>
</body>

</html>