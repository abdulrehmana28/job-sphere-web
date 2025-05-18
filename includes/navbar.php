<!-- contains navbar code -->

<header>
    <!-- !Start of Navigation bar-->
    <nav class="navbar">
        <!-- ! Logo-->
        <div id="nav-left">
            <a href="index.php">
                <img src="images/logo.png" alt="JobSphere logo" />
            </a>
        </div>

        <div id="nav-middle">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="jobs.php">Jobs</a></li>
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === 'T' && isset($_SESSION['user_type']) && ($_SESSION['user_type'] === 'admin' || $_SESSION['user_type'] === 'employer')) {
                ?>
                    <li><a href="job_application.php">Application</a></li>

                <?php } else {  ?>

                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="about.php">About</a></li>
                <?php } ?>

                <!-- check if user is login & admin show qurey page link other wise contact link -->
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === 'T' && isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin') { ?>
                    <li><a href="inquiries.php">Inquiries</a></li>
                <?php } else {  ?>

                    <li><a href="contact.php">Contact</a></li>
                <?php } ?>
            </ul>
        </div>
        <div id="nav-right">
            <div id="nav-right-1">
                <form action="jobs.php" method="get">
                    <input id="navbar-search" type="search" name="search" class="navbar-search"
                        placeholder="Search Jobs Here"
                        value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>"
                        required />
                    <button class="navbar-search-btn" type="submit">
                        <img src="images/icons/search-icon.svg" alt="search">
                    </button>

                </form>
            </div>
            <?php
            if (isset($_SESSION['logged_in'])) {
                if ($_SESSION['logged_in'] == 'T') {
                    echo '<ul>
                    <li>
                         <h4>Salam, ' . $_SESSION['user_name'] . '</h4>
                    </li>
                    <li>
                        &nbsp;&nbsp;&nbsp;<a href="./includes/logout.php" class="navbar-btn">Log out</a>
                    </li>
                </ul>';
                }
            } else {
                echo '<ul>
                <li>
                    <a href="login.php" class="navbar-btn">Sign in</a>
                </li>
                <li>
                    <a href="signup.php" class="navbar-btn">Sign up</a>
                </li>
            </ul>';
            }
            ?>
        </div>
    </nav>
    <!--! end of Navigation bar-->
</header>