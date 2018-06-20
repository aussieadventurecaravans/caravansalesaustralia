<?php

/*

Template Name: Contact Us

*/
	get_header();
?>

	<div id="primary" class="content-area fullwidth">
		<main id="main" class="site-main" role="main">



            <?php echo do_shortcode('[wpsl template="default" map_type="roadmap" auto_locate="true" start_marker="red" store_marker="blue"]'); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php

					if ( comments_open() || '0' != get_comments_number() ) :

						comments_template();

					endif;
				?>

			<?php endwhile; // end of the loop. ?>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

