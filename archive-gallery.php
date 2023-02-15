<?php get_header(); ?>

<section class="banner">
    <div class="info">
        <h2 class="head-title"> Media  </h2>
    </div>
</section>

<section class="select-list blue-bg text-center padding-lg">
    <div class="container">
        <ul class="list-reset isotope-button-group gallery-type-list">
            <li class="inline-block-item group">
                <?php
                    if( empty($_GET['type']) ){
                        $all_checked = 'is-checked';
                    } else {
                        $all_checked = '';
                    }
                ?>
                <a href="<?php echo home_url();?>/gallery" class="active btn-reset btn-nm padding-lg-h orange-bg text-lg white-text text-light inline-block-item rounded-nm <?php echo $all_checked;?> ">
                    Show All</a></li>


            <?php
                if ( !empty($_GET['type']) &&  ( $_GET['type'] === 'photos' ) ){
                    $photos_checked = 'is-checked';
                } else if ( !empty($_GET['type']) &&  ( $_GET['type'] === 'videos' ) ){
                    $videos_checked = 'is-checked';
                } else {
                    $photos_checked = '';
                    $videos_checked = '';
                }


            ?>

            <li class="inline-block-item group">
                <a href="<?php echo home_url();?>/gallery?type=photos" class="btn-reset btn-nm padding-lg-h orange-bg text-lg white-text text-light inline-block-item rounded-nm <?php echo $photos_checked;?>"> Photos</a>
            </li>

            <li class="inline-block-item group">
                <a href="<?php echo home_url();?>/gallery?type=videos" class="btn-reset btn-nm padding-lg-h orange-bg text-lg white-text text-light inline-block-item rounded-nm <?php echo $videos_checked;?>"> Videos</a>
            </li>

        </ul>
    </div>
</section>

<section class="content-bg padding-lg gallery">
    <div class="container">
        <div class="row ">
            <aside class="col-md-3 categories">
                <h2>Albums Category</h2>
                <ul class="isotope-button-group category isotope-filters" id="isotope-filters">

                    <?php
                        if( !empty($_GET['type']) ){
                            $meta_value = array(
                                array(
                                    'key' => 'gallery_type',
                                    'value' => $_GET['type'],
                                    'compare' => '=',
                                )
                            );
                        } else {
                            $meta_value = '';
                        }

                        // get all gallery posts in this custom taxonomy
                        $gallery_posts = get_posts(
                            array(
                                'posts_per_page' => -1,
                                'post_type' => 'gallery',
                                'meta_query' => $meta_value,
                            )
                        );


                        if( !empty($gallery_posts) && count($gallery_posts) > 0 ):
                            foreach ($gallery_posts as $gallery_post):
                                $post_gallery_title = $gallery_post->post_title;
                                $post_gallery_id = $gallery_post->ID;
                    ?>

                                <li class="get_gallery_items" data-gallery-post-id="<?php echo $post_gallery_id;?>">
                                    <a role="button" data-filter=".video"> <?php echo $post_gallery_title;?> </a>
                                </li>

                    <?php
                            endforeach;
                        else:
                            echo '<span>No Media Available.</span>';
                        endif;

                    ?>


                </ul>
            </aside>
            <div class="col-md-9">
                <div class="isotope-grid gallery-result">

                    <?php

                    if( !empty($_GET['type']) ){
                        $meta_value_last = array(
                            array(
                                'key' => 'gallery_type',
                                'value' => $_GET['type'],
                                'compare' => '=',
                            )
                        );
                    } else {
                        $meta_value_last = '';
                    }

                        // get last gallery post in this custom taxonomy
                        $last_gallery_post = get_posts(
                            array(
                                'posts_per_page' => 1,
                                'post_type' => 'gallery',
                                'meta_query' => $meta_value_last,
                                'orderby'   => 'date',
                                'order'     => 'DESC',
                            )
                        );


                        $gallery_type = get_post_meta($last_gallery_post[0]->ID, 'gallery_type', true);
                        if( $gallery_type === 'photos' ){
                            $gallery_items_meta = get_post_meta($last_gallery_post[0]->ID, 'gallery', true);
                            $gallery_items = explode(",", $gallery_items_meta);
                            unset($gallery_items[0]);
                        } else if ( $gallery_type === 'videos' ){
                            $video_items = get_post_meta($last_gallery_post[0]->ID, 'gallery_video_urls', true);
                        } ?>

                    <?php    if( !empty($gallery_items) && count($gallery_items) > 0  ):
                            foreach ($gallery_items as $gallery_item):
                    ?>

                                <div class="col-md-4 col-sm-6 isotope-grid-item photos">
                                    <a data-toggle="lightbox" href="<?php echo esc_url( wp_get_attachment_url( $gallery_item ) );?>" class="block-item rounded-nm margin-nm popup-youtube">
                                        <img src="<?php echo esc_url( wp_get_attachment_url( $gallery_item ) );?>" class="rounded-nm">
                                    </a>
                                </div>

                    <?php
                            endforeach;
                        endif;
                    ?>

                    <?php    if( !empty($video_items) && count($video_items) > 0 ):
                        foreach ($video_items as $video_item):
                            ?>

                        <div class="col-md-4 col-sm-6 isotope-grid-item video">
                            <a href="<?php echo $video_item['video_url'];?>" data-toggle="lightbox" data-title="" data-footer="">
                                <i class="fas fa-play-circle"></i>
                                <video style="background: url(<?php echo getVideoThumbUrl( $video_item['video_url'] ); ?>)">
                                    <source src="<?php echo $video_item['video_url']; ?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </a>
                        </div>

                        <?php
                        endforeach;
                    endif;
                    ?>


                </div>
            </div>
        </div>
    </div>
</section>



<?php get_footer(); ?>
