<?php 
if ($payment_processor == "PayPal") {
   $data = json_decode($transaction_data, true);
   $total_spent = $total_spent + $data['purchase_units'][0]['amount']['value'];?> 
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
        echo '<td>'.$data['id'].'</td>';
        echo '<td>$'.$data['purchase_units'][0]['amount']['value']." ".$data['purchase_units'][0]['amount']['currency_code'].'  </td>';
        echo  '<td>'.$data['payer']['email_address']."</td>";
        echo  '<td>'.date('Y-m-d', strtotime($data['update_time']))."</td>";
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
    <li>Name: <?php  echo $data['purchase_units'][0]['shipping']['name']['full_name']; ?></li> 
     <li>Price: $<?php echo $data['purchase_units'][0]['amount']['breakdown']['shipping']['value']. " " . $data['purchase_units'][0]['amount']['breakdown']['shipping']['currency_code']; ?></li>
     <li>Address: <?php  echo $data['purchase_units'][0]['shipping']['address']['address_line_1'] . ", " . $data['purchase_units'][0]['shipping']['address']['admin_area_2'] . " " . $data['purchase_units'][0]['shipping']['address']['admin_area_1'] . ", " . $data['purchase_units'][0]['shipping']['address']['country_code'] . ", " .$data['purchase_units'][0]['shipping']['address']['postal_code']; ?></li> 

       </ul>
    <ul class="order-list">
    <p class="display-6">📦 Products Odered:</p>
  <?php forEach($data['purchase_units'][0]['items'] as &$items) {
      ?> <li> <?php  echo $items['quantity']." x ".$items['name']; ?></li> <?php
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