<div class="container" id="settings">
  <div class="row my-3">
    <div class="col">
        <h4>🔧 Settings</h4>
    </div>
  </div>
    <div class="row my-3">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#settings-content-site">Site Settings</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" aria-current="page" href="#settings-content-payment">Payment Settings</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" aria-current="page" href="#settings-content-api">API Settings</a>
      </li>
    </ul>

    <div class="tab-content">
      <div id="settings-content-site" class="tab-pane user-nav active">
        <div class="wrapper" id="table-overflow">
        <?php include 'components/pages/forms/settings-site.php'; ?>
        </div>  
      </div>
      <div id="settings-content-payment" class="tab-pane user-nav fade">
      <div class="wrapper" id="table-overflow">
      <?php include 'components/pages/forms/settings-payments.php'; ?>
        </div>  
      </div>
      <div id="settings-content-api" class="tab-pane user-nav fade">
      <?php include 'components/pages/forms/settings-api.php'; ?>
      </div> 
    </div> <!-- tab-content -->
  </div> <!-- row -->
</div> <!-- container -->