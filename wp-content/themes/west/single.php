<?php
/**
 * The template for displaying all single posts.
 *
 * @package West
 */

get_header(); 
//Acf
$mandurah_rv = get_field( "mandurah_rv" );
$mandurah_enquire_link = get_field( "mandurah_enquire_link" );
$post_price = get_field( "post_price" );
$orc_field = get_field( "orc_field" );
?>

	<div id="primary" class="container">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			<?php //get_template_part( 'template-parts/content', 'single' ); ?>
			<article id="post-<?php the_ID(); ?>" <?php //post_class(); ?>>

				<div class="post-title-thumb-header">
					<div class="col-xs-12 col-sm-12 col-md-12 post-heading-block">
						<header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							<h3 class="price"><?php if(!empty($post_price)) { echo '$'. $post_price; }
                                  if(!empty($orc_field)) { echo ' '.$orc_field; }
							 ?></h3>

							 <div class="post-thumbnail-block pull-right">
								<?php if ( has_post_thumbnail() && ( get_theme_mod( 'post_feat_image' ) != 1 ) ) : ?>
									<div class="single-thumb">
										<?php the_post_thumbnail('west-large-thumb'); ?>
									</div>
								<?php endif; ?>
							</div>

							<div class="availability-block">
								<h3>Available at</h3>
								<?php
								     $arts = wp_get_post_terms(get_the_ID(),'locations', array("fields" => "all"));
								?>
								<div class="row">
									<?php foreach ($arts as $ar) { ?>
										 <div class="col-xs-12 col-sm-6 col-md-6 block-left">
											<?php if(!empty($ar->name)){ ?>
											<a href="<?php echo get_site_url().'/locations/'.$ar->slug; ?>">Downunder RV <?php echo $ar->name; ?></a>
											<?php } ?>
											<a data-ps='<?php echo $ar->name.'-s'; ?>' href="#" class="<?php echo $ar->slug; ?>open popen btn btn-default btn-block">Enquire Now</a>
									     </div>
									<?php } ?>
								</div>
							</div>
						</header><!-- .entry-header -->

						<div class="singlePost-content">
							<?php if(get_the_content()): echo get_the_content(); endif; ?>
							<?php
								if(get_field('intro_text')):
									echo '<div class="text top">' . get_field('intro_text') . '</div>';
								endif;

								if(have_rows('accordion')): $i=0;
									echo '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
									while(have_rows('accordion')): the_row(); ?>
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="heading<?php echo $i; ?>">
												<h4 class="panel-title">
													<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
														<?php the_sub_field('title'); ?>
													</a>
												</h4>
											</div>
											<div id="collapse<?php echo $i; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $i; ?>">
												<div class="panel-body">
													<?php the_sub_field('content'); ?>
												</div>
											</div>
										</div>
									<?php $i++;
									endwhile;

									echo '</div>';
								endif;

								if(get_field('floorplan')):
									$floorplan = get_field('floorplan');
									echo '<img class="floorplan" src="' . $floorplan['sizes']['large'] . '">';
								endif;

								if(get_field('intro_text')):
									echo '<div class="text bottom">' . get_field('bottom_text') . '</div>';
								endif;
							?>
						</div>
					</div>

                </div>

                <div class="clearfix"></div>

                <div class="single-post-content-wrap">
					<div class="entry-content">
						<?php the_content(); ?>

					</div><!-- .entry-content -->
				</div>

				<?php if (get_theme_mod('hide_meta_single') != 1 ): ?>
				<footer class="entry-footer">
					<?php west_entry_footer(); ?>
				</footer><!-- .entry-footer -->
				<?php endif; ?>
			</article><!-- #post-## -->

			<?php the_post_navigation(); ?>


		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php if ( get_theme_mod('fullwidth_single', 0) != 1 ): ?>
	<?php //get_sidebar(); ?>
<?php endif; ?>
<?php get_footer(); ?>
<div class="geraldtonpop newp" style="display: none;">
<a class="close-btn" href="#">x</a>
<div style="display:none;" class="sucess">
	<h1>Thank you for your enquiry, we'll be in contact soon</h1>
</div>
<?php
 $artr = wp_get_post_terms(get_the_ID(),'locations', array("fields" => "all"));
 foreach ($artr as $strs) {

  $enquire_popup = get_field('enquire_popup', 'locations_' . $strs->term_id);
  echo '<div style="display:none;" class="'.$strs->name.'-s">'.do_shortcode($enquire_popup).'</div>';
}

?>
</div>