<?php
/**
 * @package    @echo NAME
 * @date       @echo DATE
 * @version    @echo VERSION
 * @author     @echo AUTHOR_AND_EMAIL
 * @link       @echo URL
 * @copyright  @echo COPYRIGHT
 */
namespace TwitterFeed\Widgets;

class StaticTweets extends \TwitterFeed\Widgets\Widget
{
    public function get_components() 
    {
        return array_merge( 
            $this->get_common_widget_components(), 
            $this->get_common_tweet_ui_components('statictweets')
        );
    }

    public function get_name() 
    {
        return 'Static Tweets [TF]';
    }

    public function get_id()
    {
        return 'tf_static_tweets';
    }

    public function render( $instance )
    {
        echo \TwitterFeed\static_tweets( $instance );
    }
}