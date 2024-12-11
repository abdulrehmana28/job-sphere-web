<?php require("includes/config.php"); ?>

<?php
if (isset($_SESSION['logged_in'])) {
    if ($_SESSION['logged_in'] == 'T') {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            if (empty($name) || empty($email) || empty($age) || empty($phone) || empty($address)) {
                echo "All fields are required";
            } else {

                $sql = "INSERT INTO `applications` (`name`, `email`, `age`, `phone`, `address`) VALUES (?, ?, ?, ?, ?);";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('sssss', $name, $email, $age, $phone, $address);

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
                    <form class="signup-form" method="POST">
                        <h2>Job Application Form</h2> <br>

                        <label for="name" class="form-label">Name:</label>
                        <input type="text" id="name" name="name" class="form-input" />
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-input" required />

                        <label for="age" class="form-label">Age:</label>
                        <input type="number" id="age" name="age" class="form-input" required />

                        <label for="phone" class="form-label">Phone number:</label>
                        <input type="tel" id="phone" name="phone" pattern="[0-9]{2}-[0-9]{3}-[0-9]{6}" placeholder="92-455-678467" class=" form-input" required />

                        <label for="address" class="form-label">Address:</label>
                        <input type="text" id="address" name="address" class="form-input" /> <br> <br>

                        <input type="submit" value="Apply" class="submit-button" />

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
        header('location: login.php');
    }
} else {
    header('location: login.php');
}
?>