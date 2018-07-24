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

class Settings
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

    public static function tokens_exists()
    {
        // Check if tokens were provided
        global $twitterfeed_settings;
        if( !isset($twitterfeed_settings['oauth_access_token']) || 
            !isset($twitterfeed_settings['oauth_access_token_secret']) ||
            !isset($twitterfeed_settings['consumer_key']) ||
            !isset($twitterfeed_settings['consumer_secret']))
        {
            return false;
        }
        return true;
    }

    private function __construct()
    {
        \add_action('wp_ajax_twitter_feed_send_support_email', array($this,'send_support_email'));
        \add_action('admin_menu', array($this,'add_menu_page'));
        \add_action('wp_ajax_twitter_feed_clear_cache', array($this,'clear_cache'));

        $this->migrate_old_settings();

        $page = \amarkal_add_settings_page(array(
            'parent_slug'    => 'twitter_feed_settings',
            'slug'           => 'twitter_feed_settings',
            'title'          => 'Twitter Feed',
            'subtitle'       => 'v'.PLUGIN_VERSION,
            'menu_title'     => 'Settings',
            'footer_html'    => sprintf(
                '<div style="display: flex;align-items: center;"><a href="%s" style="line-height:0"><img style="margin-right:10px" src="%s"/></a> %s © Askupa Software</div>',
                'https://askupasoftware.com/',
                \TwitterFeed\IMG_URL.'/askupa-logo.png',
                date("Y")
            ),
            'subfooter_html' => $this->subfooter_html()
        ));

        $GLOBALS['twitterfeed_settings'] = \amarkal_get_settings_values('twitter_feed_settings');

        $this->add_section('tokens', $page);
        $this->add_section('caching', $page);
        $this->add_section('appearance', $page);
        $this->add_section('usage', $page);
        $this->add_section('support', $page);

        \add_action('admin_menu', array($this,'add_purchase_submenu_page'));
    }

    private function add_section( $name, $page )
    {
        $config = include __DIR__."/configs/options/$name.php";
        $page->add_section($config);
        foreach($config['fields'] as $field)
        {
            $field['section'] = $config['slug'];
            $page->add_field($field);
        }
    }

    public function clear_cache()
    {
        $cache = Parser\Cache::get_instance();
        $cache->clear();
        \wp_die();
    }

    public function add_menu_page()
    {
        \add_menu_page(
            'Twitter Feed', 
            'Twitter Feed', 
            'manage_options', 
            'twitter_feed_settings', 
            null, // Create a child page with the parent_slug set to this page's slug
            'dashicons-twitter',
            10
        );
    }

    public function add_purchase_submenu_page() 
    {
        
        \add_submenu_page(
            'twitter_feed_settings', 
            'Purchase', 
            'Purchase', 
            'manage_options',
            'twitter-feed-purchase',
            function() {
                include \TwitterFeed\PLUGIN_DIR . '/configs/options/purchase.phtml';
            }
        );
    }

    private function subfooter_html()
    {
        return 'If you like Twitter Feed, please give it <a target="_blank" href="https://wordpress.org/support/view/plugin-reviews/wd-twitter-feed?filter=5#postform">★★★★★</a> rating on WordPress.com. Thanks!';
    }
    
    function send_support_email() 
    {
        $message = sanitize_text_field($_POST['message']);
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_text_field($_POST['email']);
        $sent = \wp_mail(
            'support@askupasoftware.com', 
            'Twitter Feed Support Ticket', 
            $message.'<br/><b>Log:</b><br/>'.Logger::get_instance()->get_formatted_log(),
            array(
                'Content-Type: text/html',
                'charset=UTF-8',
                'From: '.$name.' <'.$email.'>',
                'Cc: '.$name.' <'.$email.'>',
                'Reply-To: '.$name.' <'.$email.'>'
            )
        );
        if(!$sent) {
            throw new \RuntimeException('Email not sent');
        }
        \wp_die();
    }

    function migrate_old_settings() 
    {
        $old_options = \get_option('twitter_feed', array());
        $new_options = \get_option('twitter-feed-settings', array());
        
        if(count($old_options) > 0 || count($new_options) > 0)
        {
            $old_options['force_tweet_count'] = array(
                'enable_force_tweet_count' => @$old_options['enable_force_tweet_count'],
                'request_limit' => @$old_options['request_limit']
            );
            \update_option('twitter_feed_settings', array_merge($old_options,$new_options));

            // Delete old data instances
            \delete_option('twitter_feed');
            \delete_option('twitter-feed-settings');
        }
    }
}