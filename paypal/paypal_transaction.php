<?php
namespace Sample\CaptureIntent;

require '../vendor/autoload.php';

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;

// Creating an environment

if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 


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

class CreateOrder
{
  public static function createOrder($debug=true)
  {
    $clientId = "AYq_dPGy5F80jTOkuVpoVpxEfScvqhUg6SVXyTuz-yMViIiY14nRBkoPYzey-T0ptUEd9y6Um37aofSE";
    $clientSecret = "EIyB8SkVSlCOMidzgzicL-bahK6hKVrk9A4q2dBORDQ5pkyhBRf_Vo_QiIikEJUw6To1gKS1aQRwny79";
    $environment = new SandboxEnvironment($clientId, $clientSecret);
    $request = new OrdersCreateRequest();
    $request->prefer('return=representation');
    $request->body = self::buildRequestBody();

    $client = new PayPalHttpClient($environment);
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
        include '../components/config.php';
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
         $item->unit_amount = new \stdClass;
         $item->unit_amount->value = $products['price'];
         $item->unit_amount->currency_code = 'USD';
          
        $amount = new Amount();
        $amount->value = $order_sum; 
        $amount->currency_code = 'USD';
        $amount->breakdown = new \stdClass;
        $amount->breakdown->item_total = new \stdClass;
        $amount->breakdown->item_total->value = $order_sum;
        $amount->breakdown->item_total->currency_code = 'USD';
        array_push($itemArray, $item);
        var_dump($item);
        var_dump($amount);
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
?>