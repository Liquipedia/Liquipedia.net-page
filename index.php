<?php
$no_session = true;
require_once( __DIR__ . '/includes/wikis.php' );
require_once( __DIR__ . '/../config/db_config.php' );

$expire = gmdate( 'D, d M Y H:i:s \G\M\T', time() + 60 );

header( 'Content-Type: text/html; charset=utf-8' );
header( 'Cache-Control: s-maxage=60' );
header( 'Expires: ' . $expire );

// Preload / push key files
header( 'Link: </css/base.css>; as=style; rel=preload' );

$hot_links = [];

$pdo = null;
try {
	$pdo = new PDO( 'mysql:host=' . $server . ';dbname=liquid', $login, $pass, [ PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" ] );
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
	$page = $row[ 'page' ];
	$wiki = $row[ 'wiki' ];

	$url = "/$wiki/$page";

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

$allwikis = $wikis + $alphawikis;
ksort( $allwikis );
?>
<!DOCTYPE html>
<!-- Set one of the themes as default -->
<html lang="en" class="theme--light">
	<head>
        <script>
            /**
             * Quick check for dark theme
             */
            if ( window.localStorage.getItem( 'LiquipediaNetDarkMode' ) ) {
                document.documentElement.classList.remove( 'theme--light' );
                document.documentElement.classList.add( 'theme--dark' );
            }
        </script>
<!--
	************************************************
	*  _ _             _                _ _        *
	* | (_) __ _ _   _(_)_ __   ___  __| (_) __ _  *
	* | | |/ _` | | | | | '_ \ / _ \/ _` | |/ _` | *
	* | | | (_| | |_| | | |_) |  __/ (_| | | (_| | *
	* |_|_|\__, |\__,_|_| .__/ \___|\__,_|_|\__,_| *
	*         |_|       |_|                        *
	************************************************
-->
		<title>Liquipedia</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta charset="UTF-8" />
		<link href="./css/base.css" rel="stylesheet" type="text/css" />
		<meta name="description" content="The esports wiki, the best resource for live updated results, tournament overview, team and player profiles, game information, and more..." />
		<meta name="keywords" content="esports, wiki, liquipedia<?php echo $keywords; ?>" />
		<link href="/commons/extensions/SearchEngineOptimization/resources/images/favicon-32x32.png" rel="icon" type="image/png" sizes="32x32">
		<link href="/commons/extensions/SearchEngineOptimization/resources/images/favicon-16x16.png" rel="icon" type="image/png" sizes="16x16">
		<link href="/manifest.json" rel="manifest" />
		<link href="<?php echo $baseurl; ?>" rel="canonical" />
		<meta name="theme-color" content="#00162c" />
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
foreach ( $wikis + $alphawikis as $wiki_key => $wiki ) {
    echo "\t\t\t" . 'html.theme--light ' . '.' . $wiki_key . '-card .card__line, html.theme--light .' . $wiki_key .
    '-card .card__game-icon, ' . $wiki_key . '-card { background-color:' . $wiki[ 'theme-light' ] . " }\n";
    echo "\t\t\t" . 'html.theme--dark ' . '.' . $wiki_key . '-card .card__line, html.theme--dark .' . $wiki_key .
    '-card .card__game-icon, ' . $wiki_key . '-card { background-color:' . $wiki[ 'theme-dark' ] . " }\n";
}
?>
		</style>
		<script type="module" src="js/main.js"></script>
	</head>
	<body>
		<div class="top-nav">
            <div class="container">
                <ul class="top-nav__list">
                    <li>
                        <button type="button" class="top-nav__switch" data-component="theme-switch">
                            <span class="top-nav__switch-dark">Dark</span>
                            <span class="top-nav__switch-light">Light</span>
                            <span class="top-nav__switch-text">Theme</span>
                        </button>
                    </li>
                    <li><a href="https://tl.net/" rel="external noopener noreferrer" target="_blank">TLnet</a></li>
                </ul>
            </div>

		</div>
		<header class="header header--top">
            <div class="container">
                <svg class="header__logo logo" viewBox="0 0 2560 490" aria-labelledby="SVGLiquipediaLogo" role="img" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <title id="SVGLiquipediaLogo">Liquipedia logo</title>
                    <path d="M815.406 91.079h51.502v288.01h-51.502V91.079ZM922.207 96.094h51.502v49.199h-51.502v-49.2Zm0 85.251h51.502v197.744h-51.502V181.345ZM1157.9 356.455h-.81c-18.03 21.821-36.06 27.242-58.01 27.242-61.81 0-84.03-49.877-84.03-104.09 0-54.485 22.22-102.87 84.03-102.87 29.14 0 47.98 12.333 60.31 32.663h.81v-28.055h49.2v278.386h-51.5V356.455Zm-89.05-76.848c0 27.242 9.63 64.107 43.37 64.107 34.16 0 45.27-36.052 45.27-64.107 0-27.649-13.01-63.023-46.08-63.023-33.34.135-42.56 36.594-42.56 63.023ZM1444.01 379.089h-48.79v-26.836h-.81c-15.72 19.246-37.95 31.444-64.92 31.444-46.9 0-67.23-33.071-67.23-77.526V181.345h51.5v105.581c0 24.125.41 56.788 33.35 56.788 37.27 0 45.26-40.253 45.26-65.598v-96.771h51.51v197.744h.13ZM1498.09 96.094h51.5v49.199h-51.5v-49.2Zm0 85.251h51.5v197.744h-51.5V181.345ZM1603.67 181.345h49.2V209.4h.81c11.52-19.246 31.04-32.663 61.4-32.663 60.72 0 82.95 48.385 82.95 102.87 0 54.078-22.23 104.09-84.03 104.09-21.82 0-39.99-5.421-58.01-27.242h-.81v103.276h-51.51V181.345Zm51.91 98.262c0 28.055 11.12 64.107 45.27 64.107 33.75 0 43.37-36.865 43.37-64.107 0-26.429-9.22-63.023-42.56-63.023-33.07.135-46.08 35.374-46.08 63.023ZM1996.86 367.975c-18.84 10.301-40.26 15.722-67.91 15.722-65.32 0-103.27-37.678-103.27-102.464 0-57.195 30.36-104.496 91.75-104.496 73.33 0 94.06 50.283 94.06 119.405h-136.62c2.31 31.85 24.54 49.877 56.39 49.877 24.94 0 46.48-9.217 65.6-19.924v41.88Zm-34.57-107.207c-1.49-24.939-13.01-46.489-41.88-46.489-28.73 0-43.37 19.924-45.67 46.489h87.55ZM2183.49 356.861h-.82c-15.31 19.246-36.46 26.836-60.72 26.836-60.72 0-82.94-49.877-82.94-104.09 0-54.485 22.22-102.871 82.94-102.871 25.75 0 43.78 8.81 59.1 27.649h.81V91.079h51.5v288.01h-49.87v-22.228Zm-47.17-13.147c34.15 0 45.27-36.052 45.27-64.107 0-27.649-13.01-63.024-46.08-63.024-33.34 0-42.56 36.459-42.56 63.024 0 27.242 9.49 64.107 43.37 64.107ZM2287.58 96.094h51.5v49.199h-51.5v-49.2Zm0 85.251h51.5v197.744h-51.5V181.345ZM2401.97 191.781c19.92-9.217 46.89-14.909 68.71-14.909 60.31 0 85.25 24.938 85.25 83.353v25.345c0 19.924.41 34.968.82 49.47.4 14.909 1.08 28.733 2.3 44.184h-45.27c-1.9-10.301-1.9-23.447-2.3-29.546h-.82c-11.92 21.821-37.67 34.154-60.99 34.154-34.96 0-69.12-21.143-69.12-58.686 0-29.546 14.23-46.895 33.75-56.382 19.52-9.623 44.86-11.521 66.41-11.521h28.46c0-31.85-14.23-42.557-44.59-42.557-21.82 0-43.77 8.403-60.99 21.55l-1.62-44.455Zm60.31 154.237c15.72 0 28.05-6.912 36.05-17.619 8.4-11.114 10.71-25.345 10.71-40.66h-22.23c-23.04 0-57.2 3.795-57.2 34.154 0 16.942 14.24 24.125 32.67 24.125ZM515.469 0h-1.084c-6.099.678-129.435 12.198-148.139 18.162-8.267 2.575-21.414 9.758-15.722 29.275 1.898 6.506 10.03 20.601 17.349 33.206 1.084 1.897 2.033 3.524 2.575 4.472 14.502 25.481 9.894 43.642 4.201 56.654-11.385 26.158-36.187 35.509-55.704 35.509-11.521 0-22.905-3.117-31.851-8.674-27.92-17.484-37.814-41.744-30.359-74.137 3.795-17.484 5.286-30.088 4.472-38.627-.677-6.506-3.795-11.52-8.945-14.638-3.93-2.304-8.945-3.524-15.18-3.524-12.333 0-25.48 4.744-26.971 5.286L113.882 74.95c-3.388 1.084-5.964 3.253-7.454 6.1-.949 2.032-1.898 5.285-.407 9.622l25.616 76.848c5.828 17.348 4.201 24.803 1.897 28.055-1.897 2.711-5.828 4.067-11.384 4.067-1.356 0-2.711-.136-4.338-.272l-15.857-1.626-30.766-3.117c-1.898-.136-3.795-.271-5.693-.271-16.941 0-33.748 7.861-46.217 21.55C5.455 231.356-1.593 252.771.305 274.592c2.846 30.766 19.11 48.25 32.121 57.466 15.45 10.978 32.935 15.044 43.1 15.18h1.22c14.637 0 29.953-4.337 48.25-13.689 18.703-9.623 26.293-11.114 29.14-11.114h.542c10.436 1.085 10.165 23.177 10.165 23.312v.271l1.626 131.062v.542c1.084 8.538 7.048 11.52 11.927 11.52h1.084c6.099-.542 129.435-12.198 148.003-18.026 8.268-2.575 21.415-9.758 15.722-29.275-1.897-6.506-10.029-20.601-17.348-33.206-1.084-1.898-2.033-3.524-2.575-4.473-14.502-25.48-9.894-43.642-4.202-56.653 11.385-26.158 36.188-35.51 55.705-35.51 11.52 0 22.905 3.117 31.85 8.674 27.92 17.484 37.814 41.745 30.36 74.137-3.795 17.484-5.286 30.089-4.473 38.628.678 6.505 3.795 11.52 8.946 14.637 3.93 2.304 8.945 3.524 15.179 3.524 12.334 0 25.481-4.744 26.972-5.286l96.229-31.986c3.388-1.084 5.963-3.253 7.454-6.099.949-2.033 1.898-5.286.407-9.623l-25.616-76.847c-5.828-17.349-4.202-24.803-1.898-28.056 1.898-2.711 5.828-4.066 11.385-4.066 1.355 0 2.711.136 4.337.271l15.858 1.627 30.766 3.117c1.897.135 3.795.271 5.692.271 16.942 0 33.748-7.861 46.217-21.55 14.231-15.586 21.279-37.136 19.246-58.957-2.846-30.766-19.11-48.25-32.121-57.467-15.451-10.978-32.935-15.044-43.1-15.179h-1.22c-14.638 0-29.953 4.337-48.25 13.688-18.704 9.623-26.294 11.114-29.14 11.114h-.542c-10.436-1.084-10.165-23.176-10.165-23.312v-.271l-1.762-130.79v-.542C526.312 2.982 520.348 0 515.469 0Z" fill="currentColor" class="logo--color-bg"/>
                    <path d="M442.688 396.301c-.542 2.847-1.22 5.557-1.762 8.403 11.791.136 29.817-4.201 29.817-4.201l-26.022-33.07c1.084 9.487.135 19.245-2.033 28.868Z" fill="currentColor" class="logo--color-icon"/>
                    <path d="M337.92 443.739c-2.304-7.726-16.129-30.496-19.517-36.459-15.586-27.514-10.436-47.979-4.473-61.804 2.169-5.014 4.744-9.351 7.726-13.417-10.978-35.51-6.235-74.002-6.235-74.002 1.898 27.784 14.502 48.521 22.363 59.093 22.092-14.096 51.503-13.689 71.833-.949 21.686 13.689 31.851 30.495 34.561 48.386l51.91 22.227 30.631-45.404-84.574-127.673c-6.234-15.993-3.794-35.781-3.794-35.781-3.253-1.084-33.206-17.212-59.635-31.579-18.298 38.221-65.734 45.133-94.739 26.971-21.278-13.282-31.308-29.682-34.425-47.166-9.759 5.557-20.195 12.741-31.038 21.415-16.399-20.601-37.407-50.012-55.84-83.083l-46.759 15.587c-3.659 1.22-5.692 4.201-4.201 8.539 0 0 1.22 3.794 3.253 9.758 26.158 30.766 54.891 57.195 76.441 74.95-7.997 8.539-15.858 18.026-23.177 28.462a759.954 759.954 0 0 1-26.564-14.637c0 11.52-5.828 19.652-24.125 17.89-13.012-1.355-42.016-4.337-46.624-4.743-4.066-.407-7.997-.272-11.927.271 33.07 14.908 65.734 25.887 90.13 32.663-5.557 10.707-10.572 22.092-14.773 34.155-32.393-2.033-79.965-7.726-125.505-20.872a72.287 72.287 0 0 0-2.71 27.784c1.355 15.451 6.37 27.513 13.146 37.001 39.576.949 77.797-2.711 104.904-6.777-1.627 8.132-2.846 16.535-3.795 25.209.678-.406 1.355-.677 2.168-1.084 13.012-6.641 26.023-12.198 32.8-11.656 16.264 1.627 15.315 29.276 15.315 29.276l1.626 131.061c.949 7.319 6.777 6.506 6.777 6.506s128.757-12.063 146.919-17.891c16.264-5.015 13.418-17.077 11.927-22.227ZM487.414 341.41l17.619 4.744-22.769 4.202-10.301-18.84 15.451 9.894Zm-82.54-136.482 12.469 11.927s-14.773 6.099-21.144 2.033c-6.37-4.202-16.67-26.972-16.67-26.972l25.345 13.012Z" fill="currentColor" class="logo--color-icon"/>
                    <path d="M249.144 121.439c-.948-9.352 0-18.84 2.169-28.327 2.982-13.824 5.15-27.649 4.337-36.865-1.897-17.89-25.887-13.282-37.407-10.03 9.758 28.869 21.143 55.163 30.901 75.222Z" fill="currentColor" class="logo--color-icon"/>
                </svg>
                <h1 class="title title--display header__display">Made by the esports community for the esports community.</h1>
                <div class="search">
                    <form id="search" class="search__form" action="/dota2/index.php" data-component="search">
                        <div class="search__select-wrapper">
                            <label class="visually-hidden" for="searchWikiSelect">Select a Wiki to search</label>
                            <select id="searchWikiSelect" class="search__select" aria-label="Select a Wiki to search">
								<?php
								foreach ( $allwikis as $wiki_key => $wiki ) {
									echo '<option value="' . $wiki_key . '">' . $wiki[ 'name' ] . '</option>';
								}
								?>
                                <option value="commons">Commons</option>
                            </select>
                            <span class="search__select-icon" aria-hidden="true">
                                <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="m6.468 6.804 5.34-5.298a.644.644 0 0 0 .192-.46.644.644 0 0 0-.192-.46l-.393-.39a.661.661 0 0 0-.928 0L6.002 4.643 1.513.19A.655.655 0 0 0 1.05 0a.655.655 0 0 0-.464.19L.192.58A.644.644 0 0 0 0 1.04c0 .175.068.339.192.461l5.345 5.303c.124.123.29.19.465.19a.655.655 0 0 0 .466-.19Z" fill="currentColor"/></svg>
                            </span>
                        </div>
                        <label class="visually-hidden" for="searchWikiInput">Provide a search term</label>
                        <input id="searchWikiInput" class="search__input" aria-label="Search for" type="search" name="search" placeholder="What are you looking for?">
                        <button class="search__button btn" type="submit">
                            Search
                            <svg aria-hidden="true" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.147 9.494c1.959-2.712 1.304-6.467-1.463-8.387C6.918-.813 3.087-.172 1.13 2.54-.83 5.253-.175 9.008 2.592 10.928a6.24 6.24 0 0 0 6.667.27l4.525 4.41a1.303 1.303 0 0 0 1.816.046 1.242 1.242 0 0 0 0-1.826l-4.453-4.334Zm-5.013.411c-2.186 0-3.958-1.735-3.96-3.878 0-2.144 1.77-3.881 3.957-3.882 2.183 0 3.955 1.732 3.959 3.873.004 2.144-1.766 3.884-3.953 3.887h-.003Z" fill="currentColor"/></svg>
                        </button>
                    </form>
                </div>
            </div>
		</header>
        <main>
            <section class="section">
                <div class="container">
                    <div class="cards">
                        <?php foreach ( $wikis as $wiki_key => $wiki ) { ?>
                            <div data-component="card" class="card <?php echo $wiki_key; ?>-card">
                                <button class="card__button" type="button" data-component="card-button">
                                    <svg class="icon" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="m6.468 6.804 5.34-5.298a.644.644 0 0 0 .192-.46.644.644 0 0 0-.192-.46l-.393-.39a.661.661 0 0 0-.928 0L6.002 4.643 1.513.19A.655.655 0 0 0 1.05 0a.655.655 0 0 0-.464.19L.192.58A.644.644 0 0 0 0 1.04c0 .175.068.339.192.461l5.345 5.303c.124.123.29.19.465.19a.655.655 0 0 0 .466-.19Z" fill="currentColor"/></svg>
                                    <span class="visually-hidden">Toggle card content</span>
                                </button>
                                <h2 class="card__title">
                                    <?php if ( array_key_exists( 'new', $wiki ) && $wiki[ 'new' ] ) { ?>
                                        <span class="card__label">New</span>
                                    <?php } ?>
                                    <a class="card__title-link" href="<?php echo '/' . $wiki_key; ?>/Main_Page">
                                        <?php echo $wiki[ 'name' ]; ?>
                                    </a>
                                </h2>
                                <div class="card__image">
                                    <?php if ( file_exists( "images/wikis/" . $wiki_key . ".png" ) ) { ?>
                                        <img src="images/wikis/<?php echo $wiki_key; ?>.png" alt="<?php echo $wiki_key; ?> wiki" />
                                    <?php } ?>
                                </div>
                                <div class="card__game-icon">
                                    <svg class="icon" width="1000" height="1000" viewBox="0 0 1000 1000" >
                                        <use href="/images/game-icons/<?php echo $wiki_key ?>.svg#<?php echo $wiki_key ?>"
                                             fill="currentColor"/>
                                    </svg>
                                </div>
                                <div class="card__line"></div>
                                <ul id="<?php echo $wiki_key; ?>" class="card__list is--hidden" data-component="card-list">
                                    <?php
                                    if ( isset( $hot_links[ $wiki_key ] ) && is_array( $hot_links[ $wiki_key ] ) ) {
                                        foreach ( $hot_links[ $wiki_key ] as $hot_link ) {
                                            ?>
                                            <li class="card__list-item">
                                                <a class="card__list-link" href="<?php echo $hot_link[ 'href' ]; ?>" title="<?php echo htmlspecialchars( $hot_link[ 'title' ] ); ?>">
                                                    <?php echo htmlspecialchars( $hot_link[ 'title' ] ); ?>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <section class="section">
                <header class="header">
                    <div class="container container--header">
                        <h2 id="commons-wiki" class="header__title title title--headline">Commons Wiki</h2>
                        <p class="header__subtitle title title--subtitle">The commons wiki is a wiki used to help operate the other wikis</p>
                    </div>
                </header>
                <div class="container">
                    <p class="section__intro">The commons wiki is the file repository for all our wikis. Images and other files uploaded here can be used across all of the wikis. The same holds true for templates uploaded here.</p>
                    <ul class="commons-links">
                        <li><a href="/commons/Main_Page">Commons Wiki</a></li>
                        <li><a href="/commons/Special:Upload">File Upload</a></li>
                        <li><a href="/commons/Copyrights_Repository">Copyrights Repository</a></li>
                        <li><a href="/commons/Special:RunQuery/Find_images">Find Images</a></li>
                        <li><a href="/commons/Liquipedia:Latest_Uploads">Latest Uploads</a></li>
                    </ul>
                </div>
            </section>
            <section class="section alpha-wikis">
                <header class="header">
                    <div class="container container--header">
                        <h2 id="alpha-wiki" class="header__title title title--headline">Alpha Wiki</h2>
                        <p class="header__subtitle title title--subtitle">Alpha wikis are wikis that are still in the building process</p>
                    </div>
                </header>
                <div class="container">
                    <div class="section__intro">
                        <p>In addition to our standard wikis we are also allowing people to create new wikis that we host and help form. If you wish to start a wiki not listed below:</p>
                        <a class="btn mt-1" target="_blank" href="https://goo.gl/forms/kF0dCtJzHT">Fill in this form</a>
                    </div>
                    <div class="cards">
                        <?php foreach ( $alphawikis as $wiki_key => $wiki ) { ?>
                            <div data-component="card" class="card <?php echo $wiki_key; ?>-card">
                                <button class="card__button" type="button" data-component="card-button">
                                    <svg class="icon" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="m6.468 6.804 5.34-5.298a.644.644 0 0 0 .192-.46.644.644 0 0 0-.192-.46l-.393-.39a.661.661 0 0 0-.928 0L6.002 4.643 1.513.19A.655.655 0 0 0 1.05 0a.655.655 0 0 0-.464.19L.192.58A.644.644 0 0 0 0 1.04c0 .175.068.339.192.461l5.345 5.303c.124.123.29.19.465.19a.655.655 0 0 0 .466-.19Z" fill="currentColor"/></svg>
                                    <span class="visually-hidden">Toggle card content</span>
                                </button>
                                <h2 class="card__title">
                                    <?php if ( array_key_exists( 'new', $wiki ) && $wiki[ 'new' ] ) { ?>
                                        <span class="card__label">New</span>
                                    <?php } ?>
                                    <a class="card__title-link" href="<?php echo '/' . $wiki_key; ?>/Main_Page">
                                        <?php echo $wiki[ 'name' ]; ?>
                                    </a>
                                </h2>
                                <div class="card__image">
                                    <?php if ( file_exists( "images/wikis/" . $wiki_key . ".png" ) ) { ?>
                                        <img src="images/wikis/<?php echo $wiki_key; ?>.png" alt="<?php echo $wiki_key; ?> wiki" />
                                    <?php } ?>
                                </div>
                                <div class="card__game-icon">
                                    <svg class="icon" width="1000" height="1000" viewBox="0 0 1000 1000" >
                                        <use href="/images/game-icons/<?php echo $wiki_key ?>.svg#<?php echo $wiki_key ?>"
                                             fill="currentColor"/>
                                    </svg>
                                </div>
                                <div class="card__line"></div>

                                <ul id="<?php echo $wiki_key; ?>" class="card__list is--hidden" data-component="card-list">
                                    <?php
                                    if ( isset( $hot_links[ $wiki_key ] ) && is_array( $hot_links[ $wiki_key ] ) ) {
                                        foreach ( $hot_links[ $wiki_key ] as $hot_link ) {
                                            ?>
                                            <li class="card__list-item">
                                                <a class="card__list-link" href="<?php echo $hot_link[ 'href' ]; ?>" title="<?php echo htmlspecialchars( $hot_link[ 'title' ] ); ?>">
                                                    <?php echo htmlspecialchars( $hot_link[ 'title' ] ); ?>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <section class="section">
                <header class="header">
                    <div class="container container--header">
                        <h2 id="how-to-contribute" class="header__title title title--headline">How To Contribute</h2>
                        <p class="header__subtitle title title--subtitle">It's easy, fun, and rewarding to help esports</p>
                    </div>
                </header>
                <div class="container">
                    <div class="contribution-content">
                        <h3 class="contribution-content__title title title--heading">Contributing</h3>
                        <p>Contributing to the wiki is actually pretty easy and keep in mind that every more-correct-than-wrong contribution is valuable no matter how small. </p>
                        <p>When you visit Liquipedia, consider adding to it or correcting something, it doesn't have to take up much of your time and effort and it will help other visitors like yourself and Liquipedia as a whole.</p>
                        <p>Many people start by fixing typos, which is actually the easiest way to contribute. You just have to create an account&mdash;if you don't have one already&mdash;log in, click edit, find and fix the typo, click save, and you are done.</p>
                        <p>Another thing that many contributors start with is keeping tournament results up to date while the tournament is ongoing. Most of the times the pages are already set up by one of the more experienced contributors, and you just have to fill in the results as they happen. Filling a bracket is pretty straightforward. You log in, click on edit, find the bracket, update scores and fill in names. If you are unsure, just look at how it was done on other pages, either by just looking at the page itself, or by clicking edit to examine how the page was created. In general, looking at how things are done on other pages gives you a good idea of how you can do it yourself. </p>
                        <p>If you feel comfortable with wiki editing or if you want to learn things that are more advanced, feel free to browse our &quot;How to contribute&quot; sections you can find in the menus on the left of the wiki pages. You can <a rel="noopener" href="https://discord.gg/liquipedia" target="_blank">find us on our Discord server</a> where other contributors can help you.</p>
                        <h3 class="contribution-content__title title title--heading">Logging in and registering</h3>
                        <p>To log in and edit Liquipedia you need a TeamLiquid account. To register an account, click on the &quot;<a href="https://tl.net/mytlnet/register" target="_blank">create account</a>&quot; link on any wiki page, just remember to follow the instructions and complete the registration. Once you have an account go click on the log in box in the top right and enter your details or if logged in on any of the three sites mentioned just click on the TL quick log in link. </p>
                        <h3 class="contribution-content__title title title--heading">Editing</h3>
                        <p>There are two types of edit links. One is a tab at the top of the page which lets you edit all sections of the page at once. The second is on the far right side of all sub-headers, this allows you to edit the specific section you are on. When editing a page you will have some tools in a toolbar above the editing box to help you with the markup language that the wiki uses for things like bold text, italics, headers, and links. To know more about the wiki markup language visit <a rel="noopener" href="https://en.wikipedia.org/wiki/Help:Wiki_markup" target="_blank">Wikipedia's Help: Wiki markup</a>.</p>
                        <h3 class="contribution-content__title title title--heading">Areas to help out with</h3>
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
                            <li>Help other contributors in our <a href="https://discord.gg/liquipedia" target="_blank">Discord server</a>, especially newer ones.</li>
                            <li>Spread the word that everyone can help grow Liquipedia.</li>
                            <li>Give us <a href="https://tl.net/forum/website-feedback/94785-liquipedia-feedback-thread" target="_blank">new ideas</a> of what we can do, even a paint scribble can help improving the wikis, if it gives us an idea of how a template could look.</li>
                            <li>Correct people when they call us &quot;LiquiDpedia&quot; with one d too many. Liquids flow and pronouncing Liquipedia flows easier than LiquiDpedia.</li>
                        </ul>
                    </div>
                </div>
            </section>
        </main>
        <footer class="footer">
            <div class="container">
                <svg class="footer__logo logo" viewBox="0 0 2560 490" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M815.406 91.079h51.502v288.01h-51.502V91.079ZM922.207 96.094h51.502v49.199h-51.502v-49.2Zm0 85.251h51.502v197.744h-51.502V181.345ZM1157.9 356.455h-.81c-18.03 21.821-36.06 27.242-58.01 27.242-61.81 0-84.03-49.877-84.03-104.09 0-54.485 22.22-102.87 84.03-102.87 29.14 0 47.98 12.333 60.31 32.663h.81v-28.055h49.2v278.386h-51.5V356.455Zm-89.05-76.848c0 27.242 9.63 64.107 43.37 64.107 34.16 0 45.27-36.052 45.27-64.107 0-27.649-13.01-63.023-46.08-63.023-33.34.135-42.56 36.594-42.56 63.023ZM1444.01 379.089h-48.79v-26.836h-.81c-15.72 19.246-37.95 31.444-64.92 31.444-46.9 0-67.23-33.071-67.23-77.526V181.345h51.5v105.581c0 24.125.41 56.788 33.35 56.788 37.27 0 45.26-40.253 45.26-65.598v-96.771h51.51v197.744h.13ZM1498.09 96.094h51.5v49.199h-51.5v-49.2Zm0 85.251h51.5v197.744h-51.5V181.345ZM1603.67 181.345h49.2V209.4h.81c11.52-19.246 31.04-32.663 61.4-32.663 60.72 0 82.95 48.385 82.95 102.87 0 54.078-22.23 104.09-84.03 104.09-21.82 0-39.99-5.421-58.01-27.242h-.81v103.276h-51.51V181.345Zm51.91 98.262c0 28.055 11.12 64.107 45.27 64.107 33.75 0 43.37-36.865 43.37-64.107 0-26.429-9.22-63.023-42.56-63.023-33.07.135-46.08 35.374-46.08 63.023ZM1996.86 367.975c-18.84 10.301-40.26 15.722-67.91 15.722-65.32 0-103.27-37.678-103.27-102.464 0-57.195 30.36-104.496 91.75-104.496 73.33 0 94.06 50.283 94.06 119.405h-136.62c2.31 31.85 24.54 49.877 56.39 49.877 24.94 0 46.48-9.217 65.6-19.924v41.88Zm-34.57-107.207c-1.49-24.939-13.01-46.489-41.88-46.489-28.73 0-43.37 19.924-45.67 46.489h87.55ZM2183.49 356.861h-.82c-15.31 19.246-36.46 26.836-60.72 26.836-60.72 0-82.94-49.877-82.94-104.09 0-54.485 22.22-102.871 82.94-102.871 25.75 0 43.78 8.81 59.1 27.649h.81V91.079h51.5v288.01h-49.87v-22.228Zm-47.17-13.147c34.15 0 45.27-36.052 45.27-64.107 0-27.649-13.01-63.024-46.08-63.024-33.34 0-42.56 36.459-42.56 63.024 0 27.242 9.49 64.107 43.37 64.107ZM2287.58 96.094h51.5v49.199h-51.5v-49.2Zm0 85.251h51.5v197.744h-51.5V181.345ZM2401.97 191.781c19.92-9.217 46.89-14.909 68.71-14.909 60.31 0 85.25 24.938 85.25 83.353v25.345c0 19.924.41 34.968.82 49.47.4 14.909 1.08 28.733 2.3 44.184h-45.27c-1.9-10.301-1.9-23.447-2.3-29.546h-.82c-11.92 21.821-37.67 34.154-60.99 34.154-34.96 0-69.12-21.143-69.12-58.686 0-29.546 14.23-46.895 33.75-56.382 19.52-9.623 44.86-11.521 66.41-11.521h28.46c0-31.85-14.23-42.557-44.59-42.557-21.82 0-43.77 8.403-60.99 21.55l-1.62-44.455Zm60.31 154.237c15.72 0 28.05-6.912 36.05-17.619 8.4-11.114 10.71-25.345 10.71-40.66h-22.23c-23.04 0-57.2 3.795-57.2 34.154 0 16.942 14.24 24.125 32.67 24.125ZM515.469 0h-1.084c-6.099.678-129.435 12.198-148.139 18.162-8.267 2.575-21.414 9.758-15.722 29.275 1.898 6.506 10.03 20.601 17.349 33.206 1.084 1.897 2.033 3.524 2.575 4.472 14.502 25.481 9.894 43.642 4.201 56.654-11.385 26.158-36.187 35.509-55.704 35.509-11.521 0-22.905-3.117-31.851-8.674-27.92-17.484-37.814-41.744-30.359-74.137 3.795-17.484 5.286-30.088 4.472-38.627-.677-6.506-3.795-11.52-8.945-14.638-3.93-2.304-8.945-3.524-15.18-3.524-12.333 0-25.48 4.744-26.971 5.286L113.882 74.95c-3.388 1.084-5.964 3.253-7.454 6.1-.949 2.032-1.898 5.285-.407 9.622l25.616 76.848c5.828 17.348 4.201 24.803 1.897 28.055-1.897 2.711-5.828 4.067-11.384 4.067-1.356 0-2.711-.136-4.338-.272l-15.857-1.626-30.766-3.117c-1.898-.136-3.795-.271-5.693-.271-16.941 0-33.748 7.861-46.217 21.55C5.455 231.356-1.593 252.771.305 274.592c2.846 30.766 19.11 48.25 32.121 57.466 15.45 10.978 32.935 15.044 43.1 15.18h1.22c14.637 0 29.953-4.337 48.25-13.689 18.703-9.623 26.293-11.114 29.14-11.114h.542c10.436 1.085 10.165 23.177 10.165 23.312v.271l1.626 131.062v.542c1.084 8.538 7.048 11.52 11.927 11.52h1.084c6.099-.542 129.435-12.198 148.003-18.026 8.268-2.575 21.415-9.758 15.722-29.275-1.897-6.506-10.029-20.601-17.348-33.206-1.084-1.898-2.033-3.524-2.575-4.473-14.502-25.48-9.894-43.642-4.202-56.653 11.385-26.158 36.188-35.51 55.705-35.51 11.52 0 22.905 3.117 31.85 8.674 27.92 17.484 37.814 41.745 30.36 74.137-3.795 17.484-5.286 30.089-4.473 38.628.678 6.505 3.795 11.52 8.946 14.637 3.93 2.304 8.945 3.524 15.179 3.524 12.334 0 25.481-4.744 26.972-5.286l96.229-31.986c3.388-1.084 5.963-3.253 7.454-6.099.949-2.033 1.898-5.286.407-9.623l-25.616-76.847c-5.828-17.349-4.202-24.803-1.898-28.056 1.898-2.711 5.828-4.066 11.385-4.066 1.355 0 2.711.136 4.337.271l15.858 1.627 30.766 3.117c1.897.135 3.795.271 5.692.271 16.942 0 33.748-7.861 46.217-21.55 14.231-15.586 21.279-37.136 19.246-58.957-2.846-30.766-19.11-48.25-32.121-57.467-15.451-10.978-32.935-15.044-43.1-15.179h-1.22c-14.638 0-29.953 4.337-48.25 13.688-18.704 9.623-26.294 11.114-29.14 11.114h-.542c-10.436-1.084-10.165-23.176-10.165-23.312v-.271l-1.762-130.79v-.542C526.312 2.982 520.348 0 515.469 0Z" fill="currentColor" class="logo--color-bg"/>
                    <path d="M442.688 396.301c-.542 2.847-1.22 5.557-1.762 8.403 11.791.136 29.817-4.201 29.817-4.201l-26.022-33.07c1.084 9.487.135 19.245-2.033 28.868Z" fill="currentColor" class="logo--color-icon"/>
                    <path d="M337.92 443.739c-2.304-7.726-16.129-30.496-19.517-36.459-15.586-27.514-10.436-47.979-4.473-61.804 2.169-5.014 4.744-9.351 7.726-13.417-10.978-35.51-6.235-74.002-6.235-74.002 1.898 27.784 14.502 48.521 22.363 59.093 22.092-14.096 51.503-13.689 71.833-.949 21.686 13.689 31.851 30.495 34.561 48.386l51.91 22.227 30.631-45.404-84.574-127.673c-6.234-15.993-3.794-35.781-3.794-35.781-3.253-1.084-33.206-17.212-59.635-31.579-18.298 38.221-65.734 45.133-94.739 26.971-21.278-13.282-31.308-29.682-34.425-47.166-9.759 5.557-20.195 12.741-31.038 21.415-16.399-20.601-37.407-50.012-55.84-83.083l-46.759 15.587c-3.659 1.22-5.692 4.201-4.201 8.539 0 0 1.22 3.794 3.253 9.758 26.158 30.766 54.891 57.195 76.441 74.95-7.997 8.539-15.858 18.026-23.177 28.462a759.954 759.954 0 0 1-26.564-14.637c0 11.52-5.828 19.652-24.125 17.89-13.012-1.355-42.016-4.337-46.624-4.743-4.066-.407-7.997-.272-11.927.271 33.07 14.908 65.734 25.887 90.13 32.663-5.557 10.707-10.572 22.092-14.773 34.155-32.393-2.033-79.965-7.726-125.505-20.872a72.287 72.287 0 0 0-2.71 27.784c1.355 15.451 6.37 27.513 13.146 37.001 39.576.949 77.797-2.711 104.904-6.777-1.627 8.132-2.846 16.535-3.795 25.209.678-.406 1.355-.677 2.168-1.084 13.012-6.641 26.023-12.198 32.8-11.656 16.264 1.627 15.315 29.276 15.315 29.276l1.626 131.061c.949 7.319 6.777 6.506 6.777 6.506s128.757-12.063 146.919-17.891c16.264-5.015 13.418-17.077 11.927-22.227ZM487.414 341.41l17.619 4.744-22.769 4.202-10.301-18.84 15.451 9.894Zm-82.54-136.482 12.469 11.927s-14.773 6.099-21.144 2.033c-6.37-4.202-16.67-26.972-16.67-26.972l25.345 13.012Z" fill="currentColor" class="logo--color-icon"/>
                    <path d="M249.144 121.439c-.948-9.352 0-18.84 2.169-28.327 2.982-13.824 5.15-27.649 4.337-36.865-1.897-17.89-25.887-13.282-37.407-10.03 9.758 28.869 21.143 55.163 30.901 75.222Z" fill="currentColor" class="logo--color-icon"/>
                </svg>
                <div class="footer__group">
                    <ul class="footer__links">
                        <li><a href="mailto:contact@liquipedia.net">Send an email</a></li>
                        <li><a href="https://discord.gg/liquipedia" target="_blank">Chat with us</a></li>
                        <li><a href="/commons/Contact">Contact</a></li>
                        <li><a href="/commons/Liquipedia:Privacy_policy" class="mw-redirect" title="Liquipedia:Privacy policy">Privacy policy</a></li>
                    </ul>
                    <ul class="footer__social">
                        <li>
                            <a aria-label="Discord" rel="noopener" href="https://discord.gg/liquipedia" target="_blank">
                                <svg width="21" height="24" viewBox="0 0 21 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.328 10.068c-.684 0-1.224.6-1.224 1.332 0 .732.552 1.332 1.224 1.332.684 0 1.224-.6 1.224-1.332.012-.732-.54-1.332-1.224-1.332zm4.38 0c-.684 0-1.224.6-1.224 1.332 0 .732.552 1.332 1.224 1.332.684 0 1.224-.6 1.224-1.332 0-.732-.54-1.332-1.224-1.332z" fill="currentColor"/><path d="M18.54 0H2.46A2.466 2.466 0 000 2.472v16.224a2.466 2.466 0 002.46 2.472h13.608l-.636-2.22 1.536 1.428 1.452 1.344L21 24V2.472A2.466 2.466 0 0018.54 0zm-4.632 15.672s-.432-.516-.792-.972c1.572-.444 2.172-1.428 2.172-1.428-.492.324-.96.552-1.38.708-.6.252-1.176.42-1.74.516a8.406 8.406 0 01-3.108-.012 10.073 10.073 0 01-1.764-.516 7.032 7.032 0 01-.876-.408c-.036-.024-.072-.036-.108-.06a.166.166 0 01-.048-.036 4.21 4.21 0 01-.336-.204s.576.96 2.1 1.416c-.36.456-.804.996-.804.996-2.652-.084-3.66-1.824-3.66-1.824 0-3.864 1.728-6.996 1.728-6.996 1.728-1.296 3.372-1.26 3.372-1.26l.12.144c-2.16.624-3.156 1.572-3.156 1.572s.264-.144.708-.348c1.284-.564 2.304-.72 2.724-.756.072-.012.132-.024.204-.024A9.782 9.782 0 0115.3 7.308s-.948-.9-2.988-1.524l.168-.192s1.644-.036 3.372 1.26c0 0 1.728 3.132 1.728 6.996 0 0-1.02 1.74-3.672 1.824z" fill="currentColor"/></svg>
                            </a>
                        </li>
                        <li>
                            <a aria-label="Twitter" rel="noopener" href="https://twitter.com/LiquipediaNet" target="_blank">
                                <svg width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.53 19.515c9.063 0 14.018-7.51 14.018-14.018 0-.215 0-.43-.01-.634A10.093 10.093 0 0024 2.31a10 10 0 01-2.83.777A4.924 4.924 0 0023.336.358c-.95.562-2.003.97-3.127 1.195A4.903 4.903 0 0016.613 0a4.927 4.927 0 00-4.925 4.925c0 .388.041.766.133 1.124A13.976 13.976 0 011.665.899a4.942 4.942 0 00-.664 2.473c0 1.706.869 3.218 2.197 4.097a4.84 4.84 0 01-2.227-.613v.061a4.932 4.932 0 003.954 4.833 4.91 4.91 0 01-1.298.173c-.317 0-.623-.03-.93-.092a4.92 4.92 0 004.598 3.423A9.904 9.904 0 010 17.287a13.726 13.726 0 007.53 2.228z" fill="currentColor"/></svg>
                            </a>
                        </li>
                        <li>
                            <a aria-label="Facebook" rel="noopener" href="https://www.facebook.com/Liquipedia" target="_blank">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M24 12C24 5.37188 18.6281 0 12 0C5.37188 0 0 5.37188 0 12C0 18.6281 5.37188 24 12 24C12.0703 24 12.1406 24 12.2109 23.9953V14.6578H9.63281V11.6531H12.2109V9.44062C12.2109 6.87656 13.7766 5.47969 16.0641 5.47969C17.1609 5.47969 18.1031 5.55938 18.375 5.59688V8.27813H16.8C15.5578 8.27813 15.3141 8.86875 15.3141 9.73594V11.6484H18.2906L17.9016 14.6531H15.3141V23.5359C20.3297 22.0969 24 17.4797 24 12Z" fill="currentColor"/></svg>
                            </a>
                        </li>
                        <li>
                            <a aria-label="YouTube" rel="noopener" href="https://www.youtube.com/user/Liquipedia" target="_blank">
                                <svg width="24" height="17" viewBox="0 0 24 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M23.506 2.63A3.007 3.007 0 0021.39.513C19.512 0 12 0 12 0S4.488 0 2.61.494A3.068 3.068 0 00.493 2.63C0 4.507 0 8.402 0 8.402s0 3.914.494 5.772A3.007 3.007 0 002.61 16.29c1.897.514 9.39.514 9.39.514s7.512 0 9.39-.494a3.007 3.007 0 002.116-2.116C24 12.316 24 8.422 24 8.422s.02-3.915-.494-5.793zM9.608 12V4.804l6.247 3.598L9.608 12z" fill="currentColor"/></svg>
                            </a>
                        </li>
                        <li>
                            <a aria-label="Twitch" rel="noopener" href="https://www.twitch.tv/liquipedia" target="_blank">
                                <svg width="21" height="24" viewBox="0 0 21 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.302 0L0 4.286v15.428h5.163V24l4.302-4.286h3.442L20.651 12V0H4.302zM18.93 11.143l-3.442 3.428h-3.441l-3.012 3v-3H5.163V1.714H18.93v9.429z" fill="currentColor"/><path d="M16.349 4.714h-1.721v5.143h1.72V4.714zM11.616 4.714h-1.72v5.143h1.72V4.714z" fill="currentColor"/></svg>
                            </a>
                        </li>
                        <li>
                            <a aria-label="GitHub" rel="noopener" href="https://github.com/Liquipedia" target="_blank">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.998 0C5.373 0 0 5.394 0 12.048c0 5.322 3.438 9.837 8.208 11.432.6.11.819-.262.819-.581 0-.287-.01-1.044-.016-2.049-3.338.727-4.043-1.616-4.043-1.616-.545-1.392-1.332-1.762-1.332-1.762-1.09-.747.081-.732.081-.732 1.204.086 1.837 1.242 1.837 1.242 1.071 1.84 2.81 1.31 3.494 1 .108-.778.418-1.309.762-1.61-2.664-.305-5.466-1.338-5.466-5.954 0-1.316.468-2.391 1.236-3.234-.125-.304-.535-1.53.117-3.187 0 0 1.008-.324 3.3 1.234.957-.267 1.983-.4 3.005-.405 1.018.006 2.045.138 3.004.407 2.29-1.559 3.297-1.235 3.297-1.235.654 1.659.243 2.883.12 3.187.77.843 1.233 1.919 1.233 3.234 0 4.628-2.805 5.646-5.478 5.945.43.372.814 1.107.814 2.23 0 1.611-.015 2.91-.015 3.305 0 .322.216.697.825.579A12.048 12.048 0 0024 12.048C24 5.394 18.627 0 11.998 0z" fill="currentColor"/></svg>
                            </a>
                        </li>
                    </ul>
                </div>
                <p class="footer__text">Text is licensed under <a rel="noopener" href="https://creativecommons.org/licenses/by-sa/3.0/" target="_blank">CC BY-SA</a>. Files have varied licenses. Click on an image to see the image's page for more details.</p>
            </div>
            </footer>


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
                const selectWikiElement = document.getElementById( 'searchWikiSelect' );
                const searchElement = document.getElementById( 'search' );
				if ( 'localStorage' in window ) {
					if ( localStorage[ 'lastWikiSearch' ] === undefined ) {
						localStorage[ 'lastWikiSearch' ] = '<?php echo array_keys( $wikis )[ 0 ]; ?>';
					}
                    selectWikiElement.value = localStorage[ 'lastWikiSearch' ];
                    searchElement.action = '/' + localStorage[ 'lastWikiSearch' ] + '/index.php';
                    selectWikiElement.onchange = function() {
						localStorage[ 'lastWikiSearch' ] = this.value;
                        searchElement.action = '/' + this.value + '/index.php';
					};
				} else {
					if ( !document.cookie.includes( 'liquipedia_last_wiki_search' ) ) {
						document.cookie = 'liquipedia_last_wiki_search=<?php echo array_keys( $wikis )[ 0 ]; ?>';
					}
					var startwiki = document.cookie.replace( /(?:(?:^|.*;\s*)liquipedia_last_wiki_search\s*\=\s*([^;]*).*$)|^.*$/, "$1" );
                    selectWikiElement.value = startwiki;
                    searchElement.action = '/' + startwiki + '/index.php';
                    selectWikiElement.onchange = function() {
						document.cookie = 'liquipedia_last_wiki_search=' + this.value;
                        searchElement.action = '/' + this.value + '/index.php';
					};
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
