<?php
use Auth0SDK\Auth0;

$auth0 = new Auth0(array(
    'domain'        => 'YOUR_AUTH0_DOMAIN',
    'client_id'     => 'YOUR_AUTH0_CLIENT_ID',
    'client_secret' => 'YOUR_AUTH0_CLIENT_SECRET',
    'redirect_uri'  => 'http://<name>/callback.php'
));

$userInfo = $auth0->getUserInfo();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        
    </body>
</html>
