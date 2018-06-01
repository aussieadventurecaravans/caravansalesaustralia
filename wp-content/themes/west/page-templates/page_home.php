<?php


/*
Template Name: Homepage
*/

get_header(); ?>

	<div id="primary" class="fullwidth">
		<main id="main" class="site-main" role="main">
            <div class="custom-banner-section">
                <div class="banner-section-wrapper">
                    <div class="banner-section-area">
                        <div class=" banner-section-module">
                            <div class="banner-content">
                                <h1>DOWNUNDER RV <br/>
                                    AUSTRALIA</h1>
                                <h2>New Caravans Sales Australia Wide</h2>
                            </div>
                        </div>

                        <div class="banner-section-module">
                            <div class="view-range-button">
                                <a href="/range/" target="_self" onclick="" class="">
                                    VIEW CARAVAN RANGE
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="banner-image-section-wrapper">
                    <img class="banner-image" src="/wp-content/themes/west/images/CaravanPerthSale5.jpg" alt="background image"/>
                </div>
            </div>


            <div class="custom-banner-mobile-section">
                <div class="banner-section-area">
                    <div class=" banner-section-module">
                        <div class="banner-content">
                            <h1>DOWNUNDER RV
                                AUSTRALIA</h1>
                            <h2>New Caravans Sales Australia Wide</h2>
                        </div>
                    </div>

                    <div class="banner-section-module">
                        <div class="view-range-button">
                            <a href="/range/" target="_self" onclick="" class="">
                                VIEW CARAVAN RANGE
                            </a>
                        </div>
                    </div>
                </div>
            </div>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>

		</main>
	</div>

<?php get_footer(); ?>

