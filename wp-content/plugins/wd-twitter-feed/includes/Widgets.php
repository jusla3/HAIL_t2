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

class Widgets
{
    private static $instance;

    public static function init()
    {
        if( null === static::$instance )
        {
            static::$instance = new static();
        }
        return static::$instance;
    }

    private function __construct()
    {
        \add_action( 'widgets_init', array($this, 'register_widgets') );
    }

    public function register_widgets() 
    {
        \register_widget( 'TwitterFeed\Widgets\StaticTweets' );
    }
}