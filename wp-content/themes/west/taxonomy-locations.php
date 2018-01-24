<?php

get_header(); ?>
	<div id="primary" class="content-area fullwidth">
		<main id="main" class="site-main" role="main">
			<div id="dslc-content" class="dslc-content dslc-clearfix">
				<div id="dslc-main">
		         <div class="dslc-modules-section dslc-no-columns-spacing outer-wrapper" style="background-color:rgb(71, 71, 71);padding-bottom:35px;padding-top:35px;" data-section-id="">
		<div class="dslc-modules-section-wrapper">
		<?php if ( have_posts() ) : ?>

			    <div class="cat-title"><h1>Caravans For Sale <?php echo single_cat_title(); ?></h1></div>
                 <?php
                   // vars
					$queried_object = get_queried_object(); 
					$taxonomy = $queried_object->taxonomy;
					$term_id = $queried_object->term_id;  
					$location_title_post = get_field('location_title_post', $taxonomy . '_' . $term_id);
					$address_location_post = get_field('address_location_post', $taxonomy . '_' . $term_id);
					$location_phone_post = get_field('location_phone_post', $taxonomy . '_' . $term_id);
					$location_mobile_post = get_field('location_mobile_post', $taxonomy . '_' . $term_id);
					$location_fax_post = get_field('location_fax_post', $taxonomy . '_' . $term_id);
					$location_email_post = get_field('location_email_post', $taxonomy . '_' . $term_id);
					$map_location_post = get_field('map_location_post', $taxonomy . '_' . $term_id);
					?>
			    <div class="address-bar">
			    	<div class="dslc-text-module-content">
			    		<div class="col-xs-12 col-sm-6 col-md-6">
				    		<address class="address-inner-pages">
								<?php if(!empty($location_title_post)){ ?>
								    <h3><?php echo $location_title_post; ?></h3>
								<?php } ?>
								<?php if(!empty($address_location_post)) { echo $address_location_post; } ?><br>
								<?php if(!empty($location_phone_post)) {?>
								Phone: <a href="tel:<?php echo $location_phone_post; ?>"><?php echo $location_phone_post; ?></a><br>
								<?php } ?>
								<?php if(!empty($location_mobile_post)) {?>
								Mob: <a href="tel:<?php echo $location_mobile_post; ?>"><?php echo $location_mobile_post; ?></a><br>
								<?php } ?>
								<?php if(!empty($location_fax_post)) {?>
								Fax: <a href="fax:<?php echo $location_fax_post; ?>"><?php echo $location_fax_post; ?></a><br>
								<?php } ?>
								<?php if(!empty($location_email_post)) {?>
								Email: <a href="mailto:<?php echo $location_email_post; ?>"><?php echo $location_email_post; ?></a>
								<?php } ?>
							</address>
							<a href="#" class="trigger-popup btn btn-default btn-block">Enquire Now</a></div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 map-area">
							<div class="google-map">
								<?php if(!empty($map_location_post)){ echo $map_location_post; } ?>
							</div>
						</div>
			    </div>
			<div class="blog-listing-wrapper">
			<div class="posts-layout">
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" class="col-xs-12 col-sm-6 col-md-6 post-wrapper">
						
							<?php if ( has_post_thumbnail() && ( get_theme_mod( 'index_feat_image' ) != 1 ) ) : ?>
								<div class="col-xs-12 col-sm-12 col-md-12 entry-thumb">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('west-small-thumb'); ?></a>
								</div>
							<?php endif; ?>


							<div class="col-xs-12 col-sm-12 col-md-12 inner-content">
								<header class="entry-header">
									<?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
								</header><!-- .entry-header -->

								<?php if(get_field('post_price')): echo '<p class="price">$' . get_field('post_price') . ' ' . get_field('orc_field') . '</p>' ; endif; ?>

							</div>

					</article><!-- #post-## -->

			<?php endwhile; ?>
			</div>

			<?php // the_posts_navigation(); ?>

			<?php the_posts_pagination( array(
			    'mid_size' => 2,
			    'prev_text' => __( 'Previous', 'textdomain' ),
			    'next_text' => __( 'Next', 'textdomain' ),
			) ); ?>
		</div>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
			</div>
         </div>
     </div>
 </div>
		</main><!-- #main -->
		
		<?php
			$enquire_popup = get_field('enquire_popup', $taxonomy . '_' . $term_id);
		?>
		<?php if(!empty($enquire_popup)){ ?>
		    <div class="enquire-popup">
				<a class="close-btninner" href="#">x</a>
				<div style="display:none;" class="sucess">
					<h1>Thank you for your enquiry, I’,ll be in contact soon</h1>
				</div>
		    	<?php echo do_shortcode($enquire_popup) ; ?>
	    	</div>
		<?php } ?>

	</div><!-- #primary -->
<?php get_footer(); ?>
