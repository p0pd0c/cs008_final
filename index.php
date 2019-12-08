<?php
    session_start();
    include 'auth_config.php';
    include 'top.php';
?>
  <section id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1" class=""></li>
      <li data-target="#myCarousel" data-slide-to="2" class=""></li>
    </ol>
    <section class="carousel-inner text-center">
      <section class="carousel-item active">
        <img class="bd-placeholder-img" src="./images/cUVM.jpg" alt="University of Vermont">
        <section class="container">
          <section class="carousel-caption text-right text-light">
            <h1>The best baked goods money can buy</h1>
            <h3 class="text-light">Who wouldn't want a byte?</h3>
            <h3><a class="btn btn-lg btn-primary" href="signup.php" role="button">Sign up and order</a></h3>
          </section>
        </section>
      </section>
      <section class="carousel-item">
        <img class="bd-placeholder-img" src="./images/cUHEIGHTS.jpg" alt="Byte Bakery Location">
        <section class="container">
          <section class="carousel-caption text-right text-light">
            <h1>Serving the local community</h1>
            <h3 class="text-light">Byte Bakery follows a sustainable business model</h3>
            <h3><a class="btn btn-lg btn-primary" href="about.php" role="button">Learn more</a></h3>
          </section>
        </section>
      </section>
      <section class="carousel-item">
        <img class="bg-placeholder-img" src="./images/cKitchen.png" alt="Our kitchen">
        <section class="container">
          <section class="carousel-caption text-right text-dark">
            <h1 class="text-light">Organic... from farm, to you</h1>
            <h3 class="text-light">Take a look at what we have to offer.</h3>
            <h3><a class="btn btn-lg btn-primary" href="menu.php" role="button">Browse Menu</a></h3>
          </section>
        </section>
      </section>
    </section>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <strong class="carousel-control-prev-icon" aria-hidden="true"></strong>
      <strong class="sr-only">Previous</strong>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <strong class="carousel-control-next-icon" aria-hidden="true"></strong>
      <strong class="sr-only">Next</strong>
    </a>
  </section>
  <section class="p-5 mt-5 row">
    <section class="col-md-8">
      <hr class="my-4" />
      <h1>What are we?</h1>
      <p>A computer themed bakery? You bet! The Byte Bakery has been dedicated to providing a unique pastry experience since 2019. Our mission is to strive to achieve a great taste while still providing a visually appealing product. Check out our menu page to view our special dishes, and if you take any interest, create an account with us and head over to the store page where you can place an order to pickup. Share your Byte Bakery experience by posting a photo of your time there on our gallery page.</p>
      <hr class="my-4" />
      <h3>Who are we?</h3>
      <p>The Byte Bakery was founded by Jared DiScipio and Ben Smith, who both majored in computer science in college. They both shared a love for baking and coding, and wanted to find a way to incorporate both of these into their work. Thus, the Byte Bakery was born! Mixing themes and imagery from the world of computer science with their sweet pastries, they were able to create niche delicacies that like-minded techies could enjoy. Read more on our <a href="about.php" >About Us</a> page!</p>
    </section>
    <section class="col-md-4">
      <h2>Location, Catering, Contact Info</h2>
      <p>We are located at 30 University Heights, Burlington VA. We are open from 9 am to 5 pm from Monday through Friday. Give us a call at 802-345-6789 or an email at contact@bytebakery.com.</p>
      <p>Interested in having us cater for your event? Send us the event information in an email to catering@bytebakery.com as well as what kinds of sweets you’d like. Read more about catering options on our store page.</p>
    </section>
  </section>
</main>

<?php
    include 'footer.php';
?>

