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
 * Shortcodes
 * 
 * This class loads and registers all the twitter feed shortcodes.
 * The class follows the singleton design pattern.
 */
class Shortcodes
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

    /**
     * Private constructor to prevent instantiation
     */
    private function __construct()
    {
        $common = include( dirname( __DIR__ ).'/includes/configs/common.php' );
        foreach( include( dirname(__FILE__).'/configs/editor/config.php') as $shortcode) 
        {
            \amarkal_register_shortcode($shortcode);
        }
        \add_action( 'init', array( $this, 'add_tinymce_plugin' ) );
        \add_filter( 'tiny_mce_before_init', array( $this, 'enqueue_editor_style' ) );
    }

    public function add_tinymce_plugin()
    {
        \add_filter( "mce_external_plugins", array( $this, "add_plugins" ) );
        \add_filter( 'mce_buttons', array( $this, 'register_buttons' ) );
    }

    public function enqueue_editor_style( $settings )
    {
        \wp_enqueue_style( 'twitter-feed-editor', CSS_URL.'/tinymce.plugin.css' );
        return $settings;
    }

    public function add_plugins( $plugin_array )
    {
        $plugin_array['twitterfeed'] = PLUGIN_URL.'/assets/js/tinymce.plugin.js';
        return $plugin_array;
    }

    public function register_buttons( $buttons )
    {
        array_push( $buttons, 'twitterfeed_button' );
        return $buttons;
    }
    
    /**
     * Static Tweet List shortcode
     */
    public function statictweets( $atts ) 
    {
        // Do the shortcode
        return static_tweets( $this->parse_atts( $atts ) );
    }
    
    /**
     * Scrolling Tweet List shortcode
     */
    public function scrollingtweets( $atts ) 
    {
        // Do the shortcode
        return scrolling_tweets( $this->parse_atts( $atts ) );
    }
    
    /**
     * Sliding Tweet List shortcode
     */
    public function slidingtweets( $atts ) 
    {
        // Do the shortcode
        return sliding_tweets( $this->parse_atts( $atts ) );
    }
    
    /**
     * 
     * @param type $atts
     * @return type
     */
    public function parse_atts( $atts )
    {
        $atts['retweets'] = isset($atts['retweets']) && $atts['retweets'] == 'on';
        $atts['replies']  = isset($atts['replies']) && $atts['replies'] == 'on';
        return $atts;
    }
}