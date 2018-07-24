<?php
/**
 * @package    @echo NAME
 * @date       @echo DATE
 * @version    @echo VERSION
 * @author     @echo AUTHOR_AND_EMAIL
 * @link       @echo URL
 * @copyright  @echo COPYRIGHT
 */
namespace TwitterFeed\Tweets\UI\StaticTweets;

/**
 * Implements a static tweet list controller.
 */
class controller extends \TwitterFeed\Tweets\AbstractTweet 
{
    public function get_defaults()
    {
        return array(
            'skin'      => 'simplistic',
            'direction' => 'ltr',
            'show'      => array()
        );
    }

    public function get_template_path() 
    {
        return dirname( __FILE__ ).'/template.phtml';
    }
}
