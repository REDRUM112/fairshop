<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group <?php echo (!empty($acp_payer_id_err)) ? 'has-error' : ''; ?>">
    <label >Payer ID:</label>
    <input type="text" name="payer_id" class="form-control" value="<?php echo $acp_payer_id; ?>">
    <span class="help-block"><?php echo $acp_payer_id_err; ?></span>
</div>    
<div class="form-group <?php echo (!empty($acp_order_total_err)) ? 'has-error' : ''; ?>">
    <label >Order Total:</label>
    <input type="text" name="order_total"  class="form-control" value="<?php echo $acp_order_total; ?>">
    <span class="help-block"><?php echo $acp_order_total_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($acp_tracking_id_err)) ? 'has-error' : ''; ?>">
  <label >Tracking ID:</label>
  <input type="text" name="tracking_id"  class="form-control" value="<?php echo $acp_tracking_id; ?>">
  <span class="help-block"><?php echo $acp_tracking_id_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($acp_payment_processor_err)) ? 'has-error' : ''; ?>">
    <label >Payment Processor:</label>
    <input type="text" name="payment_processor" class="form-control" value="MANUAL" readonly>
    <span class="help-block"><?php echo $acp_payment_processor_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($acp_payment_status_err)) ? 'has-error' : ''; ?>">
  <label >Payment Status:</label>
  <select name="payment_status" class="form-control" id="exampleFormControlSelect2">
    <option>Processing</option>
    <option>COMPLETED</option>
    <option>Cancelled</option>
  </select>
  <span class="help-block"><?php echo $acp_payment_status_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($acp_order_status_err)) ? 'has-error' : ''; ?>">
    <label >Order Status:</label>
    <select name="order_status" class="form-control" id="exampleFormControlSelect1">
      <option>Processing</option>
      <option>COMPLETED</option>
      <option>Cancelled</option>
    </select>
    <span class="help-block"><?php echo $acp_order_status_err; ?></span>
</div>
      <div class="modal-footer">
      <div class="d-grid gap-2 col-6 mx-auto">
          <button type="submit" name="action" value="Create Order" class="btn btn-secondary">Create Order</button>
        </div>
      </div>
</form>