<?php require("includes/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $source = $_POST['source'];
  $message = $_POST['message'];


  if (empty($name) || empty($email) || empty($phone) || empty($source) || empty($message)) {
    echo "All fields are required";
  } else {

    $sql = "INSERT INTO `contact_form` (`name`, `email`, `phone` ,`source`, `message`) VALUES (?, ?, ?, ?, ?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssss', $name, $email, $phone, $source, $message);

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
<html>
<!-- ======== head ===== -->

<head>
  <title>Contact - JobSphere</title>
  <?php require('includes/head.php'); ?>
</head>

<body>
  <section class="first-section">
    <!-- ======== Navbar ======== -->
    <?php require('includes/navbar.php'); ?>

    <div class="contact-container">
      <div class="contact-image">
        <!-- <img src="images/contact.jpeg" alt="contact us" /> -->
      </div>

      <!--Contact section text starts-->
      <div class="contact-text-container">
        <div class="contact-text-section">
          <h1>How to Reach Us</h1>
        </div>
        <!--text 1-->
        <div class="contact-text-section">
          <h2>1. General Inquiries</h2>
          <p>
            If you have any general questions about JobSphere, our services,
            or how to use the platform, feel free to reach out to our support
            team. Whether you’re new to the platform or an existing user
            looking for assistance, we’re ready to help.
          </p>
          <p><strong>Email:</strong> support@jobsphere.com</p>
          <p><strong>Phone:</strong> (323) 555-0123</p>
          <p>
            <strong>Hours:</strong> Monday to Friday, 9:00 AM to 5:00 PM (PST)
          </p>
        </div>
        <!--text 2-->
        <div class="contact-text-section">
          <h2>2. For Employers</h2>
          <p>
            Are you an employer looking to post jobs, connect with potential
            candidates, or get assistance with your JobSphere account? Our
            dedicated employer support team is here to ensure your hiring
            experience is smooth and successful.
          </p>
          <p>
            <strong>Employer Support Email:</strong> employers@jobsphere.com
          </p>
          <p><strong>Phone:</strong> (323) 555-0456</p>
          <p>
            <strong>Hours:</strong> Monday to Friday, 9:00 AM to 6:00 PM (PST)
          </p>
        </div>

        <!--text 3-->
        <div class="contact-text-section">
          <h2>3. For Job Seekers</h2>
          <p>
            We understand how challenging job searching can be, and we’re here
            to make the process easier for you. If you need assistance with
            your account, help applying for a job, or have questions about
            opportunities listed on the platform, reach out to our job seeker
            support team.
          </p>
          <p>
            <strong>Job Seeker Support Email:</strong>
            jobseekers@jobsphere.com
          </p>
          <p><strong>Phone:</strong> (323) 555-0678</p>
          <p>
            <strong>Hours:</strong> Monday to Friday, 9:00 AM to 5:00 PM (PST)
          </p>
        </div>

        <!--text 4-->
        <div class="contact-text-section">
          <h2>4. Press and Media Inquiries</h2>
          <p>
            For media requests, press releases, or interview opportunities,
            our media relations team is available to provide you with the
            information you need. We love sharing our story and providing
            insight into the trends shaping the job market in Los Santos.
          </p>
          <p><strong>Media Contact Email:</strong> media@jobsphere.com</p>
          <p><strong>Phone:</strong> (323) 555-0890</p>
          <p>
            <strong>Hours:</strong> Monday to Friday, 10:00 AM to 4:00 PM
            (PST)
          </p>
        </div>
        <br />
        <br />

        <!--! ========== contact form starts ========================-->

        <form class="contact-form" method="POST">
          <h2>Contact Us</h2>

          <label for="name">Name:</label>
          <input type="text" id="name" name="name" /><br />

          <label for="email">Email:</label>
          <input type="email" id="email" name="email" /><br />

          <label for="phone">Contact No:</label>
          <input type="tel" id="phone" name="phone" placeholder="92-455-678467" /><br />

          <label for="source">How did you hear about us?</label> <br />
          <select id="source" name="source">
            <option value="">Select</option>
            <option value="search_engine">Search Engine</option>
            <option value="friend">Friend</option>
            <option value="social_media">Social Media</option>
            <option value="other">Other</option>
          </select><br />

          <label for="message">Message:</label>
          <textarea id="message" name="message" rows="4" cols="35"
            placeholder="Your message here..."></textarea><br />

          <input type="checkbox" id="email_updates" name="email_updates" />
          <label for="email_updates">Sign me up for email updates</label><br /><br />

          <input type="submit" value="Submit" />
        </form>
        <br />
        <br />
      </div>
    </div>
  </section>
  <!-- ======== footer ========= -->
  <?php require('includes/footer.php') ?>

</body>

</html>