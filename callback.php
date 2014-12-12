<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

  // In case one is using PHP 5.4's built-in server
  $filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
  if (php_sapi_name() === 'cli-server' && is_file($filename)) {
      return false;
  }

  // Require composer autoloader
  require __DIR__ . '/vendor/autoload.php';

  require __DIR__ . '/dotenv-loader.php';

use Auth0SDK\Auth0;

  $auth0 = new Auth0(array(
    'domain'        => getenv('AUTH0_DOMAIN'),
    'client_id'     => getenv('AUTH0_CLIENT_ID'),
    'client_secret' => getenv('AUTH0_CLIENT_SECRET'),
    'redirect_uri'  => getenv('AUTH0_CALLBACK_URL'),
    'debug'         => true
));

$auth0->setDebugger(function($info) {
    file_put_contents("php://stdout", sprintf("\n[%s] %s:%s [%s]: %s\n",
        date("D M j H:i:s Y"), 
        $_SERVER["REMOTE_ADDR"],
        $_SERVER["REMOTE_PORT"], 
        "---",
        $info
    ));
});

$token = $auth0->getAccessToken();

if ($token) {
    header('Location: /');
} else {
    print('Oops! :(');
}
?>