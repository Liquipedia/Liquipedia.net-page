<?php
require_once( 'includes/wikis.php' );

if ( isset( $_GET[ 'action' ] ) ) {
	$action = htmlspecialchars( $_GET[ 'action' ] );
} else {
	$action = null;
}
if ( $action == 'listwikis' ) {
	header( 'Content-Type: application/json' );

	$return = [];

	$return[ 'baseurl' ] = $baseurl;
	$return[ 'wikis' ] = $wikis;
	$return[ 'alphawikis' ] = $alphawikis;
	$return[ 'miscwikis' ] = $miscwikis;
	$return[ 'otherwikis' ] = $otherwikis;
	$return[ 'allwikis' ] = array_merge( $wikis, $alphawikis, $miscwikis, $otherwikis );

	echo json_encode( $return );
} else {
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
		join us on discord (https://liquipedia.net/discord), or send us an email to
		contact <at> liquipedia <dot> net!
	-->
	<html lang="en">
		<head>
			<title>Liquipedia API</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		</head>
		<body>
			<?php
			echo '<h1>Liquipedia API</h1>';
			echo '<p>Please keep the <a target="_blank" href="https://liquipedia.net/api-terms-of-use">API guidelines</a> in mind.</p>';
			echo '<p>The wiki APIs are at:</p>';
			echo '<ul>';
			foreach ( $wikis as $wiki_key => $wiki ) {
				echo '<li>' . $wiki[ 'name' ] . ': <a target="_blank" href="' . $wiki[ 'api' ] . '">' . $wiki[ 'api' ] . '</a></li>';
			}
			foreach ( $alphawikis as $wiki_key => $wiki ) {
				echo '<li>' . $wiki[ 'name' ] . ': <a target="_blank" href="' . $wiki[ 'api' ] . '">' . $wiki[ 'api' ] . '</a></li>';
			}
			foreach ( $miscwikis as $wiki_key => $wiki ) {
				echo '<li>' . $wiki[ 'name' ] . ': <a target="_blank" href="' . $wiki[ 'api' ] . '">' . $wiki[ 'api' ] . '</a></li>';
			}
			echo '</ul>';
			?>
			<p>Parameters to this api:</p>
			<ul>
				<li><strong>action</strong>: accepts "<a href="api.php?action=listwikis">listwikis</a>"</li>
			</ul>
		</body>
	</html>
	<?php
}
