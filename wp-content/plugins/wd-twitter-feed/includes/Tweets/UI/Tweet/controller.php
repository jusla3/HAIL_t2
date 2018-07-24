<?php
/**
 * @package    @echo NAME
 * @date       @echo DATE
 * @version    @echo VERSION
 * @author     @echo AUTHOR_AND_EMAIL
 * @link       @echo URL
 * @copyright  @echo COPYRIGHT
 */
namespace TwitterFeed\Tweets\UI\Tweet;

/**
 * Implements a single tweet controller. Used by tweet lists objects.
 */
class controller extends \Amarkal\UI\Template
{
    protected $tweet;
    
    protected $params;
    
    public function __construct( $tweet, $params )
    {
        global $twitterfeed_settings;
        $this->tweet  = $tweet;
        $this->params = $this->convert_old_params_format($params);
        $this->intent = 'https://twitter.com/intent/';
        $this->expand_media = $twitterfeed_settings['expand_media'] === 'on';
        $this->avatar_size = $twitterfeed_settings['avatar_size'];
    }
    
    /**
     * Get the path to the template (script).
     * @return string    The path.
     */
    public function get_template_path() 
    {
        return dirname( __FILE__ ) . '/template.phtml';
    }
    
    public function get_tweet_url()
    {
        return 'https://twitter.com/'.$this->tweet->screen_name.'/status/'.$this->tweet->id_str;
    }
    
    public function get_tweet_time()
    {
        $date = new \DateTime($this->tweet->created_at);

        // Show human time if tweet is less than a week old
        if( (current_time('timestamp')-$date->getTimestamp())/(60*60*24) < 7 )
        {
            return human_time_diff( $date->getTimestamp(), current_time('timestamp',1) ).' ago';
        }
        
        // Otherwise use user's time format
        return date_i18n(get_option('date_format'), $date->getTimestamp(), 1);
    }

    private function convert_old_params_format($params)
    {
        // Convert comma delimited string to an array
        if(\is_string($params['show']) && false !== \strpos($params['show'], ','))
        {
            $params['show'] = explode(',', $params['show']);
        }
        return $params;
    }
}
