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
            <input name="txtUsername" id="txtUsername" class="form-control" placeholder="Username" required>
            <label for="txtUsername">Username</label>
        </fieldset>

        <fieldset class="form-label-group">
            <input name="txtEmail" id="txtEmail" class="form-control" placeholder="Email address" required>
            <label for="txtEmail">Email address</label>
        </fieldset>

        <fieldset class="form-label-group">
            <input name="txtPassword" type="password" id="txtPassword" class="form-control" placeholder="Password" required>
            <label for="txtPassword">Password</label>
        </fieldset>

        <fieldset class="form-label-group">
            <input name="txtConfirmPassword" type="password" id="txtConfirmPassword" class="form-control" placeholder=" Confirm Password" required>
            <label for="txtConfirmPassword">Confirm Password</label>
        </fieldset>

        

        <fieldset class="text-center">
            <input type="checkbox" id="chkRememberMe" name="chkRememberMe">
            <label for="chkRememberMe">Remember Me</label>
        </fieldset>

        <button name="btnOrderSubmit" class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
    </form>
</main>

<?php
    include 'footer.php';
?>