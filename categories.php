<?php 


ini_set('display_errors',1); 
error_reporting(E_ALL);
include 'components/constructors/header.php';
include 'components/product_get.php'; 


$_SESSION["this_url"] = full_path().'?category='.$parsed_url["path"];

?>
  <div class="main d-flex justify-content-center" style="margin:100px;">
    <div class="card-deck">
    <h4>Viewing products of the <?php echo $parsed_url["path"];?> category.</h4>
    <div class="loadMore" style="margin:75px;">
  <?php while ($product_get -> fetch()) { 
   $image_data = json_decode($images); ?>
    <div class="card item mycard">
    <img class="card-img-top2" height=200px width=70px src="images/products/<?php echo $image_data[0];?>" alt="<?php echo $name; ?>">
      <div class="card-body">
        <h5 class="card-title"><?php echo $name;?></h5>
        <p class="card-text"><?php echo $short_desc; ?></p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="range"> 
            <label class="form-label" for="customRange2">Amount To buy:  <span id="<?php echo $id;?>rangeval">1</span></label>
            <input type="range" class="form-range" name="amount" min="1" value="1" max="<?php echo $stock;?>" id="customRange<?php echo $id;?>" onInput="$('#<?php echo $id;?>rangeval').html($(this).val())"> 
          </div>
        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <input type="hidden" name="product_id"  class="form-control" value="<?php echo $id; ?>">
            <input type="hidden" name="product_name"  class="form-control" value="<?php echo $name; ?>">
            <input type="hidden" name="product_image"  class="form-control" value="<?php echo $image_data[0]; ?>">
            <input type="hidden" name="product_price"  class="form-control" value="<?php echo $price; ?>">
            <input type="hidden" name="product_stock"  class="form-control" value="<?php echo $stock; ?>">
          </div>
        <div class="d-grid gap-2">
        <?php if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ ?>
            <button type="button" class="btn btn-primary bg-gradient" data-bs-toggle="modal" data-bs-target="#LoginModal">Login</button>
          <?php   } else { ?>
            <button name="action" value="AddCart" class="btn btn-success bg-gradient">Add to Cart</button>
          <?php  } ?> 
        </div>
      </div>
      </form>
      <div class="card-footer">
        <small class="text-muted d-flex justify-content-between">Price: $<?php echo $price; ?> <span>Date Added: <?php echo $date;?></span> <span style="">Stock: <?php echo $stock;?> </span></small>
      </div>
    </div>
    <?php } 
  ?>
  </div>
  </div>
</div>
<?php include 'components/constructors/footer.php';?>
<script>
$(document).ready(function() {

  $('.loadMore').loadMoreResults({
    displayedItems: 4,
    showItems: 8

  });

})
</script>