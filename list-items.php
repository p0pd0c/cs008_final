
    <?php
        session_start();
        require 'auth_config.php';
        $uid = access_control(FALSE, $pdo);
        
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