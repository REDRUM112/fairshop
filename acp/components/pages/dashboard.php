<?php
require '../components/config.php';
function getloc($ip, $key) {
    if ($ip == "::1") {
        $request = file_get_contents("http://api.ipstack.com/8.8.8.8?access_key=" . $key);
        return $request;
    } else { 
        $request = file_get_contents("http://api.ipstack.com/". $ip . "?access_key=" . $key);
        return $request;
    }
   }

?>
<div class="container" id="dashboard">

            <div class="row my-3">
                <div class="col">
                    <h4>📟 Dashboard</h4>
                </div>
            </div>

            <div class="row py-2">
              <div class="col-md-4 py-1">
                  <div class="card">
                  <div class="card-title d-flex justify-content-center">💲 Revenue</div>
                      <div class="card-body">
                          <canvas id="chDonut3"></canvas>
                      </div>
                  </div>
              </div>
                <div class="col-md-4 py-1">
                    <div class="card">
                      <div class="card-title d-flex justify-content-center">👣 Live Visitors</div>
                        <div class="card-body">
                            <canvas id="chDonut1"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 py-1">
                    <div class="card">
                    <div class="card-title d-flex justify-content-center">📜 Orders</div>
                        <div class="card-body">
                            <canvas id="chDonut2"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 py-1">
                    <div class="card">
                    <div class="card-title d-flex justify-content-center">💰 Product Value</div>
                        <div class="card-body">
                            <canvas id="chPie"></canvas>
                        </div>
                    </div>
                </div>
                <div class="geo-card col-md-4 py-1">
                    <div class="card overflow-hidden" >
                    <div class="card-title d-flex justify-content-center">🌎 Visitor Geo location</div>
                        <div class="card-body">
                          <div style="overflow-y: scroll; height: 154px;">
                        <?php  while ($acp_viewing -> fetch()) {
                          $loc = getloc($ip, $geoloc_key); 
                          $loc_data = json_decode($loc, true); ?>
                          <?php echo "<img src='https://www.countryflags.io/" . $loc_data['country_code'] . "/shiny/24.png'>" . " " . ID2UserName($id) . ", " . $loc_data['country_name'] . ", " . $loc_data['region_name'] . "(". $ip .")"?></br>
                          <?php } ?>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 py-1">
                    <div class="card">
                    <div class="card-title d-flex justify-content-center">📋 Product Stock</div>
                        <div class="card-body">
                            <canvas id="chPie2"></canvas>
                        </div>
                    </div>
                </div>
            </div> <!--  ending row -->
            <div class="row my-3">
                <div class="col">
                    <h4>📤 Orders Waiting on Tracking <button class="btn btn-sm btn-primary bg-gradient" onclick="ShowOrders()">View All</button></h4>
                </div>
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Total</th>
                    <th scope="col">Processor</th>
                    <th scope="col">Payment status</th>
                    <th scope="col">Order status</th>
                    </tr>
                </thead>
                <tbody>
                <?php  while ($acp_wait_orders -> fetch()) { ?>
                    <tr>
                    <td><?php echo $id ;?></td>
                    <td>$<?php echo $order_total;?>.00</td>
                    <td><?php echo $payment_processor;?></td>
                    <td><?php echo $payments_status;?></td>
                    <td><?php echo $order_status;?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>          
            </div>
        </div> <!--  dashboard -->