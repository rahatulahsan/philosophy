<?php

/**
 * Template Name: Tax Query 
 */

 $philosophy_tax_query = array(
    'post_type' => 'book',
    'posts_per_page' => -1,
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'language',
            'field' => 'slug',
            'terms' => 'english',
        ),
        array(
            'taxonomy' => 'genre',
            'field' => 'slug',
            'terms' => 'historical',
        ),
        
    ),
 );

 $philosophy_tax = new WP_Query($philosophy_tax_query);
 echo $philosophy_tax->post_count;

 while($philosophy_tax->have_posts()){
    $philosophy_tax->the_post();

    the_title();
    echo '<br>';
 }