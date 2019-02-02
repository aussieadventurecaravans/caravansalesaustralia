<?php
/*
Template Name: All Caravans
*/

get_header(); ?>

<?php $kokoda_dreamseeker_cat = array(); ?>
<div id="primary" class="fullwidth">
    <div class="container">
        <div class="row">
            <div class="col-md-4" style=" margin-bottom: 46px;">
                <h2 class="filter-title">Refine By: </h2>
                <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
                    <?php
                        echo ' <div class="form-check">';
                            if( $terms = get_terms( 'dealers', 'orderby=name' ) ) : // to make it simple I use default categories
                                echo '<h3 class="filter-heading collapsed" data-toggle="collapse" href="#filterDealers" role="button" aria-expanded="true" aria-controls="filterDealers">Dealers <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></h3>';
                                echo  '<div class="collapse" id="filterDealers">';
                                    foreach ( $terms as $term ) :
                                        echo  '<p class="location-filter"><input type="checkbox" class="form-check-input" name="dealerfilter[]" value="'.$term->term_id.'" id ="'.$term->name.'" >'
                                            .'<label class="form-check-label" for="'.$term->name.'">'. $term->name .'</label>'
                                            .'</p>';
                                    endforeach;
                                echo '</div>';
                            endif;
                            if( $terms = get_terms( 'states', 'orderby=name' ) ) : // to make it simple I use default categories
                                echo '<h3 class="filter-heading collapsed"  data-toggle="collapse" href="#filterStates" role="button" aria-expanded="true" aria-controls="filterStates">States  <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></h3>';
                                echo  '<div class="collapse" id="filterStates">';
                                    foreach ( $terms as $term ) :
                                        echo  '<p class="location-filter"><input type="checkbox" class="form-check-input" name="statefilter[]" value="'.$term->term_id.'" id ="'.$term->name.'" >'
                                            .'<label class="form-check-label" for="'.$term->name.'">'. $term->name .'</label>'
                                            .'</p>';
                                    endforeach;
                                echo '</div>';
                            endif;
                            if( $terms = get_terms( 'conditions', 'orderby=name' ) ) : // to make it simple I use default categories
                                echo '<h3 class="filter-heading collapsed"  data-toggle="collapse" href="#filterConditions" role="button" aria-expanded="true" aria-controls="filterConditions">Conditions  <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></h3>';
                                echo  '<div class="collapse" id="filterConditions">';
                                    foreach ( $terms as $term ) :
                                        echo  '<p class="location-filter"><input type="checkbox" class="form-check-input" name="conditionfilter[]" value="'.$term->term_id.'" id ="'.$term->name.'" >'
                                            .'<label class="form-check-label" for="'.$term->name.'">'. $term->name .'</label>'
                                            .'</p>';
                                    endforeach;
                                echo '</div>';
                            endif;
                            if( $terms = get_terms( 'brands', 'orderby=name' ) ) : // to make it simple I use default categories
                                echo '<h3 class="filter-heading collapsed"  data-toggle="collapse" href="#filterBrands" role="button" aria-expanded="true" aria-controls="filterBrands">Brands  <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></h3>';
                                echo  '<div class="collapse" id="filterBrands">';
                                foreach ( $terms as $term ) :
                                    echo  '<p class="location-filter"><input type="checkbox" class="form-check-input" name="brandfilter[]" value="'.$term->term_id.'" id ="'.$term->name.'" >'
                                        .'<label class="form-check-label" for="'.$term->name.'">'. $term->name .'</label>'
                                        .'</p>';
                                endforeach;
                                echo  '</div>';
                            endif;
                        echo '</div>';
                    ?>
                    <button class="filter-button">Filter</button>
                    <input type="hidden" name="action" value="myfilter">
                </form>
            </div>
            <div class="col-md-8">
                <div id="caravans-category">
                    <?php

                        //load all caravans query
                        $args = array(
                            'post_type' => 'post',
                            'orderby' => 'modified',
                            'order' => 'DESC',
                            'nopaging' => true,
                            'post_status'  => 'publish'
                        );

                        $caravans =  get_posts( $args );

                    ?>

                    <?php //query_posts($args);
                            $count = 0;
                            ?>
                    <?php foreach ($caravans as $caravan):  ?>
                            <?php //Starting Element Row ?>
                            <?php if($count ==  0): ?>
                               <div class="row">
                            <?php endif; ?>

                            <?php
                            $post_price = get_field( "post_price" ,$caravan->ID);
                            if(!empty($post_price)): ?>

                                <?php if($count <  3): ?>
                                    <?php $product_img = get_the_post_thumbnail_url($caravan,'west-large-thumb'); ?>
                                    <div class="product-list col-sm-4">
                                        <div class="item-img">
                                            <?php if($product_img): ?>
                                                <a href="<?php the_permalink($caravan); ?>" >
                                                   <img src="<?php echo $product_img ?>" class="product-img"/>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                        <div class="item-details">
                                            <div class="details">
                                                <a href="<?php the_permalink($caravan); ?>" >
                                                    <h4 class="item-title"><?php echo get_the_title($caravan); ?></h4>
                                                    <?php
                                                    $post_price = get_field( "post_price",$caravan->ID );
                                                    $orc_field = get_field( "orc_field",$caravan->ID );
                                                    ?>
                                                    <h3 class="price"><?php if(!empty($post_price)) { echo '$'. $post_price; }
                                                        if(!empty($orc_field))
                                                        {
                                                            echo ' <span class="orc-field">  '.$orc_field . '</span>';
                                                        }
                                                        else
                                                        {
                                                            echo '<span class="orc-field"> Drive Away </span>';
                                                        }
                                                        ?>
                                                    </h3>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php  $count++; $open_element = true ;?>
                                <?php endif; ?>

                                <?php //close element Row ?>
                                <?php if($count ==  3): ?>
                                       </div>
                                    <?php  $count= 0; $open_element = false; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                    <?php endforeach; ?>


                    <?php //close element Row at last product ?>
                    <?php if($open_element ==  true): ?>
                        </div>
                    <?php endif; ?>
                    <?php //wp_reset_query(); ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($){

        $('h3.filter-heading').on('click', function () {

           if($(this).children('span.glyphicon').hasClass('glyphicon-menu-down'))
           {
               $(this).children('span.glyphicon').removeClass('glyphicon-menu-down');

               $(this).children('span.glyphicon').addClass('glyphicon-menu-up');
           }
           else
           {
               $(this).children('span.glyphicon').removeClass('glyphicon-menu-up');
               $(this).children('span.glyphicon').addClass('glyphicon-menu-down');
           }
        });



        $('#filter').submit(function(){
            var filter = $('#filter');
            $.ajax({
                url:filter.attr('action'),
                data:filter.serialize(), // form data
                type:filter.attr('method'), // POST
                beforeSend:function(xhr){
                    filter.find('button').text('Processing...'); // changing the button label
                },
                success:function(data){
                    filter.find('button').text('Filter'); // changing the button label back
                    $('#caravans-category').html(data); // insert data
                }
            });
            return false;
        });

    });

</script>


<?php get_footer(); ?>
