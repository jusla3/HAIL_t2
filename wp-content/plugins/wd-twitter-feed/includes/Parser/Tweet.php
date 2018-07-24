<?php
/**
 * @package    @echo NAME
 * @date       @echo DATE
 * @version    @echo VERSION
 * @author     @echo AUTHOR_AND_EMAIL
 * @link       @echo URL
 * @copyright  @echo COPYRIGHT
 */
namespace TwitterFeed\Parser;

/**
 * Tweet
 * 
 * The Tweet object is used throughout the plugin as a means to store and 
 * retrieve tweet data
 */
class Tweet 
{
    private $params;
    
    public function __construct( array $params ) 
    {
        $this->params = $params;
    }
    
    public function __get($name) 
    {
        return $this->params[$name];
    }
}