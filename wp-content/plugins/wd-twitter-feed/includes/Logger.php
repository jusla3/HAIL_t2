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
 * Debug class
 * 
 * This class has only one instance (singleton design pattern).
 * Used as a database for debugging purposes. Any class can
 * send a message to this class, and add that message to the 
 * list of debug messages.
 */
class Logger 
{    
    private $log;
    
    private static $instance = null;

    const ERROR = 'ERROR';
    const NOTICE = 'NOTICE';
    const WARNING = 'WARNING';
    const INFO = 'INFO';

    const MAX_LOGS = 100;
    
    /**
     * Return an instance of this class
     * 
     * @return TweetsParser The only instance of this class
     */
    public static function get_instance() 
    {

        // If the single instance hasn't been set, set it now.
        if ( null === self::$instance ) 
        {
            self::$instance = new self;
            self::$instance->init();
        }

        return self::$instance;
    }

    public function init()
    {
        // Hook to the shutdown action
        \add_action('shutdown', array(self::$instance, 'shutdown'));
        $this->log = \get_option('twitter_feed_log', array());
    }

    public function error($message)
    {
        $this->log(self::ERROR, $message);
    }

    public function notice($message)
    {
        $this->log(self::NOTICE, $message);
    }

    public function warning($message)
    {
        $this->log(self::WARNING, $message);
    }

    public function info($message)
    {
        $this->log(self::INFO, $message);
    }
    
    /**
     * Append a message to the debug data
     * 
     * @param    type    $message    The message to add to the queue
     */
    public function log($type, $message) 
    {
        $callers = debug_backtrace();
        $this->log[] = $type.' ['.date("m/d/Y g:i:sa").']: '.$callers[2]['class'].'::'.$callers[2]['function'].'(...): '.$message;
        if(count($this->log) > self::MAX_LOGS) {
            array_shift($this->log);
        }
    }
    
    /**
     * Get the debug data array
     * 
     * @return array The debug messaged array
     */
    public function get_log() 
    {
        return $this->log;
    }

    public function get_formatted_log() 
    {
        return implode('<br/>', $this->log);
    }

    /**
     * Shutdown function
     * 
     * Called when PHP is about to end execution.
     * Handles the updating of the cache data and
     * time
     */
    public function shutdown()
    {
        \update_option('twitter_feed_log', $this->log);
    }

    private function get_system_info() 
    {

    }
}
