<?php
/**
 * Twitter Feed
 *
 * A powerful Twitter integration system that allows you to display tweets using widgets and shortcodes.
 *
 * @package   Twitter Feed
 * @author    Askupa Software <hello@askupasoftware.com>
 * @link      http://products.askupasoftware.com/twitter-feed/
 * @copyright 2018 Askupa Software
 *
 * @wordpress-plugin
 * Plugin Name:     Twitter Feed
 * Plugin URI:      http://products.askupasoftware.com/twitter-feed/
 * Description:     A powerful Twitter integration system that allows you to display tweets using widgets and shortcodes.
 * Version:         3.0.8
 * Author:          Askupa Software
 * Author URI:      http://www.askupasoftware.com
 * Text Domain:     twitterfeed
 * Domain Path:     /languages
 */

// Load composer's autoloader
require_once dirname( __FILE__ ) . '/vendor/autoload.php';

if( !function_exists('twitter_feed_bootstrap') )
{
    function twitter_feed_bootstrap()
    {
        // Validate PHP version etc
        if(TwitterFeed\EnvironmentValidator::validate(array(
            'name' => 'Twitter Feed',
            'phpversion'=>'5.3.5',
            'extensions' => array('curl')
          ))) 
        {
            new TwitterFeed\TwitterFeed();
        }
    }
    add_action( 'plugins_loaded', 'twitter_feed_bootstrap' );
}

if( !function_exists('twitter_feed_load_textdomain') )
{
    function twitter_feed_load_textdomain() 
    {
        load_plugin_textdomain( 'twitterfeed', false, plugin_basename( dirname( __FILE__ ) ).'/languages/' );
    }
    add_action( 'plugins_loaded', 'twitter_feed_load_textdomain' );
}

