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
            if ($path_parts['filename'] == 'create-item') {
                print ' activePage ';
            }
            print '"><a href="create-item.php">Create Item</a>';
            print '</li>';
            
            print '<li class="';
            if ($path_parts['filename'] == 'list-items') {
                print ' activePage ';
            }
            print '"><a href="list-items.php">List Of Items</a>';
            print '</li>';
        ?>
    </ol>
</nav>