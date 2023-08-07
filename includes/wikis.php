<?php

/*
 * Put $wikis and $alphawikis in the order you want them display on the page.
 * $wikis are the big boxes, $alphawikis are the text links in the other wikis section.
 */

$protocol = 'https://';
$baseurl = $protocol . 'liquipedia.net';

$wikis = [
	'dota2' => [
		'name' => 'Dota 2',
		'theme-light' => '#bc111d',
		'theme-dark' => '#ffb3aa',
		'api' => $baseurl . '/dota2/api.php',
	],
	'valorant' => [
		'name' => 'VALORANT',
		'theme-light' => '#bc111d',
		'theme-dark' => '#ffb3aa',
		'api' => $baseurl . '/valorant/api.php',
	],
	'counterstrike' => [
		'name' => 'Counter-Strike',
		'theme-light' => '#466800',
		'theme-dark' => '#a1d832',
		'api' => $baseurl . '/counterstrike/api.php',
	],
	'rocketleague' => [
		'name' => 'Rocket League',
		'theme-light' => '#3a5ba9',
		'theme-dark' => '#b0c5ff',
		'api' => $baseurl . '/rocketleague/api.php',
	],
	'mobilelegends' => [
		'name' => 'Mobile Legends',
		'theme-light' => '#3a5ba9',
		'theme-dark' => '#b0c5ff',
		'api' => $baseurl . '/mobilelegends/api.php',
	],
	'leagueoflegends' => [
		'name' => 'League of Legends',
		'theme-light' => '#006a6a',
		'theme-dark' => '#4ddada',
		'api' => $baseurl . '/leagueoflegends/api.php',
	],
	'apexlegends' => [
		'name' => 'Apex Legends',
		'theme-light' => '#bc111d',
		'theme-dark' => '#ffb3aa',
		'api' => $baseurl . '/apexlegends/api.php',
	],
	'rainbowsix' => [
		'name' => 'Rainbow Six',
		'theme-light' => '#006a6a',
		'theme-dark' => '#4ddada',
		'api' => $baseurl . '/rainbowsix/api.php',
	],
	'overwatch' => [
		'name' => 'Overwatch',
		'theme-light' => '#7e5700',
		'theme-dark' => '#fabc45',
		'api' => $baseurl . '/overwatch/api.php',
	],
	'starcraft2' => [
		'name' => 'StarCraft II',
		'theme-light' => '#3a5ba9',
		'theme-dark' => '#b0c5ff',
		'api' => $baseurl . '/starcraft2/api.php',
	],
	'pubgmobile' => [
		'name' => 'PUBG Mobile',
		'theme-light' => '#7e5700',
		'theme-dark' => '#fabc45',
		'api' => $baseurl . '/pubgmobile/api.php',
	],
	'ageofempires' => [
		'name' => 'Age of Empires',
		'theme-light' => '#3a5ba9',
		'theme-dark' => '#b0c5ff',
		'api' => $baseurl . '/ageofempires/api.php',
	],
	'smash' => [
		'name' => 'Smash',
		'theme-light' => '#bc111d',
		'theme-dark' => '#ffb3aa',
		'api' => $baseurl . '/smash/api.php',
	],
	'pubg' => [
		'name' => 'PUBG',
		'theme-light' => '#7e5700',
		'theme-dark' => '#fabc45',
		'api' => $baseurl . '/pubg/api.php',
	],
	'warcraft' => [
		'name' => 'Warcraft III',
		'theme-light' => '#7e5700',
		'theme-dark' => '#fabc45',
		'api' => $baseurl . '/warcraft/api.php',
	],
	'brawlstars' => [
		'name' => 'Brawl Stars',
		'theme-light' => '#3a5ba9',
		'theme-dark' => '#b0c5ff',
		'api' => $baseurl . '/brawlstars/api.php',
	],
	'starcraft' => [
		'name' => 'Brood War',
		'theme-light' => '#3a5ba9',
		'theme-dark' => '#b0c5ff',
		'api' => $baseurl . '/starcraft/api.php',
	],
	'wildrift' => [
		'name' => 'Wild Rift',
		'theme-light' => '#006a6a',
		'theme-dark' => '#4ddada',
		'api' => $baseurl . '/wildrift/api.php',
	],
	'fifa' => [
		'name' => 'FIFA',
		'theme-light' => '#5e5e62',
		'theme-dark' => '#c6c6cA',
		'api' => $baseurl . '/fifa/api.php',
	],
	'heroes' => [
		'name' => 'Heroes',
		'theme-light' => '#7e5700',
		'theme-dark' => '#fabc45',
		'api' => $baseurl . '/heroes/api.php',
	],
	'hearthstone' => [
		'name' => 'Hearthstone',
		'theme-light' => '#7e5700',
		'theme-dark' => '#fabc45',
		'api' => $baseurl . '/hearthstone/api.php',
	],
	'artifact' => [
		'name' => 'Artifact',
		'theme-light' => '#6f5d00',
		'theme-dark' => '#e4c532',
		'api' => $baseurl . '/artifact/api.php',
	],
];
$sportswikis = [
	'formula1' => [
		'name' => 'Formula 1',
		'theme-light' => '#bc111d',
		'theme-dark' => '#fad1d1',
		'api' => $baseurl . '/formula1/api.php',
		'new' => true,
		'class' => 'card__wide',
	],
];
$alphawikis = [
	'fighters' => [
		'name' => 'Fighting Games',
		'theme-light' => '#bc111d',
		'theme-dark' => '#ffb3aa',
		'api' => $baseurl . '/fighters/api.php',
	],
	'trackmania' => [
		'name' => 'Trackmania',
		'theme-light' => '#006e00',
		'theme-dark' => '#5ae150',
		'api' => $baseurl . '/trackmania/api.php',
	],
	'arenaofvalor' => [
		'name' => 'Arena of Valor',
		'theme-light' => '#3a5ba9',
		'theme-dark' => '#b0c5ff',
		'api' => $baseurl . '/arenaofvalor/api.php',
	],
	'callofduty' => [
		'name' => 'Call of Duty',
		'theme-light' => '#3a5ba9',
		'theme-dark' => '#b0c5ff',
		'api' => $baseurl . '/callofduty/api.php',
	],
	'freefire' => [
		'name' => 'Free Fire',
		'theme-light' => '#7e5700',
		'theme-dark' => '#fabc45',
		'api' => $baseurl . '/freefire/api.php',
	],
	'fortnite' => [
		'name' => 'Fortnite',
		'theme-light' => '#006a6a',
		'theme-dark' => '#4ddada',
		'api' => $baseurl . '/fortnite/api.php',
	],
	'pokemon' => [
		'name' => 'Pokémon',
		'theme-light' => '#6f5d00',
		'theme-dark' => '#e4c532',
		'api' => $baseurl . '/pokemon/api.php',
	],
	'tft' => [
		'name' => 'Teamfight Tactics',
		'theme-light' => '#006a6a',
		'theme-dark' => '#4ddada',
		'api' => $baseurl . '/tft/api.php',
	],
	'halo' => [
		'name' => 'Halo',
		'theme-light' => '#006a6a',
		'theme-dark' => '#4ddada',
		'api' => $baseurl . '/halo/api.php',
	],
	'clashroyale' => [
		'name' => 'Clash Royale',
		'theme-light' => '#3a5ba9',
		'theme-dark' => '#b0c5ff',
		'api' => $baseurl . '/clashroyale/api.php',
	],
	'worldofwarcraft' => [
		'name' => 'World of Warcraft',
		'theme-light' => '#7e5700',
		'theme-dark' => '#fabc45',
		'api' => $baseurl . '/worldofwarcraft/api.php',
	],
	'arenafps' => [
		'name' => 'Arena FPS',
		'theme-light' => '#bc111d',
		'theme-dark' => '#ffb3aa',
		'api' => $baseurl . '/arenafps/api.php',
	],
	'teamfortress' => [
		'name' => 'Team Fortress',
		'theme-light' => '#954a00',
		'theme-dark' => '#ffb781',
		'api' => $baseurl . '/teamfortress/api.php',
	],
	'tetris' => [
		'name' => 'Tetris',
		'theme-light' => '#3a5ba9',
		'theme-dark' => '#b0c5ff',
		'api' => $baseurl . '/tetris/api.php',
	],
	'paladins' => [
		'name' => 'Paladins',
		'theme-light' => '#006a6a',
		'theme-dark' => '#4ddada',
		'api' => $baseurl . '/paladins/api.php',
	],
	'sideswipe' => [
		'name' => 'Sideswipe',
		'theme-light' => '#3a5ba9',
		'theme-dark' => '#b0c5ff',
		'api' => $baseurl . '/sideswipe/api.php',
	],
];
$miscwikis = [
	'commons' => [
		'name' => 'Liquipedia Commons',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/commons/api.php',
	],
];
$otherwikis = [
	'crossfire' => [
		'name' => 'CrossFire',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/crossfire/api.php',
	],
	'brawlhalla' => [
		'name' => 'Brawlhalla',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/brawlhalla/api.php',
	],
	'simracing' => [
		'name' => 'Sim Racing',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/simracing/api.php',
	],
	'zula' => [
		'name' => 'Zula',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/zula/api.php',
	],
	'splatoon' => [
		'name' => 'Splatoon',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/splatoon/api.php',
	],
	'omegastrikers' => [
		'name' => 'Omega Strikers',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/omegastrikers/api.php',
	],
	'clashofclans' => [
		'name' => 'Clash of Clans',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/clashofclans/api.php',
	],
	'naraka' => [
		'name' => 'Naraka',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/naraka/api.php',
	],
	'splitgate' => [
		'name' => 'Splitgate',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/splitgate/api.php',
	],
	'criticalops' => [
		'name' => 'Critical Ops',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/criticalops/api.php',
	],
	'runeterra' => [
		'name' => 'Runeterra',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/runeterra/api.php',
	],
	'battalion' => [
		'name' => 'Battalion 1944',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/battalion/api.php',
	],
	'autochess' => [
		'name' => 'Auto Chess',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/autochess/api.php',
	],
	'magic' => [
		'name' => 'Magic: The Gathering',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/magic/api.php',
	],
	'underlords' => [
		'name' => 'Dota Underlords',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/underlords/api.php',
	],
	'squadrons' => [
		'name' => 'Squadrons',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/squadrons/api.php',
	],
	'battlerite' => [
		'name' => 'Battlerite',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/battlerite/api.php',
	],
	'stormgate' => [
		'name' => 'Stormgate',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/stormgate/api.php',
	],
];
