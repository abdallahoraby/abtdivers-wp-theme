<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Abtdivers
 */
global $abtdivers;
?>

<footer class="site-footer-one">

    <div class="site-footer-one__bg" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/background/footer-bg-1-1.jpg);"></div>
    <!-- /.site-footer-one__bg -->

    <!-- footer fishes -->
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shapes/fish-f-1.png" alt="" class="site-footer__fish-1">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shapes/fish-f-2.png" alt="" class="site-footer__fish-2">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shapes/fish-f-3.png" alt="" class="site-footer__fish-3">

    <!-- footer trees -->
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shapes/tree-f-1.png" class="site-footer__tree-1" alt="">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shapes/tree-f-2.png" class="site-footer__tree-2" alt="">

    <div class="site-footer-one__upper">
        <div class="container">
            <div class="footer-widget-row">
                <?php if( $abtdivers['enable_widget_1'] === '1'  ): ?>
                <div class="footer-widget footer-widget__about">
                    <div class="footer-widget__inner">
                        <a href="<?php echo home_url();?>">
                            <img src="<?php echo $abtdivers['footer_logo']['url']; ?>" alt="" width="143">
                        </a>
                        <p> <?php echo $abtdivers['footer_copyright'];?> </p>
                    </div><!-- /.footer-widget__inner -->
                </div><!-- /.footer-widget -->
                <?php endif; ?>

                <?php if( $abtdivers['enable_widget_2'] === '1' ): ?>
                <div class="footer-widget footer-widget__links__widget-1">
                    <div class="footer-widget__inner">
                        <h3 class="footer-widget__title"> <?php echo $abtdivers['widget_2_title'];?> </h3><!-- /.footer-widget__title -->
                        <?php
                            wp_nav_menu( array(
                                'menu_id' => $abtdivers['widget_2_menu'], // could be used __() for translations
                                'menu_class' => 'footer-widget__links-list list-unstyled',
                            ) );
                        ?>

                    </div><!-- /.footer-widget__inner -->
                </div><!-- /.footer-widget -->
                <?php endif; ?>

                <?php if( $abtdivers['enable_widget_3'] === '1' ): ?>
                <div class="footer-widget footer-widget__links__widget-2">
                    <div class="footer-widget__inner">
                        <h3 class="footer-widget__title"> <?php echo $abtdivers['widget_3_title'];?> </h3><!-- /.footer-widget__title -->
                        <?php
                        wp_nav_menu( array(
                            'menu_id' => $abtdivers['widget_3_menu'], // could be used __() for translations
                            'menu_class' => 'footer-widget__links-list list-unstyled',
                        ) );
                        ?>
                    </div><!-- /.footer-widget__inner -->
                </div><!-- /.footer-widget -->
                <?php endif; ?>

                <?php if( $abtdivers['enable_widget_4'] === '1' ): ?>
                <div class="footer-widget footer-widget__links__widget-3">
                    <div class="footer-widget__inner">
                        <h3 class="footer-widget__title"> <?php echo $abtdivers['widget_4_title'];?> </h3><!-- /.footer-widget__title -->
                        <?php
                        wp_nav_menu( array(
                            'menu_id' => $abtdivers['widget_4_menu'], // could be used __() for translations
                            'menu_class' => 'footer-widget__links-list list-unstyled',
                        ) );
                        ?>
                    </div><!-- /.footer-widget__inner -->
                </div><!-- /.footer-widget -->
                <?php endif; ?>


                <?php if( $abtdivers['enable_widget_5'] === '1' ): ?>
                <div class="footer-widget footer-widget__social__widget">
                    <div class="footer-widget__inner">
                        <h3 class="footer-widget__title"><?php echo $abtdivers['footer_follow_title'];?></h3><!-- /.footer-widget__title -->
                        <div class="footer-widget__social">
                            <?php if(!empty($abtdivers['footer_facebook_url'])): ?>
                                <a href="<?php echo $abtdivers['footer_facebook_url']; ?>"><i class="fab fa-facebook-square"></i></a>
                            <?php endif; ?>

                            <?php if(!empty($abtdivers['footer_instagram_url'])): ?>
                                <a href="<?php echo $abtdivers['footer_instagram_url']; ?>"><i class="fab fa-instagram-square"></i></a>
                            <?php endif; ?>

                            <?php if(!empty($abtdivers['footer_youtube_url'])): ?>
                                <a href="<?php echo $abtdivers['footer_youtube_url']; ?>"><i class="fab fa-youtube-square"></i></a>
                            <?php endif; ?>

                            <?php if(!empty($abtdivers['footer_twitter_url'])): ?>
                                <a href="<?php echo $abtdivers['footer_twitter_url']; ?>"><i class="fab fa-twitter-square"></i></a>
                            <?php endif; ?>

                        </div><!-- /.footer-widget__social -->
                    </div><!-- /.footer-widget__inner -->
                </div><!-- /.footer-widget -->
                <?php endif; ?>


            </div><!-- /.footer-widget-row -->
        </div><!-- /.container -->
    </div><!-- /.site-footer-one__upper -->

    <?php if( $abtdivers['enable_footer_copyright'] === '1' ): ?>
    <div class="site-footer__bottom">
        <div class="container">
            <div class="row">

                <?php if(!empty($abtdivers['footer_phone_number'])): ?>
                <div class="col-lg-4">
                    <a href="tel:<?php echo $abtdivers['footer_phone_number'];?>"><i class="fa fa-phone-alt"></i><?php echo $abtdivers['footer_phone_number'];?></a>
                </div><!-- /.col-lg-4 -->
                <?php endif; ?>

                <?php if(!empty($abtdivers['footer_phone_email'])): ?>
                <div class="col-lg-4">
                    <a href="mailto:<?php echo $abtdivers['footer_phone_email'];?>"><i class="fa fa-envelope"></i><?php echo $abtdivers['footer_phone_email'];?></a>
                </div><!-- /.col-lg-4 -->
                <?php endif; ?>

                <?php if(!empty($abtdivers['footer_phone_address'])): ?>
                <div class="col-lg-4">
                    <a href="#"><i class="fa fa-map"></i><?php echo $abtdivers['footer_phone_address'];?></a>
                </div><!-- /.col-lg-4 -->
                <?php endif; ?>

            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.site-footer__bottom -->
    <?php endif; ?>

</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
