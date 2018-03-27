<footer role="complimentary">
	<div class="footer-content">
		<div class="footer-block">
			<div class="footer-group">
			<a href="<?php echo $baseurl; ?>">
				<svg class="footer-logo" viewBox="0 0 128 116.18">
					<use xlink:href="<?php echo $baseurl; ?>/images/logo_vert.svg#brand"/>
				</svg>
				<span class="screen-reader-text">Go To Liquipedia Homepage</span>
			</a>
		</div><!--
		--><div class="footer-group">
				<h1 id="primary-wikis">Wikis</h1>
				<ul class="display-list" aria-labeledby="primary-wikis">
					<?php foreach( $wikis as $wiki_key => $wiki ) { ?>
						<li><a href="<?php echo $baseurl; ?>/<?php echo $wiki_key; ?>/Main_Page"><?php echo $wiki['name']; ?></a></li>
					<?php } ?>
						<li><a href="<?php echo $baseurl; ?>/commons/Main_Page">Commons</a></li>
				</ul>
			</div><!--
			--><div class="footer-group">
				<h1 id="alpha-wikis">Alpha Wikis</h1>
				<ul class="display-list" aria-labeledby="alpha-wikis">
					<?php foreach( $alphawikis as $wiki_key => $wiki ) { ?>
						<li><a href="<?php echo $baseurl; ?>/<?php echo $wiki_key; ?>/Main_Page"><?php echo $wiki['name']; ?></a></li>
					<?php } ?>
				</ul>
			</div><!--
			--><div class="footer-group">
				<h1 id="affiliates">Affiliate Sites</h1>
				<ul class="display-list" aria-labeledby="affiliates">
					<li><a href="https://www.teamliquidpro.com/" target="_blank" rel="noopener noreferrer">TeamLiquidPro.com</a></li>
					<li><a href="http://www.teamliquid.net" target="_blank" rel="noopener noreferrer">TeamLiquid.net</a></li>
					<li><a href="https://www.liquiddota.com/" target="_blank" rel="noopener noreferrer">LiquidDota.com</a></li>
					<li><a href="https://www.liquidhearth.com/" target="_blank" rel="noopener noreferrer">LiquidHearth.com</a></li>
					<li><a href="http://www.liquidlegends.net/" target="_blank" rel="noopener noreferrer">LiquidLegends.net</a></li>
				</ul>
			</div><!--
			--><div class="footer-group">
				<h1 id="about-us">Liquipedia</h1>
				<ul class="display-list" aria-labeledby="about-us">
					<li id="footer-places-about"><a href="<?php echo $baseurl; ?>/counterstrike/Liquipedia:About" title="Liquipedia:About">About</a></li>
					<li><a href="<?php echo $baseurl; ?>/discord" target="_blank" rel="noopener noreferrer">Chat with Us</a></li>
					<li id="footer-places-disclaimer"><a href="<?php echo $baseurl; ?>/counterstrike/Liquipedia:General_disclaimer" title="Liquipedia:General disclaimer">Disclaimers</a></li>
					<li id="footer-places-privacy"><a href="<?php echo $baseurl; ?>/counterstrike/Liquipedia:Privacy_policy" title="Liquipedia:Privacy policy">Privacy policy</a></li>
					<li><a href="http://www.teamliquid.net/forum/website-feedback/94785-liquipedia-feedback-thread">Post Feedback</a></li>
					<li><a href="mailto:liquipedia@teamliquid.net">Send us an Email</a></li>
				</ul>
			</div><!--
			--><div class="footer-group">
				<h1 id="social-media">Connect With Us</h1>
				<ul class="display-list" aria-labeledby="social-media">
					<li><a href="https://www.facebook.com/Liquipedia" target="_blank" rel="noopener noreferrer">Facebook</a></li>
					<li><a href="https://github.com/Liquipedia" target="_blank" rel="noopener noreferrer">GitHub</a></li>
					<li><a href="https://www.twitch.tv/liquipedia" target="_blank" rel="noopener noreferrer">Twitch</a></li>
					<li><a href="https://twitter.com/LiquipediaNet" target="_blank" rel="noopener noreferrer">Twitter</a></li>
					<li><a href="https://www.youtube.com/user/Liquipedia" target="_blank" rel="noopener noreferrer">YouTube</a></li>
				</ul>
			</div>
		</div>
		<div class="footer-block">
			<p>Text/code is available under the license <a class="footer-link" href="<?php echo $baseurl; ?>/dota2/Liquipedia:Copyrights" title="Liquipedia:Copyrights">CC BY-SA</a>. Licenses for other media varies.</p>
		</div>
	</div>
</footer>