<?php
/*
Template Name: Dealership
*/

get_header(); ?>
<div class="container dealership-section">
    <div class="row">
        <div class="col-md-12">
            <h1 class="dealership-section-title"><?php echo single_post_title();  ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
