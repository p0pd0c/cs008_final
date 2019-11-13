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
            print '<title>';
            if ($path_parts['filename'] == "index") {
                print 'Main | UVM Gleaning Initiative';
                print '</title>';
            } 
            elseif ($path_parts['filename'] == "locations") {
                print 'Locations | UVM Gleaning Initiative';
                print '</title>';
            } 
            elseif ($path_parts['filename'] == "contact") {
                print 'Contact | UVM Gleaning Initiative';
                print '</title>';
            } 
            elseif ($path_parts['filename'] == "signup") {
                print 'Sign Up | UVM Gleaning Initiative';
                print '</title>';
            }
            elseif ($path_parts['filename'] == "contest") {
                print 'Contest | UVM Gleaning Initiative';
                print '</title>';
            }
        ?>

        <link rel="stylesheet" href="./css/custom.css" />
    </head>

    <?php
        print '<body id="' . $path_parts['filename'] . '">';
        include ("header.php");
    ?>


         

