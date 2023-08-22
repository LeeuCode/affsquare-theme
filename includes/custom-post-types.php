<?php

use Affsquare\CPT;

/*=============================
    [01. Create Post Types]
===============================*/

$team = new CPT(
    'team',
    array(
        'supports' => array('title', 'thumbnail', 'excerpt'),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-groups',
        'public' => false,
        'show_ui' => true,
    )
);


/*=============================
    [03. Sort & Rebuild Columns]
===============================*/

$columns = array(
    'cb' => '<input type="checkbox" />',
    'image' => __('Member Picture', 'affsquare'),
    'title' => __('Name', 'affsquare'),
    'job' => __('Job Title', 'affsquare'),
    'date' => __('Date', 'affsquare')
);

$team->columns($columns);

$team->populate_column('image', function ($column, $post) {
    echo '<img style="height:90px;border-radius: 5px;" src="' . get_the_post_thumbnail_url($post->ID) . '" >';
});

$team->populate_column('job', function ($column, $post) {
    echo '<strong>'. get_the_excerpt( $post->ID ) .'</strong>';
});