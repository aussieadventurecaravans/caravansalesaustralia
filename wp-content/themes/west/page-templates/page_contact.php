<?php

/*

Template Name: Contact Us

*/

?>
<?php get_header(); ?>
<div class="container consignment-trade-in-form">
    <div class="row">
        <div class="col-md-12">
            <h1 class="consignment-trade-in-title"><?php echo single_post_title();  ?></h1>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <?php echo do_shortcode('[wpsl template="default" map_type="roadmap"]'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <?php echo do_shortcode("[qcf]"); ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content();?>
			<?php endwhile; // end of the loop. ?>
        </div>
    </div>
</div><!-- #primary -->

<?php get_footer(); ?>

