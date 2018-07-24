<?php
/**
 * @package    @echo NAME
 * @date       @echo DATE
 * @version    @echo VERSION
 * @author     @echo AUTHOR_AND_EMAIL
 * @link       @echo URL
 * @copyright  @echo COPYRIGHT
 */

 namespace TwitterFeed;

return array(
    array(
        'id'        => 'statictweets',
        'title'     => 'Static Tweets',
        'cmd'       => 'tf_statictweets',
        'show_placeholder' => true,
        'placeholder_icon' => PLUGIN_URL.'/assets/img/twitter-feed-logo-64x64.png',
        'placeholder_subtitle' => '{{count}} tweets from {{resource}}',
        'render'    => array($this, 'statictweets'),
        'fields'    => $common['statictweets']
    )

);