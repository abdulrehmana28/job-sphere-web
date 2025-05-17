<?php require("includes/config.php"); ?>

<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 'T') {

    $job_jid = $_GET['jid'];
    $sql_job = "SELECT `company_name`, `job_title`, `job_salary` FROM `joblistings`  WHERE `job_id` = ?";
    $stmt_job = $conn->prepare($sql_job);
    $stmt_job->bind_param('i', $job_jid);
    $stmt_job->execute();
    $result_job = $stmt_job->get_result();

    // ============================================
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $resume_path = '';
        $phone = $_POST['phone'];
        $company_name = $_POST['company_name'];
        $job_title = $_POST['job_title'];
        $job_salary = $_POST['job_salary'];

        // PDF File upload handling
        if (isset($_FILES['resume']) && $_FILES['resume']['error'] == UPLOAD_ERR_OK) {
            $target_dir = "uploads/resumes/";
            $max_size = 5 * 1024 * 1024; // 5MB

            // Create directory if not exists
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true);
            }

            // Validate PDF
            $file_type = strtolower(pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION));
            if ($file_type != 'pdf') {
                die("Error: Only PDF files are allowed.");
            }

            if ($_FILES['resume']['size'] > $max_size) {
                die("Error: File too large. Max size is 5MB.");
            }

            // Generate unique name
            $new_name = uniqid() . '.pdf';
            $target_file = $target_dir . $new_name;

            if (move_uploaded_file($_FILES['resume']['tmp_name'], $target_file)) {
                $resume_path = $new_name;
            } else {
                die("Error uploading resume.");
            }
        } // ============================================ 

        if (empty($name) || empty($email) || empty($phone)) {
            echo "All fields are required";
        } else {

            $sql = "INSERT INTO `applications` (`name`, `email`,`phone`,`company_name`, `job_title`, `job_salary`, `resume_path`) VALUES (?, ?, ?, ?, ?, ?, ?);";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssssss', $name, $email, $phone, $company_name, $job_title, $job_salary, $resume_path);

            if ($stmt->execute()) {
                echo ('Your response has been recorded');
                header('location:index.php');
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
                <form class="signup-form" method="POST" enctype="multipart/form-data">
                    <h2>Job Application Form</h2> <br>

                    <label for="name" class="form-label">Name:</label>
                    <input type="text" id="name" name="name" class="form-input" />
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-input" required />

                    <label for="phone" class="form-label">Phone number:</label>
                    <input type="tel" id="phone" name="phone" pattern="[0-9]{2}-[0-9]{3}-[0-9]{6}" placeholder="92-455-678467" class=" form-input" required /><br /><br />

                    <label>Upload Resume (PDF only):</label> <br /><br />
                    <input type="file" name="resume" accept="application/pdf" required><br />


                    <?php if ($result_job->num_rows > 0) {
                        while ($job = $result_job->fetch_assoc()) {  ?>

                            <input type="hidden" id="company_name" name="company_name" value="<?php echo $job['company_name'] ?>" class="form-input" />
                            <input type="hidden" id="job_title" name="job_title" value="<?php echo $job['job_title'] ?>" class="form-input" />
                            <input type="hidden" id="job_salary" name="job_salary" value="<?php echo $job['job_salary'] ?>" class="form-input" />
                    <?php  } // while
                    } else {
                        echo "no data found";
                    }
                    ?>
                    <br> <br>

                    <input type="submit" value="Apply" class="submit-button" />

                    <br />
                    <br> <br>
                    <br />
                </form>
            </div>
        </section>

        <!-- ======== footer ========= -->
        <?php require('includes/footer.php') ?>

    </body>

    </html>

<?php
} else {
    header('location: login.php');
}
?>