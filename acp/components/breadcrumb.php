
           <div class="card-pool">   
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient">
          <div class="container-fluid">
            <button type="button" id="sidebarCollapse" onclick="changer()" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
          </div>
        </nav>
        <script>
  function hasClass(element, className) {
    console.log(element, className)
    return (' ' + element.className + ' ').indexOf(' ' + className+ ' ') > -1;
  }
  function changer() {
    let site_name = "<?php echo $site_fqdn; ?>";
    let site_name_short = "<?php echo $site_name_short; ?>";
    let sidebar_active = document.getElementById('sidebar');
    if (hasClass(sidebar_active, "active") == true) {
      $('#sidenav-logo').text(site_name); 
    } else {
      $('#sidenav-logo').text(site_name_short);
    }

}
</script>