<?php
/**
 * @package    @echo NAME
 * @date       @echo DATE
 * @version    @echo VERSION
 * @author     @echo AUTHOR_AND_EMAIL
 * @link       @echo URL
 * @copyright  @echo COPYRIGHT
 */

/**
 * This file contains the UI components configuration for both the editor and the widgets.
 */

$common = array(
    'user' => array(
        'type'          => 'text',
        'name'          => 'user',
        'title'         => 'User Name',
        'description'   => 'Enter a Twitter.com user name',
        'help'          => 'This field is only applicable if the twitter resource type is set to "User Timeline" or "List". Enter the Twitter accout username of which you would like to display the tweets',
        'show'          => '{{resource}} === "usertimeline" || {{resource}} === "favorites" || {{resource}} === "list"'
    ),
    'list' => array(
        'type'          => 'text',
        'name'          => 'list',
        'title'         => 'List Name',
        'description'   => 'Enter a Twitter.com list name',
        'help'          => 'This field is only applicable if the twitter resource type is set to "List".',
        'show'          => '{{resource}} === "list"'
        ,'placeholder'  => 'Not available in the demo version',
        'disabled'      => true
    ),
    'id' => array(
        'type'          => 'text',
        'name'          => 'id',
        'title'         => 'Tweet ID',
        'description'   => 'Enter a single Tweet ID',
        'help'          => 'This field is only applicable if the twitter resource type is set to "single".',
        'show'          => '{{resource}} === "single"'
        ,'placeholder'  => 'Not available in the demo version',
        'disabled'      => true
    ),
    'query' => array(
        'type'          => 'text',
        'name'          => 'query',
        'title'         => 'Search Query',
        'description'   => 'Enter a search query',
        'help'          => 'This field is only applicable if the twitter resource type is set to "Search". For more information about the query syntax, visit Twitter\'s search guide: https://dev.twitter.com/docs/using-search',
        'placeholder'   => 'from:username AND #hashtag OR @username',
        'show'          => '{{resource}} === "search"'
        ,'placeholder'  => 'Not available in the demo version',
        'disabled'      => true
    ),
    'resource' => array(
        'type'          => 'select',
        'name'          => 'resource',
        'title'         => 'Resource',
        'description'   => 'Choose the twitter resource type',
        'default'       => 'usertimeline',
        'data'          => array(
            'usertimeline' => 'User Timeline'
        )
    ),
    'count' => array(
        'type'          => 'number',
        'name'          => 'count',
        'title'         => 'Count',
        'description'   => 'Number of tweets to display',
        'min'           => 1,
        'default'       => 5
        ,'max'          => 20 
    ),
    'retweets' => array(
        'type'          => 'switch',
        'name'          => 'retweets',
        'title'         => 'Include Retweets',
        'default'       => 'on'
    ),
    'replies' => array(
        'type'          => 'switch',
        'name'          => 'replies',
        'title'         => 'Include Replies',
        'default'       => 'on'
    ),
    'show' => array(
        'type'          => 'checkbox',
        'name'          => 'show',
        'title'         => 'Show options',
        'help'          => 'Select which tweet assets you would like to show',
        'default'       => array('username','screenname','avatar','time','actions','media'),
        'data'          => array(
            'username'      => 'User Name',
            'screenname'    => 'Screen Name',
            'avatar'        => 'Avatar',
            'time'          => 'Tweet Time',
            'actions'       => 'Tweet Actions',
            'media'         => 'Media'
        )
    )
);

return array(
        
    /**
     * Static Tweets
     */
    'statictweets' => array(
        array(
            'type'          => 'select',
            'name'          => 'skin',
            'title'         => 'Skin',
            'description'   => 'Choose how to skin the tweets',
            'default'       => 'default',
            'data'          => array(
                'default'      =>'Default',
                'simplistic'   =>'Simplistic'
            )
        ),
        $common['resource'],
        $common['user'],
        $common['list'],
        $common['query'],
        $common['id'],
        $common['count'],
        $common['retweets'],
        $common['replies'],
        array(
            'type'          => 'switch',
            'name'          => 'ajax',
            'title'         => 'Load More Button',
            'default'       => 'off'
            ,'description'  => 'Not available in the demo version',
            'disabled'      => true
        ),
        $common['show']
    ),

    /**
     * Scrolling Tweets
     */
    'scrollingtweets' => array(
        array(
            'type'          => 'number',
            'name'          => 'scroll_time',
            'title'         => 'Scrolling Time',
            'description'   => 'Set the duration of each slide in seconds',
            'min'           => 5,
            'max'           => 120,
            'step'          => 1,
            'default'       => 10
        ),
        $common['resource'],
        $common['user'],
        $common['list'],
        $common['query'],
        $common['id'],
        $common['count'],
        $common['retweets'],
        $common['replies'],
        array(
            'type'          => 'select',
            'name'          => 'skin',
            'title'         => 'Skin',
            'description'   => 'Choose how to skin the tweets',
            'help'          => 'Note: for the LED Screen skin, use a longer scrolling time since the font size is bigger and it takes longer to scroll through the tweet',
            'default'       => 'default',
            'data'          => array(
                'default'      => 'Default',
                'led-screen'   => 'LED Screen'
            )
        )
    ),

    /**
     * Sliding Tweets
     */
    'slidingtweets' => array(
        array(
            'type'          => 'select',
            'name'          => 'slide_dir',
            'title'         => 'Slide Direction',
            'description'   => 'Set the direction of the slide',
            'default'       => 'right',
            'data'          => array(
                'up'          => 'Up',
                'down'        => 'Down',
                'left'        => 'Left',
                'right'       => 'Right',
                'random'      => 'Random'
            )
        ),
        array(
            'type'          => 'number',
            'name'          => 'slide_duration',
            'title'         => 'Slide Duration',
            'description'   => 'Set the duration of each slide in seconds',
            'min'           => 2,
            'max'           => 120,
            'step'          => 1,
            'default'       => 5
        ),
        $common['resource'],
        $common['user'],
        $common['list'],
        $common['query'],
        $common['id'],
        $common['count'],
        $common['retweets'],
        $common['replies'],
        array(
            'type'          => 'select',
            'name'          => 'skin',
            'title'         => 'Skin',
            'description'   => 'Choose how to skin the tweets',
            'default'       => 'default',
            'data'          => array(
                'default'      =>'Default',
                'simplistic'   =>'Simplistic'
            )
        ),
        $common['show']
    )
);
