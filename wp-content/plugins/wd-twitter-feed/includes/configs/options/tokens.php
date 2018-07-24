<?php 
return array(
    'slug'           => 'twitter_feed_tokens', // Must be the same as the parent page's slug
    'title'          => 'Tokens',
    'subtitle'       => 'Set your Twitter application access tokens.',
    'description'    => 'These access tokens are used by Twitter to authenticate the connection between your website to Twitter.com using API 1.1.<br/>Lost? read the tutorial on <a target="_blank" href="http://blog.askupasoftware.com/how-to-create-a-twitter-application/">How to create a twitter application</a>.',
    'fields'         => array(
        array(
            'type'      => 'text',
            'name'      => 'consumer_key',
            'title'     => 'Consumer Key (API Key)',
            'default'   => '',
            'filter'    => function( $v ) { return trim($v); }
        ),
        array(
            'type'      => 'text',
            'name'      => 'consumer_secret',
            'title'     => 'Consumer Secret (API Secret)',
            'default'   => '',
            'filter'    => function( $v ) { return trim($v); }
        ),
        array(
            'type'      => 'text',
            'name'      => 'oauth_access_token',
            'title'     => 'Access Token',
            'default'   => '',
            'filter'    => function( $v ) { return trim($v); }
        ),
        array(
            'type'      => 'text',
            'name'      => 'oauth_access_token_secret',
            'title'     => 'Access Token Secret',
            'default'   => '',
            'filter'    => function( $v ) { return trim($v); }
        )
    )
);