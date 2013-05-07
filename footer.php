<footer>
	<div id="address">
		<span>16 Beaver Street</span><br>
		<span>4th Floor</span><br>
		<span>New York, NY 10004</span>
	</div>
</footer>

</div>

	<!-- this use for thre tiling of categories -->
	<script defer src="<?=bloginfo('url')?>/wp-content/themes/homepage/js/libs/jquery.masonry.min.js"></script>
	<script defer src="<?=bloginfo('url')?>/wp-content/themes/homepage/js/script.js"></script>


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