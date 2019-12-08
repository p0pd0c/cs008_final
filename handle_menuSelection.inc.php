<?php
    $dataIsGood = false;

    if(isset($_POST['btnEnterOrder'])) {
        $dataIsGood = true;
        
        // Create an array in session variable to keep track of selections
        $_SESSION['fldFoodItems'] = array();
        // Get all the product names from the db
        $products = array();
        $sql = "SELECT fldname, fldprice FROM tblMenuItems";
        foreach ($pdo->query($sql) as $row) {
            array_push($products, array($row['fldname'], $row['fldprice']));
        }

        foreach ($products as $product) {
            if(isset($_POST['chk' . $product[0]])) {
                
                array_push($_SESSION['fldFoodItems'], $product);
            }
        }
        

        // If the user made no selections, the data is no good
        if(count($_SESSION['fldFoodItems'] == 0)) {
            $dataIsGood = false;
            print '<p class="alert alert-warning ml-auto mr-auto">You must select some items in order to checkout</p>';
        }
        
    }

    // Now that dataIsGood, we know that $_SESSION['fldFoodItems'] has an array of products
    // We can send them to store.php to create an order in the db
    if($dataIsGood) {
        header('Location store.php');
        exit;
    }
?>