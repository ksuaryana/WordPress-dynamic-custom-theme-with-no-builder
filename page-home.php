<?php
/* Template Name: Home*/
?>
<?php get_header() ?>

    <div class="flip-section">
        <!-- About Section Start -->
        <section class="about" id="scroll">
            
            <div class="about__container">
                <div class="about__img-container">
                    <?php
                        $about_image = get_field('about_section_image');
                        $about_image_sz = $about_image['sizes']['medium'];
                    
                    ?>
                    <img src="<?php echo $about_image_sz; ?>" alt="<?php echo $about_image['alt'];?>">
                </div>
                
                <div class="about__content-container">
                    <h1 class="about__title">
                        <?php echo get_field('about_section_heading');?>
                    </h1>
    
                    <div class="wysiwyg-output">
                        <?php echo get_field('about_section_description');?>
                    </div>
                </div>
                    
                
            </div>
    
        </section>
        <!-- About Section End -->
    
       <!-- Hero Banner Start -->
       <section class="hero-banner">
            <div class="swiper">
                <?php if(have_rows('home_banner')):?>
                    <div class="swiper-wrapper">
                        
                        <?php while(have_rows('home_banner')): the_row(); 
                        
                        $hero_image = get_sub_field('image_banner');
                        $hero_image_sz = $hero_image['sizes']['medium'];
                        $heading_text = get_sub_field('heading_text');
                        $heading_desc = get_sub_field('heading_desc');
                        
                        ?>
                            <div class="swiper-slide ">
                                <!-- change-banner-structure -->
                                <div class="img-overlay hero-banner__img-container">
                                    <img src="<?php echo $hero_image_sz; ?>" alt="<?php echo $hero_image['alt'];?>">
                                    <div class="hero-banner__hero-slider-content" >
                                        <h2 class="hero-banner__title">
                                            <?php echo $heading_text; ?>
                                        </h2>
                                        <p class="hero-banner__sub-title">
                                            <?php echo $heading_desc; ?>
                                        </p>
                                        <a href="#scroll" class="button hero-banner__btn-scroll">
                                            Learn More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;?>
                    </div>
                <?php endif;?>
    
                <div class="swiper-button-next hero-banner__arrow-nav hero-banner__arrow-nav--button-right"></div>
                <div class="swiper-button-prev hero-banner__arrow-nav hero-banner__arrow-nav--button-left"></div>
                <div class="swiper-pagination hero-banner__custom-pagination"></div>
            </div>
    
        </section>
        <!-- Hero Banner End -->
    </div>

    
    <!-- Portfolio Section Start -->
    <section class="portfolio portfolio--grey-bg">
        <div class="portfolio__container">
            <h2 class="portfolio__section-title">
                <?php echo get_field('portfolio_section_heading');?>
            </h2>
            <hr class="hr-divider"> 
             <?php echo get_field('portfolio_section_description');?>

            <div class="portfolio__wrapper">
                <?php
                    $postPortfolioQuery = new WP_Query(array(
                        'post_type' => 'portfolio',
                        'post_status' => 'publish',
                        'posts_per_page' => 8,
                        'orderby' => 'date',
                        'order' => 'DESC',
                    ));
                                                
                ?>
                <?php if($postPortfolioQuery->have_posts()): ?>
                    <?php while($postPortfolioQuery->have_posts()): $postPortfolioQuery->the_post(); ?>
                        <div class="portfolio__item "> 
                            <?php 
                                $portfolio_image_id = get_post_thumbnail_id($postArticleQuery->ID);
                                $portfolio_image_alt = get_post_meta($portfolio_image_id, '_wp_attachment_image_alt', TRUE);
                                
                                $portfolioThumb = wp_get_attachment_image_src( $portfolio_image_id, 'single-post-thumbnail' ); 
                            ?>
                            <img class="image-aspect-ratio image-aspect-ratio__1-1" src="<?php echo $portfolioThumb[0];?>" alt="<?php echo $portfolio_image_alt ?>">

                            <div class="portfolio__description-layer ">
                                <h3 class="portfolio__prod-title">
                                    <?php echo get_the_title(); ?>
                                </h3>
                                <button class="open-modal-button button--hex-btn" data-id="modal" data-title="<?php echo get_the_title(); ?>" data-image="<?php echo $portfolioThumb[0];?>">
                                    <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.1996 22.8001C18.5015 22.8001 22.7996 18.502 22.7996 13.2001C22.7996 7.89816 18.5015 3.6001 13.1996 3.6001C7.89768 3.6001 3.59961 7.89816 3.59961 13.2001C3.59961 18.502 7.89768 22.8001 13.1996 22.8001Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M25.2005 25.2L19.9805 19.98" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                </button>
                                
                            </div>
                        </div>
                    <?php endwhile;  wp_reset_postdata(); ?>
                <?php endif?>

            </div>
        </div>
            
    </section>
    <!-- Portfolio Section End -->

    <!-- Article Section Start -->
    <section class="article">
        <div class="article__container">
            <h2 class="article__section-title">
                <?php echo get_field('article_section_heading');?>
            </h2>
            <hr class="hr-divider">
            <?php echo get_field('article_section_description');?>

            <div class="article__wrapper">
                <?php
                    $postArticleQuery = new WP_Query(array(
                        'post_type' => 'article',
                        'post_status' => 'publish',
                        'posts_per_page' => 3,
                        'orderby' => 'date',
                        'order' => 'DESC',
                    ));
                ?>

                <?php if($postArticleQuery->have_posts()): ?>
                    <?php 
                        while($postArticleQuery->have_posts()): $postArticleQuery->the_post(); 
                        $truncate_excerpt = substr(get_the_content(), 0, 250);?>
                        <div class="article__home-item">
                            <div class="article-card " >
                                <a href="<?php echo esc_url(the_permalink()); ?>">
                                    <div class="article-card__thumb">
                                        <?php if (has_post_thumbnail( $postArticleQuery->ID ) ): ?>
                                            <?php 
                                                $article_image_id = get_post_thumbnail_id($postArticleQuery->ID);
                                                $article_image_alt = get_post_meta($article_image_id, '_wp_attachment_image_alt', TRUE);
                                            
                                                $articleThumb = wp_get_attachment_image_src( $article_image_id, 'single-post-thumbnail' ); 
                                                
                                            ?>
                                            
                                            <img class="image-aspect-ratio image-aspect-ratio__15-9" src="<?php echo $articleThumb[0]; ?>" alt="<?php echo $article_image_alt ?>">
                                        <?php endif; ?>
                                        <p class="button--primary-post-date article-card__date-ribbon" >
                                            <?php echo get_the_date('M j, Y'); ?>
                                        </p>
                                    </div>
                                </a>

                                <div class="article-card__body">
                                    <h3>
                                        <a class="article-card__body-title" href="<?php echo esc_url(the_permalink()); ?>">    
                                        <?php echo get_the_title(); ?>
                                        </a>
                                    </h3>
                                    <p class="article-card__body-excerpt ellipsis__home-article">
                                        <?php echo $truncate_excerpt; ?>
                                    </p>
                                    <a href="<?php echo esc_url(the_permalink()); ?>" class="button article-card__body-read-more">
                                        Continue Reading
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.9587 9.3585C18.3119 9.71174 18.3119 10.2883 17.9587 10.6415L11.0395 17.5605C10.6857 17.9143 10.1102 17.9143 9.75643 17.5605L9.3694 17.1735C9.0153 16.8194 9.01522 16.2442 9.36936 15.89L14.6182 10.6417C14.9724 10.2876 14.9724 9.71229 14.6182 9.35819L9.3694 4.10983C9.01522 3.75569 9.01526 3.18053 9.36944 2.82639L9.75647 2.43936C10.1097 2.08612 10.6863 2.08612 11.0395 2.43936L17.9587 9.3585ZM3.71097 2.43928C3.35737 2.08565 2.78132 2.08569 2.42772 2.43928L2.04069 2.82631C1.68725 3.17975 1.68721 3.75631 2.04069 4.10979L7.28925 9.35819C7.64339 9.71233 7.64339 10.2876 7.28925 10.6417L2.04065 15.8901C1.68706 16.2436 1.6871 16.82 2.04065 17.1735L2.42768 17.5606C2.78143 17.9143 3.35718 17.9144 3.71093 17.5606L10.0155 11.2558C11.7841 13.0225 11.3367 12.5745 10.0168 11.2545L10.6297 10.6415C10.9832 10.2881 10.9832 9.71194 10.6297 9.35846L3.71097 2.43928Z" fill="#323232"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                <?php endif?>
                
            </div>
        </div>
        
        
    </section>
    <!-- Article Section End -->

<?php include ('template-parts/modal-portfolio.php');?>
<?php get_footer() ?>