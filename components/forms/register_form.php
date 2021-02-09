<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
    <label >Username:</label>
    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
    <span class="help-block"><?php echo $username_err; ?></span>
</div>    
<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
    <label >Password:</label>
    <input type="password" name="password"  class="form-control" value="<?php echo $password; ?>">
    <span class="help-block"><?php echo $password_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
    <label >Confirm Password:</label>
    <input type="password" name="confirm_password"  class="form-control" value="<?php echo $confirm_password; ?>">
    <span class="help-block"><?php echo $confirm_password_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
    <label >Email:</label>
    <input type="text" name="email"  class="form-control" value="<?php echo $email; ?>">
    <span class="help-block"><?php echo $email_err; ?></span>
</div>
</div>
      <div class="modal-footer">
      <input type="submit" name="action" value="Register" class="btn btn-secondary">
      <input type="reset" class="btn btn-warning" value="Reset Form">
        </div>
</form>