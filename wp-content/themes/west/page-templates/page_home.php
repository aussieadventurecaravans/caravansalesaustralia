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
            <div class="custom-service-section " style="background-color:#0393dd;padding-bottom:35px;padding-top:35px;">
                <div class="custom-service-section-wrapper">
                    <div class="service-section first-col">
                        <div class="service-section-detail" style="animation: forwards 0.65s ease none;">
                            <div class="dslc-image-container">
                                <div class="dslc-image">
                                    <a class="" href="<?php site_url(); ?>/all-caravans/" target="_self">
                                        <img src="<?php site_url(); ?>/wp-content/uploads/2018/05/Downunder-RV-Icons-White-03-80x80.png" alt="" title="">
                                    </a>
                                    <div class="dslc-image-caption">
                                        BROWSE RANGE
                                    </div>
                                </div><!-- .dslc-image -->
                            </div>

                        </div><!-- .dslc-module -->
                    </div>
                    <div class="service-section">
                        <div class="service-section-detail" style="animation: forwards 0.65s ease none;">
                            <div class="dslc-image-container">
                                <div class="dslc-image">
                                    <a class="" href="<?php site_url(); ?>/service-repairs/" target="_self">
                                        <img src="<?php site_url(); ?>/wp-content/uploads/2018/05/Downunder-RV-Icons-White-04-80x80.png" alt="" title="">
                                    </a>
                                    <div class="dslc-image-caption">
                                        BOOK A SERVICE
                                    </div>
                                </div><!-- .dslc-image -->
                            </div>

                        </div><!-- .dslc-module -->
                    </div>
                    <div class="service-section">
                        <div class="service-section-detail" style="animation: forwards 0.65s ease none;">
                            <div class="dslc-image-container">
                                <div class="dslc-image">
                                    <a class="" href="<?php site_url(); ?>/caravan-accessories-and-spare-parts/" target="_self">
                                        <img src="<?php site_url(); ?>/wp-content/uploads/2018/05/Downunder-RV-Icons-White-01-80x80.png" alt="" title="">
                                    </a>
                                    <div class="dslc-image-caption">
                                        SHOP FOR PARTS
                                    </div>
                                </div><!-- .dslc-image -->
                            </div>

                        </div><!-- .dslc-module -->
                    </div>
                    <div class="service-section last-col">
                        <div class="service-section-detail" style="animation: forwards 0.65s ease none;">
                            <div class="dslc-image-container">
                                <div class="dslc-image">
                                    <a class="" href="<?php site_url(); ?>/consignment-trade-in/" target="_self">
                                        <img src="<?php site_url(); ?>/wp-content/uploads/2018/05/Downunder-RV-Icons-White-02-80x80.png" alt="" title="">
                                    </a>
                                    <div class="dslc-image-caption">
                                        TRADE IN &amp; CONSIGNMENT
                                    </div>
                                </div><!-- .dslc-image -->
                            </div>

                        </div><!-- .dslc-module -->
                    </div>
                </div>
            </div>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>

		</main>
	</div>

<?php get_footer(); ?>

