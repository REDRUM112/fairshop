<div class="featured-list" >
  <?php while ($products_promoted -> fetch()) { ?>
    <h1>Featured Products <a href="categories.php?category=featured"><span class="btn btn-primary">View all (<?php echo $total_promoted;?>) </span></a></h1>
    <?php } ?>
    <div class="loadMore">
      <?php while ($featured_products_mid -> fetch()) {
        $images_data = json_decode($images);   
        ?>
        <div class="card item mycard" style="height:690px; width:300px;">
          <img class="card-img-top" height=372px; width=250px; src="images/products/<?php echo $images_data[0];?>" alt="<?php echo $name; ?>">
          <div class="card-body">
            <p class="card-text"><?php echo $short_desc;?></p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="range"> 
            <label class="form-label" for="customRange2">Amount To buy:  <span id="<?php echo $id;?>rangeval">1</span></label>
            <input type="range" class="form-range" name="amount" min="1" value="1" max="<?php echo $stock;?>" id="customRange<?php echo $id;?>" onInput="$('#<?php echo $id;?>rangeval').html($(this).val())"> 
          </div>
          <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <input type="hidden" name="product_id"  class="form-control" value="<?php echo $id; ?>">
            <input type="hidden" name="product_name"  class="form-control" value="<?php echo $name; ?>">
            <input type="hidden" name="product_image"  class="form-control" value="<?php echo $images_data[0]; ?>">
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
            <small class="text-muted d-flex justify-content-between">Price: $<?php echo $price; ?> <span style="">Stock: <?php echo $stock;?> </span></small>
          </div>
        </div>   
        <?php } ?>
      </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="lib/js/loadMoreResults.js"></script>
  <script>
$(document).ready(function() {

  $('.loadMore').loadMoreResults({
    displayedItems: 3,
    showItems: 6
  });

})
</script>