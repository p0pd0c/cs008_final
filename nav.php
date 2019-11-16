<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <!-- Brand Name | Clickable to go back to the home page-->
    <a class="navbar-brand" href="index.php">Byte Bakery</a>

    <!-- Hamburger Button -->
    <button 
        class="navbar-toggler collapsed" 
        type="button" 
        data-toggle="collapse" 
        data-target="#navbarCollapse" 
        aria-controls="navbarCollapse" 
        aria-expanded="false" 
        aria-label="Toggle navigation">

        <icon class="navbar-toggler-icon"></icon>
    </button>

    <!-- Collapsed Content In Menu -->
    <section class="navbar-collapse collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <?php
                print '<li class="nav-item';
                if ($path_parts['filename'] == "index") {
                    print ' active ';
                }
                print '"><a class="nav-link" href="index.php">Home</a>';
                print '</li>';

                print '<li class="nav-item';
                if ($path_parts['filename'] == "about") {
                    print ' active ';
                }
                print '"><a class="nav-link" href="about.php">About Us</a>';
                print '</li>';

                print '<li class="nav-item dropdown bg-dark';
                if ($path_parts['filename'] == "login" || $path_parts['filename'] == "signup") {
                    print ' active ';
                }
                print '"><a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Participate</a>';
                print '<ul class="dropdown-menu">';
                print '<a class="dropdown-item" href="login.php">Login</a>';
                print '<a class="dropdown-item" href="signup.php">Sign Up</a>';
                print '</li>';
            ?>
        </ul>
    </section>

    <!--
        print '<li class="';
        if ($path_parts['filename'] == "index") {
            print ' activePage ';
        }
        print '"><a class="nav-link" href="#">Home</a>';
        print '</li>';
    -->
</nav>