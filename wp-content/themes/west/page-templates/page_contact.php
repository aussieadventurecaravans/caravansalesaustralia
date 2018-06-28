<?php

/*

Template Name: Contact Us

*/

?>
<?php get_header(); ?>

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


    <div class="row" style="background-color: #d3d3d3;padding: 15px 7px 0;">
        <div class="col-md-6">
            <?php echo FrmFormsController::show_form('', $key = 'general-contact', $title=false, $description=true); ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content();?>
            <?php endwhile; // end of the loop. ?>
        </div>
        <div class="col-md-6">
            <p><strong>FIND A DEALER<br>
                </strong>For any product enquires or questions please <a href="/dealerships/">contact our nearest dealership</a>.</p>
            <p><strong>ENQUIRIES<br>
                </strong>Please contact our Donwunder RV Customer Care team member for customer enquiries or general enquiries</p>
            <p>Call: 0414 199 826<br>
                9:00am – 5:00pm EST Monday to Friday</p>
            <p><strong>WARRANTIES<br>
                </strong>For all warranty related enquiries&nbsp;please contact&nbsp; Dealerships & Warranty Department</p>
            <p><strong>POSTAL ADDRESS<br>
                </strong>100 Pinjarra Road, Mandurah WA 6210</p>
        </div>
    </div>


<!-- #primary -->

<?php get_footer(); ?>

