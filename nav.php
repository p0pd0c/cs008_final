<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <!-- Brand Name -->
    <a class="navbar-brand" href="index">Byte Bakery</a>

    <!-- Hamburger Button -->
    <button 
        class="navbar-toggler collapsed" 
        type="button" 
        data-toggle="collapse" 
        data-target="#navbarCollapse" 
        aria-controls="navbarCollapse" 
        aria-expanded="false" 
        aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsed Content In Menu -->
    <section class="navbar-collapse collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <?php
                print '<li class="nav-item';
                if ($path_parts['filename'] == "index") {
                    print ' active ';
                }
                print '"><a class="nav-link" href="#">Home</a>';
                print '</li>';

                print '<li class="nav-item';
                if ($path_parts['filename'] == "about") {
                    print ' active ';
                }
                print '"><a class="nav-link" href="#">About Us</a>';
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