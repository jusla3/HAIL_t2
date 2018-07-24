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

/**
 * The following functions are used as the application programming interface (API)
 * of Twitter Feed. Function names that are prepended with an underscore (_)
 * represent system functions that are only to be used internally.
 */

/**
 * Render an error message
 * 
 * @ignore
 * @since    1.43
 * 
 * @param    string    $message    The error message
 * @return   The HTML formatted error message    
 */
function _render_error( $message ) 
{
    ob_start();
    include( dirname( __FILE__ ) . '/Tweets/Error.phtml' );
    return ob_get_clean();
}

/**
 * Render a list of tweets, based on the given type and data
 *
 * @param string $type
 * @param array $data
 * @param array $options
 * @return void
 */
function _render_tweets( $type, $options)
{
    
    $class = __NAMESPACE__."\\Tweets\\UI\\$type\\controller";
    $parser = Parser\TweetsParser::get_instance();
    
    // Get the tweets
    try {
        $data = $parser->getTweets($options);
    } 
    catch (\Exception $e) 
    {
        return _render_error( $e->getMessage() );
    }

    $tweets = new $class( $data, $options );
    return $tweets->render();
}

/**
 * Return an HTML view of static tweets.
 * 
 * @see http://products.askupasoftware.com/twitter-feed/api/
 * @api
 * @since 1.43
 * @return string The HTML formatted tweets.
 */
function static_tweets( $options ) 
{
    return _render_tweets('StaticTweets', $options);
}

/**
 * Return an HTML view of scrolling tweets.
 * 
 * @see http://products.askupasoftware.com/twitter-feed/api/
 * @api
 * @since 1.43
 * @return        string    The HTML formatted tweets.
 */
function scrolling_tweets( $options ) 
{
    return _render_tweets('ScrollingTweets', $options);
}

/**
 * 
 * Return an HTML view of sliding tweets.
 * 
 * @see http://products.askupasoftware.com/twitter-feed/api/
 * @api
 * @since 1.43
 * @return        string    The HTML formatted tweets.
 */
function sliding_tweets( $options ) 
{
    return _render_tweets('SlidingTweets', $options);
}