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
      <form class="login-form" action="index.html" method="get">
        <h2>Login</h2>

        <label for="username" class="form-label">Username:</label>
        <input type="text" id="username" name="username" class="form-input" required /><br />

        <label for="password" class="form-label">Password:</label>
        <input type="password" id="password" name="password" class="form-input" required /><br />

        <input type="checkbox" id="remember" name="remember" class="form-checkbox" />
        <label for="remember" class="checkbox-label">Remember Me</label><br /><br />

        <input type="submit" value="Login" class="submit-button" />
      </form>
    </div>
  </section>

  <!-- ======== footer ========= -->
  <?php require('includes/footer.php') ?>
</body>

</html>