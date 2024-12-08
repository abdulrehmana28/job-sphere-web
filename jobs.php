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
              <a href="apply.html" class="apply-button">Apply Now</a>
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
              <a href="apply.html" class="apply-button">Apply Now</a>
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
              We are looking for a skilled Senior Data Engineer to join and
              lead our team.
            </div>
            <div class="job-info">
              <div class="job-salary">105k/Year</div>
              <a href="apply.html" class="apply-button">Apply Now</a>
            </div>
          </div>

          <!-- Job Card 4 -->
          <div class="job-card">
            <div>
              <img src="images/meta350.png" alt="Meta" />
            </div>
            <div class="job-info">
              <div>Mid Level</div>
              <div>Full-Time</div>
            </div>
            <div class="job-title">Frontend Software Engineer</div>
            <div class="job-description">
              We are seeking a passionate Frontend Development to join our
              dynamic team.
            </div>
            <div class="job-info">
              <div class="job-salary">185k/Year</div>
              <a href="apply.html" class="apply-button">Apply Now</a>
            </div>
          </div>

          <!-- Job Card 5 -->
          <div class="job-card">
            <div>
              <img src="images/sap350.png" alt="Meta" />
            </div>
            <div class="job-info">
              <div>Mid Level</div>
              <div>Full-Time</div>
            </div>
            <div class="job-title">ERP Consultant</div>
            <div class="job-description">
              We are looking for an experienced ERP Consultant to guide our
              ERP solutions.
            </div>
            <div class="job-info">
              <div class="job-salary">120k/Year</div>
              <a href="apply.html" class="apply-button">Apply Now</a>
            </div>
          </div>

          <!-- Job Card 6 -->
          <div class="job-card">
            <div>
              <img src="images/amazon350.png" alt="Meta" />
            </div>
            <div class="job-info">
              <div>Expert Level</div>
              <div>Full-Time</div>
            </div>
            <div class="job-title">Cloud Solutions Architect</div>
            <div class="job-description">
              We are looking for a Cloud Solutions Architect to help customers
              implement scalable cloud solutions on AWS.
            </div>
            <div class="job-info">
              <div class="job-salary">285k/Year</div>
              <a href="apply.html" class="apply-button">Apply Now</a>
            </div>
          </div>

          <!-- Job Card 8 -->
          <div class="job-card">
            <div>
              <img src="images/databricks350.png" alt="Meta" />
            </div>
            <div class="job-info">
              <div>Expert Level</div>
              <div>Full-Time</div>
            </div>
            <div class="job-title">Machine Learning Engineer</div>
            <div class="job-description">
              Build and deploy large-scale ML models for enterprise data
              applications.
            </div>
            <div class="job-info">
              <div class="job-salary">135k/Year</div>
              <a href="apply.html" class="apply-button">Apply Now</a>
            </div>
          </div>
          <!-- Job Card 8 ends -->
        </div>
      </div>
      <hr />
    </section>
    <!-- end of job listing section-->
  </section>

  <!-- ======== footer ========= -->
  <?php require('includes/footer.php') ?>

</body>

</html>