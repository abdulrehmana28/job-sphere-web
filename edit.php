<?php require("includes/config.php"); ?>

<?php
if (isset($_SESSION['logged_in'])) {
    if ($_SESSION['logged_in'] === 'T') {
        if ($_SESSION['user_type'] === 'employer') {

            $jobCard_id = $_GET['eid'];
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id = $_POST['job_id'];
                $name = $_POST['company_name'];
                $job_level = $_POST['job_level'];
                $job_type = $_POST['job_type'];
                $job_title = $_POST['job_title'];
                $job_description = $_POST['job_description'];
                $job_salary = $_POST['job_salary'];

                if (empty($name) || empty($job_level) || empty($job_type) || empty($job_title) || empty($job_description) || empty($job_salary)) {
                    echo "All fields are required";
                } else {

                    $sql = "UPDATE `joblistings` 
        SET `company_name` = ?, 
            `job_level` = ?, 
            `job_type` = ?, 
            `job_title` = ?, 
            `job_description` = ?, 
            `job_salary` = ?
        WHERE `job_id` = ?;";

                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('ssssssi', $name, $job_level, $job_type, $job_title, $job_description, $job_salary, $jobCard_id);

                    if ($stmt->execute()) {
                        echo ('Your response has been updated');
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
                <title>Edit Job - JobSphere</title>
                <?php require('includes/head.php'); ?>
            </head>

            <body>
                <section class="first-section">
                    <!-- ===== navbar ====== -->
                    <?php require('includes/navbar.php') ?>

                    <?php
                    $jobCard_id = $_GET['eid'];

                    $sql1 = "SELECT * FROM `joblistings` WHERE `job_id` = ?";

                    $stmt1 = $conn->prepare($sql1);
                    $stmt1->bind_param('i', $jobCard_id);
                    $stmt1->execute();
                    $result1 = $stmt1->get_result();

                    if ($result1->num_rows > 0) {
                    ?>
                        <?php while ($job = $result1->fetch_assoc()) { ?>
                            <div class="signup-section">
                                <form class="signup-form" method="POST">
                                    <h2> Edit Job Post</h2> <br>

                                    <input type="hidden" id="job_id" name="job_id" class="form-input" value="<?php echo $job['job_id']; ?>" />

                                    <label for="name" class="form-label">Company Name:</label>
                                    <input type="text" id="company_name" name="company_name" placeholder="Google" class="form-input" value="<?php echo $job['company_name']; ?>" />

                                    <label for="job_level" class="form-label">Job level:</label>
                                    <input type="text" id="job_level" name="job_level" placeholder="Entry-level" class="form-input" required value="<?php echo $job['job_level']; ?>" />

                                    <label for="job_type" class="form-label">Job level:</label>
                                    <input type="text" id="job_type" name="job_type" placeholder="Full Time" class="form-input" required value="<?php echo $job['job_type']; ?>" />

                                    <label for="job_title" class="form-label">Job title:</label>
                                    <input type="text" id="job_title" name="job_title" placeholder="Product Designer" class="form-input" required value="<?php echo $job['job_title']; ?>" />

                                    <label for="job_description" class="form-label">Job description:</label>
                                    <textarea id="We need a Product Designer" name="job_description" rows="4" cols="35"><?php echo $job['job_description']; ?></textarea><br />

                                    <label for="job_salary" class="form-label">Job salary:</label>
                                    <input type="text" id="job_salary" name="job_salary" placeholder="105k" class="form-input" value="<?php echo $job['job_salary']; ?>" /> <br> <br>

                                    <input type="submit" value="Edit Job Post " class="submit-button" />
                                    <br />
                                    <br />
                                    <br />
                                </form>
                        <?php }
                    }
                    $stmt1->close(); ?>
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