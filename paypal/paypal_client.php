<?php
namespace Sample;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

  
class PayPalClient
{
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    public static function environment()
    {
        include 'components/config.php';
        $clientId = getenv("CLIENT_ID") ?: $paypal_clientid;
        $clientSecret = getenv("CLIENT_SECRET") ?: $paypal_secret;
        return new SandboxEnvironment($clientId, $clientSecret);
    }
}
?>