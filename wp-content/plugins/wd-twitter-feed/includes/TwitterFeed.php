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

class TwitterFeed
{
    private static $options;
    
    public function __construct() 
    {
        $this->generate_defines();
        
        // Register a settings page
        Settings::init();
        
        // Register widgets
        Widgets::init();
        
        // Add a popup button to the rich editor
        Shortcodes::init();
        
        \add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ) );
        \add_action( 'wp_head', array( __CLASS__, 'custom_css' ) );
        
        require_once PLUGIN_DIR.'/functions.php';

        $this->check_environment();
    }
    
    public function generate_defines()
    {
        $basepath = dirname( __FILE__ );
        define( __NAMESPACE__.'\PLUGIN_DIR', $basepath );
        define( __NAMESPACE__.'\PLUGIN_URL', plugin_dir_url( $basepath ) );
        define( __NAMESPACE__.'\JS_URL', PLUGIN_URL.'assets/js' );
        define( __NAMESPACE__.'\CSS_URL', PLUGIN_URL.'assets/css' );
        define( __NAMESPACE__.'\IMG_URL', PLUGIN_URL.'assets/img' );
        define( __NAMESPACE__.'\PLUGIN_VERSION', '3.0.8' );
    }
        
    public function register_assets()
    {
        \wp_enqueue_script( 'twitterfeed', JS_URL.'/twitter-feed.min.js', array('jquery'), PLUGIN_VERSION, true );
        \wp_enqueue_script( 'twitter-vine-embed', '//platform.vine.co/static/scripts/embed.js', array(), null, true );
        \wp_enqueue_style( 'twitterfeed', CSS_URL.'/twitter-feed.min.css', array(), PLUGIN_VERSION );
        \wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0' );
    }
    
    static function custom_css()
    {
        global $twitterfeed_settings;
        if( 'on' == $twitterfeed_settings['css_toggle'] )
        {
            $css = \amarkal_get_settings_value('twitter_feed_settings','css');
            echo "<style>$css</style>";
        }
    }
    
    
    public function check_environment()
    {
        // Check if tokens were provided
        if(!Settings::tokens_exists())
        {
            \amarkal_admin_notification( 'tf-tokens', sprintf(__('<strong>Twitter Feed</strong> cannot retrieve tweets until you provide your Twitter API Tokens. <a href="%s">Click here</a> to provide your tokens.'),admin_url( 'admin.php?page=twitter_feed_settings' )), 'error', true);
        }
    }
}