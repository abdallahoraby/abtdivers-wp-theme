<?php get_header(); ?>

<?php
    $post_id = get_the_ID();
    $hero_video_url = get_post_meta( $post_id, 'hero_video_url', true );
?>

<div class="page-wrapper">


    <!-- Start video hero -->
    <div class="video-hero jquery-background-video-wrapper demo-video-wrapper">
        <video class="jquery-background-video" autoplay muted loop playsinline poster="">
            <source src="<?php echo esc_url( $hero_video_url ) ?>" type="video/mp4">
        </video>
        <div class="video-overlay"></div>
        <div class="page-width">
<!--            <div class="video-hero--content">-->
<!--                <h2>Background Video Demo</h2>-->
<!--                <p>Full width video hero</p>-->
<!--            </div>-->
        </div>
    </div>
    <!-- End video hero -->

    <div class="landing-locations">
        <div class="containerx">
            <div class="landing-locations-wrap">

                <?php
                // get all courses in this custom taxonomy
                $activities = get_posts(
                    array(
                        'posts_per_page' => 5,
                        'post_type' => 'activities',
                    )
                );

                if( !empty($activities) && count($activities) > 0 ):
                    $class_index = 1;
                    foreach ($activities as $activity):
                        $activity_id = $activity->ID;
                        $activity_title = $activity->post_title;
                        $activity_thumbnail = get_the_post_thumbnail_url($activity_id, 'full');
                        $activity_permalink = get_the_permalink($activity_id);

                ?>


                <div class="d-flex">
                    <a href="<?php echo $activity_permalink; ?>" data-name="<?php echo $activity_title; ?>" id="location_1" class="d-flex flex-column landing-location landing-location_<?php echo $class_index;?>">
                        <h2 class="d-flex justify-content-center align-items-center flex-1 landing-location__title"> <?php echo $activity_title; ?> </h2>
                        <div class="landing-location__img">
                            <img src="<?php echo esc_url($activity_thumbnail); ?>" alt="<?php echo $activity_title; ?>">
                        </div>
                    </a>
                </div>


                <?php
                    $class_index++;
                    endforeach;
                endif;
                ?>
                
            </div>
        </div>
    </div>


    <section class="video-two" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shapes/video-2-bg.png);">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shapes/swimmer-1-1.png" class="video-two__swimmer" alt="">
        <div class="container">
            <div class="video-two__box wow fadeInRight" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInRight;">
                <?php
                    $about_video_poster = get_post_meta($post_id, 'about_video_poster', true);
                    if( !empty( $about_video_poster ) ):
                        $about_video_poster_url = wp_get_attachment_image_src( $about_video_poster , 'full')[0];
                    endif;
                ?>

                <img src="<?php echo $about_video_poster_url;?>" alt="">

                <a target="_blank" href="<?php echo get_post_meta($post_id, 'about_video_url', true); ?>" class="video-popup html5lightbox"><i class="fa fa-play"></i></a>

                <!-- /.video-popup -->
            </div><!-- /.video-two__box -->
            <div class="row">
                <div class="col-xl-6">
                    <div class="video-two__content">
                        <div class="block-title">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shapes/sec-line-1.png" alt="">
                            <p class="text-uppercase"> <?php echo get_post_meta($post_id, 'about_sub_title', true);?> </p>
                            <h3 class="text-uppercase"><?php echo get_post_meta($post_id, 'about_title', true);?></h3>
                        </div><!-- /.block-title -->
                        <p>
                            <?php echo get_post_meta($post_id, 'about_description', true);?>
                        </p>
                        <a href="<?php echo home_url(); ?>/contact-us" class="thm-btn video-two__btn">Contact us</a>
                        <!-- /.thm-btn video-two__btn -->
                    </div><!-- /.video-two__content -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

    <section class="course-one__title">
        <div class="course-one__bg" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shapes/water-wave-bg.png);"></div>
        <!-- /.course-one__bg -->
        <div class="container ">
            <div class="block-title text-left">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shapes/sec-line-1.png" alt="">
                <p class="text-uppercase"> <?php echo get_post_meta($post_id, 'courses_sub_title', true); ?> </p>
                <h3 class="text-uppercase"> <?php echo get_post_meta($post_id, 'courses_title', true); ?> </h3>
            </div><!-- /.block-title -->
            <div class="text-block">
                <p class="m-0">
                    <?php echo get_post_meta($post_id, 'courses_description', true); ?>
                </p>
            </div><!-- /.text-block -->
        </div><!-- /.container -->
    </section>

    <div class="course-one course-one__carousel-wrapper">
        <!-- footer fishes -->
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shapes/fish-1-1.png" alt="" class="site-footer__fish-1">

        <!-- footer trees -->
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shapes/tree-1-1.png" class="site-footer__tree-1" alt="">
        <div class="container">

            <div class="owl-carousel home-courses">

                <?php
                    // get all courses in this custom taxonomy
                    $courses = get_posts(
                        array(
                            'posts_per_page' => 9,
                            'post_type' => 'courses',
                        )
                    );

                    if( !empty($courses) && count($courses) > 0 ):
                        foreach ($courses as $course):
                            $course_id = $course->ID;
                            $course_title = $course->post_title;
                            $course_duration = get_post_meta($course_id, 'course_duration', true);
                            $course_equipment = get_post_meta($course_id, 'course_equipment', true);
                            $course_overview = get_post_meta($course_id, 'course_overview', true);
                            $course_thumbnail = get_the_post_thumbnail_url($course_id, 'full');
                            $course_permalink = get_the_permalink($course_id);
                            $course_category = get_the_terms( $course_id, 'courses_categories' )[0]->name;



                ?>

                            <div class="item">
                                <div class="course-one__single">
                                    <div class="course-one__image">
                                        <a href="<?php echo $course_permalink; ?>" class="course-one__cat"> <?php echo $course_category; ?> </a>
                                        <div class="course-one__image-inner">
                                            <img src="<?php echo $course_thumbnail; ?>" alt="">
                                            <a href="<?php echo $course_permalink; ?>"> <i class="fas fa-plus"></i> </a>
                                        </div><!-- /.course-one__image-inner -->
                                    </div><!-- /.course-one__image -->
                                    <div class="course-one__content hvr-sweep-to-bottom">
                                        <h3><a href="<?php echo $course_permalink; ?>"> <?php echo $course_title; ?> </a></h3>
                                        <p class="course-overview">
                                            <?php echo $course_overview; ?>
                                        </p>
                                    </div><!-- /.course-one__content -->
                                    <a href="<?php echo $course_permalink; ?>" class="course-one__book-link">Book this course</a>
                                </div><!-- /.course-one__single -->
                            </div>

                <?php
                        endforeach;
                    endif;
                ?>


            </div>

        </div>
    </div>

    <section class="testimonials-one__title testimonials-one__title__home-one">
        <div class="testimonials-one__bg" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shapes/water-wave-bg.png);"></div>
        <!-- /.testimonials-one__bg -->
        <div class="container">
            <div class="block-title text-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shapes/sec-line-1.png" alt="">
                <p class="text-uppercase"> <?php echo get_post_meta($post_id, 'testimonials_sub_title', true); ?> </p>
                <h3 class="text-uppercase"> <?php echo get_post_meta($post_id, 'testimonials_title', true); ?> </h3>
            </div><!-- /.block-title -->
        </div><!-- /.container -->
    </section>
    <section class="testimonials-one__carousel-wrapper testimonials-one__carousel-wrapper__home-one">
        <div class="container wow fadeIn" data-wow-duration="2000ms" style="visibility: visible; animation-duration: 2000ms; animation-name: fadeIn;">
            <div class="testimonials-carousal testimonials-one__carousel owl-carousel owl-theme thm__owl-carousel thm__owl-dot-2 owl-loaded owl-drag" data-options="{&quot;items&quot;: 3, &quot;margin&quot;: 30, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 5000, &quot;autoplayHoverPause&quot;: true, &quot;smartSpeed&quot;: 700, &quot;responsive&quot;: {&quot;0&quot;: {&quot;items&quot;: 1, &quot;dots&quot;: false, &quot;nav&quot;: true}, &quot;480&quot;: {&quot;items&quot;: 1, &quot;dots&quot;: false, &quot;nav&quot;: true}, &quot;767&quot;: {&quot;items&quot;: 1, &quot;dots&quot;: false, &quot;nav&quot;: true}, &quot;991&quot;: {&quot;items&quot;: 2}, &quot;1199&quot;: {&quot;items&quot;: 3, &quot;margin&quot;: 30}}}">

                <?php
                    // get all courses in this custom taxonomy
                    $testimonials = get_posts(
                        array(
                            'posts_per_page' => 9,
                            'post_type' => 'testimonials',
                        )
                    );

                    if( !empty($testimonials) && count($testimonials) > 0 ):
                        foreach ($testimonials as $testimonial):
                            $testimonials_id = $testimonial->ID;
                            $testimonials_title = $testimonial->post_title;
                            $testimonials_content = $testimonial->post_content;

                ?>

                            <div class="item">
                                <div class="testimonials-one__single">
                                    <div class="testimonials-one__content">
                                        <div class="testimonials-one__content-inner">
                                            <div class="testimonials-one__qoute"></div><!-- /.testimonials-one__qoute -->
                                            <p> <?php echo $testimonials_content; ?> </p>
                                            <div class="testimonials-one__infos">
                                                <div class="testimonials-one__image">
                                                    <div class="testimonials-one__image-inner">
                                                        <img src="<?php echo get_the_post_thumbnail_url($testimonials_id, 'thumbnail');?>" alt="">
                                                    </div><!-- /.testimonials-one__image-inner -->
                                                </div><!-- /.testimonials-one__image -->
                                                <div class="testimonials-one__infos-content">
                                                    <h3> <?php echo $testimonials_title; ?> </h3>
                                                </div><!-- /.testimonials-one__infos-content -->
                                            </div><!-- /.testimonials-one__infos -->
                                        </div><!-- /.testimonials-one__content-inner -->
                                    </div><!-- /.testimonials-one__content -->
                                </div><!-- /.testimonials-one__single -->
                            </div>


                <?php
                        endforeach;
                    endif;
                ?>

            </div><!-- /.testimonials-one__carousel owl-carousel owl-theme thm__owl-carousel -->
        </div><!-- /.container -->
    </section>

    <section class="blue-bg padding-xl image-background center-info">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <div class="block-title text-center">
                            <h3 class="white-color"> <?php echo !empty( get_post_meta($post_id, 'the_center_title', true) ) ? get_post_meta($post_id, 'the_center_title', true) : ''; ?> </h3>
                        </div>
                        <p class="white-text text-nm text-light margin-lg">
                            <?php echo !empty( get_post_meta($post_id, 'the_center_desc', true) ) ? get_post_meta($post_id, 'the_center_desc', true) : ''; ?>
                        </p>

                        <a href="<?php echo !empty( get_post_meta($post_id, 'center_button_one_link', true) ) ? get_post_meta($post_id, 'center_button_one_link', true) : ''; ?>" class="btn-reset btn-sm orange-bg padding-lg-h rounded-nm text-nm white-text letter-spacing-sm prices-btn"><i class="fa fa-dollar"></i>
                            <?php echo !empty( get_post_meta($post_id, 'center_button_one_text', true) ) ? get_post_meta($post_id, 'center_button_one_text', true) : ''; ?>
                        </a>
                        <a href="<?php echo !empty( get_post_meta($post_id, 'center_button_two_link', true) ) ? get_post_meta($post_id, 'center_button_two_link', true) : ''; ?>" class="btn-reset btn-sm padding-lg-h rounded-nm text-nm white-text letter-spacing-sm get-locations-btn"><i class="fa fa-map-marker"></i>
                            <?php echo !empty( get_post_meta($post_id, 'center_button_two_text', true) ) ? get_post_meta($post_id, 'center_button_two_text', true) : ''; ?>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 the-center-home owl-theme owl-carousel">

                <?php
                    $the_center_gallery = get_post_meta($post_id, 'the_center_gallery', true);
                    $the_center_gallery_items = explode(",", $the_center_gallery);
                    unset($the_center_gallery_items[0]);
                    if( !empty($the_center_gallery_items) && count($the_center_gallery_items) > 0 ):
                        foreach ($the_center_gallery_items as $the_center_gallery_item):
                ?>

                            <img src="<?php echo esc_url( wp_get_attachment_url( $the_center_gallery_item ) );?>" alt="">

                <?php
                        endforeach;
                    endif;
                ?>

                </div>
            </div>
        </div>
    </section>


    <section class="orange-bg padding-xl widgets">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="news">
                        <div class="block-title">
                            <h3 class="white-color"> News </h3>
                        </div>
                        <div class="one-item-dots owl-carousel home-blog">

                            <?php
                                // get all posts in this custom taxonomy
                                $posts = get_posts(
                                    array(
                                        'posts_per_page' => 9,
                                        'post_type' => 'post',
                                        'post_status' => 'publish'
                                    )
                                );

                                if( !empty($posts) && count($posts) > 0 ):
                                    foreach ($posts as $post):
                                        $postID = $post->ID;
                                        $post_content = $post->post_content;
                                        $post_title = $post->post_title;
                                        $post_thumbnail = get_the_post_thumbnail_url($postID, 'full');
                                        $post_permalink = get_the_permalink($postID);
                                        $post_date = date("Y-m-d", strtotime($post->post_date));




                            ?>


                            <div class="row">
                                <div class="col-sm-4 blog-image">
                                    <div class="news-thumb">
                                        <img src="<?php echo esc_url($post_thumbnail);?>" alt="<?php echo $post_title; ?>" class="rounded-nm">
                                    </div>
                                </div>
                                <div class="col-sm-8 blog-content">
                                    <div class="news-content white-bg rounded-nm">

                                        <a href="#" class="text-nm blue-text text-medium block-item"> <?php echo $post_title; ?> </a>
                                        <span class="grey-text text-sm text-normal margin-sm block-item"><i class="fa fa-calendar"></i> <?php echo $post_date; ?> </span>
                                        <p class="grey-text text-sm text-light">
                                            <?php echo $post_content;?>
                                        </p>
                                        <a href="<?php echo esc_url($post_permalink);?>" class="btn-reset  blue-bg rounded-nm text-nm white-text letter-spacing-sm">
                                            Read More
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <?php
                                    endforeach;
                                endif;
                            ?>



                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



</div>



        
<?php get_footer(); ?>
