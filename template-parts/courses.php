<?php
$course_category_id = get_query_var( 'course_category_id' );

if ( $course_category_id ) :

    ?>
    <section class="tab-content">
        <div class="container">

            <?php
                // get all courses in this custom taxonomy
                $courses = get_posts(
                    array(
                        'posts_per_page' => -1,
                        'post_type' => 'courses',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'courses_categories',
                                'field' => 'term_id',
                                'terms' => $course_category_id,
                            )
                        )
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

            ?>

            <div class="row">
                <div class="col-md-6 pt-5">
                    <h1 class="title-primary"><?php echo $course_title;?></h1>
                    <span class="split-line"></span>
                    <div class="row">
                        <div class="col-6 m-auto pt-1">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/time.svg" class="w-30 mr-2" alt="time">
                            <p class="sub-description mb-0">
                                Duration :
                                <?php echo $course_duration;?></p>
                        </div>
                        <div class="col-md-6 pt-1">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/diving-orange.svg" class="w-30 mr-2" alt="diving">
                            <p class="sub-description mb-0">
                                Equipment :
                                <?php echo $course_equipment;?> </p>
                        </div>

                    </div>

                    <p class="description-primary pt-1">
                        <?php echo $course_overview; ?>
                    </p>
                    <a href="<?php echo $course_permalink; ?>" class="default-btn mt-4">
                        Read More</a>
                </div>
                <div class="col-md-6 pt-5">
                    <a href="<?php echo $course_permalink; ?>">
                        <img src="<?php echo $course_thumbnail; ?>" class="bor-radius-10 img-fluid" alt="diving">
                    </a>
                </div>
            </div>

            <?php
                    endforeach;
                endif;
            ?>


        </div>
    </section>


<?php endif; ?>
