<nav>
    <ol>
        <?php
            print '<li class="';
            if ($path_parts['filename'] == "index") {
                print ' activePage ';
            }
            print '">';
            print '<a href="index.php">Main Page</a>';
            print '</li>';

            print '<li class="';
            if ($path_parts['filename'] == "locations") {
                print ' activePage ';
            }
            print '">';
            print '<a href="locations.php">Locations</a>';
            print '</li>';

            print '<li class="';
            if ($path_parts['filename'] == "contact") {
                print ' activePage ';
            }
            print '">';
            print '<a href="contact.php">Contact</a>';
            print '</li>';

            print '<li class="';
            if ($path_parts['filename'] == "signup") {
                print ' activePage ';
            }
            print '">';
            print '<a href="signup.php">Sign Up</a>';
            print '</li>';

            print '<li class="';
            if ($path_parts['filename'] == "contest") {
                print ' activePage ';
            }
            print '">';
            print '<a href="contest.php">Contest</a>';
            print '</li>';
        ?>
    </ol>
</nav>