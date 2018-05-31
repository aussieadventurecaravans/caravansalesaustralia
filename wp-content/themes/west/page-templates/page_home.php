<?php


/*
Template Name: Homepage
*/

get_header(); ?>

	<div id="primary" class="fullwidth">
		<main id="main" class="site-main" role="main">
            <div class="custom-banner-section">


                <div class="banner-section-wrapper dslc-clearfix">
                    <div class="banner-section-area" data-size="12">
                        <div id="dslc-module-14" class=" banner-section-module" data-module-id="14" data-dslc-module-id="DSLC_Text_Simple" data-dslc-module-size="12" data-dslc-anim="none" data-dslc-anim-delay="" data-dslc-anim-duration="650" data-dslc-anim-easing="ease" data-dslc-preset="none" style="animation: forwards 0.65s ease none;">
                            <div class="banner-content">
                                <h1>DOWNUNDER RV <br/>
                                    AUSTRALIA</h1>
                                <h2>New Caravans Sales Australia Wide</h2>
                            </div>
                        </div><!-- .dslc-module -->

                        <div id="dslc-module-27" class="banner-section-module" data-module-id="27" data-dslc-module-id="DSLC_Button" data-dslc-module-size="12" data-dslc-anim="none" data-dslc-anim-delay="" data-dslc-anim-duration="650" data-dslc-anim-easing="ease" data-dslc-preset="none" style="animation: forwards 0.65s ease none;">
                            <div class="view-range-button">
                                <a href="/range/" target="_self" onclick="" class="">
                                    VIEW CARAVAN RANGE
                                </a>
                            </div><!-- .dslc-button -->
                        </div><!-- .dslc-module -->

                    </div>
                </div>
            </div>


			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

