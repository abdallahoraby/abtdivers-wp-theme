<?php
$gallery_post_id = get_query_var( 'gallery_post_id' );

if ( $gallery_post_id ) :
    $gallery_items_meta = get_post_meta($gallery_post_id, 'gallery', true);
    $gallery_type = get_post_meta($gallery_post_id, 'gallery_type', true);

    if( $gallery_type === 'photos' ){
        $gallery_items_meta = get_post_meta($gallery_post_id, 'gallery', true);
        $gallery_items = explode(",", $gallery_items_meta);
        unset($gallery_items[0]);
    } else if ( $gallery_type === 'videos' ){
        $video_items = get_post_meta($gallery_post_id, 'gallery_video_urls', true);
    }


        if( !empty($gallery_items) && count($gallery_items) > 0 ):
            foreach ($gallery_items as $gallery_item):
    ?>

                <div class="col-md-4 col-sm-6 isotope-grid-item video">
                    <a data-toggle="lightbox" href="<?php echo esc_url( wp_get_attachment_url( $gallery_item ) );?>" class="block-item rounded-nm margin-nm popup-youtube">
                        <img src="<?php echo esc_url( wp_get_attachment_url( $gallery_item ) );?>" alt="<?php echo get_the_title($gallery_post_id);?>>" class="rounded-nm">
                    </a>
                </div>


<?php       endforeach;
        endif; ?>


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



<?php endif; ?>
