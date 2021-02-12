<form class="row g-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
<div class="form-group <?php echo (!empty($category_err)) ? 'has-error' : ''; ?>">
<label >Category:</label>
  <select class="form-select bg-light" id="product-form-category" name="product-form-category" aria-label="categories">
    <?php   while ($acp_fetch_categories -> fetch()) { ?>
    <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
    <?php } ?>
    <span class="help-block"><?php echo $category_err; ?></span>
  </select>
</div>
<div class="form-group col-md-6 <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
    <label >Name:</label>
    <input type="text" name="name"  class="form-control bg-light" value="<?php echo $name; ?>">
    <span class="help-block"><?php echo $name_err; ?></span>
</div>
<div class="form-group col-md-6 <?php echo (!empty($short_desc_err)) ? 'has-error' : ''; ?>">
    <label >Short_Desc:</label>
    <input type="text" name="short_desc"  class="form-control bg-light" value="<?php echo $short_desc; ?>">
    <span class="help-block"><?php echo $short_desc_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($long_desc_err)) ? 'has-error' : ''; ?>">
    <label >Long_Desc:</label>
    <input type="text" name="long_desc"  class="form-control bg-light" value="<?php echo $long_desc; ?>">
    <span class="help-block"><?php echo $long_desc_err; ?></span>
</div>
<!-- images -->
<div class="form-group col-md-6">
<label for="image">Images:</label></br>
<input class="btn btn-light" type="file" name="image[]" id="image" multiple><br>
</div>
<!-- banner -->
<div class="form-group col-md-6">
<label for="banner">Banner:</label></br>
<input class="btn btn-light" type="file" name="banner" id="banner"><br>
</div>

<div class="form-group col-md-6 <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
    <label >Price:</label>
    <input type="text" name="price"  class="form-control bg-light" value="<?php echo $price; ?>">
    <span class="help-block"><?php echo $price_err; ?></span>
</div>
<div class="form-group col-md-6 <?php echo (!empty($shipping_err)) ? 'has-error' : ''; ?>">
    <label >Shipping:</label>
    <input type="text" name="shipping"  class="form-control bg-light" value="<?php echo $shipping; ?>">
    <span class="help-block"><?php echo $shipping_err; ?></span>
</div>
<div class="form-group col-md-6 <?php echo (!empty($stock_err)) ? 'has-error' : ''; ?>">
    <label >Stock:</label>
    <input type="text" name="stock"  class="form-control bg-light" value="<?php echo $stock; ?>">
    <span class="help-block"><?php echo $stock_err; ?></span>
</div>
<div class="form-group col-md-4 <?php echo (!empty($promote_err)) ? 'has-error' : ''; ?>">
    <label >Promote: </label>
    <select class="form-select bg-light" id="promote-form-active" name="promote" aria-label="active-status">
        <option value="1">Yes</option>
        <option value="0">No</option>
  </select>
    <span class="help-block"><?php echo $promote_err; ?></span>
</div>
<div class="form-group col-md-2 <?php echo (!empty($active_err)) ? 'has-error' : ''; ?>">
    <label >Active:</label>
    <select class="form-select bg-light" id="active-form-active" name="active" aria-label="active-status">
        <option value="1">Yes</option>
        <option value="0">No</option>
  </select>
    <span class="help-block"><?php echo $active_err; ?></span>
</div>
      <div class="modal-footer">
      <div class="d-grid gap-2 col-6 mx-auto">
          <button type="submit" name="action" value="AddProduct" class="btn btn-secondary">Add Product</button>
        </div>
      </div>
</form>