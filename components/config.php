<?php
include 'link.php';
$id = $site_name = $site_fqdn = $site_name_short = $domain = $paypal_clientid = $geoloc_key = "";

$settings_data = $link -> prepare('SELECT * from settings');
$settings_data -> execute();
$settings_data -> store_result();
$settings_data -> bind_result($id, $psite_name, $psite_short_name, $psite_fqdn, $psite_domain, $ppaypal_clientid, $pgeoloc_api_key);

$link->close();

while ($settings_data -> fetch()) {
  $site_name = $psite_name;
  $site_name_short = $psite_short_name;
  $site_fqdn = $psite_fqdn;
  $site_domain = $psite_domain;
  $paypal_clientid = $ppaypal_clientid;
  $geoloc_key = $pgeoloc_api_key;
  
}

?>
