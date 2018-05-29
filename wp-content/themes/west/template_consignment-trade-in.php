<?php

/*

Template Name: Trade in / Consignment
*/

?>

<?php get_header(); ?>

<!-- get main content -->
    <div class="container consignment-trade-in-form">
        <div class="row">
            <div class="col-md-12">
                <h1 class="consignment-trade-in-title"><?php echo single_post_title();  ?></h1>
            </div>
        </div>
          <div class="row">
            <div class="col-md-4 second-nav">
                <ul class="nav flex-column">
                    <li class="nav-item active consigment-tab">
                        <span class="nav-link">Consigment</span>
                    </li>
                    <li class="nav-item trade-in-tab">
                        <span class="nav-link" href="#">Trade In</span>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 main-form">
                <?php //get_template_part( 'template-parts/content', 'page' ); ?>
                <div class="row consignment-form" >
                    <?php echo FrmFormsController::show_form(5, $key = '', $title=false, $description=true); ?>
                </div>

                <div class="row trade-in-form">
                    <?php echo FrmFormsController::show_form(6, $key = '', $title=false, $description=true); ?>
                </div>

            </div>

        </div>

</div>
<script type="text/javascript">
    jQuery(document).ready(function($){
        $('.consignment-trade-in-form .second-nav .nav-item.consigment-tab').click(function(){
            $('.consignment-trade-in-form .second-nav .nav-item').removeClass('active');
            $(this).addClass('active');
            $('.consignment-trade-in-form .main-form .row').hide();
            $('.consignment-trade-in-form .main-form .consignment-form').show();
        });
        $('.consignment-trade-in-form .second-nav .nav-item.trade-in-tab').click(function()
        {
            $('.consignment-trade-in-form .second-nav .nav-item').removeClass('active');
            $(this).addClass('active');
            $('.consignment-trade-in-form .main-form .row').hide();
            $('.consignment-trade-in-form .main-form .trade-in-form').show();
        });
    });
</script>
<?php get_footer(); ?>