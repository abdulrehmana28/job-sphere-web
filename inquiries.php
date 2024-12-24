<?php require("includes/config.php"); ?>

<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === 'T' && isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin') { ?>
    <!-- main code here -->
    <?php
    $sql = "SELECT * FROM contact_form";
    $stmt = $conn->query($sql);

    if ($stmt->num_rows > 0) {
    ?>
        <!-- html code start -->
        <!DOCTYPE html>

        <!-- ====== head ======-->

        <head>
            <title>Inquiries - JobSphere</title>
            <?php require('includes/head.php'); ?>
        </head>

        <body>
            <section class="first-section">
                <!--============ Navbar ========== -->
                <?php require('includes/navbar.php'); ?>
                <div class="table-container">
                    <h1>Inquiries</h1>


                    <table>
                        <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Source</th>
                            <th>Message</th>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $stmt->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td> <?php echo $row['name']; ?> </td>
                                    <td> <?php echo $row['email']; ?> </td>
                                    <td> <?php echo $row['phone']; ?> </td>
                                    <td> <?php echo $row['source']; ?> </td>
                                    <td> <?php echo $row['message']; ?> </td>
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
    echo '<h2>Only admin can access this page</h2>';
} ?>