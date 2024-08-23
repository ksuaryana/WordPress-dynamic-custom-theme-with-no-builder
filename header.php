<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo get_bloginfo( 'name' ) . ' - '. get_bloginfo( 'description' ); ?></title>
    <?php wp_head() ?>
    <?php
        if (function_exists('the_custom_logo')){
        
        }
    ?>
</head>
<body>
    <?php wp_body_open() ?>
    <header class="header">
        <a href="/" class="header__logo-section">
            <img  class="header__logo-img" src="<?php echo esc_url( wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0] ); ?>" alt="Timedoor-Main-Logo-Black">
             
        </a>
        <div class="header__menu-section" >
            <button class="header__menu-toggle" aria-controls="primary-menu" aria-expanded="false" id="burger-close-btn">
                <span class="header__hover-scale">
                    &#9776;
                </span>    
            </button>
            <nav class="header__nav">
                
                <?php
                        wp_nav_menu(
                                array(
                                    'theme_location' => 'main_menu',
                                    'depth' => 1,
                                    'container' => 'li',
                                    'container_class' => 'header__header-menu',
                                    'container_id' => '',
                                    'menu_class' => 'header__menu-font',
                                )
                            );
                    ?>
            </nav>
        </div>
  
        
    </header>
