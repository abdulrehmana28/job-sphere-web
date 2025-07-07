<?php
require("includes/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (empty($email) || empty($password)) {
    echo "Email & Password are required";
  } else {

    $sql = "SELECT `id`, `name`, `password`, `usertype` FROM `registration` WHERE `email` = ?";

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
      trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
      $user = $result->fetch_assoc();

      if (password_verify($password, $user['password'])) {
        // Store user info in session
        $_SESSION['logged_in'] = 'T';
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_type'] = $user['usertype'];

        echo "Login successful";
        header("Location: index.php");
      } else {
        echo "Invalid password!";
      } // pass else
    } else {
      echo "No user found with this email!";
    }
    $stmt->close();
  } // 1st else
} // main brace
?>


<!-- ============ html ======================= -->
<!DOCTYPE html>
<html>
<!-- ======== head ===== -->

<head>
  <title>Sign in - JobSphere</title>
  <?php require('includes/head.php'); ?>
  
</head>

<body>
  <section class="first-section">
    <!-- ======== Navbar ======== -->
    <?php require('includes/navbar.php'); ?>

    <div class="login-section">
      <form class="login-form" method="POST" id="loginForm">
        <h2>Login</h2>

        <div class="form-group">
          <label for="email" class="form-label">Email:</label>
          <input type="email" id="email" name="email" class="form-input" required />
          <!-- Error message will be inserted here by JavaScript -->
        </div>

        <div class="form-group">
          <label for="password" class="form-label">Password:</label>
          <input type="password" id="password" name="password" class="form-input" required /><br />

          <input type="checkbox" id="remember" name="remember" class="form-checkbox" />
          <label for="remember" class="checkbox-label">Remember Me</label><br /><br />

          <input type="submit" value="Login" class="submit-button" />
      </form>
    </div>
  </section>

  <!-- <script type="module" src="js/loginValidation.js"></script> -->
  <!-- ======== footer ========= -->
  <?php require('includes/footer.php') ?>
</body>


</html>