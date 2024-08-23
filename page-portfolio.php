<?php
/* Template Name: Portfolio*/
?>

<?php get_header() ?>
    <!-- Hero Banner Start -->
    <section class="single-page-banner">
        <div class="single-page-banner__container">
                <?php
                    $portfolio_banner = get_field('portfolio_image_banner');
                    $portfolio_banner_sz = $portfolio_banner['sizes']['medium'];
                
                ?>
            <img class=" single-page-banner__img " src="<?php echo $portfolio_banner_sz; ?>" alt="<?php echo $portfolio_banner['alt'];?>">
            <h1 class="single-page-banner__page-title">
                <?php the_title(); ?>
            </h1>
            <h2 class="sr-only">Our portfolio lists</h2>
            <div class="single-page-banner__breadcrumbs ">
                    <a href="<?php echo home_url(); ?>" class="single-page-banner__breadcrumbs--red">
                        Home
                    </a> 
                    <span class="single-page-banner__breadcrumbs--slash-divider">
                        / 
                    </span>
                    <a class="single-page-banner__current-page-link" href="<?php get_permalink( get_the_ID() ); ?>">
                        <?php the_title(); ?>
                    </a>
                    
            </div>
        </div> 
            
        
            
    </section>
    <!-- Hero Banner End -->
    <?php include ('template-parts/page-header.php');?>

    <!-- Portfolio Section Start -->
    <section class="portfolio">
        <div class="portfolio__container">

            <div class="portfolio__wrapper">
                <?php
                    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                    $postPortfolioQuery = new WP_Query(array(
                        'post_type' => 'portfolio',
                        'post_status' => 'publish',
                        'posts_per_page' => 8,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'paged' => $paged,
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

                    <!-- paginations -->
                    <?php
                        $total_pages = $postPortfolioQuery->max_num_pages;

                        if ($total_pages > 1) {
                            echo '<div class="nav-pagination">';
                            echo '<ul id="nav-pagination__border">';

                            // Previous Page Link
                            if ($paged >= 1) {
                                echo '<li><a class="nav-pagination__numbers--prev" href="' . get_pagenum_link($paged - 1) . '">';
                                echo '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">';
                                echo '<path d="M15 18L9 12L15 6" stroke="#EE3B24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>';
                                echo '</svg>';
                                echo '</a></li>';
                            }

                            // Page Numbers
                            for ($i = 1; $i <= $total_pages; $i++) {
                                if ($i == $paged) {
                                    echo '<li><a class="nav-pagination__numbers nav-pagination__numbers--active" href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
                                } else {
                                    echo '<li><a class="nav-pagination__numbers" href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
                                }
                            }

                            // Next Page Link
                            if ($paged < $total_pages) {
                                echo '<li><a class="nav-pagination__numbers--next" href="' . get_pagenum_link($paged + 1) . '">';
                                echo '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">';
                                echo '<path d="M9 18L15 12L9 6" stroke="#EE3B24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>';
                                echo '</svg>';
                                echo '</a></li>';
                            }

                            echo '</ul>';
                            echo '</div>';
                        }
                    ?>
                <?php endif?>                                

            </div>
        
        </div>
            
    </section>
    <!-- Portfolio Section End -->


<?php include ('template-parts/modal-portfolio.php');?>
<?php get_footer() ?>