<!-- contains navbar code -->

<header>
    <!-- !Start of Navigation bar-->
    <nav class="navbar">
        <!-- ! Logo-->
        <div id="nav-left">
            <a href="index.html">
                <img src="images/logo.png" alt="JobSphere logo" />
            </a>
        </div>

        <div id="nav-middle">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="jobs.php">Jobs</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
        <div id="nav-right">
            <div id="nav-right-1">
                <form action="jobs.php" method="get">
                    <input id="navbar-search" type="search" name="search" class="navbar-search"
                        placeholder="Search Here" required />
                    <button class="navbar-search-btn" type="submit">
                        <img src="images/icons/search-icon.svg" alt="search">
                    </button>

                </form>
            </div>
            <ul>
                <li>
                    <a href="login.php" class="navbar-btn">Sign in</a>
                </li>
                <li>
                    <a href="signup.php" class="navbar-btn">Sign up</a>
                </li>
            </ul>
        </div>
    </nav>
    <!--! end of Navigation bar-->
</header>