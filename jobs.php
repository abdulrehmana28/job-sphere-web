<?php require("includes/config.php"); ?>
<!DOCTYPE html>
<html>

<head>
  <title>Jobs - JobSphere</title>
  <?php require('includes/head.php'); ?>
</head>

<body>
  <section class="first-section">
    <?php require('includes/navbar.php'); ?>

    <section class="recent-job-section">
      <div class="recent-job-container">
        <div class="recent-job-heading">Job Listings</div>

        <!-- Job Listings Container -->
        <div class="job-listings">
          <?php
          // Get search keyword if exists
          $search = isset($_GET['search']) ? trim($_GET['search']) : '';

          // Base SQL query
          $sql = "SELECT * FROM `joblistings`";

          // Add search condition if keyword exists
          if (!empty($search)) {
            $sql .= " WHERE 
                  `job_title` LIKE ? OR 
                  `company_name` LIKE ? OR 
                  `job_description` LIKE ? OR 
                  `job_level` LIKE ?";
          }

          $sql .= " ORDER BY `job_id` DESC";

          // Prepare statement
          $stmt = $conn->prepare($sql);

          if (!empty($search)) {
            $search_term = "%$search%";
            $stmt->bind_param(
              "ssss",
              $search_term,
              $search_term,
              $search_term,
              $search_term
            );
          }

          $stmt->execute();
          $result = $stmt->get_result();

          if ($result->num_rows > 0) {
            while ($job = $result->fetch_assoc()) { ?>
              <div class="job-card">
                <!-- Existing job card HTML -->
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
                  <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === 'T' && isset($_SESSION['user_type']) && ($_SESSION['user_type'] === 'employer' || $_SESSION['user_type'] === 'admin')) { ?>
                    <a href="edit.php?eid=<?php echo $job['job_id']; ?>" class="card-button">Edit</a>
                    <a href="delete.php?did=<?php echo $job['job_id']; ?>" class="card-button">Delete</a>
                  <?php } else { ?>
                    <a href="apply.php?jid=<?php echo $job['job_id']; ?>" class="card-button">Apply Now</a>
                  <?php } ?>
                </div>
              </div>
          <?php }
          } else {
            echo "<div class='no-results'>No jobs found matching your search criteria</div>";
          }
          ?>
        </div>
      </div>
    </section>
    <?php require('includes/footer.php') ?>
</body>

</html>