<footer>
	<div id="address">
		<span>16 Beaver Street / 4th Floor / New York, New York 10004</span>
	</div>
</footer>

</div>

	<!-- this use for thre tiling of categories -->
	<script defer src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script defer src="<?php echo bloginfo('url')?>/wp-content/themes/homepage/assets/js/script.min.js"></script>

	<?php
/*
		$meta = get_post_meta(get_the_ID(), "background-color");
		if(count($meta) == 1) {
			 echo '<script defer>$("body").css("background-color","'. $meta[0]. '")</script>';
		}
*/
	?>
	<?php wp_footer(); ?>
</body>
</html>
