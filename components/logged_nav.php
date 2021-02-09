<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            ?> 
            <li class="nav-item">
              <a class="nav-link" style="width:70px;" aria-current="page" data-bs-toggle="modal" data-bs-target="#CartModal" href="">🛒 (<?php echo count($_SESSION["cart"]); ?>)</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION["username"];?></a>
            <ul class="dropdown-menu dropdown-menus" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="orders.php">Orders</a></li>
              <li><a class="dropdown-item" href="components/posts/logout.php">Logout</a></li>
            </ul>
          </li>
          <?php if ($_SESSION["admin"] == 1) { ?>
          <li class="nav-item">
            <a class="nav-link" href="acp/acp.php"><img alt="acp" src="images/acp.png" width="28" height="28"></a>
          </li>
          <?php } ?>
            <?php
              } else {
            ?>
            <li class="nav-item">
              <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#LoginModal">Login</button>
            </li>
        <?php }?>
      </ul>