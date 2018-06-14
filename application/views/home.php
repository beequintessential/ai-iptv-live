<?php 
$upload_path = base_url() . 'uploads/testimonials/';
$features_upload_path = base_url() .'uploads/';
?>
<!--==========================
   Intro Section
 ============================-->
<section id="intro">
    <div class="container">
    <div class="intro-content">

        <div class="best_iptv best_iptv-left"><h2>Best IPTV </h2><h4 class="mediun-size-text">Instant IPTV Subscription BuyBest IPTC server</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <a href="#" class="download_mobile_btn">DOWNLOAD MOBILE APP</a> <a href="#" class="download_mobile_btn">DOWNLOAD ANDROID BOX APP</a>
        </div>
        <div class="best_iptv best_iptv-right">
            <iframe src="https://www.youtube.com/embed/yAoLSRbwxL8" width="560" height="345" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
        </div>
    </div>
    </div>
</section><!-- #intro -->
<div id="custom"></div>
<main id="main">
    <section id="services">
        <div class="container">
            <div class="section-header">
                <h2>Welcome To IPTV</h2>
                <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
            </div>

            <div class="row">
                       <?php 
                       if(!empty($feature_details)) {
                           foreach ($feature_details as $feature_detail) {
                       ?>
                <div class="col-lg-4 col-12 col-sm-6">
                    <div class="box wow fadeInLeft">
                        <h4 class="title"><a href=""><?php echo $feature_detail['title']; ?></a></h4>
                        <div class="icon"><img src="<?php echo $features_upload_path.$feature_detail['icon_image'] ?>" alt=""/></div>
                        <p class="description"><?php echo $feature_detail['description']; ?></p>
                    </div>
                </div>
                
                       <?php }}?>

<!--                <div class="col-lg-4 col-12 col-sm-6">
                    <div class="box wow fadeInRight">
                        <h4 class="title"><a href="">Movie VOD</a></h4>
                        <div class="icon"><img src="assets/images/mov.png" alt=""/></div>
                        <p class="description">Minim veniam, quis nostrud exercitation quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-12 col-sm-6">
                    <div class="box wow fadeInLeft" data-wow-delay="0.2s">
                        <h4 class="title"><a href="">Live TV Channels</a></h4>
                        <div class="icon"><img src="assets/images/img7.png" alt=""/></div>
                        <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum esse cillum dolore eu fugiat nulla pariatur trinige zareta lobur trade.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-12 col-sm-6">
                    <div class="box wow fadeInLeft">
                        <h4 class="title"><a href="">TV Series</a></h4>
                        <div class="icon"><img src="assets/images/Programming-Show-Property-icon.png" alt=""/></div>
                        <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident etiro rabeta lingo.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-12 col-sm-6">
                    <div class="box wow fadeInRight">
                        <h4 class="title"><a href="">Sports On-Demand</a></h4>
                        <div class="icon"><img src="assets/images/img_342981.png" alt=""/></div>
                        <p class="description">Minim veniam, quis nostrud exercitation ostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-12 col-sm-6">
                    <div class="box wow fadeInLeft" data-wow-delay="0.2s">
                        <h4 class="title"><a href="">Home Workout Videos</a></h4>
                        <div class="icon"><img src="assets/images/work.png" alt=""/></div>
                        <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse  in voluptate velit esse cillum dolore eu fugiat nulla pariatur trinige zareta lobur trade.</p>
                    </div>
                </div>-->

            </div>

        </div>
    </section><!-- #services -->

    <section id="intro2">
        <div class="container">
            <div class="section-header">
                <h2>Install Guide</h2>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <img class="first_step" src="assets/images/installation.png"/>
                    <h2 class="step_no first_step">1</h2>
                    <h3>Installation</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                </div>
                <div class="col-lg-4">
                    <img class="second_step" src="assets/images/installation.png"/>
                    <h2 class="step_no second_step">2</h2>
                    <h3>Tips</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                </div>
                <div class="col-lg-4">
                    <img src="assets/images/installation.png"/>
                    <h2 class="step_no">3</h2>
                    <h3>Raady to try?</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                </div>
            </div>    
        </div>
    </section>

    <section id="pricing-plans">
        <div class="container">
            <div class="container2">
            <div class="section-header">
                <h2>Pricing Plans</h2>
            </div>
            <div class="row">
                <?php if(!empty($plan_details)) {
                        foreach ($plan_details as $plan_detail) {
                            if($plan_detail['plan_duration'] =='6 Month') {
                ?>
                <div class="col-lg-3 col-sm-6 most-popular">
                    <div class="box wow fadeInLeft most-popular-box" style="visibility: visible; animation-name: fadeInLeft;">
                        <div class="bg-cls-div">
                        <h3 class="h3_bg"><?php  echo $plan_detail['plan_title']; ?></h3>
                        <p>&euro;<?php  echo $plan_detail['plan_price']; ?></p>
                        <h4>For <?php  echo $plan_detail['plan_duration']; ?></h4>
                        </div>
                        <a>GET STARTED</a>
                    </div>
                </div>
                            <?php } else{?>
                <div class="col-lg-3 col-sm-6">
                    <div class="box wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                        <div class="bg-cls-div">
                        <h3 class="h3_without-bg"><?php  echo $plan_detail['plan_title']; ?></h3>
                        <p>&euro;<?php  echo $plan_detail['plan_price']; ?></p>
                        <h4>For <?php  echo $plan_detail['plan_duration']; ?></h4>
                        </div>
                        <a>GET STARTED</a>
                    </div>
                </div>
                <?php }}}?>
<!--                <div class="col-lg-3 col-sm-6">
                    <div class="box wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                        <div class="bg-cls-div">
                        <h3 class="h3_without-bg">1 Month</h3>
                        <p>&euro;18</p>
                        <h4>For 1 Month</h4>
                        </div>
                        <a>GET STARTED</a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="box wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                        <div class="bg-cls-div">
                        <h3 class="h3_without-bg">3 Month</h3>
                        <p>&euro;38</p>
                        <h4>For 1 Month</h4>
                        </div>
                        <a>GET STARTED</a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="box wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                        <div class="bg-cls-div">
                        <h3 class="h3_without-bg">1 Year</h3>
                        <p>&euro;80</p>
                        <h4>For 1 Month</h4>
                        </div>
                        <a>GET STARTED</a>
                    </div>
                </div>-->
            </div>
        </div>
        </div>
    </section>
    <!--==========================
      Testimonials Section
    ============================-->
    <section id="testimonials" class="wow fadeInUp">
        <div class="container">
            <div class="container2">
            <div class="section-header">
                <h2>Testimonials</h2>
<!--                <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>-->
            </div>
            <div class="owl-carousel testimonials-carousel">
                <?php  if(!empty($testi_details)) {
                    foreach($testi_details as $testi_detail) {
                     ?>
                <div class="testimonial-item item">
                    <img src="<?php echo $upload_path . $testi_detail['image']; ?>" class="testimonial-img" alt="">
                    <p><?php echo $testi_detail['description']; ?></p>
                    <img class="testi-custom-cls" src="assets/images/img12.png"  alt="">
                    <h3><?php echo $testi_detail['name']; ?></h3>
                    <h4><?php echo $testi_detail['designation']; ?></h4>
                </div>
                
                <?php }} ?>

<!--                <div class="testimonial-item item">
                    <img src="assets/images/testimonial-3.jpg" class="testimonial-img" alt="">
                    <p>
                        <img src="assets/images/quote-sign-left.png" class="quote-sign-left" alt="">
                        Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                        <img src="assets/images/quote-sign-right.png" class="quote-sign-right" alt="">
                    </p>
                    
                    <img class="testi-custom-cls" src="assets/images/img12.png"  alt="">
                    <h3>Jena Karlis</h3>
                    <h4>Store Owner</h4>
                </div>

                <div class="testimonial-item item">
                    
                    <img src="assets/images/testimonial-4.jpg" class="testimonial-img" alt="">
                    <p>
                        <img src="assets/images/quote-sign-left.png" class="quote-sign-left" alt="">
                        Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                        <img src="assets/images/quote-sign-right.png" class="quote-sign-right" alt="">
                    </p>
                     <img class="testi-custom-cls" src="assets/images/img12.png"  alt="">
                    <h3>Matt Brandon</h3>
                    <h4>Freelancer</h4>
                </div>

                <div class="testimonial-item item">
                     <img src="assets/images/testimonial-5.jpg" class="testimonial-img" alt="">
                    <p>
                        <img src="assets/images/quote-sign-left.png" class="quote-sign-left" alt="">
                        Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                        <img src="assets/images/quote-sign-right.png" class="quote-sign-right" alt="">
                    </p>
                   
                    <img class="testi-custom-cls" src="assets/images/img12.png"  alt="">
                    <h3>John Larson</h3>
                    <h4>Entrepreneur</h4>
                </div>-->

            </div>
</div>
        </div>
    </section><!-- #testimonials -->
    <!--==========================
         Contact Section
       ============================-->
    <section id="contact" class="wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 conatc-left-text">
                    <h3 class="contact-left-sub-text">Get In Touch</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <div class="col-lg-6 contact-rigt-text">
                    <div class="form">
                        <div id="errormessage"></div>
<!--//action="javascript:contact_form_submission();"-->
                        <form action="javascript:contact_form_submission();" method="post" role="form" class="im-contact-form">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-msg="Please enter at least 4 chars" required/>
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" required/>
                                    <div class="validation"></div>
                                </div>
                            <div class="form-group">
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-msg="Please enter phone number" required/>
                                    <div class="validation"></div>
                                </div>
                            <div class="form-group">
                                <textarea class="form-control" name="msg" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validation"></div>
                            </div>
                            <div class="text-center"><button type="submit">Submit</button></div>
                        </form>

                        <div id="sendmessage"></div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- #contact -->
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
    </section><!-- #call-to-action -->
</main>
<script>
    function contact_form_submission() {
        var url = "<?php echo base_url(); ?>user/contactus";
        $.ajax({
            type: "POST",
            url: url,
            data: $(".im-contact-form").serialize(),
            success: function (data) {
                $('#sendmessage').html(data);
                $('#sendmessage').show();
            }
        });
    }
    </script>