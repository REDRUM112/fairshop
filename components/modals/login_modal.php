<div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="LoginModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php include 'components/forms/login_form.php'; ?>
      </div>
      <div class="modal-footer">
      <p class="ml-auto">Don't have an account ? </p>
      <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#RegisterModal" data-bs-dismiss="modal">Register</button>
      </div>
    </div>
  </div>
</div>
