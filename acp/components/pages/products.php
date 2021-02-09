<div class="container" id="products">
  <div class="row my-3">
    <div class="col">
        <h4>📦 Products</h4>
    </div>
  </div>

<div class="row my-3">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#products-content">Products</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" aria-current="page" href="#products-content-manage">Manage Products</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" aria-current="page" href="#products-content-add">Add Product</a>
    </li>
  </ul>
  <div class="tab-content">
    <div id="products-content" class="tab-pane user-nav active">
      <div class="wrapper" id="table-overflow">
        <table class="table" id="products-table">
          <thead>
              <tr>
              <th scope="col">#</th>
              <th scope="col">category</th>
              <th scope="col">name</th>
              <th scope="col">short_desc</th>
              <th scope="col">long_desc</th>
              <th scope="col">price</th>
              <th scope="col">shipping</th>
              <th scope="col">stock</th>
              <th scope="col">promote</th>
              <th scope="col">active</th>
              <th scope="col">date</th>
              </tr>
          </thead>
          <tbody>
          <?php  while ($acp_products -> fetch()) { ?>
              <tr>
              <td><?php echo $id ;?></td>
              <td><?php echo $category;?></td>
              <td><?php echo $name;?></td>
              <td><?php echo $short_desc;?></td>
              <td><?php echo $long_desc;?></td>
              <td><?php echo $price;?></td>
              <td><?php echo $shipping;?></td>
              <td><?php echo $stock;?></td>
              <td><?php echo $promote;?></td>
              <td><?php echo $active;?></td>
              <td><?php echo $date;?></td>
              </tr>
              <?php } ?>
          </tbody>
        </table>   
      </div>  
    </div>
    <div id="products-content-manage" class="tab-pane user-nav fade">
    <div class="wrapper" id="table-overflow">
        <table class="table" id="manage-products-table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">category</th>
              <th scope="col">name</th>
              <th scope="col">short_desc</th>
              <th scope="col">long_desc</th>
              <th scope="col">price</th>
              <th scope="col">shipping</th>
              <th scope="col">stock</th>
              <th scope="col">promote</th>
              <th scope="col">Active</th>
              <th scope="col">date</th>
              </tr>
          </thead>
          <tbody>
          <?php  while ($acp_get_products -> fetch()) { ?>
            <tr class="products-tr">
              <td><?php echo $id ;?></td>
              <td><?php echo $category;?></td>
              <td><?php echo $name;?></td>
              <td><?php echo $short_desc;?></td>
              <td><?php echo $long_desc;?></td>
              <td><?php echo $price;?></td>
              <td><?php echo $shipping;?></td>
              <td><?php echo $stock;?></td>
              <td><?php echo $promote;?></td>
              <td><?php echo $active;?></td>
              <td><?php echo $date;?></td>
              </tr>
              <?php } ?>
          </tbody>
        </table>   
      </div>  
    </div>
    <div id="products-content-add" class="tab-pane user-nav fade">
    <?php include 'components/pages/forms/add_product.php'; ?>
    </div> 
  </div> <!-- tab-content -->
</div> <!-- row -->
</div> <!-- wrapper -->