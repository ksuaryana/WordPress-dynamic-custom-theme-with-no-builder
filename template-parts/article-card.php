<?php if($postArticleQuery->have_posts()): ?>
    
    <?php 
        while($postArticleQuery->have_posts()): $postArticleQuery->the_post(); 
        $truncate_excerpt = substr(get_the_content(), 0, 300);?>
        <div class="article__blog-item">
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
                    <h2>
                        <a class="article-card__body-title" href="<?php echo esc_url(the_permalink()); ?>">    
                        <?php echo get_the_title(); ?>
                        </a>
                    </h2>
                    <p class="article-card__body-excerpt ellipsis__home-article">
                        <?php echo $truncate_excerpt; ?>
                    </p>
                    <a href="<?php echo esc_url(the_permalink()); ?>" class="button article-card__body-read-more">
                        Continue Reading
                        <svg  width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.9587 9.3585C18.3119 9.71174 18.3119 10.2883 17.9587 10.6415L11.0395 17.5605C10.6857 17.9143 10.1102 17.9143 9.75643 17.5605L9.3694 17.1735C9.0153 16.8194 9.01522 16.2442 9.36936 15.89L14.6182 10.6417C14.9724 10.2876 14.9724 9.71229 14.6182 9.35819L9.3694 4.10983C9.01522 3.75569 9.01526 3.18053 9.36944 2.82639L9.75647 2.43936C10.1097 2.08612 10.6863 2.08612 11.0395 2.43936L17.9587 9.3585ZM3.71097 2.43928C3.35737 2.08565 2.78132 2.08569 2.42772 2.43928L2.04069 2.82631C1.68725 3.17975 1.68721 3.75631 2.04069 4.10979L7.28925 9.35819C7.64339 9.71233 7.64339 10.2876 7.28925 10.6417L2.04065 15.8901C1.68706 16.2436 1.6871 16.82 2.04065 17.1735L2.42768 17.5606C2.78143 17.9143 3.35718 17.9144 3.71093 17.5606L10.0155 11.2558C11.7841 13.0225 11.3367 12.5745 10.0168 11.2545L10.6297 10.6415C10.9832 10.2881 10.9832 9.71194 10.6297 9.35846L3.71097 2.43928Z" fill="#323232"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    <?php endwhile; wp_reset_postdata(); ?>
<?php else: ?>
    <p class="font-heading-1" >Post not found 😔</p>
<?php endif ?>