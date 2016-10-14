<?php

/*
 * Put $wikis and $alphawikis in the order you want them display on the page.
 * $wikis are the big boxes, $alphawikis are the text links in the other wikis section.
 */

$protocol = 'http://';
$baseurl = $protocol . 'wiki.teamliquid.net';

$wikis = array (
	'dota2' => array (
		'name' => 'Dota 2',
		'background-color' => '#e5ccb6',
		'api' => $baseurl . '/dota2/api.php',
	),
	'counterstrike' => array (
		'name' => 'Counter-Strike',
		'background-color' => '#cde5b6',
		'api' => $baseurl . '/counterstrike/api.php',
	),
	'starcraft2' => array (
		'name' => 'StarCraft II',
		'background-color' => '#b6cfe5',
		'api' => $baseurl . '/starcraft2/api.php',
	),
	'hearthstone' => array (
		'name' => 'Hearthstone',
		'background-color' => '#e5d8b6',
		'api' => $baseurl . '/hearthstone/api.php',
	),
	'overwatch' => array (
		'name' => 'Overwatch',
		'background-color' => '#e5b6c0',
		'api' => $baseurl . '/overwatch/api.php',
	),
	'heroes' => array (
		'name' => 'Heroes',
		'background-color' => '#b9b6e5',
		'api' => $baseurl . '/heroes/api.php',
	),
	'smash' => array (
		'name' => 'Smash',
		'background-color' => '#b6e5c7',
		'api' => $baseurl . '/smash/api.php',
	),
	'starcraft' => array (
		'name' => 'Brood War',
		'background-color' => '#dbe1e5',
		'api' => $baseurl . '/starcraft/api.php',
	),
	'rocketleague' => array (
		'name' => 'Rocket League',
		'background-color' => '#ffdaae',
		'api' => $baseurl . '/rocketleague/api.php',
	),
);
$alphawikis = array (
	'warcraft' => array (
		'name' => 'Warcraft III',
		'background-color' => '',
		'api' => $baseurl . '/warcraft/api.php',
	),
	'fighters' => array (
		'name' => 'Fighting Games',
		'background-color' => '',
		'api' => $baseurl . '/fighters/api.php',
	),
);

?>