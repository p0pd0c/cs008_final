<?php
    session_start();
    include 'auth_config.php';
    include 'top.php';
?>
    <section class="mt-5 p-5 row featurette bg-dark text-light">
        <section class="col-md-7">
            <p>The Byte Bakery was founded by Jared DiScipio and Ben Smith, who both majored in computer science in college. They both shared a love for baking and coding, and wanted to find a way to incorporate both of these into their work. Thus, the Byte Bakery was born! Mixing themes and imagery from the world of computer science with their sweet pastries, they were able to create niche delicacies that like-minded techies could enjoy. Ben and Jared still run the bakery today, and they even coded this website! As of now, all of our menu items were thought up by our staff members, but now we want to know what you think; the menu includes a plethora of options and its growing by the day!</p>
        </section>
        <figure class="col-md-5">
            <img src="./images/ben.png" alt="Ben Smith, UI UX Designer">
        </figure>
    </section>

    <section class=" p-5 row featurette bg-dark text-light">
        <figure class="col-md-5">
            <img src="./images/jared.png" alt="A random pic">
        </figure>
        <section class="col-md-7">
            <p>The bakery started small, but now their business is thriving, and they’re even looking to expand to other locations. Right now, you can find us at our main location at 30 University Heights, Burlington, Vermont, but keep on the lookout, because we might come to your town next. We’re happy to provide sweets for you party, event, or even just to satisfy your sweet tooth for an afternoon. Just drop in and say hi, or check out our menu page and place an order with us!</p>
        </section>
    </section>

    <hr class="featurette-divider">

    <h2 class="text-center">Thank You and Stay In Touch</h2>
    <section class="p-5 row">
        <p class="col-md-6">If you want to keep updated with what’s going on with us here at Byte Bakery, just head over to the Sign Up page and create an account with us to join our email list. You’ll also gain access to our store page where you can order some of our fine delicacies to be picked up.</p>
        <p class="col-md-6">The Byte Bakery can’t wait to bring you more sweet treats in our signature “byte” style! Whatever reason you have, birthday, office celebration, or just to treat yourself, we’ll be happy you stopped by.</p>
    </section>

    <hr class="featurette-divider">
</main>
<?php
    include 'footer.php';
?>