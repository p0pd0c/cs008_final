<?php
    session_start();
    require 'auth_config.php';
    $uid = access_control(FALSE, $pdo);
    include 'add-item-inc.php';
    ?>
    <form action="create-item.php" method="POST">
        <label for="txtItemName">Name of Item:</label>
        <input type="text" name="txtItemName">
        <label for="txtItemDescription">Description:</label>
        <input type="text" name="txtItemDescription">
        <label for="txtPrice">Price:</label>
        <input type="text" name="txtPrice">
        <input type="submit" name="btnAddItem">
    </form>
</main>

<?php
    include 'footer.php';