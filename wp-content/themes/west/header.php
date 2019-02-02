<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package West
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-133678310-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-133678310-1');
</script>


</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'west' ); ?></a>
	<header id="masthead" class="site-header <?php echo west_has_header(); ?>" role="banner">
        <!--<div class="custom-top-contact-section container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="custom-top-contact">
                            <p>
                                 <span class="contact-detail">
                                    <span class="icon"><i class="fa fa-home"></i></span>
                                     <a href="https://www.google.com/maps/place/2+Gray+St,+Geraldton+WA+6530/@-28.7764834,114.6231787,17z/data=!3m1!4b1!4m5!3m4!1s0x2bda4425d6ea761d:0x9471acd04e01fb8f!8m2!3d-28.7764834!4d114.6253674">
                                       2 Gray Street, Geraldton WA 6530
                                    </a>
                                </span>
                                <span class="contact-detail">
                                     <span  class="icon"><i class="fa fa-phone"></i></span><a href="tel:(08)99645056">(08) 9964 5056</a>
                                </span>

                                <span class="contact-detail">
                                    <span class="icon"><i class="fa fa-home"></i></span><a href="https://www.google.com.au/maps/place/100+Pinjarra+Rd,+Mandurah+WA+6210/@-32.5343657,115.7249287,17z/data=!3m1!4b1!4m5!3m4!1s0x2a327eccb28b0153:0xf0a34e3b15cd45f7!8m2!3d-32.5343657!4d115.7271174">
                                        100 Pinjarra Road, Mandurah WA 6210
                                    </a>
                                </span>
                                <span class="contact-detail">
                                     <span  class="icon"><i class="fa fa-phone"></i></span><a href="tel:(08)95349466">(08) 9534 9466</a>
                                </span>
                                <span class="contact-detail">
                                    <span  class="icon"><i class="fa fa-envelope"></i></span><a href="mailto:sales@downunderrv.com.au">sales@downunderrv.com.au</a>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
		<div class="container">
            <div class="row">
                <div class="site-branding col-md-4">
                    <?php //west_branding(); ?>
                    <a href="<?php echo home_url(); ?>" title="CARAVAN SALES AUSTRALIA">
                        <img src="<?php echo get_template_directory_uri() .  '/images/caravan_sales_australia_logo-01.png'; ?>" class="header-image" >
                    </a>
                </div><!-- .site-branding -->

                <nav id="site-navigation" class="main-navigation col-md-8" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
                </nav><!-- #site-navigation -->
                <nav class="mobile-nav"></nav>


            </div>
		</div>
	</header><!-- #masthead -->

	<?php if ( west_has_header() == 'has-header' ) : ?>
	<div class="header-image">
		<?php west_header_text(); ?>
		<img class="large-header" src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt="<?php bloginfo('name'); ?>">
		
		<?php $mobile = get_theme_mod('mobile_header'); ?>
		<?php if ( $mobile ) : ?>
		<img class="small-header" src="<?php echo esc_url($mobile); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt="<?php bloginfo('name'); ?>">
		<?php else : ?>
		<img class="small-header" src="<?php header_image(); ?>" width="1024" alt="<?php bloginfo('name'); ?>">
		<?php endif; ?>

	</div>
	<?php else : ?>
	<div class="header-clone"></div>
	<?php endif; ?>

	<div id="content" class="site-content">

        <?php if(is_page_template('page-templates/page_contact.php')): ?>
            <div class="container-fluid">
         <?php elseif(is_page_template('page-templates/page_consignment-trade-in.php')):?>
            <div class="container-fluid">
        <?php elseif(is_page_template('page-templates/page_caravans.php')): ?>
                <div class="fullwidth">
        <?php  elseif(is_tax() == 1):?>
            <div class="fullwidth">
        <?php elseif ( !is_page_template('page-templates/page_composer.php') && !is_page_template('page-templates/page_home.php')) : ?>
            <div class="container">
        <?php  else : ?>
            <div class="fullwidth">
        <?php endif; ?>