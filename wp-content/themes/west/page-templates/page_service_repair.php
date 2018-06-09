<?php
/*
Template Name: Service & Repair Template
*/

get_header(); ?>
<div class="container service-repair-section">
    <div class="row">
        <div class="col-md-12">
            <h1 class="service-repair-section-title"><?php echo single_post_title();  ?></h1>
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
