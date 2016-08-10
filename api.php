<?php
require_once ('includes/wikis.php');

$return = array ();

$return['baseurl'] = $baseurl;
$return['wikis'] = $wikis;
$return['alphawikis'] = $alphawikis;;
$return['allwikis'] = array_merge($wikis, $alphawikis);

echo json_encode ($return);

?>