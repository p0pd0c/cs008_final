<?php 
    session_start();
    include 'auth_config.php';
    // Check if user is logged in... if not then kick em out
    
    $uid = access_control(FALSE, $pdo);

    // // Send the user back if they try to get here without picking items
    // if(!isset($_SESSION['fldFoodItems'])) {
    //     header('Location: menu.php');
    //     exit;
    // }

    include 'top.php';

    include 'handle_order.inc.php';
    // Top half of my page with meta tags and title, etc... main is opened beforehand
?>
    <form class="container" method="POST" action=<?php print '"' . $phpSelf . '"'; ?>>
        <table class="mt-5">
            <caption>
                Order food from the menu
            </caption>
            <thead>
                <tr>
                    <td></td>
                    <th>Product Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = 'SELECT fldname, fldprice FROM tblMenuItems';
                    
                    foreach ($pdo->query($sql) as $row) {
                        print '<tr>';
                        print '<td>' . '<input type="checkbox" name="chk'. str_replace(' ', '', $row['fldname']) .'">' . '</td>';
                        print '<td>' . $row['fldname'] . '</td>';
                        print '<td>$' . $row['fldprice'] . '</td>';
                        print '</tr>';
                    }
                ?>
            </tbody>
        </table>

    
        <section class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="./ByteBakeryBig.png" alt="Byte Bakery Logo" width="72" height="72">
            <h2>Checkout</h2>
            <p class="lead">Select food items from the table above and enter payment info below.</p>
        </section>

        <section class="row">
            <section class="col-md-4 order-md-2 mb-4">
                <!-- <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <strong class="text-muted">Your cart</strong>
                    <strong class="badge badge-secondary badge-pill"></strong>
                </h4> -->
                <!-- <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <section>
                            <h6 class="my-0">Product name</h6>
                            <small class="text-muted">Brief description</small>
                        </section>
                        <strong class="text-muted">$12</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Total (USD)</strong>
                        <strong>$20</strong>
                    </li>
                </ul> -->
                <section class="card col-md-12">
                    <p class="card-body">All orders must be picked up at our location at 30 University Heights, Burlington, Vermont. All prices, custom orders and otherwise, are non-negotiable. Byte Bakery is not responsible for harm caused by raw or undercooked ingredients. All sales are final. A normal order can be cancelled within 2 days and a catering event can be cancelled within two weeks of the event. You will not get your deposit back. If you have a complaint about our employees and/or service, direct your inquiries to help@bytebakery.com. Byte Bakery is not liable for any physical harm that befalls customers while in or near the vicinity of our establishment. Byte Bakery is not responsible for lost or misplaced items. Please eat responsibly.</p>
                </section>
                
            </section>

            <fieldset class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <fieldset class="needs-validation" novalidate="">
                    <fieldset class="row">
                        <fieldset class="col-md-6 mb-3">
                            <label for="txtFirstName">First name</label>
                            <input type="text" class="form-control" id="txtFirstName" name="txtFirstName" placeholder="" value="" required="">
                            <section class="invalid-feedback">
                                Valid first name is required.
                            </section>
                        </fieldset>
                        <fieldset class="col-md-6 mb-3">
                            <label for="txtLastName">Last name</label>
                            <input type="text" name="txtLastName" class="form-control" id="lastName" placeholder="" value="" required="">
                            <section class="invalid-feedback">
                                Valid last name is required.
                            </section>
                        </fieldset>
                    </fieldset>

                    <fieldset class="mb-3">
                        <label for="email">Email</label>
                        <input name="txtEmail" type="email" class="form-control" id="email" placeholder="you@example.com" required="">
                        <section class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </section>
                    </fieldset>

                    <fieldset class="mb-3">
                        <label for="address">Address</label>
                        <input name="txtAddress" type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                        <section class="invalid-feedback">
                            Please enter your shipping address.
                        </section>
                    </fieldset>

                    <fieldset class="mb-3">
                        <label for="address2">Address 2 <strong class="text-muted">(Optional)</strong></label>
                        <input name="txtAddress2" type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                    </fieldset>

                    <fieldset class="row">
                        <fieldset class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select name="selCountry" class="custom-select d-block w-100" id="country" required="">
                                <option value="">Choose...</option>
                                <option>United States</option>
                            </select>
                            <section class="invalid-feedback">
                                Please select a valid country.
                            </section>
                        </fieldset>
                        <fieldset class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select name="selState" class="custom-select d-block w-100" id="state" required="">
                                <option value="">Choose...</option>
                                <option>Vermont</option>
                            </select>
                            <section class="invalid-feedback">
                                Please provide a valid state.
                            </section>
                        </fieldset>
                        <fieldset class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input name="txtZip" type="text" class="form-control" id="zip" placeholder="" required="">
                            <section class="invalid-feedback">
                                Zip code required.
                            </section>
                        </fieldset>
                    </fieldset>

                    <hr class="mb-4">

                    <h4 class="mb-3">Payment</h4>

                    <fieldset class="d-block my-3">
                        <fieldset class="custom-control custom-radio">
                            <input id="credit" value="credit" name="selCard" type="radio" class="custom-control-input" checked="" required="">
                            <label class="custom-control-label" for="credit">Credit card</label>
                        </fieldset>
                        <fieldset class="custom-control custom-radio">
                            <input id="debit" value="debit" name="selCard" type="radio" class="custom-control-input" required="">
                            <label class="custom-control-label" for="debit">Debit card</label>
                        </fieldset>
                    </fieldset>
                    
                    <fieldset class="row">
                        <fieldset class="col-md-6 mb-3">
                            <label for="cc-name">Name on card</label>
                            <input name="txtFullName" type="text" class="form-control" id="cc-name" placeholder="" required="">
                            <small class="text-muted">Full name as displayed on card</small>
                            <section class="invalid-feedback">
                                Name on card is required
                            </section>
                        </fieldset>
                        <fieldset class="col-md-6 mb-3">
                            <label for="cc-number">Credit card number</label>
                            <input name="txtCredit" type="text" class="form-control" id="cc-number" placeholder="" required="">
                            <section class="invalid-feedback">
                                Credit card number is required
                            </section>
                        </fieldset>
                    </fieldset>

                    <section class="row">
                        <section class="col-md-3 mb-3">
                            <label for="cc-expiration">Expiration</label>
                            <input type="text" name="txtExpiration" class="form-control" id="cc-expiration" placeholder="" required="">
                            <section class="invalid-feedback">
                                Expiration date required
                            </section>
                        </section>
                        <section class="col-md-3 mb-3">
                            <label for="cc-cvv">CVV</label>
                            <input type="text" name="txtCVV" class="form-control" id="cc-cvv" placeholder="" required="">
                            <section class="invalid-feedback">
                                Security code required
                            </section>
                        </section>
                    </section>

                    <hr class="mb-4">

                    <button class="btn btn-primary btn-lg btn-block" name="btnOrderSubmit" type="submit">Continue to checkout</button>
                    <section class="row my-5">
                        <section class="card col-md-12">
                            <p class="card-body">We also take more complicated orders (within reason). Just send us an email at custom@bytebakery.com. We will get back to you in at least one business week about the feasibility and the price of your order as well as when we would have it ready for you. We are open to doing a variety of cakes, pastries and breads. You are welcome to peruse our menu page to view the special delicacies we have designed ourselves!</p>
                        </section>
                        <section class="card col-md-12">
                            <p class="card-body">Do you have an event or party you would like us to cater at? Send us the event information in an email to catering@bytebakery.com as well as what kinds of sweets you’d like. You can also give us a call at 802-345-6789. We’ll get back to you in at least one business week, so make sure you let us know a good amount of time before the event. Costs for an event generally range from $30-$70 per person depending on food choice. This cost will include a $100 deposit paid 2 weeks before the event. Our options for catering can be discussed more in depth in a phone call after contacting us.</p>
                        </section>
                    </section>
                </fieldset>
            </fieldset>
        </section>
    </form>
</main>

<?php
    include 'footer.php';
?>