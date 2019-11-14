<nav>
    <ol>
        <?php
        /*
            print '<li class="';
            if ($path_parts['filename'] == "index") {
                print ' activePage ';
            }
        */
            print '<li class="';
            if ($path_parts['filename'] == 'index') {
                print ' activePage ';
            }
            print '"><a href="index.php">Home</a>';
            print '</li>';
            
            print '<li class="';
            if ($path_parts['filename'] == 'about') {
                print ' activePage ';
            }
            print '"><a href="list-items.php">About Us</a>';
            print '</li>';
        ?>
    </ol>
</nav>