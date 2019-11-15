<?php 
    include 'top.php';
?>
    <form class="form-signin" method="POST" action=<?php print $phpSelf; ?>>
        <section class="text-center mb-4">
            <!-- REPLACE W/ Bytebakery logo: img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72" -->
            <h1 class="h3 mb-3 font-weight-normal">Sign In</h1>
            <p>You must sign in in order to access this part of the site</p>
        </section>

        <section class="form-label-group">
            <input id="txtEmail" class="form-control" placeholder="Email address" required="" autofocus="">
            <label for="txtEmail">Email address</label>
        </section>

        <section class="form-label-group">
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
            <label for="inputPassword">Password</label>
        </section>

        <section class="checkbox mb-3">
            <label>
            <input type="checkbox" value="remember-me"> Remember me
            </label>
        </section>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</main>

<?php
    include 'footer.php';