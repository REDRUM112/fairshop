<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group <?php echo (!empty($site_name_err)) ? 'has-error' : ''; ?>">
    <label >Site Name:</label>
    <input type="text" name="site_name" class="form-control" value="<?php echo $site_name; ?>">
    <span class="help-block"><?php echo $site_name_err; ?></span>
</div>    
<div class="form-group <?php echo (!empty($site_name_short_err)) ? 'has-error' : ''; ?>">
    <label >Site Short Name:</label>
    <input type="text"  autocomplete="on" name="site_name_short"  class="form-control" value="<?php echo $site_name_short; ?>">
    <span class="help-block"><?php echo $site_name_short_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($site_fqdn_err)) ? 'has-error' : ''; ?>">
    <label >Site FQDN:</label>
    <input type="text" autocomplete="on" name="site_fqdn"  class="form-control" value="<?php echo $site_fqdn; ?>">
    <span class="help-block"><?php echo $site_fqdn_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($site_domain_err)) ? 'has-error' : ''; ?>">
    <label >Site Domain:</label>
    <input type="text" name="site_domain"  class="form-control" value="<?php echo $site_domain; ?>">
    <span class="help-block"><?php echo $site_domain_err; ?></span>
</div>

      <div class="modal-footer">
      <div class="d-grid gap-2 col-6 mx-auto">
          <button type="submit" name="action" value="save-site-settings" class="btn btn-secondary">Save</button>
        </div>
      </div>
</form>