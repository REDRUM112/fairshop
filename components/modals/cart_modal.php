

<?php 
function full_path()
{
    $s = &$_SERVER;
    $ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true:false;
    $sp = strtolower($s['SERVER_PROTOCOL']);
    $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
    $port = $s['SERVER_PORT'];
    $port = ((!$ssl && $port=='80') || ($ssl && $port=='443')) ? '' : ':'.$port;
    $host = isset($s['HTTP_X_FORWARDED_HOST']) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
    $host = isset($host) ? $host : $s['SERVER_NAME'] . $port;
    $uri = $protocol . '://' . $host . $s['REQUEST_URI'];
    $segments = explode('?', $uri, 2);
    $url = $segments[0];
    return $url;
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
?> 
<script>
paypal.Buttons({
  createOrder: function() {
  return fetch('paypal/paypal_transaction.php', {
    method: 'post',
    headers: {
      'content-type': 'application/json'
    }
  }).then(function(res) {
    return res.json();
  }).then(function(data) {
    return data.id;
  });
},
onApprove: function(data) {
  return fetch('/my-server/capture-paypal-transaction', {
    headers: {
      'content-type': 'application/json'
    },
    body: JSON.stringify({
      orderID: data.orderID
    })
  }).then(function(res) {
    return res.json();
  }).then(function(details) {
    alert('Transaction funds captured from ' + details.payer_given_name);
  })
}
}).render('.paypal-btn');</script>

<!-- <script>
paypal.Buttons({
    createOrder: function(data, actions) {
      return actions.order.create({  
        purchase_units: [{
            amount: JSON.parse(`<?php echo json_encode($amount); ?>`),
            items: JSON.parse(`<?php echo json_encode($itemArray); ?>`)
        }]
      });
    },
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
        $.ajax({ 
          type: "POST", 
          url: "components/posts/payment_complete_post.php", 
          data: {transaction:JSON.stringify(details), action:"paypal"},
          dataType: 'json',
        });
        $.ajax({ 
          type: "POST", 
          url: "components/posts/cart_delete_post.php", 
          data: {action:"Delete All"}
        });
        $(location).attr('href', '/store/orders.php')
    });
  }
}).render('.paypal-btn');</script> -->
<div class="modal fade" id="CartModal" tabindex="-1" aria-labelledby="CartModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="CartModalLabel">Cart 🛒 (<?php echo count($_SESSION["cart"]); ?>)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php     if(empty($_SESSION["cart"])){ 
   
  } else { ?>
      <div class="modal-body">
      <?php
      $order_total= 0;
      foreach ($_SESSION["cart"] as &$product) {
        $order_total = $order_total + $product['total'] ?> 
        <div class="card mb-3" style="max-width: 540px">
          <div class="row g-0">
            <div class="col-md-4">
              <img
                src="<?php echo $product['images'] ?>"
                alt="..."
                class="img-fluid"
              />
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?php echo $product['name'] ?></h5>
                <p class="card-text">
                 Amount: <?php echo $product['amount'] ?> x $<?php echo $product['price'] ?></br>
                 Total: $<?php echo $product['total'] ?>
                </p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                  <div class="form-group">
                    <input type="hidden" name="product_id"  class="form-control" value="<?php echo $product['id']; ?>">
                  </div>
                  <input type="submit" class="btn btn-danger" name="action" data-bs-toggle="modal" data-bs-target="#CartModal" value="Delete">
              </div>
            </div>
          </div>
        </div>
        <?php
        } ?>
        <span class="paypal-btn"></span>
      </div>
      <?php } ?>

      <div class="modal-footer">
   <?php if(empty($_SESSION["cart"])){ ?>
    <p><small>Your cart is empty.</small></p>
          <?php  } else { ?>
           <input type="submit" class="btn btn-danger" name="action" value="Delete All">
      <p><small>Order total: $<?php echo $order_total; ?>.00</small></p>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#InteractModal">E-Transfer</button>
     <?php }  ?>
      </form>
      </div>
    </div>
  </div>
</div>
