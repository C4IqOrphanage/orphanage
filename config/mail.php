<?php

// return array(
//   "driver" => "smtp",
//   "host" => "smtp.mailtrap.io",
//   "port" => 2525,
//   "from" => array(
//       "address" => "from@example.com",
//       "name" => "Example"
//   ),
//   "username" => "167b0a6d865371",
//   "password" => "d1220cb2307ef6",
//   "sendmail" => "/usr/sbin/sendmail -bs",
//   "pretend" => false
// );



return [


    'driver' => env('MAIL_DRIVER', 'smtp'),



    'host' => env('MAIL_HOST', 'smtp.mailgun.org'),



    'port' => env('MAIL_PORT', 587),



    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],



    'encryption' => env('MAIL_ENCRYPTION', 'tls'),


    'username' => env('MAIL_USERNAME'),

    'password' => env('MAIL_PASSWORD'),



    'sendmail' => '/usr/sbin/sendmail -bs',



    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],



    'log_channel' => env('MAIL_LOG_CHANNEL'),

];
