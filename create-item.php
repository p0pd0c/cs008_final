<?php
    include 'top.php';
?>

<main>
    <form action="add-item.inc.php" method="POST">
        <label for="txtItemName">Name of Item:</label>
        <input type="text" name="txtItemName">
        <label for="txtItemDescription">Description:</label>
        <input type="text" name="txtItemDescription">
        <label for="txtPrice">Price:</label>
        <input type="text" name="txtPrice">
        <input type="submit" name="btnAddItem">
    </form>
</main>