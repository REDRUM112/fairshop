<script>
var colors = ['#007bff','#28a745','#333333','#c3e6cb','#dc3545','#6c757d'];
const interact_trans_count = <?php echo $acp_interact_orders->affected_rows; ?>;
<?php
$interact_order_total = 0; 
while ($acp_interact_orders -> fetch()) { 
  $interact_order_total = $interact_order_total + $order_total;
  } 

$paypal_order_total = 0;
while ($acp_paypal_orders -> fetch()) { 
  $paypal_order_total = $paypal_order_total + $order_total;
 }
  
$paypal_products_total_price = 0;
$total_price_data = array();
$cats = GetCats();
while ($acp_products_price -> fetch()) { 
    for ($x = 1; $x <= $cats; $x++) { 
    if ($category == $x ) {
      $x_price = 0; 
      $x_price = $x_price + ($price * $stock);
      array_push($total_price_data, array( "cat" => $x, "sum" => $x_price));
    }
  }
}

$total_stock_data = array();
while ($acp_products_stock -> fetch()) { 
  for ($x = 1; $x <= $cats; $x++) { 
  if ($category == $x ) {
    $x_stock = 0; 
    $x_stock = $x_stock + $stock;
    array_push($total_stock_data, array( "cat" => $x, "stock" => $x_stock));
  }
}
}
 $pdata = json_encode($total_price_data);
 $stockdata = json_encode($total_stock_data);
 ?>
const interact_trans_total = <?php echo $interact_order_total; ?>;
const paypal_trans_total = <?php echo $paypal_order_total; ?>;
const paypal_trans_count = <?php echo $acp_paypal_orders->affected_rows; ?>;
const guest_viewers = <?php echo $acp_guests_viewing->affected_rows; ?>;
const user_viewers = <?php echo $acp_users_viewing->affected_rows; ?>;
const product_data = JSON.stringify(<?php echo $pdata;?>);
const stock_data = JSON.stringify(<?php echo $stockdata;?>);
const decoded_stockdata = JSON.parse(stock_data);
const decoded_pdata = JSON.parse(product_data);
const cats_data = <?php echo GetCatName(); ?>;
const category_names = JSON.stringify(cats_data);
const decoded_cat_name = JSON.parse(category_names);
console.log(decoded_pdata);
const stock_dataset_cat = [];
const stock_dataset_stock = [];
const stockprice_dataset_cat = [];
const stockprice_dataset_sum = [];
decoded_pdata.forEach(element => stockprice_dataset_cat.push(GetCatNames(element['cat'])));
decoded_pdata.forEach(element => stockprice_dataset_sum.push(element['sum']));
decoded_stockdata.forEach(element => stock_dataset_cat.push(GetCatNames(element['cat'])));
decoded_stockdata.forEach(element => stock_dataset_stock.push(element['stock']));
console.log(stockprice_dataset_cat);
console.log(stockprice_dataset_sum);

function GetCatNames(id) {
  for (const [keys, values] of Object.entries(decoded_cat_name)) {
    for (const [keyes, valuees] of Object.entries(values)) {
    if (keyes == id) { 
      return valuees;
      }
    }
  }
}

var chPie = document.getElementById("chPie");
let total_price = 0
if (chPie) {
  new Chart(chPie, {
    type: 'pie',
    data: {
      labels: stockprice_dataset_cat,
      datasets: [
        {
          backgroundColor: [colors[1],colors[0]],
          borderWidth: 0,
          data: stockprice_dataset_sum
        }
      ]
    },

    plugins: [{
      beforeDraw: function(chart) {
        var width = chart.chart.width,
            height = chart.chart.height,
            ctx = chart.chart.ctx;
        ctx.restore();
        var fontSize = (height / 70).toFixed(2);
        ctx.font = fontSize + "em sans-serif";
        ctx.textBaseline = "middle";
        var text = "$" + stockprice_dataset_sum.reduce((a, b) => a + b, 0),
            textX = Math.round((width - ctx.measureText(text).width) / 2),
            textY = height / 2.5;
        ctx.fillText(text, textX, textY);
        ctx.save();
      }
    }],
    options: {layout:{padding:0}, legend:{display:true, position: 'bottom'}, cutoutPercentage: 80}
  });
}  


/* large pie/donut chart */
var chPie2 = document.getElementById("chPie2");
var total_stock = 0; 
if (chPie2) {
  new Chart(chPie2, {
    type: 'pie',
    data: {
      labels: stock_dataset_cat,
      datasets: [
        {
          backgroundColor: [colors[1],colors[0],colors[2], colors[3], colors[4], colors[5]],
          borderWidth: 0,
          data: stock_dataset_stock
        }
      ]
    },
    plugins: [{
      beforeDraw: function(chart) {
        var width = chart.chart.width,
        height = chart.chart.height,
        ctx = chart.chart.ctx;
        ctx.restore();
        var fontSize = (height / 70).toFixed(2);
        ctx.font = fontSize + "em sans-serif";
        ctx.textBaseline = "middle";
        var text = stock_dataset_stock.reduce((a, b) => a + b, 0),
        textX = Math.round((width - ctx.measureText(text).width) / 2),
        textY = height / 2.5;
        ctx.fillText(text, textX, textY);
        ctx.save();
      }
    }],
    options: {layout:{padding:0}, legend:{display:true, position: 'bottom'}, cutoutPercentage: 80}
  });

}  


/* 3 donut charts */
var donutOptions = {
  cutoutPercentage: 55, 
  legend: {position:'bottom', padding:5, labels: {pointStyle:'circle', usePointStyle:true}}
};

// donut 1
var chDonutData1 = {
    labels: ['Users On site', 'Guest On site'],
    datasets: [
      {
        backgroundColor: colors.slice(0,3),
        borderWidth: 0,
        data: [user_viewers, guest_viewers]
      }
    ]
};

var chDonut1 = document.getElementById("chDonut1");
if (chDonut1) {
  new Chart(chDonut1, {
    type: 'pie',
    data: chDonutData1,
    plugins: [{
      beforeDraw: function(chart) {
        var width = chart.chart.width,
            height = chart.chart.height,
            ctx = chart.chart.ctx;
        ctx.restore();
        var fontSize = (height / 70).toFixed(2);
        ctx.font = fontSize + "em sans-serif";
        ctx.textBaseline = "middle";
        var text = chart.config.data.datasets[0].data[0] + chart.config.data.datasets[0].data[1],
            textX = Math.round((width - ctx.measureText(text).width) / 2),
            textY = height / 2.5;
        ctx.fillText(text, textX, textY);
        ctx.save();
      }
    }],
    options: {layout:{padding:0}, legend:{display:true, position:'bottom'}, cutoutPercentage: 80}
  });
}

// donut 2
var chDonutData2 = {
    labels: ['Interact Orders', 'PayPal Orders'],
    datasets: [
      {
        backgroundColor: colors.slice(0,3),
        borderWidth: 0,
        data: [interact_trans_count, paypal_trans_count]
      }
    ]
};
var chDonut2 = document.getElementById("chDonut2");
if (chDonut2) {
  new Chart(chDonut2, {
    type: 'pie',
    data: chDonutData2,
    plugins: [{
      beforeDraw: function(chart) {
        var width = chart.chart.width,
            height = chart.chart.height,
            ctx = chart.chart.ctx;
        ctx.restore();
        var fontSize = (height / 70).toFixed(2);
        ctx.font = fontSize + "em sans-serif";
        ctx.textBaseline = "middle";
        var text = chart.config.data.datasets[0].data[0] + chart.config.data.datasets[0].data[1],
            textX = Math.round((width - ctx.measureText(text).width) / 2),
            textY = height / 2.5;
        ctx.fillText(text, textX, textY);
        ctx.save();
      }
    }],
    options: {layout:{padding:0}, legend:{display:true, position:'bottom'}, cutoutPercentage: 80}
  });
}

// donut 3
var chDonutData3 = {
    labels: ['Paypal Revenue', 'Interact Revenue'],
    datasets: [
      {
        backgroundColor: colors.slice(0,3),
        borderWidth: 0,
        data: [interact_trans_total, paypal_trans_total]
      }
    ]
};
var chDonut3 = document.getElementById("chDonut3");
if (chDonut3) {
  new Chart(chDonut3, {
    type: 'pie',
    data: chDonutData3,
    plugins: [{
      beforeDraw: function(chart) {
        var width = chart.chart.width,
            height = chart.chart.height,
            ctx = chart.chart.ctx;
        ctx.restore();
        var fontSize = (height / 70).toFixed(2);
        ctx.font = fontSize + "em sans-serif";
        ctx.textBaseline = "middle";
        var text = "$" + (chart.config.data.datasets[0].data[0] + chart.config.data.datasets[0].data[1]),
            textX = Math.round((width - ctx.measureText(text).width) / 2),
            textY = height / 2.5;
        ctx.fillText(text, textX, textY);
        ctx.save();
      }
    }],
    options: {layout:{padding:0}, legend:{display:true, position: "bottom"}, cutoutPercentage: 80}
  });
}
</script>