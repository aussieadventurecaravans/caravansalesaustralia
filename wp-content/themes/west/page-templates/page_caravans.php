<?php
/*
Template Name: All Caravans
*/

get_header(); ?>

<div id="primary" class="fullwidth">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <h2 class="filter-title">Refine By: </h2>
                <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
                    <?php


                        echo ' <div class="form-check">';
                            if( $terms = get_terms( 'locations', 'orderby=name' ) ) : // to make it simple I use default categories
                            echo '<h3 class="filter-heading">Location</h3>';
                                foreach ( $terms as $term ) :
                                    echo  '<p class="location-filter"><input type="checkbox" class="form-check-input" name="locationfilter[]" value="'.$term->term_id.'" id ="'.$term->name.'" >'
                                            .'<label class="form-check-label" for="'.$term->name.'">'. $term->name .'</label>'
                                            .'</p>';
                                endforeach;
                            endif;
                            if( $terms = get_terms( 'category', 'orderby=name' ) ) : // to make it simple I use default categories
                                echo '<h3 class="filter-heading">Types</h3>';
                                foreach ( $terms as $term ) :
                                    if(in_array( $term->name ,array('New Caravans','Used Caravans'))):
                                        echo  '<p class="location-filter"><input type="checkbox" class="form-check-input" name="typefilter[]" value="'.$term->term_id.'" id ="'.$term->name.'" >'
                                            .'<label class="form-check-label" for="'.$term->name.'">'. $term->name .'</label>'
                                            .'</p>';
                                    endif;
                                endforeach;
                                echo '<h3 class="filter-heading">Brands</h3>';
                                foreach ( $terms as $term ) :
                                    if(in_array( $term->name ,array('Kokoda','Dreamseeker'))):
                                        echo  '<p class="location-filter"><input type="checkbox" class="form-check-input" name="brandfilter[]" value="'.$term->term_id.'" id ="'.$term->name.'" >'
                                            .'<label class="form-check-label" for="'.$term->name.'">'. $term->name .'</label>'
                                            .'</p>';
                                    endif;
                                endforeach;
                            endif;
                        echo '</div>';
                    ?>
                    <button class="filter-button">Filter</button>
                    <input type="hidden" name="action" value="myfilter">
                </form>
            </div>
            <div class="col-md-10">
                <div id="carvans-category">
                    <?php
                        $args = array(
                            'post_type' => 'post',
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'nopaging' => true,
                            'post_status'      => 'publish'
                        );
                    ?>

                    <?php query_posts($args); $count = 0;?>
                    <?php while (have_posts()): the_post(); ?>

                            <?php if($count ==  0): ?>
                               <div class="row">
                            <?php endif; ?>
                            <?php
                            $post_price = get_field( "post_price" );

                            if(!empty($post_price)): ?>

                                <?php if($count <  3): ?>
                                    <?php $product_img = get_the_post_thumbnail_url(get_post(),'west-large-thumb'); ?>
                                    <div class="product-list col-sm-4">
                                        <div class="item-img">
                                            <?php if($product_img): ?>
                                                <a href="<?php the_permalink(); ?>" >
                                                   <img src="<?php echo $product_img ?>" class="product-img"/>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                        <div class="item-details">
                                            <div class="details">
                                                <a href="<?php the_permalink(); ?>" >
                                                    <h4 class="item-title"><?php the_title(); ?></h4>
                                                    <?php
                                                    $post_price = get_field( "post_price" );
                                                    $orc_field = get_field( "orc_field" );
                                                    ?>
                                                    <h3 class="price"><?php if(!empty($post_price)) { echo '$'. $post_price; }
                                                        if(!empty($orc_field))
                                                        {
                                                            echo $orc_field;
                                                        }
                                                        ?>
                                                    </h3>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php  $count++; $open_element = true ;?>
                                <?php endif; ?>

                                <?php if($count ==  3): ?>
                                       </div>
                                    <?php  $count= 0; $open_element = false; ?>
                                <?php endif; ?>

                            <?php endif; ?>
                    <?php endwhile; ?>

                    <?php if($open_element ==  true): ?>
                        </div>
                    <?php endif; ?>

                    <?php wp_reset_query(); ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($){
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
                    $('#carvans-category').html(data); // insert data
                }
            });
            return false;
        });

    });

</script>

<?php get_footer(); ?>
