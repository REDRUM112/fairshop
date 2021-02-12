<?php
namespace Sample;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 

ini_set('error_reporting', E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class Amount
{
    public $value;
    public $currency_code;
    public $breakdown;
}

class Item
{
    public $name;
    public $quantity;
    public $sku;
    public $unit_amount;
}
  
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

class CreateOrder
{
  public static function createOrder($debug=true)
  {
    $request = new OrdersCreateRequest();
    $request->prefer('return=representation');
    $request->body = self::buildRequestBody();

    $client = PayPalClient::client();
    $response = $client->execute($request);
    if ($debug)
    {
      print "Status Code: {$response->statusCode}\n";
      print "Status: {$response->result->status}\n";
      print "Order ID: {$response->result->id}\n";
      print "Intent: {$response->result->intent}\n";
      print "Links:\n";
      foreach($response->result->links as $link)
      {
        print "\t{$link->rel}: {$link->href}\tCall Type: {$link->method}\n";
      }
       echo json_encode($response->result, JSON_PRETTY_PRINT);
    }
    return $response;
  }

    private static function buildRequestBody()
    {
        include 'components/config.php';
        $itemArray = array();
        $order_sum = 0;
        $order = array();
      
        if(!empty($_SESSION["cart"])) {
       foreach ($_SESSION["cart"] as &$products) { 
        $order_sum = $order_sum  + ($products['price'] * $products['amount']);
         
         $item = new Item();
         $item->name = $products['name'];
         $item->price =  $products['price'];
         $item->quantity = $products['amount'];
         $item->sku = $products['id'];
         $item->unit_amount = new stdClass;
         $item->unit_amount->value = $products['price'];
         $item->unit_amount->currency_code = 'USD';
          
        $amount = new Amount();
        $amount->value = $order_sum; 
        $amount->currency_code = 'USD';
        $amount->breakdown = new stdClass;
        $amount->breakdown->item_total = new stdClass;
        $amount->breakdown->item_total->value = $order_sum;
        $amount->breakdown->item_total->currency_code = 'USD';
        array_push($itemArray, $item);
        } 
      }
        return array(
            'intent' => 'CAPTURE',
            'application_context' =>
                array(
                    'return_url' => 'https://'. $domain .'/orders.php',
                    'cancel_url' => 'https://'. $domain .'/index.php'
                ),
            'purchase_units' =>
                array(
                    0 =>
                        $amount,
                        $item
                )
        );
    }
}

if (!count(debug_backtrace()))
{
  CreateOrder::createOrder(true);
}