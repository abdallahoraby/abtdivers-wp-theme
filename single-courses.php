<?php get_header(); ?>

<?php
    $post_id = get_the_ID();
?>

<section class="banner courses">

    <div class="info">
        <h2 class="head-title"> <?php echo get_the_title($post_id)?>  </h2>
    </div>
</section>

<section class="tab-content">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center btn-section">
                    <span class="cover">

                        <?php
                        $courses_categories = get_terms( array(
                            'taxonomy' => 'courses_categories',
                            'hide_empty' => false
                        ) );

                        $current_course_category = get_the_terms( $post_id, 'courses_categories' );

                        if( count( $courses_categories ) > 0 && !empty($courses_categories) ):
                            foreach ( $courses_categories as $courses_category ):

                                if( (int) $current_course_category[0]->term_id ===  (int) $courses_category->term_id ):
                                    $active = 'active';
                                else:
                                    $active = '';
                                endif;
                                ?>

                                <a href="<?php echo home_url();?>/courses?term_id=<?php echo $courses_category->term_id;?>" class="courses_category tab-button <?php echo $active; ?>" data-course-category-id="<?php echo $courses_category->term_id; ?>"> <?php echo $courses_category->name;?> </a>

                            <?php
                            endforeach;
                        endif;
                        ?>


                    </span>
            </div>



            <div class="col-md-8 pt-5">
                <h1 class="title-primary"> <?php echo get_the_title($post_id)?> </h1>
                <span class="split-line"></span>

                <div class="row">
                    <div class="col-6 m-auto pt-3">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/time.svg" class="w-30 mr-2" alt="time">
                        <p class="sub-description mb-0">
                            Duration :
                            <?php echo get_post_meta($post_id, 'course_duration', true); ?>
                        </p>
                    </div>
                    <div class="col-6 pt-3">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/diving-orange.svg" class="w-30 mr-2" alt="equipment">
                        <p class="sub-description mb-0">
                            Equipment :
                            <?php echo get_post_meta($post_id, 'course_equipment', true); ?>
                        </p>
                    </div>
                </div>
                <div class=" mt-4">
                    <ul class="col-12 p-0  facilities-list">

                        <?php
                            $courses_checklists = get_post_meta($post_id, 'courses_checklist', true) ;
                            if( !empty($courses_checklists) && count($courses_checklists) > 0 ):
                                foreach ( $courses_checklists as $courses_checklist ):
                        ?>

                        <li><i class="fas fa-check"></i> <?php echo $courses_checklist['courses_checklist_title']; ?> </li>

                        <?php
                                endforeach;
                            endif;

                        ?>


                    </ul>
                </div>
                <div class=" mt-4">
                    <h4 class="sub-title blue">
                        Overview
                    </h4>
                    <p class="description-primary pt-2">
                        <?php echo get_post_meta($post_id, 'course_overview', true);?>
                    </p>
                </div>
                <div class=" mt-4">
                    <h4 class="sub-title blue">
                        Requirements :
                    </h4>
                    <p class="description-primary pt-2">
                        <?php echo get_post_meta($post_id, 'course_requirements', true);?>
                    </p>
                </div>

            </div>
            <aside class="col-md-4 pt-5 text-center">
                <div class="row">
                    <p class="col-6 d-inline-block  title-primary orange"> <?php echo get_post_meta($post_id, 'course_price', true); ?> </p>
                    <div class="col-6 text-right">
                        <a href="<?php echo get_post_meta($post_id, 'course_book_url', true); ?>" class="default-btn bg-blue popup-with-form">
                            Book Now

                        </a>
                    </div>
                </div>

                <a class="course_single_video" href="<?php echo get_post_meta($post_id, 'course_video_url', true); ?>" data-toggle="lightbox" data-title="" data-footer="" >
                    <i class="fas fa-play-circle"></i>
                    <video style="background: url(<?php echo getVideoThumbUrl( get_post_meta($post_id, 'course_video_url', true) ); ?>)">
                        <source src="<?php echo get_post_meta($post_id, 'course_video_url', true); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>

                </a>


<!--                <div class="bg-blue bor-radius-10 p-4 mt-4">-->
<!--                    <p class="sub-description white text-left">-->
<!--                        Don't have enough time for the whole course Speed up your course timing with PADI e-learning program-->
<!--                    </p>-->
<!--                    <a href="https://apps.padi.com/scuba-diving/elearning/?irra=24442" target="_blank" class="default-btn sub mr-5">-->
<!--                        PADI e-learning platform</a>-->
<!--                    <img src="/images/icons/platform.svg" alt="platform" class=" mb--24 ">-->
<!--                </div>-->
<!---->
<!--                <img src="/images/logo/padi-vertical.jpg?v=2" alt="padi" class="mt-4">-->
            </aside>
        </div>
    </div>
</section>




<?php get_footer(); ?>
