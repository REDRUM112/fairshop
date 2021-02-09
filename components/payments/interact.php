<?php 
if ($payment_processor == "Interact") {
   $data = json_decode($transaction_data, true);
   $total_spent = $total_spent + $order_total;?> 
  <div class="accordion-item d-block" >
    <h2 class="accordion-header" id="heading<?php echo $id; ?>">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $id; ?>" aria-expanded="false" aria-controls="collapse<?php echo $id; ?>">
        <?php
        echo '<table class="table" style="width:100%"> <tr>';
        echo '<th>Order #</th>';
        echo '<th>Order total</th>';
        echo '<th>Email</th>';
        echo '<th>Order placed</th>';
        echo '<th>Payment processor</th>';
        echo '<th>Payment status</th>  </tr>';
        echo '<tr>';
        echo '<td>'.$id.'</td>';
        echo '<td>$'.$order_total.".00 USD</td>";
        echo  '<td>'.$data['e_email']."</td>";
        echo  '<td>'.date('Y-m-d', $data['order_time'])."</td>";
        echo '<td>'.$payment_processor.'</td>';
        echo '<td>'.$payment_status.'</td>';
        echo '</tr>';
        echo '</table>'; ?>
      
      </button>
    </h2>
    <div id="collapse<?php echo $id; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $id; ?>" data-bs-parent="#accordionExample">
      <div class="accordion-body d-flex justify-content-between">
      <ul class="order-list">
    <p class="display-6">📮 Shipping Details:</p>
    <li>Name: <?php  echo  $data['first_name']; ?> <?php echo $data['last_name']; ?></li> 
     <li>Price: $0.00 USD</li>
     <li>Address: <?php  echo $data['app'] . $data['address'] . ", " . $data['country'] . ", " . $data['state'] . ", " . $data['city'] . ", " .$data['zip']; ?></li> 

       </ul>
    <ul class="order-list">
    <p class="display-6">📦 Products Odered:</p>
  <?php forEach($data['items'] as &$items) {
      ?> <li> <?php  echo $items['amount']." x ".$items['name']; ?></li> <?php
       }?>
       </ul>
       <ul class="order-list">
    <p class="display-6">⏱ Order Status:</p>
    
     <li>Status: <?php  echo $order_status; ?></li> 
     <li>Tracking ID: <?php echo $tracking_id; ?></li>
       </ul>
      </div>
  
    </div>
    </div>
    <?php
    }
    ?>