<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta 
            name="author" 
            content="Jared DiScipio and Ben Smith">
        <meta 
            name="description"
            content="Byte Bakery provides a variety of computer themed baked goods">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <?php
        
            $phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");
            $path_parts = pathinfo($phpSelf);
        
            print '<title>';
            if ($path_parts['filename'] == "index") {
                print 'Home';
                print '</title>';
            } elseif ($path_parts['filename'] == 'about') {
                print 'About Us';
                print '</title>';
            } else {
                print 'Generic';
                print '</title>';
            }
        ?>

        <!-- CSS Links Go Right Here -->
    </head>

    <?php
        print '<body id="' . $path_parts['filename'] . '">';
        include 'header.php';
    ?>


         

