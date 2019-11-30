<?php 
    include 'auth_config.php';
    include 'top.php';
    include 'handle_login.inc.php';
?>
    <form class="form-signin align-self-center" method="POST" action=<?php print '"' . $phpSelf . '"'; ?>>
        <section class="text-center mb-4">
            <!-- REPLACE W/ Bytebakery logo: img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72" -->
            <h1 class="mb-3 font-weight-normal">Sign In</h1>
            <p>You must sign in in order to access this part of the site</p>
        </section>

        <fieldset class="form-label-group">
            <input name="txtEmail" id="txtEmail" class="form-control" placeholder="Email address" required autofocus="">
            <label for="txtEmail">Email address</label>
        </fieldset>

        <fieldset class="form-label-group">
            <input name="txtPassword" type="password" id="txtPassword" class="form-control" placeholder="Password" required>
            <label for="txtPassword">Password</label>
        </fieldset>

        <fieldset class="text-center">
            <!-- Google returns a div inside the following section... there is no way around this (out of my control), unless I do not use google reCaptcha... -->
            <section class="g-recaptcha d-inline-block" data-size="compact" data-theme="dark" data-sitekey="6LcCF8MUAAAAANfIE-fFkTtErfMPMIVfBVn-mwMw"></section>
        </fieldset>

        <fieldset class="text-center">
            <input type="checkbox" id="chkRequired" name="chkRequired">
            <label for="chkRequired">Remember Me</label>
        </fieldset>

        <button name="btnSubmit" id="btnSubmit" class="btn btn-lg btn-primary btn-block mb-3" type="submit">Sign in</button>

        <section class="text-center">
            <h4 class="mb-2 font-weight-normal">Don't have an account?</h4>
            <a id="btnSignUp" class="btn btn-sm btn-secondary btn-block" href="signup.php">Sign Up</a>
        </section>        
    </form>
</main>

<script src='https://www.google.com/recaptcha/api.js'></script>

<?php
    include 'footer.php';