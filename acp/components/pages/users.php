<div class="container" id="users">
  <div class="row my-3">
    <div class="col">
        <h4>👥 Users</h4>
    </div>
  </div> <!-- row -->
  <div class="row my-3">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#users-content">Users</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" aria-current="page" href="#users-content-manage">Manage Users</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" aria-current="page" href="#users-content-add">Add User</a>
    </li>
  </ul>

  <div class="tab-content">
    <div id="users-content" class="tab-pane user-nav active">
      <div class="wrapper" id="table-overflow">
        <table class="table" id="users-table">
          <thead>
              <tr>
              <th scope="col">#</th>
              <th scope="col">Username</th>
              <th scope="col">Password</th>
              <th scope="col">Email</th>
              <th scope="col">Admin</th>
              <th scope="col">Registered</th>
              </tr>
          </thead>
          <tbody>
          <?php  while ($acp_accounts -> fetch()) { ?>
              <tr>
              <td><?php echo $id ;?></td>
              <td><?php echo $username;?></td>
              <td><?php echo $password;?></td>
              <td><?php echo $email;?></td>
              <td><?php echo $admin;?></td>
              <td><?php echo $date;?></td>
              </tr>
              <?php } ?>
          </tbody>
        </table>   
      </div>  
    </div>
    <div id="users-content-manage" class="tab-pane user-nav fade">
    <div class="wrapper" id="table-overflow">
        <table class="table" id="manage-users-table">
          <thead>
              <tr>
              <th scope="col">#</th>
              <th scope="col">Username</th>
              <th scope="col">Password</th>
              <th scope="col">Email</th>
              <th scope="col">Admin</th>
              <th scope="col">Registered</th>
              </tr>
          </thead>
          <tbody>
          <?php  while ($acp_get_accounts -> fetch()) { ?>
              <tr>
              <td><?php echo $id ;?></td>
              <td><?php echo $username;?></td>
              <td><?php echo $password;?></td>
              <td><?php echo $email;?></td>
              <td><?php echo $admin;?></td>
              <td><?php echo $date;?></td>
              </tr>
              <?php } ?>
          </tbody>
        </table>   
      </div>  
    </div>
    <div id="users-content-add" class="tab-pane user-nav fade">
    <?php include 'components/pages/forms/add_user.php'; ?>
    </div> 
  </div> <!-- tab-content -->
</div> <!-- row -->

</div> <!-- container -->