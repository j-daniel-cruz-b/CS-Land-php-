<?php
    require '../paypal/autoload.php';
    
    define('URL_SITIO','http://localhost/2020/Proyecto%20CS%20Land/tienda');
    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'AfgGkd4fAf_7Myjn5dTBY1tQF0RAiA8Ps84j4ZBAiO5Dh339W65oyiUDCMZLwSk_78mpMfuwLNJq9_F_',
            'EE3hj-nZ-awaP1lfPuPurP7pKwKEYVIQAUTh3abSpvr7XFlwaMrBFJlEnnuPlWuUVBnIJHAdM4K0pPwB'
        )
    );
?>