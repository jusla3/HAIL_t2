<?php
return array(
    'slug'           => 'twitter_feed_ajax',
    'title'          => 'AJAX',
    'subtitle'       => 'Setup how Twitter Feed handles AJAX requests',
    'fields'         => array(
        array(
            'type'          => 'number',
            'name'          => 'tweet_count',
            'title'         => 'Tweet Count',
            'default'       => 5,
            'min'           => 1,
            'step'          => 1,
            'description'   => 'Set the number of new tweets to add when clicking on "Load More"'
        )
    )
);