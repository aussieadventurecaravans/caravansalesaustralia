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
                    <img class="banner-image" src="/wp-content/themes/west/images/Kokoda_Force_II_X_Trail_GT.jpg" alt="background image"/>
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
                                        <img src="<?php site_url(); ?>/wp-content/uploads/2018/05/Downunder-RV-Icons-White-03.png" alt="" title="">
                                        <div class="dslc-image-caption">
                                            BROWSE RANGE
                                        </div>
                                    </a>

                                </div><!-- .dslc-image -->
                            </div>

                        </div><!-- .dslc-module -->
                    </div>
                    <div class="service-section">
                        <div class="service-section-detail" style="animation: forwards 0.65s ease none;">
                            <div class="dslc-image-container">
                                <div class="dslc-image">
                                    <a class="" href="<?php site_url(); ?>/service-repairs/" target="_self">
                                        <img src="<?php site_url(); ?>/wp-content/uploads/2018/05/Downunder-RV-Icons-White-04.png" alt="" title="">
                                        <div class="dslc-image-caption">
                                            BOOK A SERVICE
                                        </div>
                                    </a>

                                </div><!-- .dslc-image -->
                            </div>

                        </div><!-- .dslc-module -->
                    </div>
                    <div class="service-section">
                        <div class="service-section-detail" style="animation: forwards 0.65s ease none;">
                            <div class="dslc-image-container">
                                <div class="dslc-image">
                                    <a class="" href="<?php site_url(); ?>/caravan-accessories-and-spare-parts/" target="_self">
                                        <img src="<?php site_url(); ?>/wp-content/uploads/2018/05/Downunder-RV-Icons-White-01.png" alt="" title="">
                                        <div class="dslc-image-caption">
                                            SHOP FOR PARTS
                                        </div>
                                    </a>
                                </div><!-- .dslc-image -->
                            </div>

                        </div><!-- .dslc-module -->
                    </div>
                    <div class="service-section last-col">
                        <div class="service-section-detail" style="animation: forwards 0.65s ease none;">
                            <div class="dslc-image-container">
                                <div class="dslc-image">
                                    <a class="" href="<?php site_url(); ?>/consignment-trade-in/" target="_self">
                                        <img src="<?php site_url(); ?>/wp-content/uploads/2018/05/Downunder-RV-Icons-White-02.png" alt="" title="">
                                        <div class="dslc-image-caption">
                                            TRADE IN &amp; CONSIGNMENT
                                        </div>
                                    </a>
                                </div><!-- .dslc-image -->
                            </div>

                        </div><!-- .dslc-module -->
                    </div>
                </div>
            </div>
            <div class="custom-dealership-section" style="background-color:#ffffff;padding-bottom:39px;padding-top:39px;">
                <div class="custom-dealership-section-wrapper">
                    <div class="custom-dealership-detail" >
                        <div class="dealership-heading"><h2>Downunder RV Locations</h2></div>
                    </div>
                    <div class="custom-dealership-detail" >


                        <div  class="custom-dealer-range" style="animation: forwards 0.65s ease none;">

                            <div class="dslc-text-module-content"><h3>MANDURAH</h3></div>
                            <div class="dslc-button">
                                <a href="/locations/mandurah" target="_self" onclick="" class="">
                                    VIEW STOCK
                                </a>
                            </div><!-- .dslc-button -->

                        </div><!-- .dslc-module -->

                        <div class="custom-dealer-range last-col"  style="animation: forwards 0.65s ease none;">

                            <div class="dslc-text-module-content"><h3>GERALDTON</h3></div>
                            <div class="dslc-button">
                                <a href="/locations/geraldton" target="_self" onclick="" class="">
                                    VIEW STOCK
                                </a>
                            </div><!-- .dslc-button -->
                        </div><!-- .dslc-module -->
                    </div>
                </div>
            </div>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php //the_content(); ?>
			<?php endwhile; ?>

            <div class="custom-featured-caravans-section" style="background-repeat:no-repeat;background-position:center center;background-attachment:fixed;background-size:cover;padding-bottom:0px;padding-top:0px;" data-section-id="4cff57fe368">

                <div class="custom-featured-caravans-section-wrapper">
                    <div class="custom-featured-caravans-detail">
                        <div class="custom-featured-caravans-panel" style="animation: forwards 0.65s ease none;">

                            <div class="featured-caravans">

                                    <div class="featured-caravan">

                                        <div class="dslc-post-thumb dslc-cpt-post-thumb dslc-on-hover-anim">
                                            <div class="dslc-cpt-post-thumb-inner dslca-post-thumb">
                                                <a href="/kokoda-veteran-xli-veteran-semi-off-road-caravan/"><img src="/wp-content/uploads/2018/03/kokoda_veteran_xli_platinum_image_12-500x300-500x240.jpg" alt=""></a>
                                            </div><!-- .dslc-cpt-post-thumb-inner -->
                                        </div><!-- .dslc-cpt-post-thumb -->



                                        <div class="dslc-post-main dslc-cpt-post-main">
                                            <div class="dslc-cpt-post-title">
                                                <h2><a href="/kokoda-veteran-xli-veteran-semi-off-road-caravan"><i class="fa">&#xf105;</i>  Kokoda Veteran XLI Platinum</a></h2>
                                            </div><!-- .dslc-cpt-post-title -->
                                        </div><!-- .dslc-cpt-post-main -->


                                    </div><!-- .dslc-cpt-post -->
                                    <div class="featured-caravan">
                                        <div class="dslc-post-thumb dslc-cpt-post-thumb dslc-on-hover-anim">
                                            <div class="dslc-cpt-post-thumb-inner dslca-post-thumb">
                                                <a href="/cadet-ii-xli-platinum"><img src="/wp-content/uploads/2017/12/cadet_II_xli_platinum_image_2-500x300-500x240.jpg" alt=""></a>
                                            </div><!-- .dslc-cpt-post-thumb-inner -->
                                        </div><!-- .dslc-cpt-post-thumb -->



                                        <div class="dslc-post-main dslc-cpt-post-main">
                                            <div class="dslc-cpt-post-title">
                                                <h2><a href="/cadet-ii-xli-platinum"><i class="fa">&#xf105;</i>  Cadet II XLI Platinum</a></h2>
                                            </div><!-- .dslc-cpt-post-title -->
                                        </div><!-- .dslc-cpt-post-main -->


                                    </div><!-- .dslc-cpt-post -->
                                    <div class="featured-caravan " >
                                        <div class="dslc-post-thumb dslc-cpt-post-thumb dslc-on-hover-anim">
                                            <div class="dslc-cpt-post-thumb-inner dslca-post-thumb">
                                                <a href="/force-ii-gt"><img src="/wp-content/uploads/2017/12/force_x_trail_II_gt_image_1-1-500x300-500x240.jpg" alt=""></a>
                                            </div><!-- .dslc-cpt-post-thumb-inner -->
                                        </div><!-- .dslc-cpt-post-thumb -->



                                        <div class="dslc-post-main dslc-cpt-post-main">
                                            <div class="dslc-cpt-post-title">
                                                <h2><a href="/force-ii-gt"><i class="fa">&#xf105;</i>   Force II GT </a></h2>
                                            </div><!-- .dslc-cpt-post-title -->
                                        </div><!-- .dslc-cpt-post-main -->


                                    </div><!-- .dslc-cpt-post -->
                                    <div class="featured-caravan">

                                        <div class="dslc-post-thumb dslc-cpt-post-thumb dslc-on-hover-anim">

                                            <div class="dslc-cpt-post-thumb-inner dslca-post-thumb">
                                                <a href="/major-x-treme-gt"><img src="/wp-content/uploads/2017/12/major_x_treme_gt_image_1-500x300-500x240.jpg" alt=""></a>
                                            </div><!-- .dslc-cpt-post-thumb-inner -->
                                        </div><!-- .dslc-cpt-post-thumb -->


                                        <div class="dslc-post-main dslc-cpt-post-main">
                                            <div class="dslc-cpt-post-title">
                                                <h2><a href="/major-x-treme-gt"><i class="fa">&#xf105;</i>   Major X-Treme GT</a></h2>
                                            </div><!-- .dslc-cpt-post-title -->
                                        </div><!-- .dslc-cpt-post-main -->
                                    </div><!-- .dslc-cpt-post -->

                            </div><!-- .dslc-cpt-posts -->
                        </div><!-- .dslc-module -->
                    </div>
                </div>
            </div>


            <div class="custom-contact-section" style="background-color:rgb(255, 255, 255);padding-bottom:39px;padding-top:39px;padding-left:5%;padding-right:5%;">
                <div class="custom-contact-section-wrapper">
                    <div class="custom-contact-detail">

                        <div class="custom-contact-content" style="animation: forwards 0.65s ease none;">
                            <div class="dslc-text-module-content">
                                <h2>Contact DownUnder RV Australia</h2>
                                <h3>Contact&nbsp;our friendly caravan experts&nbsp;in Mandurah or Geraldton</h3>
                            </div>
                        </div><!-- .dslc-module -->

                        <div  class="custom-contact-button" style="animation: forwards 0.65s ease none;">
                            <div class="dslc-button">
                                <a href="/caravan/contact/" target="_self" onclick="" class="">
                                    CONTACT US
                                </a>
                            </div><!-- .dslc-button -->
                        </div><!-- .dslc-module -->

                    </div>

                </div>
            </div>

            <div class="dslc-modules-section " style="background-image:url(/wp-content/uploads/caravanperth-sl2.jpg);background-repeat:no-repeat;background-position:center center;background-attachment:fixed;background-size:cover;" data-section-id="c6626f0a821">

                <div class="dslc-bg-video dslc-force-show" style="opacity: 1;"><div class="dslc-bg-video-overlay" style="background-color:rgba(0,0,0,0); opacity:0.5; "></div></div>

                <div class="dslc-modules-section-wrapper dslc-clearfix"><div class="dslc-modules-area dslc-col dslc-12-col dslc-last-col" data-size="12">
                        <div id="dslc-module-44" class="dslc-module-front dslc-module-DSLC_Button dslc-in-viewport-check dslc-in-viewport-anim-none  dslc-col dslc-3-col  dslc-module-handle-like-regular  dslc-in-viewport" data-module-id="44" data-dslc-module-id="DSLC_Button" data-dslc-module-size="3" data-dslc-anim="none" data-dslc-anim-delay="0" data-dslc-anim-duration="650" data-dslc-anim-easing="ease" data-dslc-preset="none" style="animation: forwards 0.65s ease none;">
                            <div class="dslc-button">
                                <a href="/range/kokoda-caravan-models-can-be-ordered/" target="_self" onclick="" class="">
                                    KOKODA &nbsp;RANGE
                                </a>
                            </div><!-- .dslc-button -->



                        </div><!-- .dslc-module -->

                        <div id="dslc-module-78" class="dslc-module-front dslc-module-DSLC_Button dslc-in-viewport-check dslc-in-viewport-anim-none  dslc-col dslc-3-col  dslc-module-handle-like-regular  dslc-in-viewport" data-module-id="78" data-dslc-module-id="DSLC_Button" data-dslc-module-size="3" data-dslc-anim="none" data-dslc-anim-delay="0" data-dslc-anim-duration="650" data-dslc-anim-easing="ease" data-dslc-preset="none" style="animation: forwards 0.65s ease none;">

                            <div class="dslc-button">
                                <a href="/range/bargains/" target="_self" onclick="" class="">
                                    CARAVAN DEALS
                                </a>
                            </div><!-- .dslc-button -->

                        </div><!-- .dslc-module -->

                        <div id="dslc-module-79" class="dslc-module-front dslc-module-DSLC_Button dslc-in-viewport-check dslc-in-viewport-anim-none  dslc-col dslc-3-col  dslc-module-handle-like-regular  dslc-in-viewport" data-module-id="79" data-dslc-module-id="DSLC_Button" data-dslc-module-size="3" data-dslc-anim="none" data-dslc-anim-delay="0" data-dslc-anim-duration="650" data-dslc-anim-easing="ease" data-dslc-preset="none" style="animation: forwards 0.65s ease none;">

                            <div class="dslc-button">
                                <a href="/range/usedcaravansales/" target="_self" onclick="" class="">
                                    USED CARAVANS
                                </a>
                            </div><!-- .dslc-button -->

                        </div><!-- .dslc-module -->

                        <div id="dslc-module-80" class="dslc-module-front dslc-module-DSLC_Button dslc-in-viewport-check dslc-in-viewport-anim-none  dslc-col dslc-3-col dslc-last-col  dslc-module-handle-like-regular  dslc-in-viewport" data-module-id="80" data-dslc-module-id="DSLC_Button" data-dslc-module-size="3" data-dslc-anim="none" data-dslc-anim-delay="0" data-dslc-anim-duration="650" data-dslc-anim-easing="ease" data-dslc-preset="none" style="animation: forwards 0.65s ease none;">

                            <div class="dslc-button">
                                <a href="/caravan/range/family-caravans/" target="_self" onclick="" class="">
                                    FAMILY CARAVANS
                                </a>
                            </div><!-- .dslc-button -->

                        </div><!-- .dslc-module -->

                        <div id="dslc-module-81" class="dslc-module-front dslc-module-DSLC_Button dslc-in-viewport-check dslc-in-viewport-anim-none  dslc-col dslc-3-col  dslc-module-handle-like-regular  dslc-in-viewport" data-module-id="81" data-dslc-module-id="DSLC_Button" data-dslc-module-size="3" data-dslc-anim="none" data-dslc-anim-delay="0" data-dslc-anim-duration="650" data-dslc-anim-easing="ease" data-dslc-preset="none" style="animation: forwards 0.65s ease none;">

                            <div class="dslc-button">
                                <a href="" target="_self" onclick="" class="">
                                    KOKODA STOCK
                                </a>
                            </div><!-- .dslc-button -->

                        </div><!-- .dslc-module -->

                        <div id="dslc-module-82" class="dslc-module-front dslc-module-DSLC_Button dslc-in-viewport-check dslc-in-viewport-anim-none  dslc-col dslc-3-col  dslc-module-handle-like-regular  dslc-in-viewport" data-module-id="82" data-dslc-module-id="DSLC_Button" data-dslc-module-size="3" data-dslc-anim="none" data-dslc-anim-delay="0" data-dslc-anim-duration="650" data-dslc-anim-easing="ease" data-dslc-preset="none" style="animation: forwards 0.65s ease none;">

                            <div class="dslc-button">
                                <a href="/range/caravan-accessories-and-spare-parts/" target="_self" onclick="" class="">
                                    ACCESSORIES PARTS
                                </a>
                            </div><!-- .dslc-button -->

                        </div><!-- .dslc-module -->

                        <div id="dslc-module-83" class="dslc-module-front dslc-module-DSLC_Button dslc-in-viewport-check dslc-in-viewport-anim-none  dslc-col dslc-3-col  dslc-module-handle-like-regular  dslc-in-viewport" data-module-id="83" data-dslc-module-id="DSLC_Button" data-dslc-module-size="3" data-dslc-anim="none" data-dslc-anim-delay="0" data-dslc-anim-duration="650" data-dslc-anim-easing="ease" data-dslc-preset="none" style="animation: forwards 0.65s ease none;">

                            <div class="dslc-button">
                                <a href="/downunder-rv/clients-testimonials/" target="_self" onclick="" class="">
                                    CUSTOMER PHOTOS
                                </a>
                            </div><!-- .dslc-button -->

                        </div><!-- .dslc-module -->

                        <div id="dslc-module-84" class="dslc-module-front dslc-module-DSLC_Button dslc-in-viewport-check dslc-in-viewport-anim-none  dslc-col dslc-3-col dslc-last-col  dslc-module-handle-like-regular  dslc-in-viewport" data-module-id="84" data-dslc-module-id="DSLC_Button" data-dslc-module-size="3" data-dslc-anim="none" data-dslc-anim-delay="0" data-dslc-anim-duration="650" data-dslc-anim-easing="ease" data-dslc-preset="none" style="animation: forwards 0.65s ease none;">


                            <div class="dslc-button">
                                <a href="/contact-us/" target="_self" onclick="" class="">
                                    CARAVAN DISPLAY LOCATION
                                </a>
                            </div><!-- .dslc-button -->

                        </div><!-- .dslc-module -->
                    </div>
                </div>
            </div>

            <div class="dslc-modules-section " style="padding-bottom:39px;padding-top:39px;padding-left:5%;padding-right:5%;" data-section-id="83ba3e63fb1">



                <div class="dslc-modules-section-wrapper dslc-clearfix"><div class="dslc-modules-area dslc-col dslc-12-col dslc-last-col" data-size="12">
                        <div id="dslc-module-8" class="dslc-module-front dslc-module-DSLC_Text_Simple dslc-in-viewport-check dslc-in-viewport-anim-none  dslc-col dslc-12-col dslc-last-col  dslc-module-handle-like-regular  dslc-in-viewport" data-module-id="8" data-dslc-module-id="DSLC_Text_Simple" data-dslc-module-size="12" data-dslc-anim="none" data-dslc-anim-delay="" data-dslc-anim-duration="650" data-dslc-anim-easing="ease" data-dslc-preset="none" style="animation: forwards 0.65s ease none;">



                            <div class="dslc-text-module-content"><h2>DOWNUNDER RV AUSTRALIA</h2><p class="sub-title">VERY tough off road big caravan sales for rugged outback Western Australian conditions. DownunderRV Caravans manufacturer high quality caravans suited for WA and NT travelers, caravan park homes and mine workers at mining camps and mining towns of WA. Visit our big new and used caravan display centre in Mandurah, near Perth, or Geraldton in the Midwest. DownunderRV Caravan sales can find the perfect caravans to your specifications. Small single axle caravans, BIG tandem axle caravans, and Full Off-road Caravans sales WA and NT.</p></div>
                        </div><!-- .dslc-module -->
                    </div>
                </div>
            </div>

		</main>
	</div>


<?php get_footer(); ?>

