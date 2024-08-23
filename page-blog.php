<?php
/* Template Name: Blog*/
?>

<?php get_header(); ?>
    <!-- Hero Banner Start -->
    <section class="single-page-banner">
        <div class="single-page-banner__container">
                <?php
                    $blog_banner = get_field('blog_image_banner');
                    $blog_banner_sz = $blog_banner['sizes']['medium'];
                
                ?>
            <img class=" single-page-banner__img " src="<?php echo $blog_banner_sz; ?>" alt="<?php echo $blog_banner['alt'];?>">
            <h1 class="single-page-banner__page-title">
                <?php the_title(); ?>
            </h1>
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
    <section class="article">
        <div class="article--container-single-page">
            <div class="article-single-item">
                <?php
                    $postArticleQuery = new WP_Query(array(
                        'post_type' => 'article',
                        'post_status' => 'publish',
                        'posts_per_page' => 3,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'paged' => $paged,
                    ));
                ?>
                <?php include ('template-parts/article-card.php');?>

                <div class="nav-pagination--align-left">
                    <!-- paginations -->
                    <?php
                        $total_pages = $postArticleQuery->max_num_pages;

                        if ($total_pages > 1) {
                            
                            echo '<ul id="nav-pagination__border">';

                                // Previous Page Link
                                if ($paged > 1) {
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

                        }
                    ?>
                </div>
                
            </div>
            
            <div class="blog-search-section">
                <div class="blog-search-section__search-bar">
                    <h2 class="blog-search-section__title-search">Search</h2>
                    <form method="GET" action="<?php echo esc_url(home_url('/')) ?>">
                        <input type="text" id="s" name="s" placeholder="Search" class="blog-search-section__placeholder-font">
                    </form> 
                </div>
                <div class="blog-search-section__categories">
                    <h2 class="blog-search-section__title-search">
                        Blog Categories
                    </h2>
                    <div class="blog-search-section__category-lists">
                        <?php include ('template-parts/article-category-lists.php');?>
                    </div> 
                </div>
                
                <div class="blog-search-section__popular-tags">
                    <h2 class="blog-search-section__title-search">
                        Popular Tags
                    </h2>
                        <?php include ('template-parts/article-tag-lists.php');?>  
                </div>
            </div>
        </div>
        
    </section>


<?php get_footer() ?>