<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group <?php echo (!empty($cr_username_err)) ? 'has-error' : ''; ?>">
    <label >Username:</label>
    <input type="text" name="username" class="form-control" value="<?php echo $cr_username; ?>">
    <span class="help-block"><?php echo $cr_username_err; ?></span>
</div>    
<div class="form-group <?php echo (!empty($cr_password_err)) ? 'has-error' : ''; ?>">
    <label >Password:</label>
    <input type="password"  autocomplete="on" name="password"  class="form-control" value="<?php echo $cr_password; ?>">
    <span class="help-block"><?php echo $cr_password_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($cr_confirm_password_err)) ? 'has-error' : ''; ?>">
    <label >Confirm Password:</label>
    <input type="password" autocomplete="on" name="confirm_password"  class="form-control" value="<?php echo $cr_confirm_password; ?>">
    <span class="help-block"><?php echo $cr_confirm_password_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($cr_email_err)) ? 'has-error' : ''; ?>">
    <label >Email:</label>
    <input type="text" name="email"  class="form-control" value="<?php echo $cr_email; ?>">
    <span class="help-block"><?php echo $cr_email_err; ?></span>
</div>

      <div class="modal-footer">
      <div class="d-grid gap-2 col-6 mx-auto">
          <button type="submit" name="action" value="Add User" class="btn btn-secondary">Add User</button>
        </div>
      </div>
</form>