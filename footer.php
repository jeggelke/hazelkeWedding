<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hazelkeWedding
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer container-fluid" role="contentinfo">
		<div class="row social-footer">
			<div class="col-xs-12">
					<div class="col-xs-12 no-side-padding text-center">
						<a href="mailto:wedding@hazelke.com" target="blank">
								<i class="fa fa-envelope"></i>wedding@hazelke.com
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="site-info row">
			<div class="col-xs-12 text-center">
				<span>Hazelke &copy; <?php echo date("Y"); ?></span>
				<!-- <span class="sep"> | </span> -->
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
