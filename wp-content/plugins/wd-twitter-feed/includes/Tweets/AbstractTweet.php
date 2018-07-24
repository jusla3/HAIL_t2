<?php
/**
 * @package    @echo NAME
 * @date       @echo DATE
 * @version    @echo VERSION
 * @author     @echo AUTHOR_AND_EMAIL
 * @link       @echo URL
 * @copyright  @echo COPYRIGHT
 */
namespace TwitterFeed\Tweets;

/**
 * Abstract tweet
 * 
 * Parent class to all other Twitter Feed UI elements
 */
abstract class AbstractTweet extends \Amarkal\UI\Template
{
    protected $tweets;
    protected $settings;
    protected $template;

    /**
     * Constructor
     * 
     * @param Tweet[] $tweets The tweet list
     * @param array $settings The options
     */
    public function __construct( $tweets, $settings )
    {
        $this->tweets   = $tweets;
        $this->direction= \is_rtl() ? 'rtl' : 'ltr';
        $this->settings = array_merge( $this->get_defaults(), $settings );
    }
    
    /**
     * Get the default options for this tweet view
     */
    public abstract function get_defaults();
    
    /**
     * Convert tweet text to an HTML representation of it, including 
     * links, hash tags etc...
     * 
     * @param string $text
     * @return string The reformatted tweet text
     */
    static function format_tweet_text( $text )
    {
        return self::linkify_tweets( utf8_decode( $text ), true );
    }
    
    /**
     * Linkify Tweets
     * Create hyperlinks from text
     */
    static function linkify_tweets( $tweet_text, $blank = false )
    {
        // Open links in a new window
        $blank = $blank ? 'target="_blank"' : '';
        
        // Linkify URLs (hide http:// prefix)
        $tweet_text = preg_replace(
            '/(https?:\/\/(\S+))/',
            '<a href="\1" class="preg-links" '.$blank.'>\2</a>',
            $tweet_text
        );
        
        // Linkify twitter users
        $tweet_text = preg_replace(
            '/(^|\s)@(\w+)/u',
            '\1@<a href="https://twitter.com/\2" class="preg-links" '.$blank.'>\2</a>',
            $tweet_text
        );
        
        // Linkify tags
        $tweet_text = preg_replace(
            '/(^|\s)#(\w+)/u',
            '\1<a href="https://twitter.com/search?q=%23\2" class="preg-links" '.$blank.'>#\2</a>',
            $tweet_text
        );
 
        return $tweet_text;
    }
    
    public function __get($name) 
    {
        if( isset($this->settings[$name]) )
        {
            return $this->settings[$name];
        }
    }
}