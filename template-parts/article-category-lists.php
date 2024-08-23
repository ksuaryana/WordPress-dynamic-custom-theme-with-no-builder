<?php 
    $terms = get_terms( array(
        'taxonomy'   => 'article-category',
        'hide_empty' => false,
        'number' => 6,
    ) );

?>

<?php    
    if ($terms && !is_wp_error($terms)) : 
        $term_link = get_term_link($term); // Get the URL of the term

        echo '<ul>';
            foreach ($terms as $term) {
                $term_link = get_term_link($term); // Get the URL of the term
                if (!is_wp_error($term_link)) {
                    echo '<li class="blog-search-section__category_list"><h3><a href="' . esc_url($term_link) . '">' . esc_html($term->name) . '</a></h3></li>';
                }
            }
        echo '</ul>';
    endif;

    wp_reset_postdata();
?>

