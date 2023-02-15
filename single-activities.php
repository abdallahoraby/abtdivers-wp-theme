<?php get_header(); ?>

<?php $post_id = get_the_ID(); ?>

<section class="page-header">
    <div class="page-header__bg" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/assets/images/background/footer-bg-1-1.jpg);"></div>
    <!-- /.page-header__bg -->
    <div class="container">
        <h2 class="page-header__title"> <?php echo the_title(); ?> </h2><!-- /.page-header__title -->
    </div><!-- /.container -->
</section>

<div class="course-details__image">
    <img src="<?php echo get_the_post_thumbnail_url($post_id, 'full');?>" alt="">

    <div class="course-details__infos wow fadeInRight" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInRight;">
        <div class="course-details__infos-title">Detail</div><!-- /.cta-details__infos-title -->
    </div><!-- /.course-details__infos -->
</div><!-- /.course-details__image -->

<section class="course-details">
    <div class="container">
        <div class="course-details__content">
            <div class="row">
                <div class="col-md-12">
                    <?php echo get_the_content($post_id); ?>
                </div>
            </div>
        </div><!-- /.course-details__content -->

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 the-center-home owl-theme owl-carousel activities_slider">

                    <?php
                    $activities_gallery = get_post_meta($post_id, 'activities_gallery', true);
                    $activities_gallery_items = explode(",", $activities_gallery);
                    unset($activities_gallery_items[0]);
                    if( !empty($activities_gallery_items) && count($activities_gallery_items) > 0 ):
                        foreach ($activities_gallery_items as $activities_gallery_item):
                            ?>

                            <img src="<?php echo esc_url( wp_get_attachment_url( $activities_gallery_item ) );?>" alt="">

                        <?php
                        endforeach;
                    endif;
                    ?>

                </div>
                <div class="col-md-3"></div>
            </div>


            <div class="col-md-12">
                <a href="<?php echo home_url();?>/contact-us" class="thm-btn course-details__btn">Contact for more details</a>
            </div>

    </div><!-- /.container -->
</section>


<?php get_footer(); ?>
