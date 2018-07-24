<?php
return array(
    'slug'           => 'twitter_feed_caching',
    'title'          => 'Caching',
    'subtitle'       => 'Setup how Twitter Feed caches and fetches tweets from Twitter.com',
    'fields'         => array(
        array(
            'type'          => 'composite',
            'name'          => 'force_tweet_count',
            'title'         => 'Force Tweet Count',
            'help'          => 'Twitter will not always return the requested number of tweets, since the tweet "count" parameter behaves more closely in concept to an "up to" parameter. Enable this option if you want to ensure that you get the right number of tweets. Notice that enabling this option can increase the network request time as multiple request will be made to Twitter.com until the requested count is returned. It is highly recommanded that you enable caching if you choose to enable this option.',
            'template'      => '{{enable_force_tweet_count}}<label>Request Limit</label>{{request_limit}}',
            'default'       => array(
                'enable_force_tweet_count' => 'off',
                'request_limit' => 3,
            ),
            'components'    => array(
                array(
                    'type'          => 'switch',
                    'name'          => 'enable_force_tweet_count'
                ),
                array(
                    'type'          => 'number',
                    'name'          => 'request_limit',
                    'min'           => 1,
                    'max'           => 5,
                    'step'          => 1
                )
            )
        ),
        array(
            'type'        => 'switch',
            'name'        => 'enable_caching',
            'title'       => 'Enable Caching',
            'default'     => 'off',
            'help'        => 'Use this option if you want to avoid sending a query to Twitter.com on every page reload. This is useful if you have a high traffic website and you wish to avoid reaching Twitter\'s query limits. Note that this can dramatically decrese the time it takes the server to return a response, since the data will be fetched from the local database, rather than from Twitter.com which is a remote address. For more information about Twitter rate limits, visit <a href="https://dev.twitter.com/docs/rate-limiting/1.1">dev.twitter.com/docs/rate-limiting/1.1</a>'
        ),
        array(
            'type'       => 'slider',
            'name'       => 'caching_freq',
            'title'      => 'Caching Frequency',
            'default'    => 25,
            'min'        => 10,
            'max'        => 3600,
            'step'       => 5,
            'show'       => '{{enable_caching}} === "on"',
            'help'       => 'Set the caching frequency in seconds. This is used as the minimum threshold to make a query to Twitter.com (the minimum time between each query)'
        ),
        array(
            'name'        => 'clear_cache',
            'type'        => 'button',
            'title'       => 'Clear Cache',
            'label_start' => 'Clear Cache',
            'label_doing' => 'Clearing...',
            'request_url' => \admin_url('admin-ajax.php'),
            'request_data'=> array(
                'action' => 'twitter_feed_clear_cache'
            ),
            'show'        => '{{enable_caching}} === "on"',
            'help'        => 'Use this button to clear all the data currently stored in the cache'
        )
    )
);