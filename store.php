<?php 
    include 'auth_config.php';

    // Check if user is logged in... if not then kick em out
    $uid = access_control();
    
    // Top half of my page with meta tags and title, etc... main is opened beforehand
    include 'top.php';
?>

    
</main>

<?php
    include 'footer.php';
?>