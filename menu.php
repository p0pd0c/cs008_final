<?php 
    session_start();
    require 'auth_config.php';
    // Check if user is logged in... if not then kick em out
    
    include 'top.php';
    // Top half of my page with meta tags and title, etc... main is opened beforehand

    // Get menu items from db
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    include 'handle_menuSelection.inc.php';
    $sql = "SELECT fldname, fldprice, flddescription FROM tblMenuItems";

    print '<article class="row pt-5 justify-content-center">';
    foreach ($pdo->query($sql) as $row) {

      if(strpos(str_replace(' ', '', $row['fldname']), 'BirthDay') !== false) {
        $src = './images/foods/BirthDay.png';
      } elseif (strpos(str_replace(' ', '', $row['fldname']), 'Bit') !== false) {
        $src = './images/foods/Bit.png';
      } elseif (strpos(str_replace(' ', '', $row['fldname']), 'Byte') !== false) {
        $src = './images/foods/Byte.png';
      } elseif (strpos(str_replace(' ', '', $row['fldname']), 'Cupkey') !== false) {
        $src = './images/foods/Cupkey.png';
      } elseif (strpos(str_replace(' ', '', $row['fldname']), 'Keybread') !== false) {
        $src = './images/foods/Keybread.png';
      } elseif (strpos(str_replace(' ', '', $row['fldname']), 'Monitor') !== false) {
        $src = './images/foods/Monitor.png';
      }
  
      print '<section class="card col-md-6">';
        print '<img src="'. $src .'" class="card-img-top" alt="One of our menu items">';
        print '<section class="card-body">';
          print '<h5 class="card-title">'. $row['fldname'] .'</h5>';
          print '<p class="card-text text-left">'. $row['flddescription'] .'</p>';
          print '<a href="store.php" class="btn btn-primary">'. $row['fldprice'] .'</a>';
        print '</section>';
      print '</section>';
    }
    print '</article>';

    // Old card
    // print '<section class="col-md-6">';
    //     print '<section class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">';
    //       print '<section class="col p-4 d-flex flex-column position-static">';
    //         print '<h3 class="mb-0">'. $row['fldname'] .'</h3>';
    //         print '<section class="mb-1 text-muted">$'. $row['fldprice'] .'</section>';
    //         print '<p class="card-text mb-auto">'. $row['flddescription'] .'</p>';
    //       print '</section>';
    //       // print '<section class="col-auto d-none d-lg-block">';
    //       //   print '<img src="" alt="">';
    //       // print '</section>';
    //     print '</section>';
    //   print '</section>';
?>
</main>

<?php
    include 'footer.php';
?>