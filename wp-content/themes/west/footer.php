<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package West
 */
?>

		</div>
	</div><!-- #content -->

	<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
		<?php get_sidebar('footer'); ?>
	<?php endif; ?>

    <a class="go-top"><i class="fa fa-angle-up"></i></a>
</div><!-- #page -->

<?php wp_footer(); ?>

<div class="footer-meta">
    <div class="container">
        <div class="row">
            <div class="copyright col-sm-12">
                <span>Copyright © 2019 Caravan Sales Australia</span>
                <span class="notice">Terms and Conditions Apply. Limited to advertised stock only. Offer expires 5pm (AEDT) February 9th 2019. Payment in full must be made before the offer expires.</span>
            </div>
        </div>
    </div>
</div>

</body>
</html>
