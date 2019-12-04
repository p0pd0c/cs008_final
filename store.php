<?php 
    include 'auth_config.php';
    // Check if user is logged in... if not then kick em out
    $uid = access_control(FALSE, $pdo);
    // Top half of my page with meta tags and title, etc... main is opened beforehand
?>

    <form method="POST" action=<?php print '"' . $phpSelf . '"'?>>
        <fieldset class="form-label-group">
            <input name="txtFirstName" id="txtFirstName" class="form-control" placeholder="First Name" required autofocus="">
            <label for="txtFirstName">First Name</label>
        </fieldset>

        <fieldset class="form-label-group">
            <input name="txtLastName" id="txtLastName" class="form-control" placeholder="Last Name" required>
            <label for="txtLastName">Last Name</label>
        </fieldset>

        <fieldset class="form-label-group">
            <input name="txtAddress" id="txtAddress" class="form-control" placeholder="Username" required>
            <label for="txtAddress">Address</label>
        </fieldset>

        <fieldset class="form-label-group">
            <input name="txtAddress2" id="txtAddress2" class="form-control" placeholder="Email address">
            <label for="txtAddress2">Secondary Address</label>
        </fieldset>

        <fieldset class="form-label-group">
            <select name="selCountry" id="selCountry" class="form-control" required>
                <option value="">--Please choose an option--</option>
                <option value="us">United States</option>
            </select>
            
            <label for="selCountry">Country</label>

            <select name="selState" id="selState" class="form-control" required>
                <option value="VT">Vermont</option>
                <option value="MA">Massachusetts</option>
            </select>
            <label for="selState">State</label>
        </fieldset>

        <fieldset class="form-label-group">
            <input name="txtZip" type="text" id="txtZip" class="form-control" placeholder=" Confirm Password" required>
            <label for="txtZip">Zip Code</label>
        </fieldset>

        <fieldset class="form-label-group">
            <input name="txtCardNumber" type="text" id="txtCardNumber" class="form-control" placeholder=" Confirm Password" required>
            <label for="txtCardNumber">Card Number</label>

            <input name="txtCsv" type="text" id="txtCsv" class="form-control" placeholder=" Confirm Password" required>
            <label for="txtCsv">CSV</label>

            <input name="txtExpiration" type="text" id="txtExpiration" class="form-control" placeholder=" Confirm Password" required>
            <label for="txtExpiration">Expiration</label>
        </fieldset>

        

        <fieldset class="text-center">
            <input type="checkbox" id="chkSavePaymentInfo" name="chkSavePaymentInfo">
            <label for="chkSavePaymentInfo">Save Details For Later</label>
        </fieldset>

        <button name="btnOrderSubmit" class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
    </form>
</main>

<?php
    include 'footer.php';
?>