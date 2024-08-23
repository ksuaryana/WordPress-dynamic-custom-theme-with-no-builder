<?php get_header() ?>

    <!-- Hero Banner Start -->
    <section class="single-page-banner">
        <div class="single-page-banner__container">
                <?php
                    $blog_banner = get_field('blog_image_banner', 13);
                    $blog_banner_sz = $blog_banner['sizes']['medium'];
                
                ?>
            <img class=" single-page-banner__img " src="<?php echo $blog_banner_sz; ?>" alt="<?php echo $blog_banner['alt'];?>">
            <h1 class="single-page-banner__page-title">
                Search Page
            </h1>
            <div class="single-page-banner__breadcrumbs ">
                    <a href="<?php echo home_url(); ?>" class="single-page-banner__breadcrumbs--red">
                        Home
                    </a> 
                    <span class="single-page-banner__breadcrumbs--slash-divider">
                        / 
                    </span>
                    
                    <a class="single-page-banner__current-page-link" href="http://localhost/tmdwp-training/blog/">
                        Blog
                    </a>
            </div>
        </div> 

    </section>
    <!-- Hero Banner End -->

    <section class="article">
        <div class="article--container-single-page">
            <div class="article-single-item">
                <?php
                    $s = $_GET['s'];

                    $postArticleQuery = new WP_Query( array(
                        'post_type'      => 'article',
                        'post_status'    => 'publish',
                        'posts_per_page' => -1,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        's'              => $s,
                    ));
                ?>
                <?php include ('template-parts/article-card.php');?>

                
            </div>
            
            <div class="blog-search-section">
                <div class="blog-search-section__search-bar">
                    <h2 class="blog-search-section__title-search">
                        Search
                    </h2>
                    <form method="GET" action="<?php echo esc_url(home_url('/')) ?>">
                        <input type="text" id="s" name="s" placeholder="Search" class="blog-search-section__placeholder-font" value="<?php echo $s ?>">
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
