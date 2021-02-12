<div class="container" id="orders">
  <div class="row my-3">
    <div class="col">
        <h4>📥 Orders</h4>
    </div>
  </div>
  <div class="row my-3">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#orders-content">Orders</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" aria-current="page" href="#orders-content-manage">Manage Orders</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" aria-current="page" href="#orders-content-create-order">Create Order</a>
    </li>
  </ul>

  <div class="tab-content">
    <div id="orders-content" class="tab-pane user-nav active">
      <div class="wrapper" id="table-overflow">
        <table class="table" id="orders-table">
          <thead>
              <tr>
              <th scope="col">#</th>
              <th scope="col">Payer ID</th>
              <th scope="col">Order Total</th>
              <th scope="col">Payment Processor</th>
              <th scope="col">Payment Status</th>
              <th scope="col">Tracking ID</th>
              <th scope="col">Order Status</th>
              </tr>
          </thead>
          <tbody>
          <?php  while ($acp_orders -> fetch()) { ?>
              <tr>
              <td><?php echo $id ;?></td>
              <td><?php echo $payer_id;?></td>
              <td><?php echo $order_total;?></td>
              <td><?php echo $payment_processor;?></td>
              <td><?php echo $payments_status;?></td>
              <td><?php echo $tracking_id;?></td>
              <td><?php echo $order_status;?></td>
              </tr>
              <?php } ?>
          </tbody>
        </table>   
      </div>  
    </div>
    <div id="orders-content-manage" class="tab-pane user-nav fade">
    <div class="wrapper" id="table-overflow">
        <table class="table" id="manage-orders-table">
        <thead>
              <tr>
              <th scope="col">#</th>
              <th scope="col">Payer ID</th>
              <th scope="col">Order Total</th>
              <th scope="col">Payment Processor</th>
              <th scope="col">Payment Status</th>
              <th scope="col">Tracking ID</th>
              <th scope="col">Order Status</th>
              </tr>
          </thead>
          <tbody>
          <?php  while ($acp_edit_orders -> fetch()) { ?>
              <tr>
              <td><?php echo $id ;?></td>
              <td><?php echo $payer_id;?></td>
              <td><?php echo $order_total;?></td>
              <td><?php echo $payment_processor;?></td>
              <td><?php echo $payments_status;?></td>
              <td><?php echo $tracking_id;?></td>
              <td><?php echo $order_status;?></td>
              </tr>
              <?php } ?>
          </tbody>
        </table>   
      </div>  
    </div>
    <div id="orders-content-create-order" class="tab-pane user-nav fade">
    <?php include 'components/pages/forms/create_order.php'; ?>
    </div> 
  </div> <!-- tab-content -->
</div> <!-- row -->

</div> <!-- container -->