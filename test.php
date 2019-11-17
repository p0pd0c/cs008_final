<?php
    include 'top.php';
    if(isset($_POST['btnTestSubmit'])) {
        $name = $_POST['txtFirstName'];
        print 'Hello ' . htmlspecialchars($name);
    }
?>

<form method="POST" action=<?php print '"' . $phpSelf . '"'?>>
    <input name="txtFirstName" type="text">
    <input name="btnTestSubmit" type="submit" value="Hi">

</form>