<?php
    include 'auth_config.php';
    include 'top.php';
    include 'handle_signup.inc.php';
?>

    <form class="form-signin align-self-center" method="POST" action=<?php print '"' . $phpSelf . '"'; ?>>
        <section class="text-center mb-4">
            <!-- REPLACE W/ Bytebakery logo: img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72" -->
            <h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>
            <p>In order to participate, you must first sign up</p>
        </section>

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
            <!-- Google returns a div inside the following section... there is no way around this (out of my control), unless I do not use google reCaptcha... -->
            <section class="g-recaptcha d-inline-block" data-size="compact" data-theme="dark" data-sitekey="6LcCF8MUAAAAANfIE-fFkTtErfMPMIVfBVn-mwMw"></section>
        </fieldset>

        <fieldset class="text-center">
            <input type="checkbox" id="chkRequired" name="chkRequired">
            <label for="chkRequired">Remember Me</label>
        </fieldset>

        <button name="btnSignUpSubmit" class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
    </form>
</main>

<script src='https://www.google.com/recaptcha/api.js'></script>

<?php
    include 'footer.php';