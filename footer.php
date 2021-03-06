	<?php global $img_folder; ?>
	<footer class="pri-footer">

	<div class="pri-footer__association pri-footer__col">
		<a href="https://studieverenigingid.nl/" target="_blank">
			<picture>
				<source srcset="<?=$img_folder?>logo-payoff.svg" type="image/svg+xml">
					<img class="pri-footer__logo" alt="ID"
					srcset="<?=$img_folder?>logo-payoff.png 1x,
					<?=$img_folder?>logo-payoff@2x.png 2x"
					src="<?=$img_folder?>logo-payoff.png">
			</picture>
		</a>
		<p class="pri-footer__paragraph">
			<strong class="pri-footer__name">ID study association</strong><br>
			Landbergstraat 15<br>
			2628 CE Delft<br>
			Netherlands<br>
			<a class="pri-footer__link"
			href="tel:0031152783012">+31 (0) 15 278 3012</a><br>
			<a class="pri-footer__link"
			href="mailto:svid@tudelft.nl">svid@tudelft.nl</a><br>
		</p>
		<p class="pri-footer__paragraph pri-footer__paragraph--small">
			Built by <a class="pri-footer__link" href="http://nilswesthoff.com" target="_blank">Nils Westhoff</a>
		</p>
	</div>

	<div class="pri-footer__sitemap pri-footer__col">
		<h2 class="pri-footer__heading">Sitemap</h2>
		<?php wp_nav_menu( array(
			'theme_location' => 'sitemap',
			'container' => 'nav',
			'container_class' => 'sitemap',
			'menu_class' => 'sitemap__list',
			'walker' => new Walker_Sitemap() ) ); ?>
	</div>

	<div class="pri-footer__paragraph pri-footer__col">
		<h2 class="pri-footer__heading">Social media</h2>
		<div>
			<?php include 'inc/social-buttons.php';?>
		</div>
	</div>

	</footer>

	<?php wp_footer(); ?>

	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	</body>
</html>
