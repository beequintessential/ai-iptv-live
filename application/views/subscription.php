<section id="select_payment">
        <div class="container">
            <div class="row">
                <p class="cta-text">Select Payment Method</p>
            </div>
        </div>
</section>
<section class="subscription_pre">
    <div class="container">
        <div class="row">
        <div class="col-lg-3 col-sm-6 payment_options">
            <p>CREDIT CARD</p>
            <a class="visa"><img src="<?php echo base_url();?>assets/images/visa.png"/></a>
        </div>
        <div class="col-lg-3 col-sm-6 payment_options">
            <p class="paypal">PAYPAL</p>
            <a class="Paypal"><img src="<?php echo base_url();?>assets/images/paypal.png"/></a>
        </div>
        <div class="col-lg-3 col-sm-6 payment_options">
            <p>OFFLINE CHECKOUT</p>
            <a class="offline_checkout"><img src="<?php echo base_url();?>assets/images/offline.png"/></a>
        </div>
        <div class="col-lg-3 col-sm-6  payment_options">
            <p style="margin-bottom: 25px;">OTHERS <span class="dashicons dashicons-arrow-down"></span></p>
            <a class="other_options"><img src="<?php echo base_url();?>assets/images/other.png"/></a>
        </div>
        </div>
    </div>
</section>
<section class="subcription_form">
    <div class="container">
        <h2>Billing Information</h2>
        <div class="form">
            <form action="" method="post" role="form" class="contactForm">
                <div  class="row">
                    <div class="form-group col-md-4">
                        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" data-msg="Please enter first name" />
                        <div class="validation"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" data-msg="Please enter last name" />
                        <div class="validation"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" name="email" class="form-control" id="email" placeholder="Email"  data-msg="Please enter email" />
                        <div class="validation"></div>
                    </div>
                </div>
                <div  class="row">
                    <div class="form-group col-md-4">
                        <input type="text" name="confirm_email" class="form-control" id="confirm_email" placeholder="Confirm Email" data-msg="Please re-enter email" />
                        <div class="validation"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" name="address" class="form-control" id="last_name" placeholder="Address"  data-msg="Please enter address" />
                        <div class="validation"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" name="city" class="form-control" id="city" placeholder="City" data-msg="Please enter city" />
                        <div class="validation"></div>
                    </div>
                </div>
                <div  class="row">
                    <div class="form-group col-md-4">
                        <input type="text" name="postel_code" class="form-control" id="name" placeholder="Your Name"  data-msg="Please enter at least 4 chars" />
                        <div class="validation"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <select class="form-control">
                            <option>Country</option>
                            <option>Country</option>
                            <option>Country</option>
                            <option>Country</option>
                            <option>Country</option>
                        </select>
<!--                        <input type="text" name="country" class="form-control" id="name" placeholder="Your Name"  data-msg="Please enter at least 4 chars" />-->
                        <div class="validation"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <select class="form-control">
                            <option>State</option>
                            <option>State</option>
                            <option>State</option>
                            <option>State</option>
                            <option>State</option>
                            <option>State</option>
                        </select>
<!--                        <input type="text" name="state" class="form-control" id="name" placeholder="Your Name"  data-msg="Please enter at least 4 chars" />-->
                        <div class="validation"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <input type="checkbox" name="name" class="form-control checkbox"/><p>Check if you are a company</p>
                    <div class="validation"></div>
                </div>
                </div>
            </form>
        </div>
    </div>
</section>
<section class="subcription_payment_options">
    <div class="container">
        <h3>Payment Options</h3>
        <div class="row">
            <div class="form-group col-lg-6 col-12">
                <label>Card Number*</label>
                <input type="text" name="name" class="form-control" id="name"  data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-2 col-sm-4">
                <label>Card Expiration date*</label>
                <select class="form-control" style="height: 50px;">
                    <option>Month</option>
                    <option>Jan</option>
                    <option>Feb</option>
                    <option>Wed</option>
                    <option>Thu</option>
                </select>
<!--                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"  data-msg="Please enter at least 4 chars" />-->
                <div class="validation"></div>
            </div>
            <div class="form-group col-lg-2 col-sm-4" style="margin-top: 32px;">
                <select class="form-control" style="height:50px">
                    <option>Year</option>
                    <option>2009</option>
                    <option>2010</option>
                    <option>2011</option>
                </select>
<!--                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"  data-msg="Please enter at least 4 chars" />-->
                <div class="validation"></div>
            </div>
            <div class="form-group col-lg-2 col-sm-4">
                <label>CVV2/CVC2</label>
                <input type="text" name="name" class="form-control" id="name"  data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6 col-12"><p><img src="<?php echo  base_url();?>assets/images/sequarity.png"/> Your payment is securely processed by our partner, Avangate.Who is avangate?</p></div>
        </div>
        <div class="row">
            <div class="form-group submit_btn col-lg-6 col-12">
                <input type="submit" class="btn"   name="submit" value="SUBMIT"/>
            </div>
        </div>
    </div>
</section>
<section id="call-to-action" class="wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 text-center text-lg-left">
                    <h3 class="cta-title">Create the trial account now</h3>
                    <p class="cta-text">If you don't know how to create the trial account, you can read more in here.</p>
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle" href="#">CLICK HERE</a>
                </div>
            </div>
    </div>
    </section>
