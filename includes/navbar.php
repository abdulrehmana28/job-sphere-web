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

        <!-- Mobile Menu Toggle Button -->
        <button class="mobile-nav-toggle" id="mobile-nav-toggle" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <!-- Desktop Navigation -->
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
    
    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu" id="mobile-menu">
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
            
            <!-- Mobile Search -->
            <li>
                <form action="jobs.php" method="get" style="padding: var(--spacing-base); border-bottom: 1px solid var(--color-border);">
                    <input type="search" name="search" class="navbar-search" 
                        placeholder="Search Jobs Here" 
                        value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" 
                        style="width: 100%; margin-bottom: var(--spacing-sm);" required />
                    <button class="navbar-btn" type="submit" style="width: 100%;">Search Jobs</button>
                </form>
            </li>
            
            <!-- Mobile Auth Buttons -->
            <?php
            if (isset($_SESSION['logged_in'])) {
                if ($_SESSION['logged_in'] == 'T') {
                    echo '<li style="padding: var(--spacing-base); background: var(--color-background); border-bottom: 1px solid var(--color-border);">
                        <p style="margin: 0; font-weight: var(--font-weight-medium);">Salam, ' . $_SESSION['user_name'] . '</p>
                    </li>
                    <li>
                        <a href="./includes/logout.php" class="navbar-btn" style="display: block; text-align: center; margin: var(--spacing-base);">Log out</a>
                    </li>';
                }
            } else {
                echo '<li>
                    <a href="signup.php" class="navbar-btn" style="display: block; text-align: center; margin: var(--spacing-base);">Sign up</a>
                </li>';
            }
            ?>
        </ul>
    </div>
    <!--! end of Navigation bar-->
</header>

<!-- Mobile Navigation JavaScript -->
<script>
 document.addEventListener('DOMContentLoaded', function() {
     const mobileToggle = document.getElementById('mobile-nav-toggle');
     const mobileMenu = document.getElementById('mobile-menu');
     
     if (mobileToggle && mobileMenu) {
         mobileToggle.addEventListener('click', function() {
             mobileToggle.classList.toggle('active');
             mobileMenu.classList.toggle('active');
             
             // Prevent body scroll when menu is open
             if (mobileMenu.classList.contains('active')) {
                 document.body.style.overflow = 'hidden';
             } else {
                 document.body.style.overflow = '';
             }
         });
         
         // Close menu when clicking on links
         const mobileLinks = mobileMenu.querySelectorAll('a');
         mobileLinks.forEach(link => {
             link.addEventListener('click', function() {
                 mobileToggle.classList.remove('active');
                 mobileMenu.classList.remove('active');
                 document.body.style.overflow = '';
             });
         });
         
         // Close menu when clicking outside
         document.addEventListener('click', function(e) {
             if (!mobileToggle.contains(e.target) && !mobileMenu.contains(e.target)) {
                 mobileToggle.classList.remove('active');
                 mobileMenu.classList.remove('active');
                 document.body.style.overflow = '';
             }
         });
     }
 });
</script>
