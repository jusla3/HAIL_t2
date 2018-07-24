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

class EnvironmentValidator
{
    private static $messages = array();

    private static $initated = false;

    private static function init()
    {
        if(!self::$initated)
        {
            \add_action( 'admin_notices', array(__CLASS__, 'print_message') );
            self::$initated = true;
        }
    }

    static function validate( $args )
    {
        $valid      = true;
        $config     = array_merge(self::default_args(), $args);
        $extensions = get_loaded_extensions();

        if( version_compare(phpversion(), $config['phpversion'], '<') )
        {
            self::$messages[] = sprintf(__("<strong>%s</strong> requires <strong>PHP %s</strong> or newer to run (you are currently running <strong>PHP %s</strong>). Please upgrade your PHP version.",'amarkal'),$config['name'],$config['phpversion'],phpversion());
            $valid = false;
        }

        if( version_compare(\get_bloginfo('version'), $config['wpversion'], '<') )
        {
            self::$messages[] = sprintf(__("<strong>%s</strong> requires <strong>WordPress %s</strong> or newer to run (you are currently running <strong>WordPress %s</strong>). Please upgrade your WordPress version.",'amarkal'),$config['name'],$config['wpversion'],\get_bloginfo('version'));
            $valid = false;
        }

        foreach( $config['extensions'] as $ext )
        {
            if( !in_array($ext, $extensions)) 
            {
                self::$messages[] = sprintf(__("<strong>%s</strong> requires the <strong>%s</strong> extension to be installed."),$config['name'],$ext);
                $valid = false;
            }
        }

        self::init();

        return $valid;
    }

    static function default_args()
    {
        return array(
            'name'       => '',      // Plugin/theme name
            'phpversion' => '5.3.0', // Min. PHP version
            'wpversion'  => '4.2.0', // Min. WordPress version
            'extensions' => array()  // List of required PHP extensions
        );
    }

    static function print_message()
    {
        foreach( self::$messages as $message )
        {
            printf( '<div class="notice notice-%s"><p>%s</p></div>', 'error', $message );
        }
    }
}