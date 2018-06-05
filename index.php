<?php
$no_session = true;
require_once( 'includes/wikis.php' );
require_once( '../config/db_config.php' );

$expire = gmdate( 'D, d M Y H:i:s \G\M\T', time() + 60 );

header( 'Content-Type: text/html; charset=utf-8' );
header( 'Cache-Control: s-maxage=60' );
header( 'Expires: ' . $expire );

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
	$title = str_replace( '_', ' ', $row[ 'title' ] );
	$url = $row[ 'page' ];
	$wiki = $row[ 'wiki' ];

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
	If you want to help, be sure to visit us us on discord (<?php echo $baseurl; ?>/discord), or send us
	an email to liquipedia <at> teamliquid <dot> net!
-->
<html lang="en">
	<head>
		<title>Liquipedia</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta charset="UTF-8" />
		<meta name="description" content="The esports wiki, the best resource for live updated results, tournament overview, team and player profiles, game information, and more..." />
		<meta name="keywords" content="esports, wiki, liquipedia<?php echo $keywords; ?>" />
		<link href="./css/style.css?c=1" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,700,700italic" />
		<link href="./favicon.ico" rel="icon" />
		<link href="/manifest.json" rel="manifest" />
		<link href="<?php echo $baseurl; ?>" rel="canonical" />
		<meta name="theme-color" content="#5496cf" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@LiquipediaNet" />
		<meta name="twitter:title" content="Liquipedia" />
		<meta name="twitter:description" content="The esports wiki, the best resource for live updated results, tournament overview, team and player profiles, game information, and more..." />
		<meta name="twitter:image:src" content="<?php echo $baseurl; ?>/images/512.png" />
		<meta name="twitter:domain" content="<?php echo str_replace( 'https://', '', $baseurl ); ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:image" content="<?php echo $baseurl; ?>/images/512.png" />
		<meta property="og:url" content="<?php echo $baseurl; ?>" />
		<meta property="og:title" content="Liquipedia" />
		<meta property="og:description" content="The esports wiki, the best resource for live updated results, tournament overview, team and player profiles, game information, and more..." />
		<meta property="og:site_name" content="Liquipedia" />
	</head>
	<body class="frontpage">
		<div class="svg-container">
			<?php require_once( 'includes/symbols.php' ); ?>
		</div>
		<header role="banner">
			<div>
				<svg class="wiki-logo" viewBox="0 0 700 133.89" aria-hidden="true">
				<use xlink:href="images/logo_horiz.svg#brand" />
				</svg>
			</div>
			<span class="screen-reader-text">Liquipedia Logo</span>
			<p class="about">Welcome to <em>the</em> esports wiki. With over 1400 active contributors per month, Liquipedia is the premiere place to find up-to-date information on esports tournaments, players, and teams.</p>
		</header>
		<main role="main">
			<!--begin main content-->
			<section role="region" aria-label="primary wikis">
				<div class="card-container">
					<?php foreach ( $wikis as $wiki_key => $wiki ) { ?>
						<article class="wiki-card wiki-card--<?php echo $wiki_key; ?>">
							<div class="card-controls">
								<button class="is-removed" data-accordion-trigger="<?php echo $wiki_key; ?>" aria-controls="<?php echo $wiki_key; ?>" aria-expanded="true">+</button>
							</div>
							<h1 class="card-header">
								<a href="<?php echo $baseurl . '/' . $wiki_key; ?>/Main_Page">
									<span class="card-icon">
										<svg class="game-icon">
										<use xlink:href="#<?php echo $wiki_key; ?>"/>
										</svg>
									</span>
									<span><?php echo $wiki[ 'name' ]; ?></span>
								</a>
							</h1>
							<ul class="card-content" data-accordion="<?php echo $wiki_key; ?>" aria-hidden="false" aria-label="recent trending pages">
								<?php
								if ( isset( $hot_links[ $wiki_key ] ) && is_array( $hot_links[ $wiki_key ] ) ) {
									foreach ( $hot_links[ $wiki_key ] as $hot_link ) {
										?>
										<li>
											<a href="<?php echo $hot_link[ 'href' ]; ?>" title="<?php echo htmlspecialchars( $hot_link[ 'title' ] ); ?>"><?php echo htmlspecialchars( $hot_link[ 'title' ] ); ?></a>
										</li>
										<?php
									}
								}
								?>
							</ul>
						</article>
					<?php } ?>
				</div>
			</section>
			<section role="region">
				<h1>Liquipedia Commons</h1>
				<p class="about">The commons wiki is used to help operate the other wikis. It's a general file repository for all our wiki branches; images and other files uploaded here can be used across all of the wikis. The same holds true for any commonly used templates that are uploaded here.</p>
				<ul class="list-inline" aria-label="liquipedia commons links">
					<li><a href="<?php echo $baseurl; ?>/commons/Main_Page">Commons Wiki</a></li>
					<li><a href="<?php echo $baseurl; ?>/commons/Special:Upload">File Upload</a></li>
					<li><a href="<?php echo $baseurl; ?>/commons/Copyrights_Repository">Copyrights Repository</a></li>
					<li><a href="<?php echo $baseurl; ?>/commons/Special:RunQuery/Find_images">Find Images</a></li>
					<li><a href="<?php echo $baseurl; ?>/commons/Liquipedia:Latest_Uploads">Latest Uploads</a></li>
				</ul>
			</section>
			<section role="region">
				<h1>Alpha Wikis</h1>
				<p class="about">Alpha wikis are branches of Liquipedia that are still in the process of being built. We have a few in progress right now, but if you’re looking for help in setting up a new wiki on our server that’s not listed below, please use the link below to fill out a request.</p>
				<a class="button button--action" href="https://goo.gl/forms/kF0dCtJzHT" target="_blank" rel="noopener noreferrer">Alpha Wiki Request Form</a>
				<div class="card-container">
					<?php foreach ( $alphawikis as $wiki_key => $wiki ) { ?>
						<article class="wiki-card wiki-card--<?php echo $wiki_key; ?> wiki-card--alpha">
							<div class="card-controls">
								<button class="is-removed" data-accordion-trigger="<?php echo $wiki_key; ?>" aria-controls="<?php echo $wiki_key; ?>" aria-expanded="true">+</button>
							</div>
							<h1 class="card-header">
								<a href="<?php echo $baseurl . '/' . $wiki_key; ?>/Main_Page">
									<span class="card-icon">
										<svg class="game-icon">
										<use xlink:href="#<?php echo $wiki_key; ?>" />
										</svg>
										<svg class="alpha-wiki">
										<use xlink:href="#alpha" />
										</svg>
									</span>
									<span><?php echo $wiki[ 'name' ]; ?></span>
								</a>
							</h1>
							<ul class="card-content" data-accordion="<?php echo $wiki_key; ?>" aria-hidden="false" aria-label="recent trending pages">
								<?php
								if ( isset( $hot_links[ $wiki_key ] ) && is_array( $hot_links[ $wiki_key ] ) ) {
									foreach ( $hot_links[ $wiki_key ] as $hot_link ) {
										?>
										<li>
											<a href="<?php echo $hot_link[ 'href' ]; ?>" title="<?php echo htmlspecialchars( $hot_link[ 'title' ] ); ?>"><?php echo htmlspecialchars( $hot_link[ 'title' ] ); ?></a>
										</li>
										<?php
									}
								}
								?>
							</ul>
						</article>
					<?php } ?>
				</div>
			</section>
			<section role="region">
				<h1>How To Contribute</h1>
				<div class="text-container">
					<h2>Creating an Account, Logging In</h2>
					<p>To edit Liquipedia you'll need a TeamLiquid.net account. To register an account, click on the <a href="http://www.teamliquid.net/mytlnet/register" target="_blank" rel="noopener noreferrer">create account</a> link here, or in the top navigation bar; just remember to follow the instructions and complete your registration.</p>
					<p>Once you have an account go click on the log in box in the top right and enter your details, or if logged in on any of our affiliate sites just click on the TL quick log in link.</p>

					<h2>Contributing</h2>
					<p>Contributing to the wiki is pretty easy. Keep in mind that every more-correct-than-wrong contribution is valuable, no matter how small.</p>
					<p>When you visit Liquipedia, consider adding to it or correcting something. It doesn't have to take up much of your time and effort, and it will help other visitors like yourself and Liquipedia as a whole.</p>
					<p>Many people start by fixing typos; this is the easiest way to contribute. Simply log in, click edit, find and fix the typo, click save, and you are done.</p>
					<p>Another thing that many contributors start with is keeping tournament results up to date while the tournament is ongoing. Most of the times these pages are already set up by one of the more experienced contributors and you just have to fill in the results as they happen. Filling a bracket is pretty straightforward. Once you’re logged in, click on edit, find the bracket, update the scores and fill in names. If you are unsure, just look at how it was done on other pages, either by just looking at the page itself or by clicking edit to examine how the page was created. In general, looking at how things are done on other pages gives you a good idea of how you can do it yourself.</p>
					<p>If you feel comfortable with wiki editing or if you want to learn things that are more advanced feel free to browse our "How to contribute" sections. You can find this in the main menu. You can also  <a href="<?php echo $baseurl; ?>/discord" target="_blank" rel="noopener noreferrer">find us on our Discord server</a> where other contributors can help you.</p>

					<h2>Editing</h2>
					<p>There are two types of edit links. One is a tab at the top of the page which lets you edit all sections of the page at once. The second is on the far right side of all sub-headings; this allows you to edit the specific section you are on.</p>
					<p>When editing a page you will have some tools in a toolbar above the editing box to help you with the markup language that the wiki uses for things like bold text, italics, headers, and links. To know more about the wiki markup language visit Wikipedia's <a href="https://en.wikipedia.org/wiki/Help:Wiki_markup" target="_blank" rel="noopener noreferrer">Help:Wikitext</a>.</p>

					<h2>Areas to Help out With</h2>
					<p>There are multiple things one can do to help out with on the wikis. Besides fixing typos or entering results you can:</p>
					<ul>
						<li>List an interview a player has done on that player's page.</li>
						<li>Add social media links on a team's or player's page.</li>
						<li>Fill out a player's page with information and add references for those sources.</li>
						<li>Write part of the history of an organization, tournament, player, or team and add references.</li>
						<li>Update a player's or team's result pages with recent results.</li>
						<li>Add the times when a match starts to brackets or groups.</li>
						<li>Add general game information, either to an existing article or make a new one for a topic that is missing.</li>
						<li>Update strategy pages and create pages for new strategies.</li>
						<li>Create new pages for tournaments, players, or teams (if they meet the liquipedia notability guidelines for that game).</li>
						<li>Give the wiki the right to display your photographs and upload them to the wiki.</li>
						<li>Develop new templates to make our wikis look good and make contributing easier.</li>
						<li>Use knowledge of PHP, JS, CSS, HTML, or graphic design to improve on any element that you find the wikis are lacking in.</li>
						<li>Help other contributors in our IRC channel, especially newer ones.</li>
						<li>Spread the word that everyone can help grow Liquipedia.</li>
						<li>Give us <a href="http://www.teamliquid.net/forum/website-feedback/94785-liquipedia-feedback-thread" target="_blank" rel="noopener noreferrer">new ideas</a> of what we can do, even a paint scribble can help improving the wikis, if it gives us an idea of how a template could look.</li>
						<li>Correct people when they call us &quot;LiquiDpedia&quot; with one d too many. Liquids flow, and pronouncing Liquipedia flows easier than LiquiDpedia.</li>
					</ul>
				</div>
			</section>
		</main>
		<!--end main content-->
		<?php require_once('includes/footer.php'); ?>

		<!-- Page Scripts -->
		<script>
			'use strict';
			/* ====================================================================
			 * Set Aria-accordion attributes
			 * ====================================================================
			 * on DOM load, detect and set state
			 */
			document.addEventListener('DOMContentLoaded', function () {
				var breakpoint = window.matchMedia('(max-width: 818px)').matches;
				var triggers = document.querySelectorAll('[data-accordion-trigger]');
				var accordions = document.querySelectorAll('[data-accordion]');

				if (breakpoint) {
					triggers.forEach(function (item) {
						item.setAttribute('aria-expanded', 'false');
						item.classList.remove('is-removed');
					});

					accordions.forEach(function (item) {
						item.setAttribute('aria-hidden', 'true');
					});
				}
			}, false);


			/* ====================================================================
			 * RAF-Throttled Accordion Resize
			 * ====================================================================
			 * request animation frame throttled resize function to swap aria
			 * attributes
			 */
			(function () {
				var running = false,
					prevWidth = window.innerWidth;

				function onResize() {
					if (!running) {
						running = true;
						window.requestAnimationFrame(update);
					}
				}

				//main function, single state capture
				function update() {
					var width = window.innerWidth;
					var breakpoint = window.matchMedia('(max-width: 818px)').matches;
					var triggers = document.querySelectorAll('[data-accordion-trigger]');
					var accordions = document.querySelectorAll('[data-accordion]');

					if (width > prevWidth) {
						if (!breakpoint) {
							triggers.forEach(function (item) {
								item.setAttribute('aria-expanded', 'true');
								item.classList.add('is-removed');
								item.innerHTML = '&ndash;';
							});
							accordions.forEach(function (item) {
								item.setAttribute('aria-hidden', 'false');
							});
						}
					} else if (prevWidth > 818 && breakpoint) {
						triggers.forEach(function (item) {
							item.setAttribute('aria-expanded', 'false');
							item.classList.remove('is-removed');
							item.innerHTML = '+';
						});
						accordions.forEach(function (item) {
							item.setAttribute('aria-hidden', 'true');
						});
					} else {
						//no function
					}

					//reset to head
					prevWidth = window.innerWidth;
					running = false;
				}

				window.addEventListener('resize', onResize, false);
			})();


			/* ====================================================================
			 * Accordion Function
			 * ====================================================================
			 * A single-target expand & collapse function. Collects all triggers,
			 * and adjusts aria-expanded, and aria-hidden attributes as necessary
			 */
			function toggleAccordion(triggers, accordions) {
				var buttons = Array.prototype.slice.call(document.querySelectorAll(triggers));
				var targets = Array.prototype.slice.call(document.querySelectorAll(accordions));

				buttons.forEach(function (item) {
					item.addEventListener('click', function () {
						toggleAccordionState(this, targets);
					}, false);
				});
			}

			function toggleAccordionState(target, list) {
				var value = target.getAttribute('data-accordion-trigger');

				if (target.getAttribute('aria-expanded') === 'false') {
					target.setAttribute('aria-expanded', 'true');
					target.innerHTML = '&ndash;';
				} else {
					target.setAttribute('aria-expanded', 'false');
					target.innerHTML = '+';
				}

				updateAccordionPanel(target, value, list);
			}

			function updateAccordionPanel(target, value, list) {
				for (var i = 0; i < list.length; i += 1) {
					if (value === list[i].getAttribute('data-accordion')) {
						if (target.getAttribute('aria-expanded') === 'true') {
							list[i].setAttribute('aria-hidden', 'false');
						} else {
							list[i].setAttribute('aria-hidden', 'true');
						}
					}
				}
			}

			toggleAccordion('[data-accordion-trigger]', '[data-accordion]');
		</script>
		<script type="application/ld+json">
			{
			"@context": "http://schema.org",
			"@type": "Organization",
			"name": "Liquipedia",
			"url": "<?php echo $baseurl; ?>",
			"logo": "<?php echo $baseurl; ?>/images/512.png",
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
		<!-- End Page Scripts -->

		<!-- Analytics -->
		<script>
			(function (i, s, o, g, r, a, m) {
				i['GoogleAnalyticsObject'] = r;
				i[r] = i[r] || function () {
					(i[r].q = i[r].q || []).push(arguments);
				}, i[r].l = 1 * new Date();
				a = s.createElement(o),
					m = s.getElementsByTagName(o)[0];
				a.async = 1;
				a.src = g;
				m.parentNode.insertBefore(a, m);
			})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

			+ga('set', 'anonymizeIp', true);
			ga('create', 'UA-576564-4', 'auto');
			ga('send', 'pageview');
		</script>
		<!-- End Analytics -->

		<!-- Quantcast Tag -->
		<script type="text/javascript">
			var _qevents = _qevents || [];

			(function () {
				var elem = document.createElement('script');
				elem.src = (document.location.protocol == "https:" ? "https://secure" : "http://edge") + ".quantserve.com/quant.js";
				elem.async = true;
				elem.type = "text/javascript";
				var scpt = document.getElementsByTagName('script')[0];
				scpt.parentNode.insertBefore(elem, scpt);
			})();
			_qevents.push({
				qacct: "p-c4R4Uj3EI2IsY"
			});
		</script>
		<noscript>
		<div style="display:none;">
			<img src="//pixel.quantserve.com/pixel/p-c4R4Uj3EI2IsY.gif" style="border:0;" height="1" width="1" alt="Quantcast"/>
		</div>
		</noscript>
		<!-- End Quantcast Tag -->
	</body>
</html>
