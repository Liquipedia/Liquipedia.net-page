<?php
$no_session = true;
require_once( __DIR__ . '/includes/wikis.php' );
require_once( __DIR__ . '/../config/db_config.php' );

$expire = gmdate( 'D, d M Y H:i:s \G\M\T', time() + 60 );

header( 'Content-Type: text/html; charset=utf-8' );
header( 'Cache-Control: s-maxage=60' );
header( 'Expires: ' . $expire );

// Preload / push key files
header( 'Link: </css/style.min.css?c=1>; as=style; rel=preload' );

$col_number = 3;

$hot_links = [];

$pdo = null;
try {
	$pdo = new PDO( 'mysql:host=' . $server . ';dbname=liquid', $login, $pass );
	$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$pdo->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );
	$pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
} catch ( PDOException $e ) {
	// echo 'Connection Error: ' . $e->getMessage();
}

$selectstmt = $pdo->prepare( 'SELECT * FROM `wiki_hot` ORDER BY `hits` DESC' );
$selectstmt->execute();
while ( $row = $selectstmt->fetch() ) {
	$title = strip_tags( str_replace( '_', ' ', $row[ 'title' ] ) );
	$url = $row[ 'page' ];
	$wiki = $row[ 'wiki' ];

	$url = str_replace( $baseurl, '', $url );

	if ( !isset( $hot_links[ $wiki ] ) ) {
		$hot_links[ $wiki ] = [];
	}
	if ( count( $hot_links[ $wiki ] ) < 5 ) {
		$hot_links[ $wiki ][] = [
			'title' => $title,
			'href' => $url
		];
	}
}

$keywords = '';
foreach ( $wikis as $wiki_key => $wiki ) {
	$keywords .= ', ' . $wiki[ 'name' ];
}
foreach ( $alphawikis as $wiki_key => $wiki ) {
	$keywords .= ', ' . $wiki[ 'name' ];
}
?>
<!DOCTYPE html>
<!--
	 _ _             _                _ _
	| (_) __ _ _   _(_)_ __   ___  __| (_) __ _
	| | |/ _` | | | | | '_ \ / _ \/ _` | |/ _` |
	| | | (_| | |_| | | |_) |  __/ (_| | | (_| |
	|_|_|\__, |\__,_|_| .__/ \___|\__,_|_|\__,_|
		|_|       |_|

	Hi you, yes you who's looking at our source code! Are you a website specialist?
	We are looking for people to help us with our templates, especially with mobile development.
	If you want to help, be sure to visit us us on discord (https://liquipedia.net/discord), or send us
	an email to liquipedia <at> teamliquid <dot> net!
-->
<html lang="en">
	<head>
		<title>Liquipedia</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta charset="UTF-8" />
		<link href="./css/style.min.css?c=1" rel="stylesheet" type="text/css" />
		<meta name="description" content="The esports wiki, the best resource for live updated results, tournament overview, team and player profiles, game information, and more..." />
		<meta name="keywords" content="esports, wiki, liquipedia<?php echo $keywords; ?>" />
		<link href="/commons/extensions/TeamLiquidIntegration/resources/favicon/favicon-196x196.png" rel="icon" type="image/png" sizes="196x196">
		<link href="/commons/extensions/TeamLiquidIntegration/resources/favicon/favicon-128x128.png" rel="icon" type="image/png" sizes="128x128">
		<link href="/commons/extensions/TeamLiquidIntegration/resources/favicon/favicon-96x96.png" rel="icon" type="image/png" sizes="96x96">
		<link href="/commons/extensions/TeamLiquidIntegration/resources/favicon/favicon-32x32.png" rel="icon" type="image/png" sizes="32x32">
		<link href="/commons/extensions/TeamLiquidIntegration/resources/favicon/favicon-16x16.png" rel="icon" type="image/png" sizes="16x16">
		<link href="/manifest.json" rel="manifest" />
		<link href="<?php echo $baseurl; ?>" rel="canonical" />
		<meta name="theme-color" content="#5496cf" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@LiquipediaNet" />
		<meta name="twitter:title" content="Liquipedia" />
		<meta name="twitter:description" content="The esports wiki, the best resource for live updated results, tournament overview, team and player profiles, game information, and more..." />
		<meta name="twitter:image:src" content="<?php echo $baseurl; ?>/images/liquipedia_logo.png" />
		<meta name="twitter:domain" content="<?php echo str_replace( 'https://', '', $baseurl ); ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:image" content="<?php echo $baseurl; ?>/images/liquipedia_logo.png" />
		<meta property="og:url" content="<?php echo $baseurl; ?>" />
		<meta property="og:title" content="Liquipedia" />
		<meta property="og:description" content="The esports wiki, the best resource for live updated results, tournament overview, team and player profiles, game information, and more..." />
		<meta property="og:site_name" content="Liquipedia" />
		<style>
<?php
foreach ( $wikis as $wiki_key => $wiki ) {
	echo "\t\t\t." . $wiki_key . '-box { background-color:' . $wiki[ 'background-color' ] . " }\n";
}
foreach ( $alphawikis as $wiki_key => $wiki ) {
	echo "\t\t\t." . $wiki_key . '-box { background-color:' . $wiki[ 'background-color' ] . " }\n";
}
?>
		</style>
	</head>
	<body class="column-<?php echo $col_number; ?>">
		<div class="global-nav">
			<span><a href="https://drawtwo.gg/">DrawTwo</a></span>
			<span><a href="https://masterleague.net/">Master League</a></span>
			<span><a href="https://www.liquidlegends.net/">LiquidLegends</a></span>
			<span><a href="https://www.liquiddota.com/">LiquidDota</a></span>
			<span><a href="https://tl.net">TLnet</a></span>
		</div>
		<div class="top">
			<h1>Team Liquid welcomes you to the esports wiki</h1>
			<div id="logo"><img src="./images/lp-logo.svg" alt="liquipedia" /></div>
			<h2>Made by the esports community for the esports community. <span id="full-intro"> The best resource for live updated results, tournament overview, team &amp; player profiles, game information, and more&hellip;</span></h2>
			<div class="content searchwrap">
				<form id="search" class="search" action="/dota2/index.php">
					<select id="wikiselect" aria-label="Select a Wiki to search">
						<?php
						foreach ( $wikis as $wiki_key => $wiki ) {
							echo '<option value="' . $wiki_key . '">' . $wiki[ 'name' ] . '</option>';
						}
						foreach ( $alphawikis as $wiki_key => $wiki ) {
							echo '<option value="' . $wiki_key . '">' . $wiki[ 'name' ] . '</option>';
						}
						?>
						<option value="commons">Commons</option>
					</select><!--
					--><input aria-label="Search for" type="search" name="search" placeholder="Search..."><!--
					--><button type="submit">Search</button>
				</form>
			</div>
		</div>
		<div class="whitebox">
			<!--<div class="content">
				<a class="banner" target="_blank" href="https://www.teamliquid.com/news/2018/12/10/were-hiring-liquipedia-developers">
					We are hiring! Check out our developer job postings and work in esports!
				</a>
			</div>
			--><div class="box-wrap">
				<?php foreach ( $wikis as $wiki_key => $wiki ) { ?>
					<div class="<?php echo $wiki_key; ?>-box game-box">
						<input type="checkbox" class="toggle-button" id="toggle-<?php echo $wiki_key; ?>" />
						<label for="toggle-<?php echo $wiki_key; ?>" class="toggle-button-label" id="toggle-<?php echo $wiki_key; ?>-label"></label>
						<div class="wiki-header"><a href="<?php echo '/' . $wiki_key; ?>/Main_Page"><?php echo $wiki[ 'name' ]; ?></a></div>
						<p id="<?php echo $wiki_key; ?>" class="game-box-content">
							<?php
							if ( isset( $hot_links[ $wiki_key ] ) && is_array( $hot_links[ $wiki_key ] ) ) {
								foreach ( $hot_links[ $wiki_key ] as $hot_link ) {
									?>
									<a href="<?php echo $hot_link[ 'href' ]; ?>" title="<?php echo htmlspecialchars( $hot_link[ 'title' ] ); ?>"><?php echo htmlspecialchars( $hot_link[ 'title' ] ); ?></a><br />
									<?php
								}
							}
							?>
						</p>
					</div>
				<?php } ?>
			</div>
		</div>
		<h2 id="commons-wiki">Commons Wiki</h2>
		<h3>The commons wiki is a wiki used to help operate the other wikis</h3>
		<div class="whitebox">
			<div class="content">
				<p>The commons wiki is the file repository for all our wikis. Images and other files uploaded here can be used across all of the wikis. The same holds true for templates uploaded here.</p>
				<ul class="flatlist">
					<li><a href="/commons/Main_Page">Commons Wiki</a></li>
					<li><a href="/commons/Special:Upload">File Upload</a></li>
					<li><a href="/commons/Copyrights_Repository">Copyrights Repository</a></li>
					<li><a href="/commons/Special:RunQuery/Find_images">Find Images</a></li>
					<li><a href="/commons/Liquipedia:Latest_Uploads">Latest Uploads</a></li>
				</ul>
			</div>
		</div>
		<h2 id="alpha-wikis">Alpha Wikis</h2>
		<h3>Alpha wikis are wikis that are still in the building process</h3>
		<div class="whitebox">
			<div class="content">
				<p>In addition to our standard wikis we are also allowing people to create new wikis that we host and help form. If you wish to start a wiki not listed below:</p>
				<p class="btn-wrap"><a class="btn" target="_blank" href="https://goo.gl/forms/kF0dCtJzHT">Fill in this form</a></p>
			</div>
			<div class="box-wrap">
				<?php foreach ( $alphawikis as $wiki_key => $wiki ) { ?>
					<div class="<?php echo $wiki_key; ?>-box game-box">
						<input type="checkbox" class="toggle-button" id="toggle-<?php echo $wiki_key; ?>" />
						<label for="toggle-<?php echo $wiki_key; ?>" class="toggle-button-label" id="toggle-<?php echo $wiki_key; ?>-label"></label>
						<div class="wiki-header"><a href="<?php echo '/' . $wiki_key; ?>/Main_Page"><?php echo $wiki[ 'name' ]; ?></a></div>
						<p id="<?php echo $wiki_key; ?>" class="game-box-content">
							<?php
							if ( isset( $hot_links[ $wiki_key ] ) && is_array( $hot_links[ $wiki_key ] ) ) {
								foreach ( $hot_links[ $wiki_key ] as $hot_link ) {
									?>
									<a href="<?php echo $hot_link[ 'href' ]; ?>" title="<?php echo htmlspecialchars( $hot_link[ 'title' ] ); ?>"><?php echo htmlspecialchars( $hot_link[ 'title' ] ); ?></a><br />
									<?php
								}
							}
							?>
						</p>
					</div>
				<?php } ?>
			</div>
		</div>
		<h2 id="how-to-contribute">How To Contribute</h2>
		<h3>It's easy, fun, and rewarding to help esports</h3>
		<div class="whitebox">
			<div class="content how-to">
				<p>Contributing to the wiki is actually pretty easy and keep in mind that every more-correct-than-wrong contribution is valuable no matter how small. </p>
				<p>When you visit Liquipedia, consider adding to it or correcting something, it doesn't have to take up much of your time and effort and it will help other visitors like yourself and Liquipedia as a whole.</p>
				<p>Many people start by fixing typos, which is actually the easiest way to contribute. You just have to create an account&mdash;if you don't have one already&mdash;log in, click edit, find and fix the typo, click save, and you are done.</p>
				<p>Another thing that many contributors start with is keeping tournament results up to date while the tournament is ongoing. Most of the times the pages are already set up by one of the more experienced contributors, and you just have to fill in the results as they happen. Filling a bracket is pretty straightforward. You log in, click on edit, find the bracket, update scores and fill in names. If you are unsure, just look at how it was done on other pages, either by just looking at the page itself, or by clicking edit to examine how the page was created. In general, looking at how things are done on other pages gives you a good idea of how you can do it yourself. </p>
				<p>If you feel comfortable with wiki editing or if you want to learn things that are more advanced, feel free to browse our &quot;How to contribute&quot; sections you can find in the menus on the left of the wiki pages. You can <a rel="noopener" href="https://liquipedia.net/discord" target="_blank">find us on our Discord server</a> where other contributors can help you.</p>
				<h4>Logging in and registering</h4>
				<p>To log in and edit Liquipedia you need a TeamLiquid account. To register an account, click on the &quot;<a href="https://tl.net/mytlnet/register" target="_blank">create account</a>&quot; link on any wiki page, just remember to follow the instructions and complete the registration.<br />
					Once you have an account go click on the log in box in the top right and enter your details or if logged in on any of the three sites mentioned just click on the TL quick log in link. </p>
				<h4>Editing</h4>
				<p>There are two types of edit links. One is a tab at the top of the page which lets you edit all sections of the page at once. The second is on the far right side of all sub-headers, this allows you to edit the specific section you are on. <br />
					When editing a page you will have some tools in a toolbar above the editing box to help you with the markup language that the wiki uses for things like bold text, italics, headers, and links. To know more about the wiki markup language visit <a rel="noopener" href="https://en.wikipedia.org/wiki/Help:Wiki_markup" target="_blank">Wikipedia's Help: Wiki markup</a>.</p>
				<h4>Areas to help out with</h4>
				<p>There are multiple things one can do to help out with on the wikis. Besides fixing typos or entering results you can:</p>
				<ul>
					<li>List an interview a player has done on the player's page.</li>
					<li>Add social media links on a team's or player's page.</li>
					<li>Fill out a player's page with information from interviews they've done and add references.</li>
					<li>Write part of the history of an organization, tournament, player, or team and add references.</li>
					<li>Update a player's or team's result pages with recent results.</li>
					<li>Add the times when a match starts to brackets or groups.</li>
					<li>Add general game information, either to an existing article or make a new one for a topic that is missing.</li>
					<li>Update strategy pages and create pages for new strategies.</li>
					<li>Create new pages for tournaments, players, or teams (if they meet the liquipedia notability guidelines for that game.)</li>
					<li>Give the wiki the right to display your photographs and upload them to the wiki.</li>
					<li>Develop new templates to make our wikis look good and make contributing easier.</li>
					<li>Use knowledge of PHP, JS, CSS, HTML, or graphic design to improve on any element that you find the wikis are lacking in.</li>
					<li>Help other contributors in our IRC channel, especially newer ones.</li>
					<li>Spread the word that everyone can help grow Liquipedia.</li>
					<li>Give us <a href="https://tl.net/forum/website-feedback/94785-liquipedia-feedback-thread" target="_blank">new ideas</a> of what we can do, even a paint scribble can help improving the wikis, if it gives us an idea of how a template could look.</li>
					<li>Correct people when they call us &quot;LiquiDpedia&quot; with one d too many. Liquids flow and pronouncing Liquipedia flows easier than LiquiDpedia.</li>
				</ul>
			</div>
		</div>
		<div class="footer">
			<div class="content">
				<div class="icon-list">
					<a aria-label="Discord" rel="noopener" href="https://liquipedia.net/discord" target="_blank"><i class="lp-icon lp-discord"></i></a>
					<a aria-label="Twitter" rel="noopener" href="https://twitter.com/LiquipediaNet" target="_blank"><i class="lp-icon lp-twitter"></i></a>
					<a aria-label="Facebook" rel="noopener" href="https://www.facebook.com/Liquipedia" target="_blank"><i class="lp-icon lp-facebook"></i></a>
					<a aria-label="YouTube" rel="noopener" href="https://www.youtube.com/user/Liquipedia" target="_blank"><i class="lp-icon lp-youtube"></i></a>
					<a aria-label="Twitch" rel="noopener" href="https://www.twitch.tv/liquipedia" target="_blank"><i class="lp-icon lp-twitch"></i></a>
					<a aria-label="GitHub" rel="noopener" href="https://github.com/Liquipedia" target="_blank"><i class="lp-icon lp-github"></i></a>
				</div>
				<div class="disclaimer">
					<p>Our <a href="https://liquipedia.net/commons/Liquipedia:Privacy_policy">Privacy Policy</a>. Text is licensed under <a rel="noopener" href="https://creativecommons.org/licenses/by-sa/3.0/" target="_blank">CC BY-SA</a>.<br />Files have varied licenses. Click on an image to see the image's page for more details.</p>
				</div>
			</div>
		</div>
		<script type="application/ld+json">
			{
			"@context": "http://schema.org",
			"@type": "Organization",
			"name": "Liquipedia",
			"url": "https://liquipedia.net",
			"logo": "https://liquipedia.net/images/liquipedia_logo.png",
			"foundingDate": "2009-06-05",
			"sameAs": [
			"https://twitter.com/LiquipediaNet",
			"https://www.facebook.com/Liquipedia",
			"https://www.youtube.com/user/Liquipedia",
			"https://www.twitch.tv/liquipedia",
			"https://github.com/Liquipedia"
			]
			}
		</script>
		<script>
			window.addEventListener( 'DOMContentLoaded', function() {
				if ( 'localStorage' in window ) {
					if ( localStorage['lastWikiSearch'] == undefined ) {
						localStorage['lastWikiSearch'] = '<?php echo array_keys( $wikis )[ 0 ]; ?>';
					}
					document.getElementById( 'wikiselect' ).value = localStorage['lastWikiSearch'];
					document.getElementById( 'search' ).action = '/' + localStorage['lastWikiSearch'] + '/index.php';
					document.getElementById( 'wikiselect' ).onchange = function() {
						localStorage['lastWikiSearch'] = this.value;
						document.getElementById( 'search' ).action = '/' + this.value + '/index.php';
					}
				} else {
					if ( !document.cookie.includes( 'liquipedia_last_wiki_search' ) ) {
						document.cookie = 'liquipedia_last_wiki_search=<?php echo array_keys( $wikis )[ 0 ]; ?>';
					}
					var startwiki = document.cookie.replace( /(?:(?:^|.*;\s*)liquipedia_last_wiki_search\s*\=\s*([^;]*).*$)|^.*$/, "$1" );
					document.getElementById( 'wikiselect' ).value = startwiki;
					document.getElementById( 'search' ).action = '/' + startwiki + '/index.php';
					document.getElementById( 'wikiselect' ).onchange = function() {
						document.cookie = 'liquipedia_last_wiki_search=' + this.value;
						document.getElementById( 'search' ).action = '/' + this.value + '/index.php';
					}
				}
			} );

			window.dataLayer = window.dataLayer || [ ];
			function gtag() {
				dataLayer.push( arguments );
			}
			gtag( 'js', new Date() );
			gtag( 'config', 'UA-576564-4', { 'anonymize_ip': true } );
			gtag( 'config', 'UA-576564-21', { 'anonymize_ip': true } );
		</script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-576564-4"></script>
	</body>
</html>
