<?php

namespace Sample\CaptureIntentExamples;

require __DIR__ . '/vendor/autoload.php';

use Sample\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class CaptureOrder
{
  public static function captureOrder($orderId, $debug=true)
  {
    $request = new OrdersCaptureRequest($orderId);


    $client = PayPalClient::client();
    $response = $client->execute($request);

    if ($debug)
    {
      print "Status Code: {$response->statusCode}\n";
      print "Status: {$response->result->status}\n";
      print "Order ID: {$response->result->id}\n";
      print "Links:\n";
      foreach($response->result->links as $link)
      {
        print "\t{$link->rel}: {$link->href}\tCall Type: {$link->method}\n";
      }
      print "Capture Ids:\n";
      foreach($response->result->purchase_units as $purchase_unit)
      {
        foreach($purchase_unit->payments->captures as $capture)
        {   
          print "\t{$capture->id}";
        }
      }

      echo json_encode($response->result, JSON_PRETTY_PRINT);
    }

    return $response;
  }
}

if (!count(debug_backtrace()))
{
  CaptureOrder::captureOrder('REPLACE-WITH-APPORVED-ORDER-ID', true);
}
?>