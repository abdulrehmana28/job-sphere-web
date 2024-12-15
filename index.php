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
          <a href="job_post.php" class="btn">Post Job</a>
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
        <!-- Job Card 1 -->
        <div class="job-card">
          <div>
            <img src="images/meta350.png" alt="Meta" />
          </div>
          <div class="job-info">
            <div>Entry Level</div>
            <div>Full-Time</div>
          </div>
          <div class="job-title">Junior Product Designer</div>
          <div class="job-description">
            We are seeking a passionate Junior Product Designer to join our
            dynamic team.
          </div>
          <div class="job-info">
            <div class="job-salary">85k/Year</div>
            <a href="login.php" class="card-button">Apply Now</a>
          </div>
        </div>

        <!-- Job Card 2 -->
        <div class="job-card">
          <div>
            <img src="images/amazon350.png" alt="Amazon Web Services" />
          </div>
          <div class="job-info">
            <div>Expert Level</div>
            <div>Full-Time</div>
          </div>
          <div class="job-title">AI Solutions Architect</div>
          <div class="job-description">
            As an AI Solutions Architect, you will lead the design and
            implementation of cloud solutions.
          </div>
          <div class="job-info">
            <div class="job-salary">190k/Year</div>
            <a href="login.php" class="card-button">Apply Now</a>
          </div>
        </div>

        <!-- Job Card 3 -->
        <div class="job-card">
          <div>
            <img src="images/google350.png" alt="google" />
          </div>
          <div class="job-info">
            <div>Expert Level</div>
            <div>Full-Time</div>
          </div>
          <div class="job-title">Senior Data Engineer</div>
          <div class="job-description">
            We are looking for a skilled Senior Data Engineer to join and lead
            our team.
          </div>
          <div class="job-info">
            <div class="job-salary">105k/Year</div>
            <a href="login.php" class="card-button">Apply Now</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Start of Third section-->
  <!-- footer =========== -->
  <?php require('includes/footer.php') ?>
</body>

</html>