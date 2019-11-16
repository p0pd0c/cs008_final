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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/custom.css">

        <?php 
            if ($path_parts['filename'] == 'login' || $path_parts['filename'] == 'signup') {
                print '<link href="https://getbootstrap.com/docs/4.3/examples/floating-labels/floating-labels.css" rel="stylesheet">';
            }
        ?>

    </head>

    <?php
        print '<body id="' . $path_parts['filename'] . '">';
        include 'header.php';
        if ($path_parts['filename'] == 'login' || $path_parts['filename'] == 'signup') {
            print '<main class="container-fluid m0 row ml-auto mr-auto">';
        } else {
            print '<main class="container-fluid m0">';
        }
    ?>


         

