<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
    <label >First Name:</label>
    <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>">
    <span class="help-block"><?php echo $first_name_err; ?></span>
</div>    
<div class="form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
    <label >Last Name:</label>
    <input type="text" name="last_name"  class="form-control" value="<?php echo $last_name; ?>">
    <span class="help-block"><?php echo $last_name_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
    <label >Address:</label>
    <input type="text" name="address"  class="form-control" value="<?php echo $address; ?>">
    <span class="help-block"><?php echo $address_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($app_err)) ? 'has-error' : ''; ?>">
    <label >Appartement: (optional)</label>
    <input type="text" name="appartement"  class="form-control" value="<?php echo $app; ?>">
    <span class="help-block"><?php echo $app_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($country_err)) ? 'has-error' : ''; ?>">
    <label >Country:</label>
    <input type="text" name="country"  class="form-control" value="<?php echo $country; ?>">
    <span class="help-block"><?php echo $country_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($city_err)) ? 'has-error' : ''; ?>">
    <label >City:</label>
    <input type="text" name="city"  class="form-control" value="<?php echo $city; ?>">
    <span class="help-block"><?php echo $city_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($state_err)) ? 'has-error' : ''; ?>">
    <label >State/Province:</label>
    <input type="text" name="state"  class="form-control" value="<?php echo $state; ?>">
    <span class="help-block"><?php echo $state_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($zip_err)) ? 'has-error' : ''; ?>">
    <label >Zip Code:</label>
    <input type="text" name="zip"  class="form-control" value="<?php echo $zip; ?>">
    <span class="help-block"><?php echo $zip_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($e_email_err)) ? 'has-error' : ''; ?>">
    <label >E-Transfer Email:</label>
    <input type="text" name="e_email"  class="form-control" value="<?php echo $e_email; ?>">
    <span class="help-block"><?php echo $e_email_err; ?></span>
</div>
<input type="hidden" name="interact_order_total"  class="form-control" value="<?php echo $order_total; ?>">
</div>
      <div class="modal-footer d-flex justify-content-center">
      <button class="btn btn-warning" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#CartModal">← Cart</button>
      <span> Order Total: $<?php echo $order_total; ?>.00 </span>
      <input type="submit" class="btn btn-primary" name="action" value="Order"></input>
        </div>
</form>