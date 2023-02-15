<?php  get_header(); ?>


<?php
    $post_id = get_the_ID();
    $current_course_category = get_the_terms( $post_id, 'courses_categories' );
    $course_category_id = !empty($_GET['term_id']) ? $_GET['term_id'] : '';

?>

<section class="banner courses">

    <div class="info">
        <h2 class="head-title"> <?php echo $current_course_category[0]->name; ?>  </h2>
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

                                if( (int) $course_category_id ===  (int) $courses_category->term_id ):
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



        </div>
    </div>
</section>

<div class="courses_categories_section">
    <?php

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

            <?php endforeach; ?>

                <?php else: ?>

                    <div class="alert alert-primary text-center" role="alert">
                        No Courses Found.
                    </div>

                    <a href="<?php echo home_url();?>" class="btn btn-primary back-to-home">Back to Home</a>


            <?php endif; ?>


        </div>
    </section>

    <?php endif; ?>


</div>


<?php get_footer(); ?>
