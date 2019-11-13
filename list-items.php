        <?php
            include 'top.php';  
        ?>

        <main>
            <?php
                include 'sql.php';
                
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = "SELECT * FROM tblMenuItems";
                
                $statement = $pdo->query($sql);
                
                print '<ol>';
                while($row = $statement->fetch()) {
                    print "<li>$row[fldname]: $row[flddescription], \$$row[fldprice]</li>";
                }
                print '</ol>';
            ?>
        </main>

        <?php
            include 'footer.php';
        ?>
    </body>
</html>