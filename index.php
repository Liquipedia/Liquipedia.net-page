<?php
$no_session = true;
require_once ($_SERVER['DOCUMENT_ROOT'] . '/../public_html/includes/connect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/../public_html/includes/functions.php');

$expire = gmdate ('D, d M Y H:i:s \G\M\T', time() + 60);

header ("Content-Type: text/html; charset=utf-8");
header ("Cache-Control: s-maxage=60");
header ("Expires: $expire");

$hot_links = array ();

$r = mysql_queryS ("SELECT * FROM wiki_hot ORDER BY hits DESC");
while ($row = mysql_fetch_assoc ($r))
{
	$title = $row['title'];
	$url = $row['page'];

	if (preg_match ("/^http:\/\/wiki\.teamliquid\.net\/(starcraft2|dota2|starcraft|hearthstone|heroes|smash|counterstrike|overwatch)\/(.+)$/", $url, $m))
	{
		$title = str_replace ("_", " ", $title);

		if (count ($hot_links[$m[1]]) < 5)
		{
			$hot_links[$m[1]][] = array (
				'title' => $title,
				'href' => $url
			);
		}
	}
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
	If you want to help, be sure to visit us on our IRC channel #liquipedia on QuakeNet, 
	or send us an email to liquipedia <at> teamliquid <dot> net!
-->
<html>
	<head>
		<title>Liquipedia</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta name="description" content="The esports wiki, the best resource for live updated results, tournament overview, team and player profiles, game information, and more…" />
		<meta name="keywords" content="esports, wiki, StarCraft, StarCraft 2, Brood War, Dota 2, Hearthstone, Heroes of the Storm, Super Smash Brothers, Counter-Strike, Overwatch" />
		<link href="style.css" rel="stylesheet" type="text/css" />
		<link href="//fonts.googleapis.com/css?family=Roboto:400|Roboto:300" rel="stylesheet" type="text/css" />
		<link href="/favicon.ico" rel="icon" /> 
	</head>

	<body>
		<div class="global-nav">
			<span><a href="https://www.teamliquidpro.com/">TeamLiquidPro</a></span>
			<span><a href="http://www.liquidlegends.net/">LiquidLegends</a></span>
			<span><a href="http://www.liquidhearth.com/">LiquidHearth</a></span>
			<span><a href="http://www.liquiddota.com/">LiquidDota</a></span>
			<span><a href="http://www.teamliquid.net">TeamLiquid</a></span>
		</div>
		<div class="top">
			<h1>TeamLiquid welcomes you to the esports wiki</h1>
			<div id="logo"><img src="lp-logo-bg.png" alt="liquipedia" /></div>
			<h2>Made by the esports community for the esports community. <span id="full-intro"> The best resource for live updated results, tournament overview, team &amp; player profiles, game information, and more&hellip;</span></h2>
			<form id="search" class="search" action="/dota2/index.php">
				<select onchange="document.getElementById('search').action = '/' + this.value + '/index.php';">
					<option value="dota2" selected="selected">Dota 2</option>
					<option value="starcraft2">StarCraft II</option>
					<option value="counterstrike">Counter-Strike</option>
					<option value="hearthstone">Hearthstone</option>
					<option value="starcraft">Brood War</option>
					<option value="smash">Smash</option>
					<option value="heroes">Heroes</option>
					<option value="overwatch">Overwatch</option>
					<option value="commons">Commons</option>
				</select><!--
				--><input type="search" name="search" placeholder="Search..."><!--
				--><button type="submit">Search</button>
			</form>
		</div>
		<div class="whitebox">
			<div class="box-wrap">
				<div class="dota2-box game-box">
					<input type="checkbox" class="toggle-button" id="toggle-dota2" />
					<label for="toggle-dota2" class="toggle-button-label" id="toggle-dota2-label"></label>
					<div class="wiki-header"><a href="http://wiki.teamliquid.net/dota2/Main_Page">Dota 2</a></div>
					<p id="dota2">
						<?php foreach ($hot_links['dota2'] as $h) { ?>
							<a href="<?=$h['href']?>"><?=$h['title']?></a><br />
						<?php } ?>
					 </p>
				</div>
				<div class="starcraft2-box game-box">
					<input type="checkbox" class="toggle-button" id="toggle-starcraft2" />
					<label for="toggle-starcraft2" class="toggle-button-label" id="toggle-starcraft2-label"></label>
					<div class="wiki-header"><a href="http://wiki.teamliquid.net/starcraft2/Main_Page">StarCraft II</a></div>
					<p id="starcraft2">
						<?php foreach ($hot_links['starcraft2'] as $h) { ?>
							<a href="<?=$h['href']?>"><?=$h['title']?></a><br />
						<?php } ?>
					</p>
				</div>
				<div class="counterstrike-box game-box">
					<input type="checkbox" class="toggle-button" id="toggle-counterstrike" />
					<label for="toggle-counterstrike" class="toggle-button-label" id="toggle-counterstrike-label"></label>
					<div class="wiki-header"><a href="http://wiki.teamliquid.net/counterstrike/Main_Page">Counter-Strike</a></div>
					<p id="counterstrike">
						<?php foreach ($hot_links['counterstrike'] as $h) { ?>
							<a href="<?=$h['href']?>"><?=$h['title']?></a><br />
						<?php } ?>
					</p>
				</div>
				<div class="hearthstone-box game-box">
					<input type="checkbox" class="toggle-button" id="toggle-hearthstone" />
					<label for="toggle-hearthstone" class="toggle-button-label" id="toggle-hearthstone-label"></label>
					<div class="wiki-header"><a href="http://wiki.teamliquid.net/hearthstone/Main_Page">Hearthstone</a></div>
					<p id="hearthstone">
						<?php foreach ($hot_links['hearthstone'] as $h) { ?>
							<a href="<?=$h['href']?>"><?=$h['title']?></a><br />
						<?php } ?>
					</p>
				</div>
				<div class="starcraft-box game-box">
					<input type="checkbox" class="toggle-button" id="toggle-starcraft" />
					<label for="toggle-starcraft" class="toggle-button-label" id="toggle-starcraft-label"></label>
					<div class="wiki-header"><a href="http://wiki.teamliquid.net/starcraft/Main_Page">Brood War</a></div>
					<p id="starcraft">
						<?php foreach ($hot_links['starcraft'] as $h) { ?>
							<a href="<?=$h['href']?>"><?=$h['title']?></a><br />
						<?php } ?>
					</p>
				</div>
				<div class="smash-box game-box">
					<input type="checkbox" class="toggle-button" id="toggle-smash" />
					<label for="toggle-smash" class="toggle-button-label" id="toggle-smash-label"></label>
					<div class="wiki-header"><a href="http://wiki.teamliquid.net/smash/Main_Page">Smash</a></div>
					<p id="smash">
						<?php foreach ($hot_links['smash'] as $h) { ?>
							<a href="<?=$h['href']?>"><?=$h['title']?></a><br />
						<?php } ?>
					</p>
				</div>
				<div class="heroes-box game-box">
					<input type="checkbox" class="toggle-button" id="toggle-heroes" />
					<label for="toggle-heroes" class="toggle-button-label" id="toggle-heroes-label"></label>
					<div class="wiki-header"><a href="http://wiki.teamliquid.net/heroes/Main_Page">Heroes</a></div>
					<p id="heroes">
						<?php foreach ($hot_links['heroes'] as $h) { ?>
							<a href="<?=$h['href']?>"><?=$h['title']?></a><br />
						<?php } ?>
					</p>
				</div>
				<div class="overwatch-box game-box">
					<input type="checkbox" class="toggle-button" id="toggle-overwatch" />
					<label for="toggle-overwatch" class="toggle-button-label" id="toggle-overwatch-label"></label>
					<div class="wiki-header"><a href="http://wiki.teamliquid.net/overwatch/Main_Page">Overwatch</a></div>
					<p id="overwatch">
						<?php foreach ($hot_links['overwatch'] as $h) { ?>
							<a href="<?=$h['href']?>"><?=$h['title']?></a><br />
						<?php } ?>
					</p>
				</div>
			</div>
		</div>
		<h1>Other wikis</h1>
		<div class="whitebox">
			<div class="content other-wikis">
				<div class="other-wikis-left">
					<h3>Commons Wiki</h3>
					<p>This is the file repository for all our wikis, to add an image this is where you upload it and then you can use it on any of the wikis.</p>
					<ul>
						<li><a href="http://wiki.teamliquid.net/commons/Main_Page">Commons Wiki</a></li>
						<li><a href="http://wiki.teamliquid.net/commons/Special:Upload">File Upload</a></li>
						<li><a href="http://wiki.teamliquid.net/commons/Copyrights_Repository">Copyrights Repository</a></li>
						<li><a href="http://wiki.teamliquid.net/commons/Special:RunQuery/Find_images">Find Images</a></li>
						<li><a href="http://wiki.teamliquid.net/commons/Liquipedia:Latest_Uploads">Latest Uploads</a></li>
					</ul>
				</div>
				<div class="other-wikis-right">
					<h3>Alpha Wikis</h3>
					<p>In addition to our standard wikis we are also allowing people to create new wikis that we host and help form. If you wish to start a wiki not listed below, fill in <a target="_blank" href="http://goo.gl/forms/kF0dCtJzHT">this form</a>.</p>
					<ul>
						<li><a href="http://wiki.teamliquid.net/warcraft/Main_Page">Warcraft III</a></li>
					</ul>
				</div>
			</div>
		</div>
		<h1>How To Contribute</h1>
		<h2>It's easy, fun, and rewarding to help esports</h2>
		<div class="whitebox">
			<div class="content how-to">
				<p>Contributing to the wiki is actually pretty easy and keep in mind that every more-correct-than-wrong contribution is valuable no matter how small. </p>
				<p>When you visit Liquipedia, consider adding to it or correcting something, it doesn’t have to take up much of your time and effort and it will help other visitors like yourself and Liquipedia as a whole.</p>
				<p>Many people start by fixing typos, which is actually the easiest way to contribute. You just have to create an account—if you don’t have one already—log in, click edit, find and fix the typo, click save, and you are done.</p>
				<p>Another thing that many contributors start with is keeping tournament results up to date while the tournament is ongoing. Most of the times the pages are already set up by one of the more experienced contributors, and you just have to fill in the results as they happen. Filling a bracket is pretty straightforward. You log in, click on edit, find the bracket, update scores and fill in names. If you are unsure, just look at how it was done on other pages, either by just looking at the page itself, or by clicking edit to examine how the page was created. In general, looking at how things are done on other pages gives you a good idea of how you can do it yourself. </p>
				<p>If you feel comfortable with wiki editing or if you want to learn things that are more advanced, feel free to browse our “How to contribute” sections you can find in the menus on the left of the wiki pages. You can find us in our IRC channel where other contributors can help you. <a href="http://webchat.quakenet.org/?channels=#liquipedia" target="_blank">#liquipedia on QuakeNet</a>.</p>
				<h3>Logging in and registering</h3>
				<p>To log in and edit Liquipedia you need a TeamLiquid account. To register an account, click on the “<a href="http://www.teamliquid.net/mytlnet/register" target="_blank">create account</a>” link on any wiki page, just remember to follow the instructions and complete the registration.<br />
				Once you have an account go click on the log in box in the top right and enter your details or if logged in on any of the three sites mentioned just click on the TL quick log in link. </p>
				<h3>Editing</h3>
				<p>There are two types of edit links. One is a tab at the top of the page which lets you edit all sections of the page at once. The second is on the far right side of all sub-headers, this allows you to edit the specific section you are on. <br />
				When editing a page you will have some tools in a toolbar above the editing box to help you with the markup language that the wiki uses for things like bold text, italics, headers, and links. To know more about the wiki markup language visit <a href="http://en.wikipedia.org/wiki/Help:Wiki_markup" target="_blank">Wikipedia's Help: Wiki markup</a>.</p>
				<h3>Areas to help out with</h3>
				<p>There are multiple things one can do to help out with on the wikis. Besides fixing typos or entering results you can:</p>
				<ul>
					<li>List an interview a player has done on the player’s page.</li>
					<li>Add social media links on a team’s or player’s page.</li>
					<li>Fill out a player’s page with information from interviews they’ve done and add references.</li>
					<li>Write part of the history of an organization, tournament, player, or team and add references.</li>
					<li>Update a player’s or team’s result pages with recent results.</li>
					<li>Add the times when a match starts to brackets or groups.</li>
					<li>Add general game information, either to an existing article or make a new one for a topic that is missing.</li>
					<li>Update strategy pages and create pages for new strategies.</li>
					<li>Create new pages for tournaments, players, or teams (if they meet the liquipedia notability guidelines for that game.)</li>
					<li>Give the wiki the right to display your photographs and upload them to the wiki.</li>
					<li>Develop new templates to make our wikis look good and make contributing easier.</li>
					<li>Use knowledge of PHP, JS, CSS, HTML, or graphic design to improve on any element that you find the wikis are lacking in.</li>
					<li>Help other contributors in our IRC channel, especially newer ones.</li>
					<li>Spread the word that everyone can help grow Liquipedia.</li>
					<li>Give us <a href="http://www.teamliquid.net/forum/website-feedback/94785-liquipedia-feedback-thread" target="_blank">new ideas</a> of what we can do, even a paint scribble can help improving the wikis, if it gives us an idea of how a template could look.</li>
					<li>Correct people when they call us “LiquiDpedia” with one d too many. Liquids flow and pronouncing Liquipedia flows easier than LiquiDpedia.</li>
				</ul>
			</div>
		</div>
		<div class="footer">
			<div class="content">
				<div class="icon-list">
					<a href="https://twitter.com/LiquipediaNet" target="_blank"><i class="lp-icon lp-twitter"></i></a>
					<a href="https://www.facebook.com/Liquipedia" target="_blank"><i class="lp-icon lp-facebook"></i></a>
					<a href="https://www.youtube.com/user/Liquipedia" target="_blank"><i class="lp-icon lp-youtube"></i></a>
					<a href="http://www.twitch.tv/liquipedia" target="_blank"><i class="lp-icon lp-twitch"></i></a>
					<a href="http://www.github.com/Liquipedia" target="_blank"><i class="lp-icon lp-github"></i></a>
				</div>
				<div class="disclaimer">
					<p>Text is licensed under <a href="http://creativecommons.org/licenses/by-sa/3.0/" target="_blank">CC-BY-SA</a>.<br />Images have varied licenses. Click on an image to see the image's page for more details.</p>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-576564-4']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
		<!-- Quantcast Tag -->
		<script type="text/javascript">
			var _qevents = _qevents || [];

			(function() {
				var elem = document.createElement('script');
				elem.src = (document.location.protocol == "https:" ? "https://secure" : "http://edge") + ".quantserve.com/quant.js";
				elem.async = true;
				elem.type = "text/javascript";
				var scpt = document.getElementsByTagName('script')[0];
				scpt.parentNode.insertBefore(elem, scpt);
			})();

			_qevents.push({
				qacct:"p-c4R4Uj3EI2IsY"
			});
		</script>
		<noscript>
			<div style="display:none;">
				<img src="//pixel.quantserve.com/pixel/p-c4R4Uj3EI2IsY.gif" style="border:0;" height="1" width="1" alt="Quantcast"/>
			</div>
		</noscript>
		<!-- End Quantcast tag -->
	</body>
</html>
