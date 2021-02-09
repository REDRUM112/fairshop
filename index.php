<?php include 'components/constructors/header.php'; 
$_SESSION["this_url"] = full_path(); ?>

<div class="main d-flex justify-content-center">
  <?php include 'components/featured-products.php'; ?>
  <?php include 'components/featured-list.php'; ?>
</div>
<?php include 'components/constructors/footer.php';?>
<script>
  $( document ).ready(function() {
    const list = document.getElementById("Front-page-carousel").classList;
    for (var i = 0; i < document.getElementById("Front-page-carousel").classList.length; i++) {
    const ClassName = document.getElementById("Front-page-carousel").classList[i];
    if (ClassName !== "active") {
      document.getElementById("Front-page-carousel").classList.add('active');
    }
  }
});
</script>
