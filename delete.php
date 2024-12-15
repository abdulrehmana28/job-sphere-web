<?php require("includes/config.php"); ?>

<?php if (isset($_SESSION['logged_in'])  && $_SESSION['logged_in'] === 'T' && isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'employer') {
    $cart_id = $_GET['did'];

    $sql = "DELETE FROM `joblistings` WHERE `job_id` = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $cart_id);
    $stmt->execute();

    header('location:jobs.php');
} ?>