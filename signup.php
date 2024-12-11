<?php
require("includes/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $usertype = $_POST['usertype'];

  if (empty($name) || empty($email) || empty($password) || empty($confirm_password) || empty($usertype)) {
    echo "All fields are required";
  } else if ($password != $confirm_password) {
    echo "Password did not match";
  } else {

    $sql = "SELECT id FROM `registration` WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
      echo 'please use a different email. this email is already in use';
    } else {

      $hashed_password = password_hash($password, PASSWORD_BCRYPT);

      $sql = "INSERT INTO `registration` (`name`, `email`, `password`, `usertype`) VALUES (?, ?, ?, ?);";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('ssss', $name, $email, $hashed_password, $usertype);

      if ($stmt->execute()) {
        echo ('Account Created');
        header('location:login.php');
      } else {
        echo 'Error: ' . $stmt->error;
      }
      $stmt->close();
    }
  }
}
$conn->close();
?>


<!-- =============== html ============================ -->
<!DOCTYPE html>
<html>
<!-- ==== head ======= -->

<head>
  <title>Sign up - JobSphere</title>
  <?php require('includes/head.php'); ?>
</head>

<body>
  <section class="first-section">
    <!-- ===== navbar ====== -->
    <?php require('includes/navbar.php') ?>

    <div class="signup-section">
      <form class="signup-form" method="POST">
        <h2>Sign Up</h2>

        <label for="name" class="form-label">Name:</label>
        <input type="text" id="name" name="name" class="form-input" /><br />

        <label for="email" class="form-label">Email:</label>
        <input type="email" id="email" name="email" class="form-input" required />

        <label for="password" class="form-label">Password:</label>
        <input type="password" id="password" name="password" class="form-input" required />

        <label for="confirm_password" class="form-label">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" class="form-input" required />

        <label class="form-label">Register as:</label><br>
        <input type="radio" id="job_seeker" name="usertype" value="job_seeker" />Job Seeker

        <input type="radio" id="employer" name="usertype" value="employer" />
        Employer

        <input type="submit" value="Sign Up" class="submit-button" />

        <p>
          Already have an account?
          <a href="login.html" id="login-link">Login here</a>
        </p>
        <br />
        <br />
      </form>
    </div>
  </section>

  <!-- Start of Footer-->
  <?php require('includes/footer.php') ?>
  <!-- end of Footer-->
</body>

</html>