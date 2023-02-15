<?php get_header(); ?>
    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/background/footer-bg-1-1.jpg);"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2 class="page-header__title">contact us</h2><!-- /.page-header__title -->
        </div><!-- /.container -->
    </section>
    <section class="contact-one">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shapes/fish-contact-1.png" class="contact-one__fish" alt="">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shapes/tree-contact-1.png" class="contact-one__tree" alt="">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shapes/swimmer-contact-1.png" class="contact-one__swimmer" alt="">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="contact-one__content">
                        <h3> <?php echo !empty( get_post_meta(get_the_ID(), 'contact_form_title', true) ) ? get_post_meta(get_the_ID(), 'contact_form_title', true) : 'Get In Toutch' ?> </h3>
                        <p> <?php echo !empty( get_post_meta(get_the_ID(), 'contact_form_desc', true) ) ? get_post_meta(get_the_ID(), 'contact_form_desc', true) : '' ?> </p>
                        <div class="footer-widget__social contact-one__social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div><!-- /.contact-one__social -->
                    </div><!-- /.contact-one__content -->
                </div><!-- /.col-xl-4 -->
                <div class="col-xl-8">
                    <form action="<?php echo get_stylesheet_directory_uri(); ?>/assets/inc/sendemail.php" class="contact-one__form contact-form-validated" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" placeholder="Full Name" name="name">
                            </div><!-- /.col-md-6 -->
                            <div class="col-md-6">
                                <input type="text" placeholder="Email Address" name="email">
                            </div><!-- /.col-md-6 -->
                            <div class="col-md-6">
                                <input type="text" placeholder="Phone number" name="phone">
                            </div><!-- /.col-md-6 -->
                            <div class="col-md-6">
                                <div class="dropdown bootstrap-select"><select class="selectpicker" name="service" tabindex="-98">
                                        <option value="">Discussion For</option>
                                        <option value="About Course">Query For Courses</option>
                                        <option value="About Pricing">Query For Pricing</option>
                                    </select><button type="button" class="btn dropdown-toggle bs-placeholder btn-light" data-toggle="dropdown" role="button" title="Discussion For"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Discussion For</div></div> </div></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                            </div><!-- /.col-md-6 -->
                            <div class="col-md-12">
                                <input type="text" placeholder="Subject" name="subject">
                            </div><!-- /.col-md-12 -->
                            <div class="col-md-12">
                                <textarea name="message" placeholder="Messages"></textarea>
                            </div><!-- /.col-md-12 -->
                            <div class="col-md-12">
                                <button type="submit" class="thm-btn contact-one__btn">Send message</button>
                            </div><!-- /.col-md-12 -->
                        </div><!-- /.row -->
                    </form><!-- /.contact-one__form -->
                    <div class="result"></div><!-- /.result -->
                </div><!-- /.col-xl-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

    <br><br/>
    <br><br/>
    <br><br/>
    <section class="cta-one">
        <div class="container wow fadeInRight" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInRight;">
            <div class="cta-one__title">support</div><!-- /.cta-one__title -->
            <div class="inner-container">
                <div class="row">
                    <div class="col-lg-5 d-flex">
                        <div class="my-auto">
                            <div class="cta-one__phone">
                                <i class="fa fa-phone-alt"></i>
                                <a href="tel:666-888-0000">666 888 0000</a>
                            </div><!-- /.cta-one__phone -->
                        </div><!-- /.my-auto -->
                    </div><!-- /.col-lg-5 -->
                    <div class="col-lg-7">
                        <div class="cta-one__content">
                            <h3>FOR MORE INFORMATION &amp; CUSTOM <br>
                                PLANS PLEASE CALL</h3>
                        </div><!-- /.cta-one__content -->
                    </div><!-- /.col-lg-7 -->
                </div><!-- /.row -->
            </div><!-- /.inner-container -->
        </div><!-- /.container -->
    </section>



    <br><br/>
    <br><br/>
    <br><br/>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd" class="google-map__contact" allowfullscreen=""></iframe>






























<?php get_footer(); ?>