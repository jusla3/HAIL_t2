<?php

$user = wp_get_current_user();

return array(
    'slug'           => 'twitter_feed_support',
    'title'          => 'Support',
    'subtitle'       => 'Experiencing issues? Need help using the plugin? Feel free to contact us!',
    'fields'         => array(
        array(
            'type'          => 'html',
            'template'      => __DIR__.'/support.phtml'
        ),
        array(
            'type'          => 'text',
            'name'          => 'support_email',
            'title'         => 'Your Email',
            'default'       => $user->user_email
        ),
        array(
            'type'          => 'text',
            'name'          => 'support_name',
            'title'         => 'Your Name',
            'default'       => $user->user_firstname.' '.$user->user_lastname
        ),
        array(
            'type'          => 'textarea',
            'name'          => 'support_message',
            'title'         => 'Message',
            'rows'          => 5,
            'description'   => 'Type your message here'
        ),
        array(
            'type'          => 'button',
            'request_url'   => admin_url('admin-ajax.php'),
            'request_data'  => array(
                'action'        => 'twitter_feed_send_support_email',
                'email'         => '{{support_email}}',
                'name'          => '{{support_name}}',
                'message'       => '{{support_message}}'
            ),
            'label_start'   => 'Send Email',
            'label_doing'   => 'Sending...',
            'label_done'    => 'Email Sent!',
            'description'   => 'Click here to send an email with the plugin\'s log to our support team'
        )
    )
);