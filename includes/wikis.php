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
	'counterstrike' => [
		'name' => 'Counter-Strike',
		'theme-light' => '#466800',
		'theme-dark' => '#a1d832',
		'api' => $baseurl . '/counterstrike/api.php',
	],
	'valorant' => [
		'name' => 'VALORANT',
		'theme-light' => '#bc111d',
		'theme-dark' => '#ffb3aa',
		'api' => $baseurl . '/valorant/api.php',
	],
	'mobilelegends' => [
		'name' => 'Mobile Legends: Bang Bang',
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
	'rocketleague' => [
		'name' => 'Rocket League',
		'theme-light' => '#3a5ba9',
		'theme-dark' => '#b0c5ff',
		'api' => $baseurl . '/rocketleague/api.php',
	],
	'apexlegends' => [
		'name' => 'Apex Legends',
		'theme-light' => '#bc111d',
		'theme-dark' => '#ffb3aa',
		'api' => $baseurl . '/apexlegends/api.php',
	],
	'overwatch' => [
		'name' => 'Overwatch',
		'theme-light' => '#7e5700',
		'theme-dark' => '#fabc45',
		'api' => $baseurl . '/overwatch/api.php',
	],
	'pubgmobile' => [
		'name' => 'PUBG Mobile',
		'theme-light' => '#7e5700',
		'theme-dark' => '#fabc45',
		'api' => $baseurl . '/pubgmobile/api.php',
	],
	'rainbowsix' => [
		'name' => 'Rainbow Six',
		'theme-light' => '#006a6a',
		'theme-dark' => '#4ddada',
		'api' => $baseurl . '/rainbowsix/api.php',
	],
	'fighters' => [
		'name' => 'Fighting Games',
		'theme-light' => '#bc111d',
		'theme-dark' => '#ffb3aa',
		'api' => $baseurl . '/fighters/api.php',
	],
	'starcraft2' => [
		'name' => 'StarCraft II',
		'theme-light' => '#3a5ba9',
		'theme-dark' => '#b0c5ff',
		'api' => $baseurl . '/starcraft2/api.php',
	],
	'pubg' => [
		'name' => 'PUBG: Battlegrounds',
		'theme-light' => '#7e5700',
		'theme-dark' => '#fabc45',
		'api' => $baseurl . '/pubg/api.php',
	],
	'ageofempires' => [
		'name' => 'Age of Empires',
		'theme-light' => '#3a5ba9',
		'theme-dark' => '#b0c5ff',
		'api' => $baseurl . '/ageofempires/api.php',
	],
	'honorofkings' => [
		'name' => 'Honor of Kings',
		'theme-light' => '#3a5ba9',
		'theme-dark' => '#b0c5ff',
		'api' => $baseurl . '/honorofkings/api.php',
	],
	'smash' => [
		'name' => 'Super Smash Bros.',
		'theme-light' => '#bc111d',
		'theme-dark' => '#ffb3aa',
		'api' => $baseurl . '/smash/api.php',
	],
	'brawlstars' => [
		'name' => 'Brawl Stars',
		'theme-light' => '#3a5ba9',
		'theme-dark' => '#b0c5ff',
		'api' => $baseurl . '/brawlstars/api.php',
	],
	'warcraft' => [
		'name' => 'Warcraft',
		'theme-light' => '#7e5700',
		'theme-dark' => '#fabc45',
		'api' => $baseurl . '/warcraft/api.php',
	],
	'easportsfc' => [
		'name' => 'EA SPORTS FC',
		'theme-light' => '#5e5e62',
		'theme-dark' => '#c6c6cA',
		'api' => $baseurl . '/easportsfc/api.php',
	],
	'starcraft' => [
		'name' => 'StarCraft',
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
	'hearthstone' => [
		'name' => 'Hearthstone',
		'theme-light' => '#7e5700',
		'theme-dark' => '#fabc45',
		'api' => $baseurl . '/hearthstone/api.php',
	],
	'heroes' => [
		'name' => 'Heroes of the Storm',
		'theme-light' => '#7e5700',
		'theme-dark' => '#fabc45',
		'api' => $baseurl . '/heroes/api.php',
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
	],
	'chess' => [
		'name' => 'Chess',
		'theme-light' => '#7e5700',
		'theme-dark' => '#fabc45',
		'api' => $baseurl . '/chess/api.php',
		'new' => true,
	],
];
$alphawikis = [
	'fortnite' => [
		'name' => 'Fortnite',
		'theme-light' => '#006a6a',
		'theme-dark' => '#4ddada',
		'api' => $baseurl . '/fortnite/api.php',
	],
	'callofduty' => [
		'name' => 'Call of Duty',
		'theme-light' => '#3a5ba9',
		'theme-dark' => '#b0c5ff',
		'api' => $baseurl . '/callofduty/api.php',
	],
	'tft' => [
		'name' => 'Teamfight Tactics',
		'theme-light' => '#006a6a',
		'theme-dark' => '#4ddada',
		'api' => $baseurl . '/tft/api.php',
	],
	'freefire' => [
		'name' => 'Free Fire',
		'theme-light' => '#7e5700',
		'theme-dark' => '#fabc45',
		'api' => $baseurl . '/freefire/api.php',
	],
	'deadlock' => [
		'name' => 'Deadlock',
		'theme-light' => '#5e5e62',
		'theme-dark' => '#c6c6cA',
		'api' => $baseurl . '/deadlock/api.php',
	],
	'esports' => [
		'name' => 'Esports',
		'theme-light' => '#5e5e62',
		'theme-dark' => '#c6c6cA',
		'api' => $baseurl . '/esports/api.php',
	],
	'pokemon' => [
		'name' => 'Pokémon',
		'theme-light' => '#6f5d00',
		'theme-dark' => '#e4c532',
		'api' => $baseurl . '/pokemon/api.php',
	],
	'worldoftanks' => [
		'name' => 'World of Tanks',
		'theme-light' => '#bc111d',
		'theme-dark' => '#ffb3aa',
		'api' => $baseurl . '/worldoftanks/api.php',
	],
	'crossfire' => [
		'name' => 'CrossFire',
		'theme-light' => '#006a6a',
		'theme-dark' => '#4ddada',
		'api' => $baseurl . '/crossfire/api.php',
	],
	'trackmania' => [
		'name' => 'Trackmania',
		'theme-light' => '#006e00',
		'theme-dark' => '#5ae150',
		'api' => $baseurl . '/trackmania/api.php',
	],
	'geoguessr' => [
		'name' => 'GeoGuessr',
		'theme-light' => '#1c0066',
		'theme-dark' => '#8669d6',
		'api' => $baseurl . '/geoguessr/api.php',
	],
	'osu' => [
		'name' => 'osu!',
		'theme-light' => '#bc111d',
		'theme-dark' => '#ffb3aa',
		'api' => $baseurl . '/osu/api.php',
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
	'stormgate' => [
		'name' => 'Stormgate',
		'theme-light' => '#954a00',
		'theme-dark' => '#ffb781',
		'api' => $baseurl . '/stormgate/api.php',
	],
	'clashofclans' => [
		'name' => 'Clash of Clans',
		'theme-light' => '#bc111d',
		'theme-dark' => '#ffb3aa',
		'api' => $baseurl . '/clashofclans/api.php',
	],
	'worldofwarcraft' => [
		'name' => 'World of Warcraft',
		'theme-light' => '#7e5700',
		'theme-dark' => '#fabc45',
		'api' => $baseurl . '/worldofwarcraft/api.php',
	],
	'teamfortress' => [
		'name' => 'Team Fortress',
		'theme-light' => '#954a00',
		'theme-dark' => '#ffb781',
		'api' => $baseurl . '/teamfortress/api.php',
	],
	'arenafps' => [
		'name' => 'Arena FPS',
		'theme-light' => '#bc111d',
		'theme-dark' => '#ffb3aa',
		'api' => $baseurl . '/arenafps/api.php',
	],
	'tetris' => [
		'name' => 'Tetris',
		'theme-light' => '#3a5ba9',
		'theme-dark' => '#b0c5ff',
		'api' => $baseurl . '/tetris/api.php',
	],
	'sideswipe' => [
		'name' => 'Sideswipe',
		'theme-light' => '#3a5ba9',
		'theme-dark' => '#b0c5ff',
		'api' => $baseurl . '/sideswipe/api.php',
	],
	'paladins' => [
		'name' => 'Paladins',
		'theme-light' => '#006a6a',
		'theme-dark' => '#4ddada',
		'api' => $baseurl . '/paladins/api.php',
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
	'marvelrivals' => [
		'name' => 'Marvel Rivals',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/marvelrivals/api.php',
	],
	'simracing' => [
		'name' => 'Sim Racing',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/simracing/api.php',
	],
	'brawlhalla' => [
		'name' => 'Brawlhalla',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/brawlhalla/api.php',
	],
	'omegastrikers' => [
		'name' => 'Omega Strikers',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/omegastrikers/api.php',
	],
	'smite' => [
		'name' => 'SMITE',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/smite/api.php',
	],
	'naraka' => [
		'name' => 'Naraka',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/naraka/api.php',
	],
	'splatoon' => [
		'name' => 'Splatoon',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/splatoon/api.php',
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
	'magic' => [
		'name' => 'Magic: The Gathering',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/magic/api.php',
	],
	'zula' => [
		'name' => 'Zula',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/zula/api.php',
	],
	'goals' => [
		'name' => 'GOALS',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/goals/api.php',
	],
	'runeterra' => [
		'name' => 'Legends of Runeterra',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/runeterra/api.php',
	],
	'autochess' => [
		'name' => 'Auto Chess',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/autochess/api.php',
	],
	'battalion' => [
		'name' => 'Battalion 1944',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/battalion/api.php',
	],
	'battlerite' => [
		'name' => 'Battlerite',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/battlerite/api.php',
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
	'tarkovarena' => [
		'name' => 'Escape from Tarkov: Arena',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/tarkovarena/api.php',
	],
	'warthunder' => [
		'name' => 'War Thunder',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/warthunder/api.php',
	],
	'wildcard' => [
		'name' => 'Wildcard',
		'theme-light' => '',
		'theme-dark' => '',
		'api' => $baseurl . '/wildcard/api.php',
	],
];
