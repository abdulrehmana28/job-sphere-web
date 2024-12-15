<?php require("includes/config.php"); ?>

<?php
if (isset($_SESSION['logged_in'])) {
    if ($_SESSION['logged_in'] === 'T') {
        if ($_SESSION['user_type'] === 'employer') {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['company_name'];
                $job_level = $_POST['job_level'];
                $job_type = $_POST['job_type'];
                $job_title = $_POST['job_title'];
                $job_description = $_POST['job_description'];
                $job_salary = $_POST['job_salary'];

                if (empty($name) || empty($job_level) || empty($job_type) || empty($job_title) || empty($job_description) || empty($job_salary)) {
                    echo "All fields are required";
                } else {

                    $sql = "INSERT INTO `joblistings` (`company_name`, `job_level`, `job_type` ,`job_title`, `job_description`, `job_salary`) VALUES (?, ?, ?, ?, ?, ?);";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('ssssss', $name, $job_level, $job_type, $job_title, $job_description, $job_salary);

                    if ($stmt->execute()) {
                        echo ('Your response has been recorded');
                        header('location:jobs.php');
                    } else {
                        echo 'Error: ' . $stmt->error;
                    }
                    $stmt->close();
                }
            }
?>



            <!DOCTYPE html>

            <!-- ====== head ======-->

            <head>
                <title>Apply - JobSphere</title>
                <?php require('includes/head.php'); ?>
            </head>

            <body>
                <section class="first-section">
                    <!-- ===== navbar ====== -->
                    <?php require('includes/navbar.php') ?>

                    <div class="signup-section">
                        <form class="signup-form" method="POST">
                            <h2>Job Post Form</h2> <br>

                            <label for="name" class="form-label">Company Name:</label>
                            <input type="text" id="company_name" name="company_name" placeholder="Google" class="form-input" />

                            <label for="job_level" class="form-label">Job level:</label>
                            <input type="text" id="job_level" name="job_level" placeholder="Entry-level" class="form-input" required />

                            <label for="job_type" class="form-label">Job level:</label>
                            <input type="text" id="job_type" name="job_type" placeholder="Full Time" class="form-input" required />

                            <label for="job_title" class="form-label">Job title:</label>
                            <input type="text" id="job_title" name="job_title" placeholder="Product Designer" class="form-input" required />

                            <label for="job_description" class="form-label">Job description:</label>
                            <textarea id="We need a Product Designer" name="job_description" rows="4" cols="35"
                                placeholder="We need a Product Designer..."></textarea><br />

                            <label for="job_salary" class="form-label">Job salary:</label>
                            <input type="text" id="job_salary" name="job_salary" placeholder="105k" class="form-input" /> <br> <br>

                            <input type="submit" value="Post Job" class="submit-button" />
                            <br />
                            <br />
                            <br />
                        </form>
                    </div>
                </section>

                <!-- ======== footer ========= -->
                <?php require('includes/footer.php') ?>

            </body>

            </html>

<?php } else {
            echo '<h2>Only Employer can access this page</h2>';
        }
    } else {
        header('location: login.php');
    }
} else {
    header('location: login.php');
}
?>