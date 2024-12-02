<!DOCTYPE html>
<html>
<!-- ==== head ======= -->
<?php require('includes/head.php'); ?>

<body>
  <section class="first-section">
    <!-- ===== navbar ====== -->
    <?php require('includes/navbar.php') ?>

    <div class="signup-section">
      <form class="signup-form" action="login.html" method="get">
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
        <input type="radio" id="job_seeker" name="register_as" value="job_seeker" />Job Seeker

        <input type="radio" id="employer" name="register_as" value="employer" />
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