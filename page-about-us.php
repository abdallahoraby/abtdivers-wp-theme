<?php get_header(); ?>


    <div class="page-wrapper">

        <section class="page-header">
            <div class="page-header__bg" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/background/footer-bg-1-1.jpg);"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <h2 class="page-header__title"><?php echo the_title(); ?></h2><!-- /.page-header__title -->
            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <section class="feature-two">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="000ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                        <div class="feature-two__single">
                            <div class="feature-two__image">
                                <?php
                                    $section01_column01_image = !empty( get_post_meta(get_the_ID(), 'section01_column01_image', true)) ? wp_get_attachment_image_url( get_post_meta(get_the_ID(), 'section01_column01_image', true), 'full') : '';
                                    $section01_column01_title = !empty( get_post_meta(get_the_ID(), 'section01_column01_title', true)) ? get_post_meta(get_the_ID(), 'section01_column01_title', true) : '';
                                    $section01_column01_desc = !empty( get_post_meta(get_the_ID(), 'section01_column01_desc', true)) ? get_post_meta(get_the_ID(), 'section01_column01_desc', true) : '';

                                ?>
                                <img src="<?php echo $section01_column01_image; ?>" alt="">
                            </div><!-- /.feature-two__image -->
                            <div class="feature-two__content">
                                <h3><a href=""><?php echo $section01_column01_title; ?></a></h3>
                                <p><?php echo $section01_column01_desc; ?></p>
                            </div><!-- /.feature-two__content -->
                        </div><!-- /.feature-two__single -->
                    </div><!-- /.col-lg-4 -->

                    <div class="col-lg-4 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="000ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                        <div class="feature-two__single">
                            <div class="feature-two__image">
                                <?php
                                $section01_column02_image = !empty( get_post_meta(get_the_ID(), 'section01_column02_image', true)) ? wp_get_attachment_image_url( get_post_meta(get_the_ID(), 'section01_column02_image', true), 'full') : '';
                                $section01_column02_title = !empty( get_post_meta(get_the_ID(), 'section01_column02_title', true)) ? get_post_meta(get_the_ID(), 'section01_column02_title', true) : '';
                                $section01_column02_desc = !empty( get_post_meta(get_the_ID(), 'section01_column02_desc', true)) ? get_post_meta(get_the_ID(), 'section01_column02_desc', true) : '';

                                ?>
                                <img src="<?php echo $section01_column02_image; ?>" alt="">
                            </div><!-- /.feature-two__image -->
                            <div class="feature-two__content">
                                <h3><a href=""><?php echo $section01_column02_title; ?></a></h3>
                                <p><?php echo $section01_column02_desc; ?></p>
                            </div><!-- /.feature-two__content -->
                        </div><!-- /.feature-two__single -->
                    </div><!-- /.col-lg-4 -->

                    <div class="col-lg-4 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="000ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                        <div class="feature-two__single">
                            <div class="feature-two__image">
                                <?php
                                $section01_column03_image = !empty( get_post_meta(get_the_ID(), 'section01_column03_image', true)) ? wp_get_attachment_image_url( get_post_meta(get_the_ID(), 'section01_column03_image', true), 'full') : '';
                                $section01_column03_title = !empty( get_post_meta(get_the_ID(), 'section01_column03_title', true)) ? get_post_meta(get_the_ID(), 'section01_column03_title', true) : '';
                                $section01_column03_desc = !empty( get_post_meta(get_the_ID(), 'section01_column03_desc', true)) ? get_post_meta(get_the_ID(), 'section01_column03_desc', true) : '';

                                ?>
                                <img src="<?php echo $section01_column03_image; ?>" alt="">
                            </div><!-- /.feature-two__image -->
                            <div class="feature-two__content">
                                <h3><a href=""><?php echo $section01_column03_title; ?></a></h3>
                                <p><?php echo $section01_column03_desc; ?></p>
                            </div><!-- /.feature-two__content -->
                        </div><!-- /.feature-two__single -->
                    </div><!-- /.col-lg-4 -->


                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.feature-two -->

        <section class="about-two">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex about-two__content-wrapper">
                        <div class="my-auto">
                            <div class="about-two__content">
                                <div class="block-title text-left">

                                    <?php
                                        $section02_image = !empty( get_post_meta(get_the_ID(), 'section02_image', true)) ? wp_get_attachment_image_url( get_post_meta(get_the_ID(), 'section02_image', true), 'full') : '';
                                        $section02_title = !empty( get_post_meta(get_the_ID(), 'section02_title', true)) ? get_post_meta(get_the_ID(), 'section02_title', true) : '';
                                        $section02_desc = !empty( get_post_meta(get_the_ID(), 'section02_desc', true)) ? get_post_meta(get_the_ID(), 'section02_desc', true) : '';

                                    ?>

                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shapes/sec-line-1.png" alt="">

                                    <h3 class="text-uppercase"> <?php echo $section02_title; ?> </h3>
                                </div><!-- /.block-title -->
                                <p> <?php echo $section02_desc; ?> </p>

                            </div><!-- /.about-two__content -->
                        </div><!-- /.my-auto -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="about-two__image wow fadeInRight" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInRight;">
                            <img src="<?php echo $section02_image; ?>" alt="">
                        </div><!-- /.about-two__image -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.about-two -->

        <section class="video-one">
            <div class="video-one__bg" style="background-image: url(assets/images/background/video-bg-2-1.jpg);"></div>
            <!-- /.video-one__bg -->
            <div class="container text-center">
                <a href="https://www.youtube.com/watch?v=7rQe_Q4FkaY" class="video-popup"><i class="fa fa-play"></i></a>
                <!-- /.video-popup -->
                <h3>Under every rock, around every <br> reef, a new discovery <span>awaits</span></h3>
            </div><!-- /.container -->
        </section><!-- /.video-one -->

        <section class="funfact-one">
            <div class="container">
                <div class="funfact-one__title">Fun facts</div><!-- /.funfact-one__title -->
                <div class="inner-container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="funfact-one__single">
                                <div class="funfact-one__count counter">3069</div><!-- /.funfact-one__count -->
                                <div class="funfact-one__content">
                                    <h3>trained <br> Swimmers</h3>
                                </div><!-- /.funfact-one__content -->
                            </div><!-- /.funfact-one__single -->
                        </div><!-- /.col-lg-3 col-md-6 -->
                        <div class="col-lg-3 col-md-6">
                            <div class="funfact-one__single">
                                <div class="funfact-one__count counter">8620</div><!-- /.funfact-one__count -->
                                <div class="funfact-one__content">
                                    <h3>satisfied <br>
                                        customers</h3>
                                </div><!-- /.funfact-one__content -->
                            </div><!-- /.funfact-one__single -->
                        </div><!-- /.col-lg-3 col-md-6 -->
                        <div class="col-lg-3 col-md-6">
                            <div class="funfact-one__single">
                                <div class="funfact-one__count counter">7700</div><!-- /.funfact-one__count -->
                                <div class="funfact-one__content">
                                    <h3>Professional <br> trainers</h3>
                                </div><!-- /.funfact-one__content -->
                            </div><!-- /.funfact-one__single -->
                        </div><!-- /.col-lg-3 col-md-6 -->
                        <div class="col-lg-3 col-md-6">
                            <div class="funfact-one__single">
                                <div class="funfact-one__count counter">3610</div><!-- /.funfact-one__count -->
                                <div class="funfact-one__content">
                                    <h3>trained <br> diver</h3>
                                </div><!-- /.funfact-one__content -->
                            </div><!-- /.funfact-one__single -->
                        </div><!-- /.col-lg-3 col-md-6 -->
                    </div><!-- /.row -->
                </div><!-- /.inner-container -->
            </div><!-- /.container -->
        </section><!-- /.funfact-one -->

        <section class="testimonials-one__title">
            <div class="testimonials-one__bg" style="background-image: url(assets/images/shapes/water-wave-bg.png);"></div>
            <!-- /.testimonials-one__bg -->
            <div class="container">
                <div class="block-title text-center">
                    <img src="assets/images/shapes/sec-line-1.png" alt="">
                    <p class="text-uppercase">Testimonials</p>
                    <h3 class="text-uppercase">What they say</h3>
                </div><!-- /.block-title -->
            </div><!-- /.container -->
        </section><!-- /.testimonials-one__title -->


        <section class="testimonials-one__carousel-wrapper">
            <div class="container wow fadeIn" data-wow-duration="2000ms" style="visibility: visible; animation-duration: 2000ms; animation-name: fadeIn;">
                <div class="testimonials-one__carousel owl-carousel owl-theme thm__owl-carousel thm__owl-dot-2 owl-loaded owl-drag" data-options="{&quot;items&quot;: 3, &quot;margin&quot;: 30, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 5000, &quot;autoplayHoverPause&quot;: true, &quot;smartSpeed&quot;: 700, &quot;responsive&quot;: {&quot;0&quot;: {&quot;items&quot;: 1, &quot;dots&quot;: false, &quot;nav&quot;: true}, &quot;480&quot;: {&quot;items&quot;: 1, &quot;dots&quot;: false, &quot;nav&quot;: true}, &quot;767&quot;: {&quot;items&quot;: 1, &quot;dots&quot;: false, &quot;nav&quot;: true}, &quot;991&quot;: {&quot;items&quot;: 2}, &quot;1199&quot;: {&quot;items&quot;: 3, &quot;margin&quot;: 30}}}">
                    <!-- /.item -->
                    <!-- /.item -->
                    <!-- /.item -->
                    <!-- /.item -->
                    <!-- /.item -->
                    <!-- /.item -->
                    <!-- /.item -->
                    <!-- /.item -->
                    <!-- /.item -->
                    <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-3600px, 0px, 0px); transition: all 0.7s ease 0s; width: 7600px;"><div class="owl-item cloned" style="width: 370px; margin-right: 30px;"><div class="item">
                                    <div class="testimonials-one__single">
                                        <div class="testimonials-one__content">
                                            <div class="testimonials-one__content-inner">
                                                <div class="testimonials-one__qoute"></div><!-- /.testimonials-one__qoute -->
                                                <p>This is due to their excellent service, competitive pricing and customer support. It’s
                                                    throughly refresing to get new such a personal touch.
                                                </p>
                                                <div class="testimonials-one__infos">
                                                    <div class="testimonials-one__image">
                                                        <div class="testimonials-one__image-inner">
                                                            <img src="assets/images/resources/testi-1-1.jpg" alt="">
                                                        </div><!-- /.testimonials-one__image-inner -->
                                                    </div><!-- /.testimonials-one__image -->
                                                    <div class="testimonials-one__infos-content">
                                                        <h3>Marion Price</h3>
                                                        <span>Swimmer</span>
                                                    </div><!-- /.testimonials-one__infos-content -->
                                                </div><!-- /.testimonials-one__infos -->
                                            </div><!-- /.testimonials-one__content-inner -->
                                        </div><!-- /.testimonials-one__content -->
                                    </div><!-- /.testimonials-one__single -->
                                </div></div><div class="owl-item cloned" style="width: 370px; margin-right: 30px;"><div class="item">
                                    <div class="testimonials-one__single">
                                        <div class="testimonials-one__content">
                                            <div class="testimonials-one__content-inner">
                                                <div class="testimonials-one__qoute"></div><!-- /.testimonials-one__qoute -->
                                                <p>I was very impresed by the Scubo diving service, lorem ipsum is simply free text used by
                                                    copytyping.</p>
                                                <div class="testimonials-one__infos">
                                                    <div class="testimonials-one__image">
                                                        <div class="testimonials-one__image-inner">
                                                            <img src="assets/images/resources/testi-1-2.jpg" alt="">
                                                        </div><!-- /.testimonials-one__image-inner -->
                                                    </div><!-- /.testimonials-one__image -->
                                                    <div class="testimonials-one__infos-content">
                                                        <h3>Lou Morrison</h3>
                                                        <span>Swimmer</span>
                                                    </div><!-- /.testimonials-one__infos-content -->
                                                </div><!-- /.testimonials-one__infos -->
                                            </div><!-- /.testimonials-one__content-inner -->
                                        </div><!-- /.testimonials-one__content -->
                                    </div><!-- /.testimonials-one__single -->
                                </div></div><div class="owl-item cloned" style="width: 370px; margin-right: 30px;"><div class="item">
                                    <div class="testimonials-one__single">
                                        <div class="testimonials-one__content">
                                            <div class="testimonials-one__content-inner">
                                                <div class="testimonials-one__qoute"></div><!-- /.testimonials-one__qoute -->
                                                <p>This is due to their excellent service, competitive pricing and customer support. It’s
                                                    throughly refresing to get new such a personal touch.
                                                </p>
                                                <div class="testimonials-one__infos">
                                                    <div class="testimonials-one__image">
                                                        <div class="testimonials-one__image-inner">
                                                            <img src="assets/images/resources/testi-1-3.jpg" alt="">
                                                        </div><!-- /.testimonials-one__image-inner -->
                                                    </div><!-- /.testimonials-one__image -->
                                                    <div class="testimonials-one__infos-content">
                                                        <h3>Hunter Marsh</h3>
                                                        <span>Swimmer</span>
                                                    </div><!-- /.testimonials-one__infos-content -->
                                                </div><!-- /.testimonials-one__infos -->
                                            </div><!-- /.testimonials-one__content-inner -->
                                        </div><!-- /.testimonials-one__content -->
                                    </div><!-- /.testimonials-one__single -->
                                </div></div><div class="owl-item cloned" style="width: 370px; margin-right: 30px;"><div class="item">
                                    <div class="testimonials-one__single">
                                        <div class="testimonials-one__content">
                                            <div class="testimonials-one__content-inner">
                                                <div class="testimonials-one__qoute"></div><!-- /.testimonials-one__qoute -->
                                                <p>I was very impresed by the Scubo diving service, lorem ipsum is simply free text used by
                                                    copytyping.</p>
                                                <div class="testimonials-one__infos">
                                                    <div class="testimonials-one__image">
                                                        <div class="testimonials-one__image-inner">
                                                            <img src="assets/images/resources/testi-1-4.jpg" alt="">
                                                        </div><!-- /.testimonials-one__image-inner -->
                                                    </div><!-- /.testimonials-one__image -->
                                                    <div class="testimonials-one__infos-content">
                                                        <h3>Jesse Buchanan</h3>
                                                        <span>Swimmer</span>
                                                    </div><!-- /.testimonials-one__infos-content -->
                                                </div><!-- /.testimonials-one__infos -->
                                            </div><!-- /.testimonials-one__content-inner -->
                                        </div><!-- /.testimonials-one__content -->
                                    </div><!-- /.testimonials-one__single -->
                                </div></div><div class="owl-item cloned" style="width: 370px; margin-right: 30px;"><div class="item">
                                    <div class="testimonials-one__single">
                                        <div class="testimonials-one__content">
                                            <div class="testimonials-one__content-inner">
                                                <div class="testimonials-one__qoute"></div><!-- /.testimonials-one__qoute -->
                                                <p>This is due to their excellent service, competitive pricing and customer support. It’s
                                                    throughly refresing to get new such a personal touch.
                                                </p>
                                                <div class="testimonials-one__infos">
                                                    <div class="testimonials-one__image">
                                                        <div class="testimonials-one__image-inner">
                                                            <img src="assets/images/resources/testi-1-1.jpg" alt="">
                                                        </div><!-- /.testimonials-one__image-inner -->
                                                    </div><!-- /.testimonials-one__image -->
                                                    <div class="testimonials-one__infos-content">
                                                        <h3>Helena Dawson</h3>
                                                        <span>Swimmer</span>
                                                    </div><!-- /.testimonials-one__infos-content -->
                                                </div><!-- /.testimonials-one__infos -->
                                            </div><!-- /.testimonials-one__content-inner -->
                                        </div><!-- /.testimonials-one__content -->
                                    </div><!-- /.testimonials-one__single -->
                                </div></div><div class="owl-item" style="width: 370px; margin-right: 30px;"><div class="item">
                                    <div class="testimonials-one__single">
                                        <div class="testimonials-one__content">
                                            <div class="testimonials-one__content-inner">
                                                <div class="testimonials-one__qoute"></div><!-- /.testimonials-one__qoute -->
                                                <p>I don’t know what else to say, this is something you have never seen before.</p>
                                                <div class="testimonials-one__infos">
                                                    <div class="testimonials-one__image">
                                                        <div class="testimonials-one__image-inner">
                                                            <img src="assets/images/resources/testi-1-1.jpg" alt="">
                                                        </div><!-- /.testimonials-one__image-inner -->
                                                    </div><!-- /.testimonials-one__image -->
                                                    <div class="testimonials-one__infos-content">
                                                        <h3>Edwin Walsh</h3>
                                                        <span>Swimmer</span>
                                                    </div><!-- /.testimonials-one__infos-content -->
                                                </div><!-- /.testimonials-one__infos -->
                                            </div><!-- /.testimonials-one__content-inner -->
                                        </div><!-- /.testimonials-one__content -->
                                    </div><!-- /.testimonials-one__single -->
                                </div></div><div class="owl-item" style="width: 370px; margin-right: 30px;"><div class="item">
                                    <div class="testimonials-one__single">
                                        <div class="testimonials-one__content">
                                            <div class="testimonials-one__content-inner">
                                                <div class="testimonials-one__qoute"></div><!-- /.testimonials-one__qoute -->
                                                <p>This is due to their excellent service, competitive pricing and customer support. It’s
                                                    throughly refresing to get new such a personal touch. </p>
                                                <div class="testimonials-one__infos">
                                                    <div class="testimonials-one__image">
                                                        <div class="testimonials-one__image-inner">
                                                            <img src="assets/images/resources/testi-1-2.jpg" alt="">
                                                        </div><!-- /.testimonials-one__image-inner -->
                                                    </div><!-- /.testimonials-one__image -->
                                                    <div class="testimonials-one__infos-content">
                                                        <h3>Joel Moore</h3>
                                                        <span>Swimmer</span>
                                                    </div><!-- /.testimonials-one__infos-content -->
                                                </div><!-- /.testimonials-one__infos -->
                                            </div><!-- /.testimonials-one__content-inner -->
                                        </div><!-- /.testimonials-one__content -->
                                    </div><!-- /.testimonials-one__single -->
                                </div></div><div class="owl-item" style="width: 370px; margin-right: 30px;"><div class="item">
                                    <div class="testimonials-one__single">
                                        <div class="testimonials-one__content">
                                            <div class="testimonials-one__content-inner">
                                                <div class="testimonials-one__qoute"></div><!-- /.testimonials-one__qoute -->
                                                <p>I don’t know what else to say, this is something you have never seen before.</p>
                                                <div class="testimonials-one__infos">
                                                    <div class="testimonials-one__image">
                                                        <div class="testimonials-one__image-inner">
                                                            <img src="assets/images/resources/testi-1-3.jpg" alt="">
                                                        </div><!-- /.testimonials-one__image-inner -->
                                                    </div><!-- /.testimonials-one__image -->
                                                    <div class="testimonials-one__infos-content">
                                                        <h3>Pauline Cross</h3>
                                                        <span>Swimmer</span>
                                                    </div><!-- /.testimonials-one__infos-content -->
                                                </div><!-- /.testimonials-one__infos -->
                                            </div><!-- /.testimonials-one__content-inner -->
                                        </div><!-- /.testimonials-one__content -->
                                    </div><!-- /.testimonials-one__single -->
                                </div></div><div class="owl-item" style="width: 370px; margin-right: 30px;"><div class="item">
                                    <div class="testimonials-one__single">
                                        <div class="testimonials-one__content">
                                            <div class="testimonials-one__content-inner">
                                                <div class="testimonials-one__qoute"></div><!-- /.testimonials-one__qoute -->
                                                <p>I was very impresed by the Scubo diving service, lorem ipsum is simply free text used by
                                                    copytyping.</p>
                                                <div class="testimonials-one__infos">
                                                    <div class="testimonials-one__image">
                                                        <div class="testimonials-one__image-inner">
                                                            <img src="assets/images/resources/testi-1-4.jpg" alt="">
                                                        </div><!-- /.testimonials-one__image-inner -->
                                                    </div><!-- /.testimonials-one__image -->
                                                    <div class="testimonials-one__infos-content">
                                                        <h3>Alex Maldonado</h3>
                                                        <span>Swimmer</span>
                                                    </div><!-- /.testimonials-one__infos-content -->
                                                </div><!-- /.testimonials-one__infos -->
                                            </div><!-- /.testimonials-one__content-inner -->
                                        </div><!-- /.testimonials-one__content -->
                                    </div><!-- /.testimonials-one__single -->
                                </div></div><div class="owl-item active" style="width: 370px; margin-right: 30px;"><div class="item">
                                    <div class="testimonials-one__single">
                                        <div class="testimonials-one__content">
                                            <div class="testimonials-one__content-inner">
                                                <div class="testimonials-one__qoute"></div><!-- /.testimonials-one__qoute -->
                                                <p>This is due to their excellent service, competitive pricing and customer support. It’s
                                                    throughly refresing to get new such a personal touch.
                                                </p>
                                                <div class="testimonials-one__infos">
                                                    <div class="testimonials-one__image">
                                                        <div class="testimonials-one__image-inner">
                                                            <img src="assets/images/resources/testi-1-1.jpg" alt="">
                                                        </div><!-- /.testimonials-one__image-inner -->
                                                    </div><!-- /.testimonials-one__image -->
                                                    <div class="testimonials-one__infos-content">
                                                        <h3>Marion Price</h3>
                                                        <span>Swimmer</span>
                                                    </div><!-- /.testimonials-one__infos-content -->
                                                </div><!-- /.testimonials-one__infos -->
                                            </div><!-- /.testimonials-one__content-inner -->
                                        </div><!-- /.testimonials-one__content -->
                                    </div><!-- /.testimonials-one__single -->
                                </div></div><div class="owl-item active" style="width: 370px; margin-right: 30px;"><div class="item">
                                    <div class="testimonials-one__single">
                                        <div class="testimonials-one__content">
                                            <div class="testimonials-one__content-inner">
                                                <div class="testimonials-one__qoute"></div><!-- /.testimonials-one__qoute -->
                                                <p>I was very impresed by the Scubo diving service, lorem ipsum is simply free text used by
                                                    copytyping.</p>
                                                <div class="testimonials-one__infos">
                                                    <div class="testimonials-one__image">
                                                        <div class="testimonials-one__image-inner">
                                                            <img src="assets/images/resources/testi-1-2.jpg" alt="">
                                                        </div><!-- /.testimonials-one__image-inner -->
                                                    </div><!-- /.testimonials-one__image -->
                                                    <div class="testimonials-one__infos-content">
                                                        <h3>Lou Morrison</h3>
                                                        <span>Swimmer</span>
                                                    </div><!-- /.testimonials-one__infos-content -->
                                                </div><!-- /.testimonials-one__infos -->
                                            </div><!-- /.testimonials-one__content-inner -->
                                        </div><!-- /.testimonials-one__content -->
                                    </div><!-- /.testimonials-one__single -->
                                </div></div><div class="owl-item active" style="width: 370px; margin-right: 30px;"><div class="item">
                                    <div class="testimonials-one__single">
                                        <div class="testimonials-one__content">
                                            <div class="testimonials-one__content-inner">
                                                <div class="testimonials-one__qoute"></div><!-- /.testimonials-one__qoute -->
                                                <p>This is due to their excellent service, competitive pricing and customer support. It’s
                                                    throughly refresing to get new such a personal touch.
                                                </p>
                                                <div class="testimonials-one__infos">
                                                    <div class="testimonials-one__image">
                                                        <div class="testimonials-one__image-inner">
                                                            <img src="assets/images/resources/testi-1-3.jpg" alt="">
                                                        </div><!-- /.testimonials-one__image-inner -->
                                                    </div><!-- /.testimonials-one__image -->
                                                    <div class="testimonials-one__infos-content">
                                                        <h3>Hunter Marsh</h3>
                                                        <span>Swimmer</span>
                                                    </div><!-- /.testimonials-one__infos-content -->
                                                </div><!-- /.testimonials-one__infos -->
                                            </div><!-- /.testimonials-one__content-inner -->
                                        </div><!-- /.testimonials-one__content -->
                                    </div><!-- /.testimonials-one__single -->
                                </div></div><div class="owl-item" style="width: 370px; margin-right: 30px;"><div class="item">
                                    <div class="testimonials-one__single">
                                        <div class="testimonials-one__content">
                                            <div class="testimonials-one__content-inner">
                                                <div class="testimonials-one__qoute"></div><!-- /.testimonials-one__qoute -->
                                                <p>I was very impresed by the Scubo diving service, lorem ipsum is simply free text used by
                                                    copytyping.</p>
                                                <div class="testimonials-one__infos">
                                                    <div class="testimonials-one__image">
                                                        <div class="testimonials-one__image-inner">
                                                            <img src="assets/images/resources/testi-1-4.jpg" alt="">
                                                        </div><!-- /.testimonials-one__image-inner -->
                                                    </div><!-- /.testimonials-one__image -->
                                                    <div class="testimonials-one__infos-content">
                                                        <h3>Jesse Buchanan</h3>
                                                        <span>Swimmer</span>
                                                    </div><!-- /.testimonials-one__infos-content -->
                                                </div><!-- /.testimonials-one__infos -->
                                            </div><!-- /.testimonials-one__content-inner -->
                                        </div><!-- /.testimonials-one__content -->
                                    </div><!-- /.testimonials-one__single -->
                                </div></div><div class="owl-item" style="width: 370px; margin-right: 30px;"><div class="item">
                                    <div class="testimonials-one__single">
                                        <div class="testimonials-one__content">
                                            <div class="testimonials-one__content-inner">
                                                <div class="testimonials-one__qoute"></div><!-- /.testimonials-one__qoute -->
                                                <p>This is due to their excellent service, competitive pricing and customer support. It’s
                                                    throughly refresing to get new such a personal touch.
                                                </p>
                                                <div class="testimonials-one__infos">
                                                    <div class="testimonials-one__image">
                                                        <div class="testimonials-one__image-inner">
                                                            <img src="assets/images/resources/testi-1-1.jpg" alt="">
                                                        </div><!-- /.testimonials-one__image-inner -->
                                                    </div><!-- /.testimonials-one__image -->
                                                    <div class="testimonials-one__infos-content">
                                                        <h3>Helena Dawson</h3>
                                                        <span>Swimmer</span>
                                                    </div><!-- /.testimonials-one__infos-content -->
                                                </div><!-- /.testimonials-one__infos -->
                                            </div><!-- /.testimonials-one__content-inner -->
                                        </div><!-- /.testimonials-one__content -->
                                    </div><!-- /.testimonials-one__single -->
                                </div></div><div class="owl-item cloned" style="width: 370px; margin-right: 30px;"><div class="item">
                                    <div class="testimonials-one__single">
                                        <div class="testimonials-one__content">
                                            <div class="testimonials-one__content-inner">
                                                <div class="testimonials-one__qoute"></div><!-- /.testimonials-one__qoute -->
                                                <p>I don’t know what else to say, this is something you have never seen before.</p>
                                                <div class="testimonials-one__infos">
                                                    <div class="testimonials-one__image">
                                                        <div class="testimonials-one__image-inner">
                                                            <img src="assets/images/resources/testi-1-1.jpg" alt="">
                                                        </div><!-- /.testimonials-one__image-inner -->
                                                    </div><!-- /.testimonials-one__image -->
                                                    <div class="testimonials-one__infos-content">
                                                        <h3>Edwin Walsh</h3>
                                                        <span>Swimmer</span>
                                                    </div><!-- /.testimonials-one__infos-content -->
                                                </div><!-- /.testimonials-one__infos -->
                                            </div><!-- /.testimonials-one__content-inner -->
                                        </div><!-- /.testimonials-one__content -->
                                    </div><!-- /.testimonials-one__single -->
                                </div></div><div class="owl-item cloned" style="width: 370px; margin-right: 30px;"><div class="item">
                                    <div class="testimonials-one__single">
                                        <div class="testimonials-one__content">
                                            <div class="testimonials-one__content-inner">
                                                <div class="testimonials-one__qoute"></div><!-- /.testimonials-one__qoute -->
                                                <p>This is due to their excellent service, competitive pricing and customer support. It’s
                                                    throughly refresing to get new such a personal touch. </p>
                                                <div class="testimonials-one__infos">
                                                    <div class="testimonials-one__image">
                                                        <div class="testimonials-one__image-inner">
                                                            <img src="assets/images/resources/testi-1-2.jpg" alt="">
                                                        </div><!-- /.testimonials-one__image-inner -->
                                                    </div><!-- /.testimonials-one__image -->
                                                    <div class="testimonials-one__infos-content">
                                                        <h3>Joel Moore</h3>
                                                        <span>Swimmer</span>
                                                    </div><!-- /.testimonials-one__infos-content -->
                                                </div><!-- /.testimonials-one__infos -->
                                            </div><!-- /.testimonials-one__content-inner -->
                                        </div><!-- /.testimonials-one__content -->
                                    </div><!-- /.testimonials-one__single -->
                                </div></div><div class="owl-item cloned" style="width: 370px; margin-right: 30px;"><div class="item">
                                    <div class="testimonials-one__single">
                                        <div class="testimonials-one__content">
                                            <div class="testimonials-one__content-inner">
                                                <div class="testimonials-one__qoute"></div><!-- /.testimonials-one__qoute -->
                                                <p>I don’t know what else to say, this is something you have never seen before.</p>
                                                <div class="testimonials-one__infos">
                                                    <div class="testimonials-one__image">
                                                        <div class="testimonials-one__image-inner">
                                                            <img src="assets/images/resources/testi-1-3.jpg" alt="">
                                                        </div><!-- /.testimonials-one__image-inner -->
                                                    </div><!-- /.testimonials-one__image -->
                                                    <div class="testimonials-one__infos-content">
                                                        <h3>Pauline Cross</h3>
                                                        <span>Swimmer</span>
                                                    </div><!-- /.testimonials-one__infos-content -->
                                                </div><!-- /.testimonials-one__infos -->
                                            </div><!-- /.testimonials-one__content-inner -->
                                        </div><!-- /.testimonials-one__content -->
                                    </div><!-- /.testimonials-one__single -->
                                </div></div><div class="owl-item cloned" style="width: 370px; margin-right: 30px;"><div class="item">
                                    <div class="testimonials-one__single">
                                        <div class="testimonials-one__content">
                                            <div class="testimonials-one__content-inner">
                                                <div class="testimonials-one__qoute"></div><!-- /.testimonials-one__qoute -->
                                                <p>I was very impresed by the Scubo diving service, lorem ipsum is simply free text used by
                                                    copytyping.</p>
                                                <div class="testimonials-one__infos">
                                                    <div class="testimonials-one__image">
                                                        <div class="testimonials-one__image-inner">
                                                            <img src="assets/images/resources/testi-1-4.jpg" alt="">
                                                        </div><!-- /.testimonials-one__image-inner -->
                                                    </div><!-- /.testimonials-one__image -->
                                                    <div class="testimonials-one__infos-content">
                                                        <h3>Alex Maldonado</h3>
                                                        <span>Swimmer</span>
                                                    </div><!-- /.testimonials-one__infos-content -->
                                                </div><!-- /.testimonials-one__infos -->
                                            </div><!-- /.testimonials-one__content-inner -->
                                        </div><!-- /.testimonials-one__content -->
                                    </div><!-- /.testimonials-one__single -->
                                </div></div><div class="owl-item cloned" style="width: 370px; margin-right: 30px;"><div class="item">
                                    <div class="testimonials-one__single">
                                        <div class="testimonials-one__content">
                                            <div class="testimonials-one__content-inner">
                                                <div class="testimonials-one__qoute"></div><!-- /.testimonials-one__qoute -->
                                                <p>This is due to their excellent service, competitive pricing and customer support. It’s
                                                    throughly refresing to get new such a personal touch.
                                                </p>
                                                <div class="testimonials-one__infos">
                                                    <div class="testimonials-one__image">
                                                        <div class="testimonials-one__image-inner">
                                                            <img src="assets/images/resources/testi-1-1.jpg" alt="">
                                                        </div><!-- /.testimonials-one__image-inner -->
                                                    </div><!-- /.testimonials-one__image -->
                                                    <div class="testimonials-one__infos-content">
                                                        <h3>Marion Price</h3>
                                                        <span>Swimmer</span>
                                                    </div><!-- /.testimonials-one__infos-content -->
                                                </div><!-- /.testimonials-one__infos -->
                                            </div><!-- /.testimonials-one__content-inner -->
                                        </div><!-- /.testimonials-one__content -->
                                    </div><!-- /.testimonials-one__single -->
                                </div></div></div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots"><button role="button" class="owl-dot"><span style="top: 20px;"></span></button><button role="button" class="owl-dot active"><span style="top: 30px;"></span></button><button role="button" class="owl-dot"><span style="top: 40px;"></span></button></div></div><!-- /.testimonials-one__carousel owl-carousel owl-theme thm__owl-carousel -->
            </div><!-- /.container -->
        </section><!-- /.testimonials-one__carousel-wrapper -->


        <div class="team-brand__wrapper" style="background-image: url(assets/images/shapes/about-brand-team-bg.png);">
            <section class="team-one">
                <div class="container">
                    <div class="block-title text-center">
                        <img src="assets/images/shapes/sec-line-1.png" alt="">
                        <p class="text-uppercase">scuba diving experts</p>
                        <h3 class="text-uppercase">our instructors</h3>
                    </div><!-- /.block-title -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="team-one__single">
                                <img src="assets/images/team/team-1-1.jpg" alt="">
                                <div class="team-one__content">
                                    <div class="team-one__content-inner">
                                        <h3>Maggie Goodman</h3>
                                        <span>Co Founder</span>
                                        <div class="team-one__social">
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </div><!-- /.team-one__social -->
                                    </div><!-- /.team-one__content-inner -->
                                </div><!-- /.team-one__content -->
                            </div><!-- /.team-one__single -->
                        </div><!-- /.col-lg-3 col-md-6 -->
                        <div class="col-lg-3 col-md-6">
                            <div class="team-one__single">
                                <img src="assets/images/team/team-1-2.jpg" alt="">
                                <div class="team-one__content">
                                    <div class="team-one__content-inner">
                                        <h3>Craig Hawkins</h3>
                                        <span>Co Founder</span>
                                        <div class="team-one__social">
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </div><!-- /.team-one__social -->
                                    </div><!-- /.team-one__content-inner -->
                                </div><!-- /.team-one__content -->
                            </div><!-- /.team-one__single -->
                        </div><!-- /.col-lg-3 col-md-6 -->
                        <div class="col-lg-3 col-md-6">
                            <div class="team-one__single">
                                <img src="assets/images/team/team-1-3.jpg" alt="">
                                <div class="team-one__content">
                                    <div class="team-one__content-inner">
                                        <h3>Katharine Alvarez</h3>
                                        <span>Co Founder</span>
                                        <div class="team-one__social">
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </div><!-- /.team-one__social -->
                                    </div><!-- /.team-one__content-inner -->
                                </div><!-- /.team-one__content -->
                            </div><!-- /.team-one__single -->
                        </div><!-- /.col-lg-3 col-md-6 -->
                        <div class="col-lg-3 col-md-6">
                            <div class="team-one__single">
                                <img src="assets/images/team/team-1-4.jpg" alt="">
                                <div class="team-one__content">
                                    <div class="team-one__content-inner">
                                        <h3>Mabel Underwood</h3>
                                        <span>Co Founder</span>
                                        <div class="team-one__social">
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </div><!-- /.team-one__social -->
                                    </div><!-- /.team-one__content-inner -->
                                </div><!-- /.team-one__content -->
                            </div><!-- /.team-one__single -->
                        </div><!-- /.col-lg-3 col-md-6 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </section><!-- /.team-one -->

            <section class="brand-one">
                <div class="container">
                    <div class="brand-one__carousel owl-carousel thm__owl-carousel owl-theme owl-loaded owl-drag" data-options="{&quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayHoverPause&quot;: true, &quot;autoplayTimeout&quot;: 5000, &quot;items&quot;: 5, &quot;dots&quot;: false, &quot;nav&quot;: false, &quot;margin&quot;: 100, &quot;smartSpeed&quot;: 700, &quot;responsive&quot;: { &quot;0&quot;: {&quot;items&quot;: 2, &quot;margin&quot;: 30}, &quot;480&quot;: {&quot;items&quot;: 3, &quot;margin&quot;: 30}, &quot;991&quot;: {&quot;items&quot;: 4, &quot;margin&quot;: 50}, &quot;1199&quot;: {&quot;items&quot;: 5, &quot;margin&quot;: 100}}}">
                        <!-- /.item -->
                        <!-- /.item -->
                        <!-- /.item -->
                        <!-- /.item -->
                        <!-- /.item -->
                        <!-- /.item -->
                        <!-- /.item -->
                        <!-- /.item -->
                        <!-- /.item -->
                        <!-- /.item -->
                        <!-- /.item -->
                        <!-- /.item -->
                        <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-3302px, 0px, 0px); transition: all 0.7s ease 0s; width: 6096px;"><div class="owl-item cloned" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-1.png" alt="">
                                    </div></div><div class="owl-item cloned" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-2.png" alt="">
                                    </div></div><div class="owl-item cloned" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-3.png" alt="">
                                    </div></div><div class="owl-item cloned" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-4.png" alt="">
                                    </div></div><div class="owl-item cloned" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-5.png" alt="">
                                    </div></div><div class="owl-item cloned" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-6.png" alt="">
                                    </div></div><div class="owl-item" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-1.png" alt="">
                                    </div></div><div class="owl-item" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-2.png" alt="">
                                    </div></div><div class="owl-item" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-3.png" alt="">
                                    </div></div><div class="owl-item" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-4.png" alt="">
                                    </div></div><div class="owl-item" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-5.png" alt="">
                                    </div></div><div class="owl-item" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-6.png" alt="">
                                    </div></div><div class="owl-item" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-1.png" alt="">
                                    </div></div><div class="owl-item active" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-2.png" alt="">
                                    </div></div><div class="owl-item active" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-3.png" alt="">
                                    </div></div><div class="owl-item active" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-4.png" alt="">
                                    </div></div><div class="owl-item active" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-5.png" alt="">
                                    </div></div><div class="owl-item active" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-6.png" alt="">
                                    </div></div><div class="owl-item cloned" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-1.png" alt="">
                                    </div></div><div class="owl-item cloned" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-2.png" alt="">
                                    </div></div><div class="owl-item cloned" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-3.png" alt="">
                                    </div></div><div class="owl-item cloned" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-4.png" alt="">
                                    </div></div><div class="owl-item cloned" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-5.png" alt="">
                                    </div></div><div class="owl-item cloned" style="width: 154px; margin-right: 100px;"><div class="item">
                                        <img src="assets/images/brand/brand-2-6.png" alt="">
                                    </div></div></div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots disabled"></div></div><!-- /.brand-one__carousel owl-carousel thm__owl-carousel owl-theme -->
                </div><!-- /.container -->
            </section><!-- /.brand-one -->
        </div><!-- /.team-brand__wrapper -->
        <footer class="site-footer-one">

            <div class="site-footer-one__bg" style="background-image: url(assets/images/background/footer-bg-1-1.jpg);"></div>
            <!-- /.site-footer-one__bg -->

            <!-- footer fishes -->
            <img src="assets/images/shapes/fish-f-1.png" alt="" class="site-footer__fish-1">
            <img src="assets/images/shapes/fish-f-2.png" alt="" class="site-footer__fish-2">
            <img src="assets/images/shapes/fish-f-3.png" alt="" class="site-footer__fish-3">

            <!-- footer trees -->
            <img src="assets/images/shapes/tree-f-1.png" class="site-footer__tree-1" alt="">
            <img src="assets/images/shapes/tree-f-2.png" class="site-footer__tree-2" alt="">

            <div class="site-footer-one__upper">
                <div class="container">
                    <div class="footer-widget-row">
                        <div class="footer-widget footer-widget__about">
                            <div class="footer-widget__inner">
                                <a href="index.html">
                                    <img src="assets/images/logo-2-1.png" alt="" width="143">
                                </a>
                                <p>© Copyright 2020 by <br>
                                    Scubo Template</p>
                            </div><!-- /.footer-widget__inner -->
                        </div><!-- /.footer-widget -->
                        <div class="footer-widget footer-widget__links__widget-1">
                            <div class="footer-widget__inner">
                                <h3 class="footer-widget__title">Company</h3><!-- /.footer-widget__title -->
                                <ul class="footer-widget__links-list list-unstyled">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Our History</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul><!-- /.footer-widget__links-list -->
                            </div><!-- /.footer-widget__inner -->
                        </div><!-- /.footer-widget -->
                        <div class="footer-widget footer-widget__links__widget-2">
                            <div class="footer-widget__inner">
                                <h3 class="footer-widget__title">Explore</h3><!-- /.footer-widget__title -->
                                <ul class="footer-widget__links-list list-unstyled">
                                    <li><a href="#">Popular Courses</a></li>
                                    <li><a href="#">How It Works</a></li>
                                    <li><a href="#">Help Center</a></li>
                                </ul><!-- /.footer-widget__links-list -->
                            </div><!-- /.footer-widget__inner -->
                        </div><!-- /.footer-widget -->
                        <div class="footer-widget footer-widget__links__widget-3">
                            <div class="footer-widget__inner">
                                <h3 class="footer-widget__title">Links</h3><!-- /.footer-widget__title -->
                                <ul class="footer-widget__links-list list-unstyled">
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Terms &amp; Conditions</a></li>
                                </ul><!-- /.footer-widget__links-list -->
                            </div><!-- /.footer-widget__inner -->
                        </div><!-- /.footer-widget -->
                        <div class="footer-widget footer-widget__social__widget">
                            <div class="footer-widget__inner">
                                <h3 class="footer-widget__title">Follow</h3><!-- /.footer-widget__title -->
                                <div class="footer-widget__social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-square"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div><!-- /.footer-widget__social -->
                            </div><!-- /.footer-widget__inner -->
                        </div><!-- /.footer-widget -->
                    </div><!-- /.footer-widget-row -->
                </div><!-- /.container -->
            </div><!-- /.site-footer-one__upper -->
            <div class="site-footer__bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <a href="tel:666-888-0000"><i class="fa fa-phone-alt"></i>666 888 0000</a>
                        </div><!-- /.col-lg-4 -->
                        <div class="col-lg-4">
                            <a href="mailto:needhelp@example.com"><i class="fa fa-envelope"></i>needhelp@example.com</a>
                        </div><!-- /.col-lg-4 -->
                        <div class="col-lg-4">
                            <a href="contact.html"><i class="fa fa-map"></i>22 Broklyn Street, USA</a>
                        </div><!-- /.col-lg-4 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.site-footer__bottom -->
        </footer><!-- /.site-footer-one -->
    </div>


<?php get_footer(); ?>