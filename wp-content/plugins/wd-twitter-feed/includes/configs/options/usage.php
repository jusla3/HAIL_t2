<?php
$config = array(
    'slug'           => 'twitter_feed_usage_status',
    'title'          => 'Usage Status',
    'subtitle'       => 'Twitter API usage statistics for the authenticated user',
    'description'    => 'This section shows the usage status for each resource type. Twitter resources are subject to the REST API rate limits, with different resources having different limits.',
    'fields'         => array()
);

// Bail if this is not the usage status page to avoid unnecessary API calls
if(isset($_GET['page']) && $_GET['page'] === 'twitter_feed_settings')
{
    $resources = array(
        'application' => array(
            'rate_limit_status' => 'Usage Status'
        ),
        'statuses'    => array(
            'user_timeline'     => 'User Timeline'
        )
    );

    if(!\TwitterFeed\Settings::tokens_exists()) {
        $config['fields'][] = array(
            'type'      => 'html',
            'html'      => 'You must provide your twitter tokens to view your usage status'
        );
        return $config;
    }

    try {
        $status = new TwitterFeed\Resource\Resource_status(
            array('resources' => implode(',', array_keys($resources)))
        ); 
        $resp = $status->perform_request();
    }
    catch(Exception $e) {
        $config['fields'][] = array(
            'type'      => 'html',
            'html'      => 'An error has occured while trying to retrieve usage data: '.$e->getMessage()
        );
        return $config;
    }

    if( isset($resp->errors) && count($resp->errors) > 0) {
        $config['fields'][] = array(
            'type'      => 'html',
            'html'      => 'An error has occured while trying to retrieve usage data: '.
                            $resp->errors[0]->message.
                            ' (<a href="https://developer.twitter.com/en/docs/basics/response-codes">code '.$resp->errors[0]->code.'</a>)'
        );
        return $config;
    } 
    
    foreach( $resources as $resource => $param ) {
        foreach( $param as $type => $title ) {
            $s = '/'.$resource.'/'.$type; 
            $status = $resp->resources->$resource->$s;
            $diff = $status->limit - $status->remaining;
            $val = is_numeric($diff) ? $diff : 0;
            $max = is_numeric($status->limit) ? $status->limit : 0;
            $config['fields'][] = array(
                'type'      => 'progressbar',
                'title'     => $title,
                'min'       => 0,
                'max'       => $max,
                'value'     => $val
            );
        }
    }
}

return $config;