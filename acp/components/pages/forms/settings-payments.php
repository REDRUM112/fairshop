<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group <?php echo (!empty($paypal_clientid_err)) ? 'has-error' : ''; ?>">
    <label >Paypal Client ID:</label>
    <input type="text" name="paypal_clientid" class="form-control" value="<?php echo $paypal_clientid; ?>">
    <span class="help-block"><?php echo $paypal_clientid_err; ?></span>
</div>    

      <div class="modal-footer">
      <div class="d-grid gap-2 col-6 mx-auto">
          <button type="submit" name="action" value="save-payment-settings" class="btn btn-secondary">Save</button>
        </div>
      </div>
</form>