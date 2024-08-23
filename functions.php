<?php
function tmdr_script_enqueue(){
    /*CSS */    
    wp_enqueue_style('allcss', get_template_directory_uri(). "/css/style.css", array(), "1.0.0", "all");
    

    /*JavaScript */
    wp_enqueue_script('globaljs', get_template_directory_uri(). "/js/main.js", array(), "1.0.0", true);
    

    /*home css */
    if (is_page_template('page-home.php')){
        wp_enqueue_style( 'swipercss', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.2/swiper-bundle.min.css' );
        wp_enqueue_style('homecss', get_template_directory_uri(). "/css/pages/home.css", array(), "1.0.0", "all");

        wp_enqueue_script( 'swiperjs', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.2/swiper-bundle.min.js',array(),'8.4.2',true);
        wp_enqueue_script('homejs', get_template_directory_uri(). "/js/pages/home.js", array(), "1.0.0", true);
    
    }
    if (is_page_template('page-portfolio.php')){
        wp_enqueue_style('portfoliocss', get_template_directory_uri(). "/css/pages/portfolio.css", array(), "1.0.0", "all");
        wp_enqueue_script('portfoliojs', get_template_directory_uri(). "/js/pages/portfolio.js", array(), "1.0.0", true);
    }
    if (is_page_template('page-blog.php') || is_search() || is_tax() || is_tag()){
        wp_enqueue_style('blogcss', get_template_directory_uri(). "/css/pages/blog.css", array(), "1.0.0", "all");
        
    }
    if (is_page_template('page-contact.php')){
        wp_enqueue_style('contactcss', get_template_directory_uri(). "/css/pages/contact.css", array(), "1.0.0", "all");   
    }
    if (is_singular('article')){
        wp_enqueue_style('singleblogcss', get_template_directory_uri(). "/css/pages/single-blog.css", array(), "1.0.0", "all");
        
    }
    
    

}
add_action('wp_enqueue_scripts','tmdr_script_enqueue');


function tmdr_add_google_fonts(){

    $google_fonts_url_display = 'https://fonts.googleapis.com/css2?family=Pacifico&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap';
    $google_fonts_url_paragraph = 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Pacifico&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap';

    ?>

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>

    <link rel="preload" as="style" href="<?php echo $google_fonts_url_display; ?>" />
    <link rel="preload" as="style" href="<?php echo $google_fonts_url_paragraph; ?>" />
    
    <link rel="stylesheet" href="<?php echo $google_fonts_url_display; ?>" media="print" onload="this.media='all'"/>
    <link rel="stylesheet" href="<?php echo $google_fonts_url_paragraph; ?>" media="print" onload="this.media='all'"/>

    <noscript>
        <link rel="stylesheet" href="<?php echo $google_fonts_url_display; ?>" />
        <link rel="stylesheet" href="<?php echo $google_fonts_url_paragraph; ?>" />
    </noscript>


    <?php
}
add_action('wp_head', 'tmdr_add_google_fonts');

function tmdr_custom_logo_setup(){
    $defaults = array(
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    );
    
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'tmdr_custom_logo_setup');

function tmdr_change_logo_class( $html ){
    $html = str_replace('custom-logo-link','navbar-brand',$html);
    $html = str_replace('custom-logo','img-responsive',$html);

    return $html;
}
add_filter('get_custom_logo', 'tmdr_change_logo_class');

function tmdr_theme_setup(){
    add_theme_support('menus');

    register_nav_menu('main_menu', 'Main Menu');
}
add_action('init','tmdr_theme_setup');

add_theme_support( 'post-thumbnails' );

/*
===========================

REMOVE P TAG FROM CONTACT FORM 7

===========================
*/
add_filter('wpcf7_autop_or_not', '__return_false');