<?php

/**** courses meta page *****/

add_action( 'add_meta_boxes', function() {
    add_meta_box( 'custom-metabox', 'Additional Info', 'fill_metabox', 'courses', 'normal', 'high' );

});


function fill_metabox( $post ) {

    global $post;
    $gpminvoice_group = get_post_meta($post->ID, 'courses_checklist', true);
    wp_nonce_field( basename(__FILE__), 'mam_nonce' );

    ?>



    <h3>Duration: </h3>
    <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'course_duration', true) ;?>" id="course_duration" name="course_duration">

    <h3>Equipment: </h3>
    <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'course_equipment', true) ;?>" id="course_equipment" name="course_equipment">

    <hr>

    <script type="text/javascript">
        jQuery(document).ready(function( $ ){
            $( '#add-row' ).on('click', function() {
                var row = $( '.empty-row.screen-reader-text' ).clone(true);
                row.removeClass( 'empty-row screen-reader-text' );
                row.insertBefore( '#repeatable-fieldset-one tbody>tr:last' );
                return false;
            });

            $( '.remove-row' ).on('click', function() {
                $(this).parents('tr').remove();
                return false;
            });
        });
    </script>
    <table id="repeatable-fieldset-one" width="100%">
        <tbody>
        <?php
        if ( $gpminvoice_group ) :
            foreach ( $gpminvoice_group as $field ) {
                ?>
                <tr>
                    <td width="15%">
                        <input type="text"  placeholder="Checklist Title" name="courses_checklist_title[]" value="<?php if($field['courses_checklist_title'] != '') echo esc_attr( $field['courses_checklist_title'] ); ?>" /></td>

                    <td width="15%"><a class="button remove-row" href="#1">Remove</a></td>
                </tr>
                <?php
            }
        else :
            // show a blank one
            ?>
            <tr>
                <td>
                    <input type="text" placeholder="Checklist Title" title="Title" name="courses_checklist_title[]" /></td>
                <td><a class="button  cmb-remove-row-button button-disabled" href="#">Remove</a></td>
            </tr>
        <?php endif; ?>

        <!-- empty hidden one for jQuery -->
        <tr class="empty-row screen-reader-text">
            <td>
                <input type="text" placeholder="Checklist Title" name="courses_checklist_title[]"/></td>
            <td><a class="button remove-row" href="#">Remove</a></td>
        </tr>
        </tbody>
    </table>
    <p><a id="add-row" class="button" href="#">Add another</a></p>

    <hr>

    <h3>Overview: </h3>
    <?php
    $course_overview = get_post_meta($post->ID, 'course_overview', true); ?>

    <table class="full-width">
        <tr>
            <td><?php wp_editor($course_overview, 'course_overview', array(
                    'wpautop'               =>      true,
                    'media_buttons' =>      true,
                    'textarea_name' =>      'course_overview',
                    'textarea_rows' =>      10,
                    'teeny'                 =>      true
                )); ?>
            </td>
        </tr>
    </table>


    <h3> Requirements: </h3>
    <?php
    $course_requirements = get_post_meta($post->ID, 'course_requirements', true); ?>

    <table class="full-width">
        <tr>
            <td><?php wp_editor($course_requirements, 'course_requirements', array(
                    'wpautop'               =>      true,
                    'media_buttons' =>      true,
                    'textarea_name' =>      'course_requirements',
                    'textarea_rows' =>      10,
                    'teeny'                 =>      true
                )); ?>
            </td>
        </tr>
    </table>

    <h3>Price: </h3>
    <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'course_price', true) ;?>" id="course_price" name="course_price">

    <h3>Video Url: </h3>
    <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'course_video_url', true) ;?>" id="course_video_url" name="course_video_url">

    <h3>Book Now Url: </h3>
    <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'course_book_url', true) ;?>" id="course_book_url" name="course_book_url">



    <?php
}


add_action( 'save_post', function( $post_id ) {
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'mam_nonce' ] ) && wp_verify_nonce( $_POST[ 'mam_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }


    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['course_duration'] ) ) {
        update_post_meta( $post_id, 'course_duration', $_POST['course_duration'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'course_duration' );
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['course_equipment'] ) ) {
        update_post_meta( $post_id, 'course_equipment', $_POST['course_equipment'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'course_equipment' );
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['course_overview'] ) ) {
        update_post_meta( $post_id, 'course_overview', $_POST['course_overview'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'course_overview' );
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['course_requirements'] ) ) {
        update_post_meta( $post_id, 'course_requirements', $_POST['course_requirements'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'course_requirements' );
    }

    $old = get_post_meta($post_id, 'courses_checklist', true);
    $new = array();
    $courses_checklist_title =  !empty( $_POST['courses_checklist_title'] ) ? $_POST['courses_checklist_title'] : array();
    $count = count( $courses_checklist_title );
    for ( $i = 0; $i < $count; $i++ ) {
        if ( $courses_checklist_title[$i] != '' ) :
            $new[$i]['courses_checklist_title'] = stripslashes( strip_tags( $courses_checklist_title[$i] ) );
        endif;
    }
    if ( !empty( $new ) && $new != $old )
        update_post_meta( $post_id, 'courses_checklist', $new );
    elseif ( empty($new) && $old )
        delete_post_meta( $post_id, 'courses_checklist', $old );


    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['course_price'] ) ) {
        update_post_meta( $post_id, 'course_price', $_POST['course_price'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'course_price' );
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['course_video_url'] ) ) {
        update_post_meta( $post_id, 'course_video_url', $_POST['course_video_url'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'course_video_url' );
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['course_book_url'] ) ) {
        update_post_meta( $post_id, 'course_book_url', $_POST['course_book_url'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'course_book_url' );
    }




});

/**** activities meta page *****/

add_action( 'add_meta_boxes', function() {
    add_meta_box( 'metabox-activities', 'Additional Info', 'fill_metabox_activities', 'activities', 'normal', 'high' );

});


function fill_metabox_activities( $post ) {

    wp_nonce_field( basename(__FILE__), 'mam_nonce' );

    ?>

    

    <?php
        function misha_gallery_field( $name, $value = '' ) {

        $html = '<div><ul class="misha_gallery_mtb">';
        /* array with image IDs for hidden field */
        $hidden = array();


        if( $images = get_posts( array(
            'post_type' => 'attachment',
            'orderby' => 'post__in', /* we have to save the order */
            'order' => 'ASC',
            'post__in' => explode(',',$value), /* $value is the image IDs comma separated */
            'numberposts' => -1,
            'post_mime_type' => 'image'
        ) ) ) {

            foreach( $images as $image ) {
                $hidden[] = $image->ID;
                $image_src = wp_get_attachment_image_src( $image->ID, array( 80, 80 ) );
                $html .= '<li data-id="' . $image->ID .  '"><span style="background-image:url(' . $image_src[0] . ')"></span><a href="#" class="misha_gallery_remove">×</a></li>';
            }

        }

        $html .= '</ul><div style="clear:both"></div></div>';
        $html .= '<input type="hidden" name="'.$name.'" value="' . join(',',$hidden) . '" /><a href="#" class="button misha_upload_gallery_button">Add Images</a>';

        return $html;
    }
    ?>

    <h3>Select Images: </h3>
    <?php $meta_key = 'activities_gallery';
        echo misha_gallery_field( $meta_key, get_post_meta($post->ID, $meta_key, true) );
    ?>


    <?php
}


add_action( 'save_post', function( $post_id ) {
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'mam_nonce' ] ) && wp_verify_nonce( $_POST[ 'mam_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }


    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['activities_gallery'] ) ) {
        update_post_meta( $post_id, 'activities_gallery', $_POST['activities_gallery'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'activities_gallery' );
    }



});



/******************************************
 * Home Metabox data
*******************************************/

add_action('admin_init','my_meta_init');
function my_meta_init()
{
    $ID_posted = !empty($_POST['post_ID']) ? $_POST['post_ID'] : '';
    $post_id = !empty($_GET['post']) ? $_GET['post'] : $ID_posted ;
    // checks for post/page ID
    $home_page_id = get_id_by_slug('home');
    if ($post_id == $home_page_id)
    {
        add_meta_box('factory_meta', 'Home Sections Info', 'factory_meta',   'page', 'normal', 'high');
    }

    function factory_meta( $post ) {
        wp_nonce_field( basename(__FILE__), 'mam_nonce' );

        global $post;
        $gpminvoice_group = get_post_meta($post->ID, 'factory_video_urls', true);
        wp_nonce_field( 'gpm_repeatable_meta_box_nonce', 'gpm_repeatable_meta_box_nonce' );
        ?>


        <h3 class="section">Hero Video Url: </h3>
        <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'hero_video_url', true) ;?>" id="hero_video_url" name="hero_video_url">

        <hr>

        <h3 class="section"> About us section </h3>
        <h4>Sub-title: </h4>
        <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'about_sub_title', true) ;?>" id="about_sub_title" name="about_sub_title">

        <h4>Title: </h4>
        <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'about_title', true) ;?>" id="about_title" name="about_title">

        <h4>About Description: </h4>
        <?php
        $about_description = get_post_meta($post->ID, 'about_description', true); ?>

        <table class="full-width">
            <tr>
                <td><?php wp_editor($about_description, 'about_description', array(
                        'wpautop'               =>      true,
                        'media_buttons' =>      true,
                        'textarea_name' =>      'about_description',
                        'textarea_rows' =>      10,
                        'teeny'                 =>      true
                    )); ?>
                </td>
            </tr>
        </table>

        <h4>About Video Poster: </h4>
        <?php
            $meta_key = 'about_video_poster';
            echo misha_image_uploader_field( $meta_key, get_post_meta($post->ID, $meta_key, true) );
        ?>

        <h4>About Video Url: </h4>
        <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'about_video_url', true) ;?>" id="about_video_url" name="about_video_url">

        <hr>
        <h3 class="section">All Courses Section</h3>
        <h4>Sub-title: </h4>
        <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'courses_sub_title', true) ;?>" id="courses_sub_title" name="courses_sub_title">

        <h4>Title: </h4>
        <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'courses_title', true) ;?>" id="courses_title" name="courses_title">

        <h4>Description: </h4>
        <?php
        $courses_description = get_post_meta($post->ID, 'courses_description', true); ?>
        <table class="full-width">
            <tr>
                <td><?php wp_editor($courses_description, 'courses_description', array(
                        'wpautop'               =>      true,
                        'media_buttons' =>      true,
                        'textarea_name' =>      'courses_description',
                        'textarea_rows' =>      10,
                        'teeny'                 =>      true
                    )); ?>
                </td>
            </tr>
        </table>

        <hr>
        <h3 class="section">Testimonials Section</h3>
        <h4>Sub-title: </h4>
        <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'testimonials_sub_title', true) ;?>" id="testimonials_sub_title" name="testimonials_sub_title">

        <h4>Title: </h4>
        <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'testimonials_title', true) ;?>" id="testimonials_title" name="testimonials_title">

        <h3 class="section"> The Center  </h3>
        <h4>Title: </h4>
        <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'the_center_title', true) ;?>" id="the_center_title" name="the_center_title">

        <h4>Description: </h4>
        <?php
        $the_center_description = get_post_meta($post->ID, 'the_center_desc', true); ?>
        <table class="full-width">
            <tr>
                <td><?php wp_editor($the_center_description, 'the_center_desc', array(
                        'wpautop'               =>      true,
                        'media_buttons' =>      true,
                        'textarea_name' =>      'the_center_desc',
                        'textarea_rows' =>      10,
                        'teeny'                 =>      true
                    )); ?>
                </td>
            </tr>
        </table>

        <h4>Button 1 Text: </h4>
        <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'center_button_one_text', true) ;?>" id="center_button_one_text" name="center_button_one_text">

        <h4>Button 1 Link: </h4>
        <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'center_button_one_link', true) ;?>" id="center_button_one_link" name="center_button_one_link">

        <h4>Button 2 Text: </h4>
        <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'center_button_two_text', true) ;?>" id="center_button_two_text" name="center_button_two_text">

        <h4>Button 2 Link: </h4>
        <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'center_button_two_link', true) ;?>" id="center_button_two_link" name="center_button_two_link">

        <h4> The Center Gallery: </h4>
        <?php
        function misha_gallery_field( $name, $value = '' ) {

            $html = '<div><ul class="misha_gallery_mtb">';
            /* array with image IDs for hidden field */
            $hidden = array();


            if( $images = get_posts( array(
                'post_type' => 'attachment',
                'orderby' => 'post__in', /* we have to save the order */
                'order' => 'ASC',
                'post__in' => explode(',',$value), /* $value is the image IDs comma separated */
                'numberposts' => -1,
                'post_mime_type' => 'image'
            ) ) ) {

                foreach( $images as $image ) {
                    $hidden[] = $image->ID;
                    $image_src = wp_get_attachment_image_src( $image->ID, array( 80, 80 ) );
                    $html .= '<li data-id="' . $image->ID .  '"><span style="background-image:url(' . $image_src[0] . ')"></span><a href="#" class="misha_gallery_remove">×</a></li>';
                }

            }

            $html .= '</ul><div style="clear:both"></div></div>';
            $html .= '<input type="hidden" name="'.$name.'" value="' . join(',',$hidden) . '" /><a href="#" class="button misha_upload_gallery_button">Add Images</a>';

            return $html;
        }

        /*
        * Meta Box HTML
        */

        $meta_key = 'the_center_gallery';
        echo misha_gallery_field( $meta_key, get_post_meta($post->ID, $meta_key, true) );

        ?>


        <?php

    }

    add_action( 'save_post', function( $post_id ) {
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[ 'mam_nonce' ] ) && wp_verify_nonce( $_POST[ 'mam_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

        if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
            return;
        }



        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['hero_video_url'] ) ) {
            update_post_meta( $post_id, 'hero_video_url', $_POST['hero_video_url'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'hero_video_url' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['about_sub_title'] ) ) {
            update_post_meta( $post_id, 'about_sub_title', $_POST['about_sub_title'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'about_sub_title' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['about_title'] ) ) {
            update_post_meta( $post_id, 'about_title', $_POST['about_title'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'about_title' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['about_description'] ) ) {
            update_post_meta( $post_id, 'about_description', $_POST['about_description'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'about_description' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['about_video_poster'] ) ) {
            update_post_meta( $post_id, 'about_video_poster', $_POST['about_video_poster'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'about_video_poster' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['about_video_url'] ) ) {
            update_post_meta( $post_id, 'about_video_url', $_POST['about_video_url'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'about_video_url' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['courses_sub_title'] ) ) {
            update_post_meta( $post_id, 'courses_sub_title', $_POST['courses_sub_title'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'courses_sub_title' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['courses_title'] ) ) {
            update_post_meta( $post_id, 'courses_title', $_POST['courses_title'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'courses_title' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['courses_description'] ) ) {
            update_post_meta( $post_id, 'courses_description', $_POST['courses_description'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'courses_description' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['testimonials_sub_title'] ) ) {
            update_post_meta( $post_id, 'testimonials_sub_title', $_POST['testimonials_sub_title'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'testimonials_sub_title' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['testimonials_title'] ) ) {
            update_post_meta( $post_id, 'testimonials_title', $_POST['testimonials_title'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'testimonials_title' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['the_center_title'] ) ) {
            update_post_meta( $post_id, 'the_center_title', $_POST['the_center_title'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'the_center_title' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['the_center_desc'] ) ) {
            update_post_meta( $post_id, 'the_center_desc', $_POST['the_center_desc'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'the_center_desc' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['center_button_one_text'] ) ) {
            update_post_meta( $post_id, 'center_button_one_text', $_POST['center_button_one_text'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'center_button_one_text' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['center_button_one_link'] ) ) {
            update_post_meta( $post_id, 'center_button_one_link', $_POST['center_button_one_link'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'center_button_one_link' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['center_button_two_text'] ) ) {
            update_post_meta( $post_id, 'center_button_two_text', $_POST['center_button_two_text'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'center_button_two_text' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['center_button_two_link'] ) ) {
            update_post_meta( $post_id, 'center_button_two_link', $_POST['center_button_two_link'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'center_button_two_link' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['the_center_gallery'] ) ) {
            update_post_meta( $post_id, 'the_center_gallery', $_POST['the_center_gallery'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'the_center_gallery' );
        }












    });



}


/**** Gallery meta page *****/

add_action( 'add_meta_boxes', function() {
    add_meta_box( 'gallery-metabox', 'Gallery', 'gallery_metabox', 'gallery', 'normal', 'high' );

});



function gallery_metabox( $post ) {

    global $post;
    $gpminvoice_group = get_post_meta($post->ID, 'courses_checklist', true);
    wp_nonce_field( basename(__FILE__), 'mam_nonce' );

    function misha_gallery_field( $name, $value = '' ) {

        $html = '<div><ul class="misha_gallery_mtb">';
        /* array with image IDs for hidden field */
        $hidden = array();


        if( $images = get_posts( array(
            'post_type' => 'attachment',
            'orderby' => 'post__in', /* we have to save the order */
            'order' => 'ASC',
            'post__in' => explode(',',$value), /* $value is the image IDs comma separated */
            'numberposts' => -1,
            'post_mime_type' => 'image'
        ) ) ) {

            foreach( $images as $image ) {
                $hidden[] = $image->ID;
                $image_src = wp_get_attachment_image_src( $image->ID, array( 80, 80 ) );
                $html .= '<li data-id="' . $image->ID .  '"><span style="background-image:url(' . $image_src[0] . ')"></span><a href="#" class="misha_gallery_remove">×</a></li>';
            }

        }

        $html .= '</ul><div style="clear:both"></div></div>';
        $html .= '<input type="hidden" name="'.$name.'" value="' . join(',',$hidden) . '" /><a href="#" class="button misha_upload_gallery_button">Add Images</a>';

        return $html;
    }
        $gallery_type = get_post_meta($post->ID, 'gallery_type', true);

    ?>

    <h3>Select Media Type:</h3>
    <select name="gallery_type" id="gallery_type" required>
        <option value="none">-- select gallery type --</option>
        <option value="photos" <?php echo ($gallery_type === 'photos') ? 'selected' : ''; ?> > Photos </option>
        <option value="videos" <?php echo ($gallery_type === 'videos') ? 'selected' : ''; ?>> Videos </option>
    </select>

    <div class="photos-type" <?php echo ($gallery_type === 'photos') ? '' : 'hidden'; ?> >
        <h3>Select Images / Videos: </h3>
        <?php $meta_key = 'gallery';
        echo misha_gallery_field( $meta_key, get_post_meta($post->ID, $meta_key, true) );

        ?>
    </div>

    <div class="videos-type" <?php echo ($gallery_type === 'videos') ? '' : 'hidden'; ?> >
        <h3>Select Images / Videos: </h3>
        <?php

        global $post;
        $gpminvoice_group = get_post_meta($post->ID, 'gallery_video_urls', true);
        wp_nonce_field( 'gpm_repeatable_meta_box_nonce', 'gpm_repeatable_meta_box_nonce' );
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function( $ ){
                $( '#add-row' ).on('click', function() {
                    var row = $( '.empty-row.screen-reader-text' ).clone(true);
                    row.removeClass( 'empty-row screen-reader-text' );
                    row.insertBefore( '#repeatable-fieldset-one tbody>tr:last' );
                    return false;
                });

                $( '.remove-row' ).on('click', function() {
                    $(this).parents('tr').remove();
                    return false;
                });
            });
        </script>
        <table id="repeatable-fieldset-one" width="100%">
            <tbody>
            <?php
            if ( $gpminvoice_group ) :
                foreach ( $gpminvoice_group as $field ) {
                    ?>
                    <tr>
                        <td width="80%">
                            <input class="full-width" type="text"  placeholder="video_url" name="video_url[]" value="<?php if($field['video_url'] != '') echo esc_attr( $field['video_url'] ); ?>" /></td>
                        <td width="20%"><a class="button remove-row" href="#1">Remove</a></td>
                    </tr>
                    <?php
                }
            else :
                // show a blank one
                ?>
                <tr>
                    <td>
                        <input class="full-width" type="text" placeholder="video_url" title="video_url" name="video_url[]" />
                    </td>
                    <td><a class="button  cmb-remove-row-button button-disabled" href="#">Remove</a></td>
                </tr>
            <?php endif; ?>

            <!-- empty hidden one for jQuery -->
            <tr class="empty-row screen-reader-text">
                <td>
                    <input class="full-width" type="text" placeholder="video_url" name="video_url[]"/></td>
                <td><a class="button remove-row" href="#">Remove</a></td>
            </tr>
            </tbody>
        </table>
        <p><a id="add-row" class="button" href="#">Add Another Video Url</a></p>

    </div>


    <?php
}


add_action( 'save_post', function( $post_id ) {
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'mam_nonce' ] ) && wp_verify_nonce( $_POST[ 'mam_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }


    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['gallery_type'] ) ) {
        update_post_meta( $post_id, 'gallery_type', $_POST['gallery_type'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'gallery_type' );
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['gallery'] ) ) {
        update_post_meta( $post_id, 'gallery', $_POST['gallery'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'gallery' );
    }

    $old = get_post_meta($post_id, 'gallery_video_urls', true);
    $new = array();
    $video_urls = !empty($_POST['video_url']) ? $_POST['video_url'] : array();
    $count = count( $video_urls );
    for ( $i = 0; $i < $count; $i++ ) {
        if ( $video_urls[$i] != '' ) :
            $new[$i]['video_url'] = stripslashes( strip_tags( $video_urls[$i] ) );

        endif;
    }
    if ( !empty( $new ) && $new != $old )
        update_post_meta( $post_id, 'gallery_video_urls', $new );
    elseif ( empty($new) && $old )
        delete_post_meta( $post_id, 'gallery_video_urls', $old );





});


/**** Dive Sites meta page *****/

add_action( 'add_meta_boxes', function() {
    add_meta_box( 'dive-sites-metabox', 'Site Info', 'dive_site_metabox', 'dive-sites', 'normal', 'high' );

});



function dive_site_metabox( $post ) {

    global $post;
    $gpminvoice_group = get_post_meta($post->ID, 'courses_checklist', true);
    wp_nonce_field( basename(__FILE__), 'mam_nonce' );

    ?>

    <div class="row">
        <div class="col-md-6">
            <h3>Skill Level: </h3>
            <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'skill_level', true) ;?>" id="skill_level" name="skill_level">
        </div>

        <div class="col-md-6">
            <h3>Max Depth: </h3>
            <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'max_depth', true) ;?>" id="max_depth" name="max_depth">
        </div>

        <div class="col-md-6">
            <h3>Access: </h3>
            <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'access', true) ;?>" id="access" name="access">
        </div>

        <div class="col-md-6">
            <h3>Distance from port: </h3>
            <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'distance_from_port', true) ;?>" id="distance_from_port" name="distance_from_port">
        </div>

        <div class="col-md-6">
            <h3>Latitude: </h3>
            <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'latitude', true) ;?>" id="latitude" name="latitude">
        </div>

        <div class="col-md-6">
            <h3>Longitude: </h3>
            <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'longitude', true) ;?>" id="longitude" name="longitude">
        </div>

        <h3>Google Map Shortcode: </h3>
        <textarea name="dive_site_location" class="full-width" id="dive_site_location" cols="100" rows="10">
            <?php echo get_post_meta($post->ID, 'dive_site_location', true) ;?>
        </textarea>

    </div>



    <?php
        function misha_gallery_field( $name, $value = '' ) {

            $html = '<div><ul class="misha_gallery_mtb">';
            /* array with image IDs for hidden field */
            $hidden = array();


            if( $images = get_posts( array(
                'post_type' => 'attachment',
                'orderby' => 'post__in', /* we have to save the order */
                'order' => 'ASC',
                'post__in' => explode(',',$value), /* $value is the image IDs comma separated */
                'numberposts' => -1,
                'post_mime_type' => 'image'
            ) ) ) {

                foreach( $images as $image ) {
                    $hidden[] = $image->ID;
                    $image_src = wp_get_attachment_image_src( $image->ID, array( 80, 80 ) );
                    $html .= '<li data-id="' . $image->ID .  '"><span style="background-image:url(' . $image_src[0] . ')"></span><a href="#" class="misha_gallery_remove">×</a></li>';
                }

            }

            $html .= '</ul><div style="clear:both"></div></div>';
            $html .= '<input type="hidden" name="'.$name.'" value="' . join(',',$hidden) . '" /><a href="#" class="button misha_upload_gallery_button">Add Images</a>';

            return $html;
        }

        /*
        * Meta Box HTML
        */

        $meta_key = 'dive_site_gallery';
        echo '<h3>Gallery: </h3>';
        echo misha_gallery_field( $meta_key, get_post_meta($post->ID, $meta_key, true) );

    ?>


    <?php
}


add_action( 'save_post', function( $post_id ) {
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'mam_nonce' ] ) && wp_verify_nonce( $_POST[ 'mam_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }


    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['skill_level'] ) ) {
        update_post_meta( $post_id, 'skill_level', $_POST['skill_level'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'skill_level' );
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['max_depth'] ) ) {
        update_post_meta( $post_id, 'max_depth', $_POST['max_depth'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'max_depth' );
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['access'] ) ) {
        update_post_meta( $post_id, 'access', $_POST['access'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'access' );
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['distance_from_port'] ) ) {
        update_post_meta( $post_id, 'distance_from_port', $_POST['distance_from_port'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'distance_from_port' );
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['latitude'] ) ) {
        update_post_meta( $post_id, 'latitude', $_POST['latitude'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'latitude' );
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['longitude'] ) ) {
        update_post_meta( $post_id, 'longitude', $_POST['longitude'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'longitude' );
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['dive_site_gallery'] ) ) {
        update_post_meta( $post_id, 'dive_site_gallery', $_POST['dive_site_gallery'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'dive_site_gallery' );
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['dive_site_location'] ) ) {
        update_post_meta( $post_id, 'dive_site_location', $_POST['dive_site_location'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'dive_site_location' );
    }





});


/******************************************
 * About Us Metabox data
 *******************************************/

add_action('admin_init','about_us_meta');
function about_us_meta()
{
    $ID_posted = !empty($_POST['post_ID']) ? $_POST['post_ID'] : '';
    $post_id = !empty($_GET['post']) ? $_GET['post'] : $ID_posted ;
    // checks for post/page ID
    $about_page_id = get_id_by_slug('about-us');
    if ($post_id == $about_page_id)
    {
        add_meta_box('about_meta', 'About Us Sections', 'about_meta',   'page', 'normal', 'high');
    }

    function about_meta( $post ) {
        wp_nonce_field( basename(__FILE__), 'mam_nonce' );
        wp_nonce_field( 'gpm_repeatable_meta_box_nonce', 'gpm_repeatable_meta_box_nonce' );
        ?>

         <h3>Section One ( 3 columns )</h3>

        <h4>Column 01 Image: </h4>
        <?php
        $meta_key = 'section01_column01_image';
        echo misha_image_uploader_field( $meta_key, get_post_meta($post->ID, $meta_key, true) );
        ?>

        <h4> Column 1 Title: </h4>
        <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'section01_column01_title', true) ;?>" id="section01_column01_title" name="section01_column01_title">

        <h4>Column 1 Description:</h4>
        <?php
        $section01_column01_description = get_post_meta($post->ID, 'section01_column01_desc', true); ?>

        <table class="full-width">
            <tr>
                <td><?php wp_editor($section01_column01_description, 'section01_column01_desc', array(
                        'wpautop'               =>      true,
                        'media_buttons' =>      true,
                        'textarea_name' =>      'section01_column01_desc',
                        'textarea_rows' =>      10,
                        'teeny'                 =>      true
                    )); ?>
                </td>
            </tr>
        </table>

        <h4>Column 02 Image: </h4>
        <?php
        $meta_key = 'section01_column02_image';
        echo misha_image_uploader_field( $meta_key, get_post_meta($post->ID, $meta_key, true) );
        ?>

        <h4> Column 2 Title: </h4>
        <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'section01_column02_title', true) ;?>" id="section01_column02_title" name="section01_column02_title">

        <h4>Column 2 Description:</h4>
        <?php
        $section01_column02_description = get_post_meta($post->ID, 'section01_column02_desc', true); ?>

        <table class="full-width">
            <tr>
                <td><?php wp_editor($section01_column02_description, 'section01_column02_desc', array(
                        'wpautop'               =>      true,
                        'media_buttons' =>      true,
                        'textarea_name' =>      'section01_column02_desc',
                        'textarea_rows' =>      10,
                        'teeny'                 =>      true
                    )); ?>
                </td>
            </tr>
        </table>

        <h4>Column 03 Image: </h4>
        <?php
        $meta_key = 'section01_column03_image';
        echo misha_image_uploader_field( $meta_key, get_post_meta($post->ID, $meta_key, true) );
        ?>

        <h4> Column 3 Title: </h4>
        <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'section01_column03_title', true) ;?>" id="section01_column03_title" name="section01_column03_title">

        <h4>Column 3 Description:</h4>
        <?php
        $section01_column03_description = get_post_meta($post->ID, 'section01_column03_desc', true); ?>

        <table class="full-width">
            <tr>
                <td><?php wp_editor($section01_column03_description, 'section01_column03_desc', array(
                        'wpautop'               =>      true,
                        'media_buttons' =>      true,
                        'textarea_name' =>      'section01_column03_desc',
                        'textarea_rows' =>      10,
                        'teeny'                 =>      true
                    )); ?>
                </td>
            </tr>
        </table>

        <hr>

        <h3>Section 02:</h3>
        <h2> Select Image: </h2>
        <?php
        $meta_key = 'section02_image';
        echo misha_image_uploader_field( $meta_key, get_post_meta($post->ID, $meta_key, true) );
        ?>
        <h4> Title: </h4>
        <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'section02_title', true) ;?>" id="section02_title" name="section02_title">

        <h4> Description:</h4>
        <?php
        $section02_description = get_post_meta($post->ID, 'section02_desc', true); ?>

        <table class="full-width">
            <tr>
                <td><?php wp_editor($section02_description, 'section02_desc', array(
                        'wpautop'               =>      true,
                        'media_buttons' =>      true,
                        'textarea_name' =>      'section02_desc',
                        'textarea_rows' =>      10,
                        'teeny'                 =>      true
                    )); ?>
                </td>
            </tr>
        </table>

        


        <?php

    }

    add_action( 'save_post', function( $post_id ) {
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[ 'mam_nonce' ] ) && wp_verify_nonce( $_POST[ 'mam_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

        if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
            return;
        }


        //column 01
        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['section01_column01_image'] ) ) {
            update_post_meta( $post_id, 'section01_column01_image', $_POST['section01_column01_image'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'section01_column01_image' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['section01_column01_title'] ) ) {
            update_post_meta( $post_id, 'section01_column01_title', $_POST['section01_column01_title'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'section01_column01_title' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['section01_column01_desc'] ) ) {
            update_post_meta( $post_id, 'section01_column01_desc', $_POST['section01_column01_desc'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'section01_column01_desc' );
        }

        //column 02
        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['section01_column02_image'] ) ) {
            update_post_meta( $post_id, 'section01_column02_image', $_POST['section01_column02_image'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'section01_column02_image' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['section01_column02_title'] ) ) {
            update_post_meta( $post_id, 'section01_column02_title', $_POST['section01_column02_title'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'section01_column02_title' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['section01_column02_desc'] ) ) {
            update_post_meta( $post_id, 'section01_column02_desc', $_POST['section01_column02_desc'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'section01_column02_desc' );
        }

        //column3
        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['section01_column03_image'] ) ) {
            update_post_meta( $post_id, 'section01_column03_image', $_POST['section01_column03_image'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'section01_column03_image' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['section01_column03_title'] ) ) {
            update_post_meta( $post_id, 'section01_column03_title', $_POST['section01_column03_title'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'section01_column03_title' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['section01_column03_desc'] ) ) {
            update_post_meta( $post_id, 'section01_column03_desc', $_POST['section01_column03_desc'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'section01_column03_desc' );
        }

        //Section 02
        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['section02_image'] ) ) {
            update_post_meta( $post_id, 'section02_image', $_POST['section02_image'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'section02_image' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['section02_title'] ) ) {
            update_post_meta( $post_id, 'section02_title', $_POST['section02_title'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'section02_title' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['section02_desc'] ) ) {
            update_post_meta( $post_id, 'section02_desc', $_POST['section02_desc'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'section02_desc' );
        }






    });



}


/******************************************
 * Contact Us Metabox data
 *******************************************/

add_action('admin_init','contact_us_page_meta');
function contact_us_page_meta()
{
    $ID_posted = !empty($_POST['post_ID']) ? $_POST['post_ID'] : '';
    $post_id = !empty($_GET['post']) ? $_GET['post'] : $ID_posted ;
    // checks for post/page ID
    $contact_page_id = get_id_by_slug('contact-us');
    if ($post_id == $contact_page_id)
    {
        add_meta_box('contact_us_meta', 'Contact Us Sections', 'contact_us_meta',   'page', 'normal', 'high');
    }

    function contact_us_meta( $post ) {
        wp_nonce_field( basename(__FILE__), 'mam_nonce' );
        wp_nonce_field( 'gpm_repeatable_meta_box_nonce', 'gpm_repeatable_meta_box_nonce' );
        ?>

        <h3>Section 1: Contact form</h3>


        <h4> Title: </h4>
        <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'contact_form_title', true) ;?>" id="contact_form_title" name="contact_form_title">

        <h4> Description:</h4>
        <?php
        $contact_form_description = get_post_meta($post->ID, 'contact_form_desc', true); ?>

        <table class="full-width">
            <tr>
                <td><?php wp_editor($contact_form_description, 'contact_form_desc', array(
                        'wpautop'               =>      true,
                        'media_buttons' =>      true,
                        'textarea_name' =>      'contact_form_desc',
                        'textarea_rows' =>      10,
                        'teeny'                 =>      true
                    )); ?>
                </td>
            </tr>
        </table>

        <br>
        <?php
            if( get_post_meta( $post->ID, 'enable_social_icons', true ) === 'social_icon_enabled' ){
                $social_icon_enabled = 'checked';
            } else {
                $social_icon_enabled = '';
            }
        ?>
        <label for="enable_social_icons">
            Enable Follow Social Buttons:
            <input type="checkbox" id="enable_social_icons" name="enable_social_icons" value="social_icon_enabled" <?php echo $social_icon_enabled; ?> >
        </label>
        <br>



        <?php

    }

    add_action( 'save_post', function( $post_id ) {
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[ 'mam_nonce' ] ) && wp_verify_nonce( $_POST[ 'mam_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

        if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
            return;
        }


        // Contact Form section
        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['contact_form_title'] ) ) {
            update_post_meta( $post_id, 'contact_form_title', $_POST['contact_form_title'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'contact_form_title' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['contact_form_desc'] ) ) {
            update_post_meta( $post_id, 'contact_form_desc', $_POST['contact_form_desc'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'contact_form_desc' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['enable_social_icons'] ) ) {
            update_post_meta( $post_id, 'enable_social_icons', $_POST['enable_social_icons'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'enable_social_icons' );
        }



    });



}






// get_id_by_slug('any-page-slug');

function get_id_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}


function misha_image_uploader_field( $name, $value = '') {
    $image = ' button">Upload image';
    $image_size = 'full'; // it would be better to use thumbnail size here (150x150 or so)
    $display = 'none'; // display state ot the "Remove image" button

    if( $image_attributes = wp_get_attachment_image_src( $value, $image_size ) ) {

        // $image_attributes[0] - image URL
        // $image_attributes[1] - image width
        // $image_attributes[2] - image height

        $image = '"><img src="' . $image_attributes[0] . '" style="max-width:95%;display:block;" />';
        $display = 'inline-block';

    }

    return '
    <div>
        <a href="#" class="misha_upload_image_button' . $image . '</a>
        <input type="hidden" name="' . $name . '" id="' . $name . '" value="' . $value . '" />
        <a href="#" class="misha_remove_image_button" style="display:inline-block;display:' . $display . '">Remove image</a>
    </div>';
}




