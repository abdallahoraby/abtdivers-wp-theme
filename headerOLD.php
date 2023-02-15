<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Abtdivers
 */

    global $abtdivers;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- Material Design icon font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'abtdivers' ); ?></a>



    <!-- Uses a transparent header that draws on top of the layout's background -->
<!--    <div class="layout-transparent mdl-layout mdl-js-layout">-->
<!--        <header class="mdl-layout__header mdl-layout__header--transparent">-->
<!--            <div class="mdl-layout__header-row">-->
                <!-- Title -->
<!---->
<!--                Add spacer, to align navigation to the right -->
<!--               <div class="mdl-layout-spacer"></div>-->
<!--                 Navigation -->
<!---->
<!--                <nav>-->
<!--                    <div id="logo">-->
<!--                        <span class="mdl-layout-title"><img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/temp-images/abt-logo-high.png" alt="AbtDivers"></span>-->
<!--                    </div>-->
<!---->
<!--                    <label for="drop" class="toggle">Menu</label>-->
<!--                    <input type="checkbox" id="drop" />-->
<!--                    <ul class="menu">-->
<!--                        --><?php
//
//                            $menu_name = 'primary';
//                            $locations = get_nav_menu_locations();
//                            //Get the id of 'primary_menu'
//                            $menu_id = $locations[ $menu_name ] ;
//                            //Returns a navigation menu object.
//                            $menuObject = wp_get_nav_menu_object($menu_id);
//                            // Retrieves all menu items of a navigation menu.
//                            $current_menu = $menuObject->slug;
//                            $array_menu = wp_get_nav_menu_items($current_menu);
//
//                            $menu = array();
//                            foreach ($array_menu as $m) {
//                                if (empty($m->menu_item_parent)) {
//                                    $menu[$m->ID] = array();
//                                    $menu[$m->ID]['ID']      =   $m->ID;
//                                    $menu[$m->ID]['title']       =   $m->title;
//                                    $menu[$m->ID]['url']         =   $m->url;
//                                    $menu[$m->ID]['children']    =   array();
//                                }
//                            }
//                            $submenu = array();
//                            foreach ($array_menu as $m) {
//                                if ($m->menu_item_parent) {
//                                    $submenu[$m->ID] = array();
//                                    $submenu[$m->ID]['ID']       =   $m->ID;
//                                    $submenu[$m->ID]['title']    =   $m->title;
//                                    $submenu[$m->ID]['url']  =   $m->url;
//                                    $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
//                                }
//                            }
//
//                            foreach ($menu as $menu_item):
//                                $menu_item_id = $menu_item['ID'];
//                                $menu_item_title = $menu_item['title'];
//                                $menu_item_url = $menu_item['url'];
//                                $menu_item_children = $menu_item['children'];
//
//                        ?>
<!---->
<!--                                <li>-->
<!--                                    --><?php //if( count($menu_item_children) > 0 ): ?>
<!--                                        First Tier Drop Down -->
<!--                                        <label for="drop---><?php //echo $menu_item_id;?><!--" class="toggle">--><?php //echo $menu_item_title; ?><!-- +</label>-->
<!--                                    --><?php //endif; ?>
<!---->
<!--                                        <a href="--><?php //echo $menu_item_url; ?><!--"> --><?php //echo $menu_item_title; ?><!-- </a>-->
<!---->
<!--                                    --><?php //if( count($menu_item_children) > 0 ): ?>
<!--                                        <input type="checkbox" id="drop---><?php //echo $menu_item_id;?><!--"/>-->
<!--                                        <ul class="submenu">-->
<!--                                            --><?php
//                                                foreach ($menu_item_children as $menu_item_child):
//                                                        $submenu_title = $menu_item_child['title'];
//                                                        $submenu_url = $menu_item_child['url'];
//                                            ?>
<!--                                                    <li><a href="--><?php //echo $submenu_url;?><!--"> --><?php //echo $submenu_title;?><!-- </a></li>-->
<!--                                            --><?php //endforeach; ?>
<!---->
<!--                                        </ul>-->
<!---->
<!--                                </li>-->
<!---->
<!--                            --><?php //endif; ?>
<!--                        --><?php //endforeach; ?>
<!---->
<!---->
<!--                    </ul>-->
<!--                </nav>-->
<!---->
<!--                               end Navigation-->
<!--            </div>-->
<!--        </header>-->
<!--       <main class="mdl-layout__content"></main>-->
<!--    </div>-->


    <nav class="navbar navbar-expand-lg navbar-light shadow-sm bg-light ">
        <div class="container">

            <a href="<?php echo home_url();?>" class="ml-3 font-weight-bold site-logo">
                <img src="<?php echo esc_url( $abtdivers['site_logo']['url'] ); ?>" alt="">
            </a>

            </a> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar4">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbar4">
                <ul class="navbar-nav mr-auto pl-lg-4 main-menu">

                    <?php

                            $menu_name = 'primary';
                            $locations = get_nav_menu_locations();
                            //Get the id of 'primary_menu'
                            $menu_id = $locations[ $menu_name ] ;
                            //Returns a navigation menu object.
                            $menuObject = wp_get_nav_menu_object($menu_id);
                            // Retrieves all menu items of a navigation menu.
                            $current_menu = $menuObject->slug;
                            $array_menu = wp_get_nav_menu_items($current_menu);

                            $menu = array();
                            foreach ($array_menu as $m) {
                                if (empty($m->menu_item_parent)) {
                                    $menu[$m->ID] = array();
                                    $menu[$m->ID]['ID']      =   $m->ID;
                                    $menu[$m->ID]['title']       =   $m->title;
                                    $menu[$m->ID]['url']         =   $m->url;
                                    $menu[$m->ID]['children']    =   array();
                                }
                            }
                            $submenu = array();
                            foreach ($array_menu as $m) {
                                if ($m->menu_item_parent) {
                                    $submenu[$m->ID] = array();
                                    $submenu[$m->ID]['ID']       =   $m->ID;
                                    $submenu[$m->ID]['title']    =   $m->title;
                                    $submenu[$m->ID]['url']  =   $m->url;
                                    $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
                                }
                            }

                            foreach ($menu as $menu_item):
                                $menu_item_id = $menu_item['ID'];
                                $menu_item_title = $menu_item['title'];
                                $menu_item_url = $menu_item['url'];
                                $menu_item_children = $menu_item['children'];
                                if( count($menu_item_children) > 0 ){
                                    $li_dropdown_class = 'dropdown d-menu';
                                    $a_dropdown_class = 'dropdown-toggle';
                                    $a_dropdown_id = 'dropdown' . $menu_item_id;
                                    $a_dropdown_data_toggle = ' data-toggle="dropdown" ';
                                } else {
                                    $li_dropdown_class = '';
                                    $a_dropdown_class = '';
                                    $a_dropdown_id = '';
                                    $a_dropdown_data_toggle = '';
                                }

                    ?>

                                <li class="nav-item px-lg-2 <?php echo $li_dropdown_class; ?> ">
                                    <a class="nav-link <?php echo $a_dropdown_class; ?>" <?php echo $a_dropdown_id;?> <?php echo $a_dropdown_data_toggle;?> href="<?php echo $menu_item_url; ?>"><span class="d-inline-block d-lg-none icon-width"></span><?php echo $menu_item_title; ?></a>

                                    <?php if( count($menu_item_children) > 0 ): ?>
                                        <div class="dropdown-menu shadow-sm sm-menu" aria-labelledby="<?php echo $a_dropdown_id;?>">

                                            <?php
                                                foreach ($menu_item_children as $menu_item_child):
                                                        $submenu_title = $menu_item_child['title'];
                                                        $submenu_url = $menu_item_child['url'];
                                            ?>

                                                    <a class="dropdown-item" href="<?php echo $submenu_url;?>"><?php echo $submenu_title;?></a>

                                            <?php endforeach; ?>

                                        </div>
                                    <?php endif; ?>

                                </li>

                    <?php endforeach; ?>




                </ul>


                <ul class="navbar-nav ml-auto mt-3 mt-lg-0 social-icons">

                    <?php if( !empty($abtdivers['home_social_facebook']) ): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $abtdivers['home_social_facebook']; ?>">
                                <i class="fab fa-facebook"></i><span class="d-lg-none ml-3"></span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if( !empty($abtdivers['home_social_instagram']) ): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $abtdivers['home_social_instagram']; ?>">
                                <i class="fab fa-instagram"></i><span class="d-lg-none ml-3"></span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if( !empty($abtdivers['home_social_twitter']) ): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $abtdivers['home_social_twitter']; ?>">
                                <i class="fab fa-twitter"></i><span class="d-lg-none ml-3"></span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if( !empty($abtdivers['home_social_youtube']) ): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $abtdivers['home_social_youtube']; ?>">
                                <i class="fab fa-youtube"></i><span class="d-lg-none ml-3"></span>
                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>
