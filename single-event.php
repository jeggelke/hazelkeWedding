<?php
/*
WP Post Template: SectionPost
*/

/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package hazelkeWedding
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container-fluid no-side-padding">
				<div class="row">
					<h1 class="text-center"><?php the_title(); ?></a></h1>
					<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
				<?php
				while ( have_posts() ) : the_post();

					echo get_the_content();
				endwhile; // End of the loop.
				?>
				</div>
			</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
