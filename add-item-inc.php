<?php
    include 'sql.php';

    function getData($field) {
        if(!isset($_POST[$field])) {
            $data = '';
        } else {
            $data = trim($_POST[$field]);
            $data = htmlspecialchars($data);
        }
        
        return $data;
    }

    if(isset($_POST['btnAddItem'])) {
        $product_name = getData('txtItemName');
        $product_description = getData('txtItemDescription');
        $price = getData('txtPrice');
        
        $dataIsGood = true;
        if ($product_name == '' || $product_description == '') {
            print '<p class="mistake">Neither name nor desicription may be blank</p>';
            $dataIsGood = false;
        }
        
        if($price == '') {
            print '<p class="mistake">Product must have a price</p>';
            $dataIsGood = false;
        }
        
        if($dataIsGood) {
            try {
                $sql = 'INSERT INTO tblMenuItems (fldname, flddescription, fldprice) VALUES (?,?,?)';
                $statement = $pdo->prepare($sql);
                $params = [$product_name, $product_description, $price];
                $statement->execute($params);
                print '<p>Product Added</p>';
                die();
            } catch (PDOException $e) {
                print '<p>Hmm... Houston we have a problem. Contact this page\'s administrator and ignore the email!</p>';
            }
        }
    }