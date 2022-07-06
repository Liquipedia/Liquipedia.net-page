<?php

/*
 * Put $wikis and $alphawikis in the order you want them display on the page.
 * $wikis are the big boxes, $alphawikis are the text links in the other wikis section.
 */

$protocol = 'https://';
$baseurl = $protocol . 'liquipedia.net';

$wikis = [
	'pubgmobile' => [
		'name' => 'PUBG Mobile',
		'background-color' => '#8cb5b5',
		'theme-light' => '#7E5700',
		'theme-dark' => '#FABC45',
		'api' => $baseurl . '/pubgmobile/api.php',
		'new' => true,
	],
	'dota2' => [
		'name' => 'Dota 2',
		'background-color' => '#e5ccb6',
		'theme-light' => '#BC111D',
		'theme-dark' => '#FFB3AA',
		'api' => $baseurl . '/dota2/api.php',
	],
	'counterstrike' => [
		'name' => 'Counter-Strike',
		'background-color' => '#cde5b6',
		'theme-light' => '#466800',
		'theme-dark' => '#A1D832',
		'api' => $baseurl . '/counterstrike/api.php',
	],
	'valorant' => [
		'name' => 'VALORANT',
		'background-color' => '#e6e6e6',
		'theme-light' => '#BC111D',
		'theme-dark' => '#FFB3AA',
		'api' => $baseurl . '/valorant/api.php',
	],
	'pubg' => [
		'name' => 'PUBG',
		'background-color' => '#edc951',
		'theme-light' => '#7E5700',
		'theme-dark' => '#FABC45',
		'api' => $baseurl . '/pubg/api.php',
	],
	'rocketleague' => [
		'name' => 'Rocket League',
		'background-color' => '#ffdaae',
		'theme-light' => '#3A5BA9',
		'theme-dark' => '#B0C5FF',
		'api' => $baseurl . '/rocketleague/api.php',
	],
	'apexlegends' => [
		'name' => 'Apex Legends',
		'background-color' => '#ffa993',
		'theme-light' => '#BC111D',
		'theme-dark' => '#FFB3AA',
		'api' => $baseurl . '/apexlegends/api.php',
	],
	'leagueoflegends' => [
		'name' => 'League of Legends',
		'background-color' => '#f4db96',
		'theme-light' => '#006A6A',
		'theme-dark' => '#4DDADA',
		'api' => $baseurl . '/leagueoflegends/api.php',
	],
	'starcraft2' => [
		'name' => 'StarCraft II',
		'background-color' => '#b6cfe5',
		'theme-light' => '#3A5BA9',
		'theme-dark' => '#B0C5FF',
		'api' => $baseurl . '/starcraft2/api.php',
	],
	'rainbowsix' => [
		'name' => 'Rainbow Six',
		'background-color' => '#f0e0a4',
		'theme-light' => '#006A6A',
		'theme-dark' => '#4DDADA',
		'api' => $baseurl . '/rainbowsix/api.php',
	],
	'overwatch' => [
		'name' => 'Overwatch',
		'background-color' => '#e5b6c0',
		'theme-light' => '#7E5700',
		'theme-dark' => '#FABC45',
		'api' => $baseurl . '/overwatch/api.php',
	],
	'ageofempires' => [
		'name' => 'Age of Empires',
		'background-color' => '#aac9e5',
		'theme-light' => '#3A5BA9',
		'theme-dark' => '#B0C5FF',
		'api' => $baseurl . '/ageofempires/api.php',
	],
	'smash' => [
		'name' => 'Smash',
		'background-color' => '#b6e5c7',
		'theme-light' => '#BC111D',
		'theme-dark' => '#FFB3AA',
		'api' => $baseurl . '/smash/api.php',
	],
	'warcraft' => [
		'name' => 'Warcraft III',
		'background-color' => '#aab9b7',
		'theme-light' => '#7E5700',
		'theme-dark' => '#FABC45',
		'api' => $baseurl . '/warcraft/api.php',
	],
	'wildrift' => [
		'name' => 'Wild Rift',
		'background-color' => '#dbeded',
		'theme-light' => '#006A6A',
		'theme-dark' => '#4DDADA',
		'api' => $baseurl . '/wildrift/api.php',
	],
	'starcraft' => [
		'name' => 'Brood War',
		'background-color' => '#dbe1e5',
		'theme-light' => '#3A5BA9',
		'theme-dark' => '#B0C5FF',
		'api' => $baseurl . '/starcraft/api.php',
	],
	'hearthstone' => [
		'name' => 'Hearthstone',
		'background-color' => '#e5d8b6',
		'theme-light' => '#7E5700',
		'theme-dark' => '#FABC45',
		'api' => $baseurl . '/hearthstone/api.php',
	],
	'heroes' => [
		'name' => 'Heroes',
		'background-color' => '#b9b6e5',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/heroes/api.php',
	],
	'artifact' => [
		'name' => 'Artifact',
		'background-color' => '#fbf6df',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/artifact/api.php',
	],
];
$alphawikis = [
	'freefire' => [
		'name' => 'Free Fire',
		'background-color' => '#fbecdf',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/freefire/api.php',
	],
	'mobilelegends' => [
		'name' => 'Mobile Legends',
		'background-color' => '#ffe982',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/mobilelegends/api.php',
	],
	'arenaofvalor' => [
		'name' => 'Arena of Valor',
		'background-color' => '#e6e6e6',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/arenaofvalor/api.php',
	],
	'callofduty' => [
		'name' => 'Call of Duty',
		'background-color' => '#dbeded',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/callofduty/api.php',
	],
	'fighters' => [
		'name' => 'Fighting Games',
		'background-color' => '#ffcb66',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/fighters/api.php',
	],
	'halo' => [
		'name' => 'Halo',
		'background-color' => '#bac2d5',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/halo/api.php',
	],
	'brawlstars' => [
		'name' => 'Brawl Stars',
		'background-color' => '#ffc7ae',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/brawlstars/api.php',
	],
	'arenafps' => [
		'name' => 'Arena FPS',
		'background-color' => '#dd986e',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/arenafps/api.php',
	],
	'fortnite' => [
		'name' => 'Fortnite',
		'background-color' => '#fbf2df',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/fortnite/api.php',
	],
	'clashroyale' => [
		'name' => 'Clash Royale',
		'background-color' => '#e6e6e6',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/clashroyale/api.php',
	],
	'pokemon' => [
		'name' => 'Pokémon',
		'background-color' => '#fbdfdf',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/pokemon/api.php',
	],
	'fifa' => [
		'name' => 'FIFA',
		'background-color' => '#fbf2df',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/fifa/api.php',
	],
	'worldofwarcraft' => [
		'name' => 'World of Warcraft',
		'background-color' => '#d1e2f1',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/worldofwarcraft/api.php',
	],
	'teamfortress' => [
		'name' => 'Team Fortress',
		'background-color' => '#cca96b',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/teamfortress/api.php',
	],
	'sideswipe' => [
		'name' => 'Sideswipe',
		'background-color' => '#7498d8',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/sideswipe/api.php',
	],
	'paladins' => [
		'name' => 'Paladins',
		'background-color' => '#dee3ef',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/paladins/api.php',
	],
];
$miscwikis = [
	'commons' => [
		'name' => 'Liquipedia Commons',
		'background-color' => '',
		'api' => $baseurl . '/commons/api.php',
	],
];
$otherwikis = [
	'trackmania' => [
		'name' => 'TrackMania',
		'background-color' => '',
		'api' => $baseurl . '/trackmania/api.php',
	],
	'tft' => [
		'name' => 'Teamfight Tactics',
		'background-color' => '',
		'api' => $baseurl . '/tft/api.php',
	],
	'runeterra' => [
		'name' => 'Runeterra',
		'background-color' => '',
		'api' => $baseurl . '/runeterra/api.php',
	],
	'simracing' => [
		'name' => 'Sim Racing',
		'background-color' => '',
		'api' => $baseurl . '/simracing/api.php',
	],
	'crossfire' => [
		'name' => 'CrossFire',
		'background-color' => '',
		'api' => $baseurl . '/crossfire/api.php',
	],
	'squadrons' => [
		'name' => 'Squadrons',
		'background-color' => '',
		'api' => $baseurl . '/squadrons/api.php',
	],
	'battalion' => [
		'name' => 'Battalion 1944',
		'background-color' => '',
		'api' => $baseurl . '/battalion/api.php',
	],
	'underlords' => [
		'name' => 'Dota Underlords',
		'background-color' => '',
		'api' => $baseurl . '/underlords/api.php',
	],
	'splitgate' => [
		'name' => 'Splitgate',
		'background-color' => '',
		'api' => $baseurl . '/splitgate/api.php',
	],
	'autochess' => [
		'name' => 'Auto Chess',
		'background-color' => '',
		'api' => $baseurl . '/autochess/api.php',
	],
	'magic' => [
		'name' => 'Magic: The Gathering',
		'background-color' => '',
		'api' => $baseurl . '/magic/api.php',
	],
	'criticalops' => [
		'name' => 'Critical Ops',
		'background-color' => '',
		'api' => $baseurl . '/criticalops/api.php',
	],
	'battlerite' => [
		'name' => 'Battlerite',
		'background-color' => '',
		'api' => $baseurl . '/battlerite/api.php',
	],
	'brawlhalla' => [
		'name' => 'Brawlhalla',
		'background-color' => '',
		'api' => $baseurl . '/brawlhalla/api.php',
	],
];
