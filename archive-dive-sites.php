<?php get_header(); ?>

<?php
    $location_id = !empty($_GET['location_id']) ? $_GET['location_id'] : null;

?>

<div class="top-image divesite-top image-background" style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/divesites_header.jpg) no-repeat;">
    <div class="flex-fullwidth top-title text-center">
        <div>
            <h2 class="text-4lg no-margin lithosBold color-white">Dive Sites</h2>
        </div>
    </div>
    <div class="flex-fullwidth top-icon divesite-icon">
        <div class="icon-inner">
            <i class="fas fa-map-marked-alt"></i>
        </div>
    </div>
    <div class="flex-fullwidth divesite-filter">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="padding-sm">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="padding-sm">
                                            <p class="lithos no-margin text-lg text-upper color-orange" style="float:right;">Destination</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">

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
                                                        if( (int) $location_id === (int) $dive_site_location->term_id ):
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
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="dive-sites-content">


    <section class="cards-wrapper">

        <?php

            if( !empty($location_id) && $location_id !== 'all' ):
                // loop dive sites by location id
                $dive_sites = get_posts(
                    array(
                        'posts_per_page' => -1,
                        'post_type' => 'dive-sites',
                        'post_status' => 'publish',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'sites_locations',
                                'field' => 'term_id',
                                'terms' => (int) $location_id,
                            )
                        )
                    )
                );

            if( !empty($dive_sites) && count($dive_sites) > 0 ):
                foreach ($dive_sites as $dive_site):
                    $dive_site_id = $dive_site->ID;
                    $dive_site_title = get_the_title($dive_site_id);
                    $dive_site_permalink = get_the_permalink($dive_site_id);
                    $dive_site_thumbnail_url = get_the_post_thumbnail_url($dive_site_id, 'large');
                    $dive_site_excerpt = get_the_excerpt($dive_site_id);
                    $dive_site_location_term = get_the_terms( $dive_site_id, 'sites_locations' );
                    if( !empty($dive_site_location_term) && count($dive_site_location_term) > 0 ):
                        $dive_site_location = $dive_site_location_term[0]->name;
                    endif;

            ?>

                    <div class="card-grid-space">

                        <a class="card" href="<?php echo esc_url($dive_site_permalink);?>" style="--bg-img: url('<?php echo esc_url($dive_site_thumbnail_url);?>')">
                            <div class="site-card-info">
                                <h1> <?php echo $dive_site_title; ?> </h1>
                                <p class="card-desc"> <?php echo $dive_site_excerpt; ?> </p>
                                <div class="tags">
                                    <div class="tag"> <?php echo $dive_site_location; ?> </div>
                                </div>
                            </div>
                        </a>
                    </div>

            <?php
                    endforeach;
                endif;
                wp_reset_query();
            else:
                // get all dive sites
                $dive_sites = get_posts(
                    array(
                        'posts_per_page' => -1,
                        'post_type' => 'dive-sites',
                        'post_status' => 'publish'
                    )
                );

        if( !empty($dive_sites) && count($dive_sites) > 0 ):
        foreach ($dive_sites as $dive_site):
            $dive_site_id = $dive_site->ID;
            $dive_site_title = get_the_title($dive_site_id);
            $dive_site_permalink = get_the_permalink($dive_site_id);
            $dive_site_thumbnail_url = get_the_post_thumbnail_url($dive_site_id, 'large');
            $dive_site_excerpt = get_the_excerpt($dive_site_id);
            $dive_site_location_term = get_the_terms( $dive_site_id, 'sites_locations' );
            if( !empty($dive_site_location_term) && count($dive_site_location_term) > 0 ):
                $dive_site_location = $dive_site_location_term[0]->name;
            endif;

        ?>

            <div class="card-grid-space">
                <a class="card" href="<?php echo esc_url($dive_site_permalink);?>" style="--bg-img: url('<?php echo esc_url($dive_site_thumbnail_url);?>')">
                    <div class="site-card-info">
                        <h1> <?php echo $dive_site_title; ?> </h1>
                        <p class="card-desc"> <?php echo $dive_site_excerpt; ?> </p>
                        <div class="tags">
                            <div class="tag"> <?php echo $dive_site_location; ?> </div>
                        </div>
                    </div>
                </a>
            </div>

        <?php
                    endforeach;
                endif;
                wp_reset_query();
           endif;
        ?>



    </section>

</div>


<?php get_footer(); ?>
