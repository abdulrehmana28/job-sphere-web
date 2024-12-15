<?php require("includes/config.php"); ?>
<!DOCTYPE html>

<!-- ====== head ======-->

<head>
  <title>Jobs - JobSphere</title>
  <?php require('includes/head.php'); ?>
</head>

<body>
  <section class="first-section">
    <!-- ==== Navbar ====== -->
    <?php require('includes/navbar.php'); ?>

    <!-- Start of job listing section-->
    <section class="recent-job-section">
      <div class="recent-job-container">
        <div class="recent-job-heading">Job Listings</div>

        <!-- Job Listings Container -->
        <div class="job-listings">
          <?php
          $sql = "SELECT * FROM `joblistings`";
          $result = mysqli_query($conn, $sql) or die('no connection to db');

          if ($result->num_rows > 0) {
          ?>

            <?php while ($job = $result->fetch_assoc()) { ?>

              <div class="job-card">
                <div>
                  <h2><?php echo $job['company_name']; ?></h2>
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
                  <?php if (isset($_SESSION['logged_in'])  && $_SESSION['logged_in'] === 'T' && isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'employer') { ?>
                    <a href="edit.php?eid=<?php echo $job['job_id']; ?>" class="card-button">Edit</a>
                    <a href="delete.php?did=<?php echo $job['job_id']; ?>" class="card-button">Delete</a>
                  <?php } else { ?>
                    <a href="apply.php" class="card-button">Apply Now</a>
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
    <br>
    <!-- end of job listing section-->
  </section>

  <!-- ======== footer ========= -->
  <?php require('includes/footer.php') ?>

</body>

</html>