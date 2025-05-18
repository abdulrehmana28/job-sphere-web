<?php require("includes/config.php"); ?>
<!DOCTYPE html>
<html>
<!-- Head -->

<head>
  <title>Home - JobSphere</title>
  <?php require('includes/head.php'); ?>
</head>

<body>
  <section class="first-section">
    <!--============ Navbar ========== -->
    <?php require('includes/navbar.php'); ?>

    <!--! start Hero Content-->

    <div class="home-content">
      <div class="text-content">
        <h1>Find Your Dream Job with JobSphere</h1>
        <h2>Explore Opportunities, Elevate Careers</h2>
        <p>
          At Jobsphere, we believe in creating more than just connections
          between job seekers and employers. Our mission is to connect talented, driven
          individuals with the best career opportunities available, spanning
          across multiple industries, roles, and experience levels.
        </p>
        <div class="buttons">
          <a href="jobs.php" class="btn">Find Job</a>
          <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === 'T' && isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'job_seeker'): ?>
            <!-- Add create cv link here -->
            <a href="Add link here" class="btn">Create CV</a>
          <?php else: ?>
            <a href="job_post.php" class="btn">Post Job</a>
          <?php endif; ?>
        </div>
      </div>
      <div class="image-content">
        <img src="images/mainpage-graffiti.png" alt="people working" />
      </div>
    </div>
    <!-- end Hero content-->
  </section>

  <!-- Start of second section-->
  <section class="second-section">
    <div class="second-section-container">
      <div class="heading">Who's Hiring on JobSphere</div>
      <hr />
      <!-- Logo of company-->
      <div class="logo-container">
        <img src="images/google350.png" alt="Google" />
      </div>
      <div class="logo-container">
        <img src="images/meta350.png" alt="Meta" />
      </div>
      <div class="logo-container">
        <img src="images/amazon350.png" alt="Amazon Web Services" />
      </div>
      <div class="logo-container">
        <img src="images/sap350.png" alt="SAP" />
      </div>
      <div class="logo-container">
        <img src="images/databricks350.png" alt="Databricks" />
      </div>
    </div>
    <!-- end of second section-->
  </section>

  <!-- Start of Third section-->
  <section class="recent-job-section">
    <div class="recent-job-container">
      <div class="recent-job-heading">Recent Job Listings</div>

      <!-- Job Listings Container -->
      <div class="job-listings">
        <?php
        $sql = "SELECT * FROM `joblistings` ORDER BY `job_id` DESC LIMIT 3;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        ?>

          <?php while ($job = $result->fetch_assoc()) { ?>

            <div class="job-card">
              <div>
                <img src="uploads/company_logos/<?php echo $job['company_logo']; ?>"
                  alt="<?php echo $job['company_name']; ?> Logo"
                  class="company-logo">
              </div>
              <div class="job-info">
                <div><?php echo $job['job_level']; ?></div>
                <div><?php echo $job['job_type']; ?></div>
              </div>
              <div class="job-title"><?php echo $job['job_title']; ?></div>
              <div class="job-description">
                <?php echo $job['job_description']; ?>
              </div>
              <div class="job-info">
                <div class="job-salary"><?php echo $job['job_salary']; ?>/Year</div>
                <!-- Checking if user is admin or not -->
                <?php if (isset($_SESSION['logged_in'])  && $_SESSION['logged_in'] === 'T' && isset($_SESSION['user_type']) && ($_SESSION['user_type'] === 'employer' || $_SESSION['user_type'] === 'admin')) { ?>
                  <a href="edit.php?eid=<?php echo $job['job_id']; ?>" class="card-button">Edit</a>
                  <a href="delete.php?did=<?php echo $job['job_id']; ?>" class="card-button">Delete</a>
                <?php } else { ?>
                  <a href="apply.php?jid=<?php echo $job['job_id']; ?>" class="card-button">Apply Now</a>
                <?php } ?>
              </div>
            </div>
          <?php } ?>

        <?php } else {
          echo "no data found";
        } ?>

        <!-- Job Card ends -->
      </div>

    </div>
  </section>
  <!-- Start of Third section-->
  <!-- footer =========== -->
  <?php require('includes/footer.php') ?>
</body>

</html>