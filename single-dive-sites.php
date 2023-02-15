<?php get_header(); ?>

<?php
    $post_id = get_the_ID();
    $post_title = get_the_title( $post_id );
    $post_thumbnail_url = get_the_post_thumbnail_url( $post_id, 'full' );
    $post_content = get_the_content( $post_id );
    $location = get_the_terms( $post_id, 'sites_locations' );

?>



<div class="dive-site-single-content">
    <img src="<?php echo esc_url( $post_thumbnail_url ); ?>" alt="<?php echo $post_title;?>" class="dive-site-image">

    <div class="top-image divesite-top image-background single-site-header">

        <div class="flex-fullwidth divesite-filter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="padding-sm">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="row">

                                        <div class="col-lg-6 col-md-6 d-flex justify-content-center align-content-center">
                                            <h3>Destination:</h3>
                                            <div class="select single-site-header">
                                                <select class="select2" name="slct" id="" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                                    <option value="<?php echo home_url() . '/dive-sites?location_id=all' ; ?>" <?php if( empty($location_id) || $location_id == 'all' ) echo 'selected' ; ?> >-- All Site Locations --</option>

                                                    <?php
                                                    $dive_site_locations = get_terms( array(
                                                        'taxonomy' => 'sites_locations',
                                                        'hide_empty' => false
                                                    ) );

                                                    if ( !empty($dive_site_locations) ):
                                                        foreach ($dive_site_locations as $dive_site_location):
                                                            if( (int) $location[0]->term_id === (int) $dive_site_location->term_id ):
                                                                $selected = 'selected';
                                                            else:
                                                                $selected = '';
                                                            endif;
                                                            ?>

                                                            <option value="<?php echo home_url() . '/dive-sites?location_id=' . $dive_site_location->term_id; ?>" <?php echo $selected;?>> <?php echo $dive_site_location->name;?> </option>

                                                        <?php
                                                        endforeach;
                                                    endif;
                                                    ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 d-flex justify-content-center align-content-center">
                                            <h3>Dive Site:</h3>
                                            <div class="select single-site-header">
                                                <select class="select2" name="slct" id="" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                                    <?php
                                                    // get all dive sites
                                                    $dive_sites = get_posts(
                                                        array(
                                                            'posts_per_page' => -1,
                                                            'post_type' => 'dive-sites',
                                                            'post_status' => 'publish'
                                                        )
                                                    );

                                                    if ( !empty($dive_sites) ):
                                                        foreach ($dive_sites as $dive_site):
                                                            $post_slug = basename(get_permalink($dive_site->ID));

                                                            if( (int) $dive_site->ID === (int) get_the_ID() ):
                                                                $selected = 'selected';
                                                            else:
                                                                $selected = '';
                                                            endif;

                                                            ?>

                                                            <option value="<?php echo home_url() . '/dive-sites/' . $post_slug; ?>" <?php echo $selected; ?> > <?php echo $dive_site->post_title;?> </option>

                                                        <?php
                                                        endforeach;
                                                        wp_reset_query();
                                                    endif;
                                                    ?>

                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="col-md-12 dive-title">
                <h3> <?php echo $post_title;?> </h3>
                <?php
                if( !empty($location) && count($location) > 0 ): ?>
                    <p class="location-category"> <?php echo $location[0]->name;?> </p>
                <?php endif; ?>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">

                <div class="row">
                    <div class="col-sm-6">
                        <table class="table table-white-gray">
                            <tbody>
                            <tr>
                                <td>Skill Level:</td>
                                <td><?php echo get_post_meta($post_id, 'skill_level', true);?></td>
                            </tr>
                            <tr>
                                <td>Max Depth:</td>
                                <td><?php echo get_post_meta($post_id, 'max_depth', true);?></td>
                            </tr>
                            <tr>
                                <td>Latitude:</td>
                                <td><?php echo get_post_meta($post_id, 'latitude', true);?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <table class="table table-white-gray">
                            <tbody>
                            <tr>
                                <td>Access:</td>
                                <td><?php echo get_post_meta($post_id, 'access', true);?></td>
                            </tr>
                            <tr>
                                <td>Distance from port:</td>
                                <td><?php echo get_post_meta($post_id, 'distance_from_port', true);?></td>
                            </tr>
                            <tr>
                                <td>Longitude:</td>
                                <td><?php echo get_post_meta($post_id, 'longitude', true);?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="dive-site-content">
                    <?php echo $post_content;?>
                </div>

            </div>

            <div class="col-md-6">

                <div id="carouselExampleControls" class="carousel slide dive-site-gallery" data-ride="carousel">
                    <div class="carousel-inner">

                        <?php
                            $dive_site_images_meta =  get_post_meta($post_id, 'dive_site_gallery', true);

                            if( empty( $dive_site_images_meta ) ): ?>

                                <div class="carousel-item">
                                    <img class="d-block w-100" src="<?php echo esc_url($post_thumbnail_url);?>" alt="<?php echo $post_title;?>">
                                </div>

                            <?php endif;

                            $dive_site_images = explode(",", $dive_site_images_meta);
                            unset($dive_site_images[0]);

                            if( !empty($dive_site_images) ):
                                foreach ($dive_site_images as $dive_site_image):
                        ?>

                                <div class="carousel-item">
                                    <img class="d-block w-100" src="<?php echo esc_url( wp_get_attachment_url( $dive_site_image ) );?>" alt="<?php echo $post_title;?>">
                                </div>

                        <?php
                                endforeach;
                            endif;
                        ?>


                    </div>

                    <?php if( !empty( $dive_site_images_meta ) ): ?>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?php echo get_post_meta($post_id, 'dive_site_location', true);?>
            </div>
        </div>



    </div>
</div>

<?php get_footer(); ?>
