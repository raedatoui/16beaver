<?php
/*
Template Name: Home Page */
?>
<?php
global $is_home;
$is_home = true;
get_header();
$articles = wpmu_latest_post_links("/articles/",4,365);
$journalisms = wpmu_latest_post_links("/journalisms/",1,1000);
$mondays = wpmu_latest_post_links("/mondays/",1,365);

?>
<div id="main" role="main">
<div class="content last">
	<div class="grid_1 col1">
		<h2><div class="thin_rule"><a href="<?=bloginfo('url')?>/about"><span>About</span></a><br><span class="caption">The space + people</span></div></h2>

		<h2><div class="thin_rule"><a href="<?=bloginfo('url')?>/contact"><span>Contact</span></a><br><span class="caption">How to get in touch</span></div></h2>

		<h2><div class="thin_rule"><a href="<?=bloginfo('url')?>/subscribe"><span>Subscribe</span></a><br><span class="caption">Subscribe to our mailing lists</span></div></h2>

		<h2><div class="thin_rule"><a href="<?=bloginfo('url')?>/about/#directions"><span>Directions</span></a><br><span class="caption">How to get to 16 Beaver</span></div></h2>

		<h2><div class="thin_rule"><a href="#"><span>Events Calendar</span></a><br><span class="caption">Openings, rallies, screenings</span></div></h2>

		<h2><div class="thin_rule"><a href="#"><span>C.Cartograph Links</span><br><span class="caption">Spaces, artist groups, collectives, network</span></div></h2>

	</div>

	<div class="grid_1 col">
		<h2>Recent Articles</h2>
		<?php
		foreach($articles as $article) { ?>
		<h3><div class="thin_rule"><a href="<?= $article->post_url?>"><?= $article->post_title?></a></div></h3>
		<? } ?>
<!--
		<h3><div class="thin_rule"><a href="#">Slavoj Zizek: "Neoliberalism is in Crisis"</a></div></h3>
		<h3><div class="thin_rule"><a href="#">Rene  &#8212;  A revolution against neoliberalism?</a></div></h3>
		<h3><div class="thin_rule"><a href="#">Independent  &#8212;  The US bank and the secret plan to destroy WikiLeaks</a></div></h3>
-->
		<div class="spacer"></div>

		<h2>Journalisms</h2>
		<?php
		foreach($journalisms as $article) { ?>
		<h3><div class="thin_rule"><a href="<?= $article->post_url?>"><?= $article->post_title?></a></div></h3>
		<? } ?>
		<div class="spacer"></div>

		<h2>Upcoming</h2>
		<?php
		foreach($mondays as $article) { ?>
		<h3><div class="thin_rule"><a href="<?= $article->post_url?>"><?= $article->post_title?></a></div></h3>
		<? } ?>

	</div>

	<div class="grid_1 col">
		<h2>Seminars</h2>
		<h3><div class="thin_rule"><a href="#">Beyond Good and Evil Commons</a><br><span class="date">Aug. 18-20, 2011</span></div></h3>
		<h3><div class="thin_rule"><a href="#">Something Becomes Visible</a></div></h3>
		<h3><div class="thin_rule"><a href="#">Connective Mutations</a></div></h3>
		<h3><div class="thin_rule"><a href="#">Continental Drift</a></div></h3>
		<div class="spacer"></div>

		<h2>Film/discussion programs</h2>
		<h3><div class="thin_rule"><a href="#">US Social Forum</a></div></h3>
		<h3><div class="thin_rule"><a href="#">Continental Drift</a></div></h3>
		<h3><div class="thin_rule"><a href="#">How occupation works</a></div></h3>
		<div class="spacer"></div>

		<h2>Projects</h2>
		<h3><div class="thin_rule"><span class="date">seoul & gwangju</span><br><a href="#">Between us</a></div></h3>
		<h3><div class="thin_rule"><span class="date">london</span><br><a href="#">C of the Willing</a></div></h3>
		<h3><div class="thin_rule"><span class="date">baltimore</span><br><a href="#">Patriot</a><br><a href="#">counter-campus</a></div></h3>
	</div>

	<div class="grid_1 col">
		<h3><div class="thin_rule"><span class="date">sydney</span><br><a href="#">There Goes the Neighborhood</a></div></h3>
		<h3><div class="thin_rule"><span class="date">denmark</span><br><a href="#">Divided States</a></div></h3>
		<h3><div class="thin_rule"><span class="date">mit</span><br><a href="#">Teach-In</a></div></h3>
		<h3><div class="thin_rule"><span class="date">singapore</span><br><a href="#">Home Fronts</a></div></h3>
		<h3><div class="thin_rule"><span class="date">mass mOca</span><br><a href="#">The Interventionists</a></div></h3>

		<h3><div class="thin_rule"><span class="date">sydney</span><br><a href="#">24/7</a></div></h3>
		<h3><div class="thin_rule"><span class="date">weimar/leipzig</span><br><a href="#">Get rid of yourself</a></div></h3>
		<h3><div class="thin_rule"><span class="date">vienna</span><br><a href="#">intorno</a></div></h3>

		<div class="spacer"></div>

		<h3><div class="thin_rule"><a href="#">radioactive</a></div></h3>
		<h3><div class="thin_rule"><a href="#">operation how</a></div></h3>
		<h3><div class="thin_rule"><a href="#">lunchtime summit</a></div></h3>
	</div>
	</div>
</div>

<?php get_footer(); ?>
