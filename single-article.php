<?php get_header() ?>

    <?php
        $article_image_id = get_post_thumbnail_id($postArticleQuery->ID);
        $article_image_alt = get_post_meta($article_image_id, '_wp_attachment_image_alt', TRUE);

        $articleThumb = wp_get_attachment_image_src( $article_image_id, 'single-post-thumbnail' ); 

    ?>
    <!-- Hero Banner Start -->
    <section class="single-page-banner">
        <div class="single-page-banner__container">
            <img class=" single-page-banner__img " src="<?php echo $articleThumb[0]; ?>" alt="<?php echo $blog_banner['alt'];?>">
            <h1 class="single-page-banner__page-title">
                <?php the_title(); 
                $post_type = get_post_type_object($post->post_type);

                ?>
            </h1>
            <div class="single-page-banner__breadcrumbs ">
                    <a href="<?php echo home_url(); ?>" class="single-page-banner__breadcrumbs--red">
                        Home
                    </a> 
                    <span class="single-page-banner__breadcrumbs--slash-divider">
                        / 
                    </span>
                    <a href="http://localhost/tmdwp-training/blog/" class="single-page-banner__breadcrumbs--red">
                        <?php echo $post_type->labels->singular_name; ?>
                    </a> 
                    <span class="single-page-banner__breadcrumbs--slash-divider">
                        / 
                    </span>
                    <a class="single-page-banner__current-page-link" href="<?php echo get_post_type_archive_link( $post_type ); ?>">
                        Detailed Page
                    </a>
            </div>
        </div> 

    </section>
    <!-- Hero Banner End -->

    <section class="article">
        <div class="article--container-single-page">
            <div class="article-single-item">
                <div class="article__home-item">
                    <div class="article-card " >
                        
                        <div class="article-card__thumb">
                            <?php if (has_post_thumbnail( $postArticleQuery->ID ) ): ?>
                                <img class="image-aspect-ratio image-aspect-ratio__15-9" src="<?php echo $articleThumb[0]; ?>" alt="<?php echo $article_image_alt ?>">
                            <?php endif; ?>
                            <p class="button--primary-post-date article-card__date-ribbon" >
                                <?php echo get_the_date('M j, Y'); ?>
                            </p>
                        </div>

                        <div class="article-card__body">
                            <p class="article-card__body-category">
                                Category: <?php the_terms( get_the_ID(), 'article-category', '', ', '); ?>
                            </p>
                            <h2 class="article-card__body-title"> 
                                <?php echo get_the_title(); ?>
                            </h2>
                            <p class="article-card__body-tags">
                                Tag(s): <?php the_terms( get_the_ID(), 'article-tag', '', ', '); ?>
                            </p>
                            <div class="wysiwyg-output ">
                                <?php the_content() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="blog-search-section">
                <div class="blog-search-section__search-bar">
                    <h3 class="blog-search-section__title-search">Search</h3>
                    <form action="/action_page.php">
                        <input type="text" id="fname" name="fname" placeholder="Search" class="blog-search-section__placeholder-font">
                    </form> 
                </div>

                <div class="blog-search-section__latest-blogs">
                    <h2 class="blog-search-section__title-search">Latest Blog</h2>
                    <?php
                        $postArticleQuery = new WP_Query(array(
                            'post_type' => 'article',
                            'post_status' => 'publish',
                            'posts_per_page' => 3,
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'post__not_in' => [get_the_ID()],
                        ));
                    ?>
                    <?php if($postArticleQuery->have_posts()): ?>
                        <?php while($postArticleQuery->have_posts()): $postArticleQuery->the_post(); ?>

                            <div class="blog-search-section__latest-blog">
                                
                                <a href="<?php echo esc_url(the_permalink()); ?>" class="blog-search-section__image-container">
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
                                </a>
                                <div class="blog-search-section__blog-content">
                                    <h3>
                                        <a href="<?php echo esc_url(the_permalink()); ?>" class="blog-search-section__blog-title">
                                            <?php echo get_the_title(); ?>
                                        </a>
                                    </h3>
                                    <div class="blog-search-section__blog-date-container">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0.625C4.84375 0.625 0.625 4.84375 0.625 10C0.625 15.1562 4.84375 19.375 10 19.375C15.1562 19.375 19.375 15.1562 19.375 10C19.375 4.84375 15.1562 0.625 10 0.625ZM10 18.125C5.53125 18.125 1.875 14.4688 1.875 10C1.875 5.53125 5.53125 1.875 10 1.875C14.4688 1.875 18.125 5.53125 18.125 10C18.125 14.4688 14.4688 18.125 10 18.125Z" fill="#6A6A6A"/>
                                            <path d="M10.625 8.9375V3.75C10.625 3.40625 10.3438 3.125 10 3.125C9.65625 3.125 9.375 3.40625 9.375 3.75V8.9375C9.1875 9.03125 9.03125 9.1875 8.9375 9.375H6.25C5.90625 9.375 5.625 9.65625 5.625 10C5.625 10.3438 5.90625 10.625 6.25 10.625H8.9375C9.15625 11 9.5625 11.25 10 11.25C10.6875 11.25 11.25 10.6875 11.25 10C11.25 9.53125 11 9.15625 10.625 8.9375Z" fill="#6A6A6A"/>
                                        </svg>
                                        <a href="<?php echo esc_url(the_permalink()); ?>" class="blog-search-section__blog-date-text">
                                            <?php echo get_the_date('F j'); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    <?php endif?>
                    
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