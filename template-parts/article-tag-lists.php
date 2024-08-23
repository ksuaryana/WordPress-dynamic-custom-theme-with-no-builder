
<?php 
    $terms = get_terms( array(
        'taxonomy'   => 'article-tag',
        'hide_empty' => false,
        'orderby' => 'count', 
        'order' => 'DESC',
        'number' => 7,           
    ) );

    
    if ($terms && !is_wp_error($terms)) : 
        $term_link = get_term_link($term);

        echo '<ul>';
            foreach ($terms as $term) {
                $term_link = get_term_link($term); 
                if (!is_wp_error($term_link)) {
                    echo '<li class="blog-search-section__popular-tags">
                            <h3><a class="blog-search-section__tag" href="' . esc_url($term_link) . '">' . esc_html($term->name) . '</a></h3>
                        </li>';
                }
            }
        echo '</ul>';
    endif;

    wp_reset_postdata();
?>

