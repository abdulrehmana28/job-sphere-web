<?php require("includes/config.php"); ?>

<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === 'T' && isset($_SESSION['user_type']) && ($_SESSION['user_type'] === 'admin' || $_SESSION['user_type'] === 'employer')) { ?>
    <!-- main code here -->
    <?php
    $sql = "SELECT * FROM applications";
    $stmt = $conn->query($sql);

    if ($stmt->num_rows > 0) {
    ?>
        <!-- html code start -->
        <!DOCTYPE html>

        <!-- ====== head ======-->

        <head>
            <title>Job Applications - JobSphere</title>
            <?php require('includes/head.php'); ?>
        </head>

        <body>
            <section class="first-section">
                <!--============ Navbar ========== -->
                <?php require('includes/navbar.php'); ?>
                <div class="table-container">
                    <h1>Job Applications</h1>


                    <table>
                        <thead>
                            <th>Apply id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Company</th>
                            <th>Job Title</th>
                            <th>Salary</th>
                            <th>Resume</th>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $stmt->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td> <?php echo $row['apply_id']; ?> </td>
                                    <td> <?php echo $row['name']; ?> </td>
                                    <td> <?php echo $row['email']; ?> </td>
                                    <td> <?php echo $row['phone']; ?> </td>
                                    <td> <?php echo $row['company_name']; ?> </td>
                                    <td> <?php echo $row['job_title']; ?> </td>
                                    <td> <?php echo $row['job_salary']; ?> </td>
                                    <td>
                                        <?php if (!empty($row['resume_path'])): ?>
                                            <a href="uploads/resumes/<?php echo $row['resume_path']; ?>"
                                                target="_blank"
                                                class="resume-link">
                                                View Resume
                                            </a>
                                        <?php else: ?>
                                            No resume uploaded
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                <?php } else {
                echo "<h2> No record found</h2>";
            }
                ?>
                </table>
                </div>
            </section>

            <!-- ======== footer ========= -->
            <?php require('includes/footer.php') ?>

        </body>

        </html>
        <!-- code ends here -->
    <?php } else {
    echo '<h2>Only admin or employer can access this page</h2>';
} ?>