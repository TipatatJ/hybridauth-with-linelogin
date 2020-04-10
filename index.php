<?php
include 'vendor/autoload.php';

//session_start();

use Hybridauth\Hybridauth;
use Hybridauth\HttpClient;
$config = [
    'callback' => HttpClient\Util::getCurrentUrl(),
    'providers' => [
        'Line' => [ 
            'enabled' => true,
            'keys'    => [ 'id' => '1654064401', 'secret' => 'fe85418e1b99172129d0333529757568' ], 
        ],
    ],
];
try {    
    $hybridauth = new Hybridauth( $config );
    $adapter = $hybridauth->authenticate( 'Line' );
    $tokens = $adapter->getAccessToken();
    $userProfile = $adapter->getUserProfile();
    // print_r( $tokens );
    print_r( $userProfile );
    $adapter->disconnect();

    
}
catch (\Exception $e) {
    echo $e->getMessage();
}