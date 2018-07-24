<?php
return array(
    'slug'           => 'twitter_feed_appearance',
    'title'          => 'Appearance',
    'menu_title'     => 'Appearance',
    'subtitle'       => 'Setup the look and feel of Twitter Feed',
    'fields'         => array(
        array(
            'type'          => 'toggle',
            'name'          => 'url_type',
            'title'         => 'URL Shortening',
            'help'          => 'Choose between showing the short or the expanded version of the urls in the tweet text.',
            'default'       => 'short',
            'data'          => array(
                'short'    => 'Short',
                'expanded' => 'Expanded'
            )
        ),
        array(
            'type'          => 'switch',
            'name'          => 'expand_media',
            'title'         => 'Expand Tweet Media',
            'help'          => 'If set to "ON", tweet media will be expanded automatically when the page loads. Otherwise, media will be initially hidden, and a "Show Media" button will appear.',
            'default'       => 'off'
        ),
        array(
            'type'          => 'number',
            'name'          => 'avatar_size',
            'title'         => 'Avatar Size',
            'default'       => 32,
            'step'          => 1,
            'min'           => 0,
            'size'          => 4,
            'help'          => 'Set the avatar width & height in pixels'
        ),
        array(
            'type'          => 'switch',
            'name'          => 'css_toggle',
            'title'         => 'Use Custom CSS',
            'help'          => 'Toggle on/off to use the custom CSS on the next field. The CSS code will be printed in the document\'s head',
            'default'       => 'off'
        ),
        array(
            'type'          => 'code',
            'name'          => 'css',
            'title'         => 'Custom CSS Code',
            'help'          => 'Insert your custom CSS here. Since this will be printed in the head of the document (as opposed to making an http request), it is not recommended to use this for big CSS changes (hundreds of lines of code).',
            'language'      => 'css',
            'default'       => "/**\n * Insert your custom CSS here\n */",
            'show'          => '{{css_toggle}} === "on"'
        )
    )
);