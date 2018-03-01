<?php

/*
 * Put $wikis and $alphawikis in the order you want them display on the page.
 * $wikis are the big boxes, $alphawikis are the text links in the other wikis section.
 */

$protocol = 'http://';
$baseurl = $protocol . 'liquipedia.net';

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
	'overwatch' => array (
		'name' => 'Overwatch',
		'background-color' => '#e5b6c0',
		'api' => $baseurl . '/overwatch/api.php',
	),
	'hearthstone' => array (
		'name' => 'Hearthstone',
		'background-color' => '#e5d8b6',
		'api' => $baseurl . '/hearthstone/api.php',
	),
	'smash' => array (
		'name' => 'Smash',
		'background-color' => '#b6e5c7',
		'api' => $baseurl . '/smash/api.php',
	),
	'heroes' => array (
		'name' => 'Heroes',
		'background-color' => '#b9b6e5',
		'api' => $baseurl . '/heroes/api.php',
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
	'leagueoflegends' => array (
		'name' => 'League of Legends',
		'background-color' => '#f4db96',
		'api' => $baseurl . '/leagueoflegends/api.php',
	),
	'warcraft' => array (
		'name' => 'Warcraft III',
		'background-color' => '#aab9b7',
		'api' => $baseurl . '/warcraft/api.php',
	),
	'rainbowsix' => array (
		'name' => 'Rainbow Six',
		'background-color' => '#f0e0a4',
		'api' => $baseurl . '/rainbowsix/api.php',
	),
	'quake' => array (
		'name' => 'Quake',
		'background-color' => '#dd986e',
		'api' => $baseurl . '/quake/api.php',
	),
	'teamfortress' => array (
		'name' => 'Team Fortress',
		'background-color' => '#cca96b',
		'api' => $baseurl . '/teamfortress/api.php',
	),
	'worldofwarcraft' => array (
		'name' => 'World of Warcraft',
		'background-color' => '#d1e2f1',
		'api' => $baseurl . '/worldofwarcraft/api.php',
	),
	'fighters' => array (
		'name' => 'Fighting Games',
		'background-color' => '#ffcb66',
		'api' => $baseurl . '/fighters/api.php',
	),
);
$miscwikis = array (
	'commons' => array (
		'name' => 'Liquipedia Commons',
		'background-color' => '',
		'api' => $baseurl . '/commons/api.php',
	),
);
$otherwikis = array (
	'clashroyale' => array (
		'name' => 'Clash Royale',
		'background-color' => '',
		'api' => $baseurl . '/clashroyale/api.php',
	),
	'trackmania' => array (
		'name' => 'TrackMania',
		'background-color' => '',
		'api' => $baseurl . '/trackmania/api.php',
	),
	'diabotical' => array (
		'name' => 'Diabotical',
		'background-color' => '',
		'api' => $baseurl . '/diabotical/api.php',
	),
	'battlerite' => array (
		'name' => 'Battlerite',
		'background-color' => '',
		'api' => $baseurl . '/battlerite/api.php',
	),
	'crossfire' => array (
		'name' => 'CrossFire',
		'background-color' => '',
		'api' => $baseurl . '/crossfire/api.php',
	),
	'fifa' => array (
		'name' => 'FIFA',
		'background-color' => '',
		'api' => $baseurl . '/fifa/api.php',
	),
	'pokemon' => array (
		'name' => 'Pokémon',
		'background-color' => '',
		'api' => $baseurl . '/pokemon/api.php',
	),
	'pubg' => array (
		'name' => 'PLAYERUNKNOWN\'S BATTLEGROUNDS',
		'background-color' => '',
		'api' => $baseurl . '/pubg/api.php',
	),
	'artifact' => array (
		'name' => 'Artifact',
		'background-color' => '',
		'api' => $baseurl . '/artifact/api.php',
	),
	'paladins' => array (
		'name' => 'Paladins',
		'background-color' => '',
		'api' => $baseurl . '/paladins/api.php',
	),
	'battalion' => array (
		'name' => 'Battalion 1944',
		'background-color' => '',
		'api' => $baseurl . '/battalion/api.php',
	),
	'fortnite' => array (
		'name' => 'Fortnite',
		'background-color' => '',
		'api' => $baseurl . '/fortnite/api.php',
	),
	'arenaofvalor' => array (
		'name' => 'Arena of Valor',
		'background-color' => '',
		'api' => $baseurl . '/arenaofvalor/api.php',
	),
);

?>
