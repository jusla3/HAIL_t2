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

abstract class Widget extends \Amarkal\Widget\AbstractWidget
{   
    public function config()
    {
        return array(
            'id'              => $this->get_id(),
            'name'            => $this->get_name(),
            'widget_options'  => array(
                'description' => 'Use this widget to display tweets in your widget area'
            ),
            'fields'          => $this->get_components()
        );
    }
    
    public function get_common_widget_components()
    {
        return array(
            array(
                'type'          => 'text',
                'name'          => 'title',
                'title'         => 'Widget Title',
                'default'       => 'My Tweets',
                'filter'        => function( $v ) { return trim( strip_tags( $v ) ); },
                'help'          => 'The widget\'s title appears at the top of the widget'
            ),
            array(
                'type'          => 'text',
                'name'          => 'subtitle',
                'title'         => 'Widget Subtitle',
                'placeholder'   => 'Some extra words...',
                'help'          => 'The widget\'s subtitle appears under the widget\'s title'
            ),
            array(
                'type'          => 'switch',
                'name'          => 'wrapper',
                'help'          => 'Show/hide the theme default widget wrapper',
                'title'         => 'Display Widget Wrapper',
                'default'       => 'on'
            )
        );
    }
    
    public function get_common_tweet_ui_components( $type )
    {
        $common = include( dirname( __DIR__ ).'/configs/common.php' );
        return $common[$type];
    }

    public function widget( $args, $instance )
    {
        extract($args, EXTR_SKIP);

        $title = apply_filters('widget_title', $instance['title']);

        // Display the widget wrapper and title 
        if ($instance['wrapper'] === 'on')
        {
            echo $before_widget;
        }

        if (!empty($title))
        {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        if (!empty($instance['subtitle']))
        {
            echo $instance['subtitle'];
        }

        $instance['replies'] = $instance['replies'] === 'on';
        $instance['retweets'] = $instance['retweets'] === 'on';
        
        // Render the tweets
        $this->render( $instance );

        // Display the last part of the wrapper
        echo ( $instance['wrapper'] === 'on' ? $after_widget : '' );
    }
    
    public abstract function get_name();
    public abstract function get_id();
    public abstract function get_components();
    public abstract function render( $instance );
}


