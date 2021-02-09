  <div class="featured-products">  
    <h1> Our New Products: </h1>
    <div id="carouselExampleDark" class="carousel carousel-dark slide d-flex justify-content-center" data-bs-ride="carousel">
      <ol class="carousel-indicators">
          <?php $rows = 0; 
        while ($featured_products_header3 -> fetch()) { ?>
          <li data-bs-target="#carouselExampleDark" data-bs-slide-to="<?php echo $rows; ?>"></li>
          <?php  $rows = $rows + 1;
         } ?>
      </ol>
      <div class="carousel-inner">
      <?php 
        while ($featured_products_header -> fetch()) { ?>
           <div class="carousel-item" id="Front-page-carousel" data-bs-interval="10000"> 
          <img src="images/products/banner/<?php echo $banner_url; ?>" height=533px; width=832px; class="d-block w-100" alt="<?php echo $name; ?>">
          <div class="btn carousel-caption d-none d-md-block" style="background-color:#d8d8d859;">
            <h5><?php echo $name; ?></h5>
            <p><?php  echo $short_desc?></p>
          </div>
        </div>
        <?php 
       }  ?>
      </div>

      <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
    </div>