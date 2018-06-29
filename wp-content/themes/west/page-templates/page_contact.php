<?php

/*

Template Name: Contact Us

*/

?>
<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="consignment-trade-in-title"><?php echo single_post_title();  ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php echo do_shortcode('[wpsl template="custom_locator_map" map_type="roadmap"]'); ?>
        </div>
    </div>

    <div class="row" style="background-color: #eceef1;padding: 15px 7px 0;">
        <div class="col-md-6">
            <?php echo FrmFormsController::show_form('', $key = 'general-contact', $title=false, $description=true); ?>
        </div>
        <div class="col-md-6">
            <?php echo do_shortcode('[wpsl template="custom_store_list" map_type="roadmap"]'); ?>
        </div>
    </div>

</div>



<!-- #primary -->

<?php get_footer(); ?>

