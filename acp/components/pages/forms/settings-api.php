<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group <?php echo (!empty($geoloc_key_err)) ? 'has-error' : ''; ?>">
    <label >Geolocator api key:</label>
    <input type="text" name="geoloc_key" class="form-control" value="<?php echo $geoloc_key; ?>">
    <span class="help-block"><?php echo $geoloc_key_err; ?></span>
</div>    

      <div class="modal-footer">
      <div class="d-grid gap-2 col-6 mx-auto">
          <button type="submit" name="action" value="save-api-settings" class="btn btn-secondary">Save</button>
        </div>
      </div>
</form>