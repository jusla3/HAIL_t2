<?php
/**
 * @package    @echo NAME
 * @date       @echo DATE
 * @version    @echo VERSION
 * @author     @echo AUTHOR_AND_EMAIL
 * @link       @echo URL
 * @copyright  @echo COPYRIGHT
 */
namespace TwitterFeed\Resource;

/**
 * 
 */
class Resource_status 
{
    const URL_SCRIPT = 'application/rate_limit_status.json';
    
    private $api;
    private $args;
    
    public function __construct( $args ) 
    {
        $this->api = new \TwitterAPIExchange($this->get_tokens());
        $this->args = $args;
    }
    
    public function perform_request()
    {
        return json_decode(
            $this->api->setGetfield($this->build_argument_list($this->args))
                 ->buildOauth($this->get_url(), 'GET')
                 ->performRequest()
            );
    }
    
    public function get_url()
    {
        return TwitterResource::API_URL . self::URL_SCRIPT;
    }
    
    public function get_tokens()
    {
        if( !isset( $this->tokens ) )
        {
            global $twitterfeed_settings;
            $this->tokens = array(
                'oauth_access_token'        => $twitterfeed_settings['oauth_access_token'],
                'oauth_access_token_secret' => $twitterfeed_settings['oauth_access_token_secret'],
                'consumer_key'              => $twitterfeed_settings['consumer_key'],
                'consumer_secret'           => $twitterfeed_settings['consumer_secret']
            );
        }
        return $this->tokens;
    }
    
    protected function build_argument_list( array $args = array() ) 
    {
        $arg_list = '';
        foreach($args as $key => $value)
        {
            $arg_list = add_query_arg( array( $key => $value ), $arg_list );
        }
        return esc_url_raw ( $arg_list );
    }
}
