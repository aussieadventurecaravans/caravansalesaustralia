<?php
/**
 * West functions and definitions
 *
 * @package West
 */

if ( ! function_exists( 'west_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function west_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on West, use a find and replace
	 * to change 'west' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'west', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Content width
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1170; /* pixels */
	}	

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('west-large-thumb', 660);
	add_image_size('west-small-thumb', 450);


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'west' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'west_custom_background_args', array(
		'default-color' => 'f9f9f9',
		'default-image' => '',
	) ) );
}
endif; // west_setup
add_action( 'after_setup_theme', 'west_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function west_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'west' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	$widget_areas = get_theme_mod('footer_widget_areas', '3');
	for ($i=1; $i<=$widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer ', 'west' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}	

	//Register the custom widgets
	register_widget( 'West_Video_Widget' );
	register_widget( 'West_Contact_Info' );
	register_widget( 'West_Social_Profile' );
	register_widget( 'West_Recent_Posts' );

}
add_action( 'widgets_init', 'west_widgets_init' );

/**
 * Load the custom widgets
 */
require get_template_directory() . "/widgets/video-widget.php";
require get_template_directory() . "/widgets/contact-widget.php";
require get_template_directory() . "/widgets/social-widget.php";
require get_template_directory() . "/widgets/posts-widget.php";


/**
 * Enqueue scripts and styles.
 */
function west_scripts() {

	wp_enqueue_style( 'west-style', get_stylesheet_uri() );

	if ( get_theme_mod('body_font_name') !='' ) {
	    wp_enqueue_style( 'west-body-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('body_font_name')) ); 
	} else {
	    wp_enqueue_style( 'west-body-fonts', '//fonts.googleapis.com/css?family=Roboto:400,400italic,500italic,500');
	}

	if ( get_theme_mod('headings_font_name') !='' ) {
	    wp_enqueue_style( 'west-headings-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('headings_font_name')) ); 
	} else {
	    wp_enqueue_style( 'west-headings-fonts', '//fonts.googleapis.com/css?family=Montserrat:400,700'); 
	}

	wp_enqueue_style( 'west-fontawesome', get_template_directory_uri() . '/fonts/font-awesome.min.css' );	

	wp_enqueue_script( 'west-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( get_theme_mod('blog_layout') == 'masonry-layout' && (is_home() || is_archive()) ) {
		wp_enqueue_script( 'west-masonry-init', get_template_directory_uri() . '/js/masonry-init.js', array('masonry'),'', true );		
	}	

	wp_enqueue_script( 'west-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true );	

	wp_enqueue_script( 'west-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '', true );
	wp_enqueue_script( 'slick-main', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.0/slick.min.js', array('jquery'), '', true );
	// Custom js only for demo post
	// if(is_single('11742')) {
	if(is_single()) {
	     wp_enqueue_script( 'custom-js', get_template_directory_uri().'/js/custom.js', array('jquery'), '', true );
    }
    if(is_tax() == 1){
	     wp_enqueue_script( 'custom-js', get_template_directory_uri().'/js/custom.js', array('jquery'), '', true );
	     wp_enqueue_script( 'jscroll-js', get_template_directory_uri().'/js/jscroll.js', array('jquery'), '', true );
    }
	wp_enqueue_style( 'slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css');
	wp_enqueue_style( 'slick-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.0/slick.css');

}
add_action( 'wp_enqueue_scripts', 'west_scripts' );

/**
 * Enqueue Bootstrap
 */
function west_enqueue_bootstrap() {
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '');
    wp_enqueue_script( 'bootstrap-tabcollapse-js', get_template_directory_uri() . '/js/bootstrap-tabcollapse.js', array('jquery'), '');
	wp_enqueue_style( 'west-bootstrap-collapse', get_template_directory_uri() . '/css/bootstrap/bootstrap-collapse.min.css', array() );
	wp_enqueue_style( 'west-bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css', array() );
}
add_action( 'wp_enqueue_scripts', 'west_enqueue_bootstrap');

/**
 * Load html5shiv
 */
function west_html5shiv() {
    echo '<!--[if lt IE 9]>' . "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action( 'wp_head', 'west_html5shiv' );

/**
 * Site branding
 */
if ( ! function_exists( 'west_branding' ) ) :
function west_branding() {
	if ( get_theme_mod('site_logo') ) :
		echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr(get_bloginfo('name')) . '"><img class="site-logo" src="' . esc_url(get_theme_mod('site_logo')) . '" alt="' . esc_attr(get_bloginfo('name')) . '" /></a>'; 
	else :
		echo '<h1 class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html(get_bloginfo('name')) . '</a></h1>';
		if ( get_bloginfo( 'description' ) ) {
			echo '<h2 class="site-description">' . esc_html(get_bloginfo( 'description' )) . '</h2>';
		}
	endif;
}
endif;

/**
 * Full width single posts
 */
function west_fullwidth_singles($classes) {
	if ( function_exists('is_woocommerce') ) {
		$woocommerce = is_woocommerce();
	} else {
		$woocommerce = false;
	}

	$single_layout = get_theme_mod('fullwidth_single', 0);
	if ( is_single() && !$woocommerce && $single_layout ) {
		$classes[] = 'fullwidth-single';
	}
	return $classes;
}
add_filter('body_class', 'west_fullwidth_singles');

/**
 * Posts clearfix 
 */
function west_clearfix_post( $class ) {
	$class[] = 'clearfix';
	return $class;
}
add_filter( 'post_class', 'west_clearfix_post' );

/**
 * Blog layout
 */
function west_blog_layout() {
	$layout = get_theme_mod('blog_layout','classic');
	return $layout;
}

/**
 * Change the excerpt length
 */
function west_excerpt_length( $length ) {
	$excerpt = get_theme_mod('exc_lenght', '30');
	return $excerpt;
}
add_filter( 'excerpt_length', 'west_excerpt_length', 999 );

/**
 * Polylang compatibility
 */
if ( function_exists('pll_register_string') ) :
function west_polylang() {
	pll_register_string('Header text', get_theme_mod('header_text'), 'West');
	pll_register_string('Button left', get_theme_mod('button_left'), 'West');
	pll_register_string('Button right', get_theme_mod('button_right'), 'West');
}
add_action( 'admin_init', 'west_polylang' );
endif;

/**
 * Header text
 */
function west_header_text() {

	if ( !function_exists('pll_register_string') ) {
		$header_text 		= get_theme_mod('header_text', 'TIME TO GO WEST');
		$button_left		= get_theme_mod('button_left', 'Explore');
		$button_right 		= get_theme_mod('button_right', 'Browse');
	} else {
		$header_text 		= pll__(get_theme_mod('header_text', 'TIME TO GO WEST'));
		$button_left		= pll__(get_theme_mod('button_left', 'Explore'));
		$button_right 		= pll__(get_theme_mod('button_right', 'Browse'));	
	}
	$button_left_url	= get_theme_mod('button_left_url', '#primary');
	$button_right_url 	= get_theme_mod('button_right_url', '#primary');

	echo '<div class="header-info">
			<div class="header-info-inner">
				<h3 class="header-text">' . wp_kses_post($header_text) . '</h3>
				<div class="header-buttons">';
				if ($button_left_url) {
					echo '<a class="button header-button left-button" href="' . esc_url($button_left_url) . '">' . esc_html($button_left) . '</a>';
				}
				if ($button_right_url) {
					echo '<a class="button header-button right-button" href="' . esc_url($button_right_url) . '">' . esc_html($button_right) . '</a>';
				}
	echo 		'</div>';
	echo 	'</div>';
	echo '</div>';
}

/**
 * Header image check
 */
function west_has_header() {
	$front_header = get_theme_mod('front_header_type' ,'image');
	$site_header = get_theme_mod('site_header_type', 'image');
	global $post;
	if ( !is_404() ) {
	$single_toggle = get_post_meta( $post->ID, '_west_header_key', true );
	} else {
		$single_toggle = false;
	}

	if ( get_header_image() && ( $front_header == 'image' && is_front_page() ) || ( $site_header == 'image' && !is_front_page() ) ) 
		if (!$single_toggle)
		return 'has-header';
}

/**
 * Remove archives labels
 */
function west_category_label($title) {
    if ( is_category() ) {
        $title = '<i class="fa fa-folder-o"></i>' . single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = '<i class="fa fa-tag"></i>' . single_tag_title( '', false );    	
    } elseif ( is_author() ) {
		$title = '<span class="vcard"><i class="fa fa-user"></i>' . get_the_author() . '</span>';
	}
    return $title;
}
add_filter('get_the_archive_title', 'west_category_label');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Styles
 */
require get_template_directory() . '/inc/styles.php';

/**
 * Live Composer
 */
require get_template_directory() . '/inc/composer.php';


/**
 * Header metabox
 */
require get_template_directory() . '/inc/metabox.php';

/**
 *TGM Plugin activation.
 */
require get_template_directory() . '/tgmpa/class-tgm-plugin-activation.php';
 
add_action( 'tgmpa_register', 'west_recommend_plugin' );
function west_recommend_plugin() {
 
    $plugins = array(
        array(
            'name'               => 'Live Composer Page Builder',
            'slug'               => 'live-composer-page-builder',
            'required'           => false,
        ),        
    );
 
    tgmpa( $plugins);
 
}
//Post Available Section Shortcode
function gtag_func( $atts ) { 
   $datas = '';
  $datas .= '<div class="availability-block">';
	 $datas .= '<h3>Available at</h3>';
         $arts = wp_get_post_terms(get_the_ID(),'locations', array("fields" => "all"));
         $datas .='<div class="row">';
		foreach ($arts as $ar) {
			$datas .= '<div class="col-xs-6 col-sm-6 col-md-6 block-left">';
			$datas .= '<a href="'.get_site_url().'/locations/'.$ar->slug.'">Downunder RV '.$ar->name.'</a>';
			$datas .= '<a data-ps="'.$ar->name.'-s" href="#" class="'.$ar->slug.'open popen btn btn-default btn-block">Enquire Now</a>';
			$datas .= '</div>';
		}
		 $datas .= '</div>';
		 $datas .= '</div>';
   return $datas;


 }
add_shortcode( 'available', 'gtag_func' );
// if( function_exists('acf_add_options_page') ) {
// 	acf_add_options_page(array(
// 		'page_title' 	=> 'Location Settings',
// 		'menu_title'	=> 'Loction Settings',
// 		'menu_slug' 	=> 'location-settings',
// 		'capability'	=> 'edit_posts',
// 		'redirect'		=> false
// 	));
// }
function location_custom_taxonomies() {
	// Custom Taxonomy Location

	$locations = array(
		'name' => _x( 'Locations', 'taxonomy general name' ),
		'singular_name' => _x( 'Location', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search in Locations' ),
		'all_items' => __( 'All Locations' ),
		'most_used_items' => null,
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Location' ),
		'update_item' => __( 'Update Location' ),
		'add_new_item' => __( 'Add new Location' ),
		'new_item_name' => __( 'New Location' ),
		'menu_name' => __( 'Locations' ),
	);
	$args = array(
		'hierarchical' => true,
		'labels' => $locations,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'locations' , 'with_front' => false)
	);
    register_taxonomy( 'locations', array('post'), $args );
}
add_action( 'init', 'location_custom_taxonomies', 0 );

// Remove Tags column from post listing
function custom_manage_columns( $columns ) {
  unset($columns['tags']);
  unset($columns['comments']);
  return $columns;
}
function custom_column_init() {
  add_filter( 'manage_posts_columns' , 'custom_manage_columns' );
}
add_action( 'admin_init' , 'custom_column_init' );


// Custom tax Locations display for Posts
add_action('restrict_manage_posts', 'filter_by_tax_locations');
function filter_by_tax_locations() {
	global $typenow;
	$post_type = 'post'; // change to your post type
	$taxonomy  = 'locations'; // change to your taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => __("Show All {$info_taxonomy->label}"),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}

// Filter posts by tax Locations for Posts
add_filter('parse_query', 'tax_locations_convert_id_to_term_in_query');
function tax_locations_convert_id_to_term_in_query($query) {
	global $pagenow;
	$post_type = 'post'; // change to your post type
	$taxonomy  = 'locations'; // change to your taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}


//add version number to all JS and Style files to clear the cache

add_action('admin_init', 'set_up_js_css_version_setting_function');
function set_up_js_css_version_setting_function()
{
    register_setting('general', 'js-css_version-id', 'esc_attr');
    add_settings_field(
        'js-css_version-id',
        'JS and Css Version Number',
        'js_css_version_number_setting_callback_function',
        'general',
        'default',
        array( 'label_for' => 'js-css_version-id' )
    );
}
function js_css_version_number_setting_callback_function()
{
    $value = get_option( 'js-css_version-id');
    echo '<input type="text" id="js-css_version-id" name="js-css_version-id" value="' . $value . '" />';
}

function set_custom_ver_css_js( $src ) {
    // version number from settings / general field
    //add default value when option isnot set yet
    if ( get_option( 'js-css_version-id' ) === false ) // Nothing yet saved
        update_option( 'js-css_version-id', '1' );

    // version number from settings / general field
    $version =  get_option( 'js-css_version-id');
    if ( $version ) {

        if ( strpos( $src, 'ver=' ) )
            // use the WP function add_query_arg()
            // to set the ver parameter in
            $src = add_query_arg( 'ver', $version, $src );
        return esc_url( $src );
    }
}
add_action('init', 'css_js_versioning');
function css_js_versioning() {
    add_filter( 'style_loader_src', 'set_custom_ver_css_js', 9999 ); 	// css files versioning
    add_filter( 'script_loader_src', 'set_custom_ver_css_js', 9999 ); // js files versioning
}
/**  ENDING FUNCTION  **/


/**
 * set up the location function filter
 *
 * at category page using ajax
 *
 * then display caravans refined by location
 *
 */

function misha_filter_function(){
    // for taxonomies / categories

    $args = array('posts_per_page' => -1);
    if( isset( $_POST['dealerfilter'] )
        ||  isset( $_POST['brandfilter'] )
        ||  isset( $_POST['statefilter'])
        ||  isset( $_POST['conditionfilter'])):


        //show all posts at per page
        $args['tax_query'] = array(
            'relation' => 'AND'
        );
        if( isset( $_POST['dealerfilter'] )):
            $dealerFilter = array(
                            'taxonomy' => 'dealers',
                            'field' => 'id',
                            'terms' => $_POST['dealerfilter']
                            );
            array_push($args['tax_query'],$dealerFilter);
        endif;
        if( isset( $_POST['brandfilter'] )):
            $brandFilter =   array(
                'taxonomy' => 'brands',
                'field' => 'id',
                'terms' => $_POST['brandfilter']
            );
            array_push($args['tax_query'],$brandFilter);
        endif;

        if( isset( $_POST['conditionfilter'] )):
            $conditionFilter =   array(
                'taxonomy' => 'conditions',
                'field' => 'id',
                'terms' => $_POST['conditionfilter']
            );
            array_push($args['tax_query'],$conditionFilter);
        endif;


        if( isset( $_POST['statefilter'] )):
            $stateFilter =   array(
                'taxonomy' => 'states',
                'field' => 'id',
                'terms' => $_POST['statefilter']
            );
            array_push($args['tax_query'],$stateFilter);
        endif;


        $caravans = get_posts( $args );
    else :
        //do nothing and display all caravans

        //load all uncategorized caravans query
        $args = array(
            'post_type' => 'post',
            'orderby' => 'modified',
            'order' => 'DESC',
            'nopaging' => true,
            'post_status'  => 'publish'
        );
        $caravans =  get_posts( $args );
    endif;

    if( sizeof($caravans) > 0 ) :
        $count = 0;
        foreach( $caravans as $caravan ):
        ?>

            <?php if($count ==  0): ?>
                <div class="row">
            <?php endif; ?>
            <?php
            $post_price = get_field( "post_price",$caravan->ID );

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
                                <a href="<?php the_permalink(); ?>" >
                                    <h4 class="item-title"><?php echo get_the_title($caravan); ?></h4>
                                    <?php
                                    $post_price = get_field( "post_price" , $caravan->ID );
                                    $orc_field = get_field( "orc_field", $caravan->ID );
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

                <?php if($count ==  3): ?>
                    </div>
                    <?php  $count= 0; $open_element = false; ?>
                <?php endif; ?>

            <?php endif; ?>

        <?php endforeach; ?>

        <?php if($open_element ==  true): ?>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="row">
            <div class="col-sm-12">
                    <h3>There are no caravans meet this filter</h3>
            </div>
        </div>


    <?php endif; ?>

    <?php
    die();

}

add_action('wp_ajax_myfilter', 'misha_filter_function');
add_action('wp_ajax_nopriv_myfilter', 'misha_filter_function');
/**  ENDING FUNCTION  **/


/** add popup link to each image thumbnai at image gallery of product page **/
add_filter('easy_image_gallery_html','customize_easy_image_gallery_html',999,6);
function customize_easy_image_gallery_html($html, $rel, $image_link, $image_class, $image_caption, $image)
{

    $customizedhtml = sprintf( '<li><a %s href="%s" class="%s" title="%s"><i class="icon-view"></i><span class="overlay"></span>%s</a></li>', $rel, $image_link, $image_class, $image_caption, $image );

    return $customizedhtml;
}

/**  ENDING THE CUSTOMIZATION  **/

/* customize the thumbnail image size at product page */
add_filter('easy_image_gallery_thumbnail_image_size','customize_asy_image_gallery_thumbnail_image_size',999);

function customize_asy_image_gallery_thumbnail_image_size()
{
    //return width 500px and height approx 400px
    return array('500', '400');
}
/**  ENDING THE CUSTOMIZATION  **/


/**  HIDE THE START LOCATION AT STORE LOCATOR MAP  **/
add_filter( 'wpsl_js_settings', 'hide_start_location_settings' );

function hide_start_location_settings( $settings ) {

    $settings['startMarker'] = '';

    return $settings;
}
/**  ENDING THE CUSTOMIZATION  **/



/** Wordpres Custom Store locator template **/

add_filter( 'wpsl_templates', 'custom_store_locator_map_template' );

function custom_store_locator_map_template( $templates ) {

    /**
     * The 'id' is for internal use and must be unique ( since 2.0 ).
     * The 'name' is used in the template dropdown on the settings page.
     * The 'path' points to the location of the custom template,
     * in this case the folder of your active theme.
     */
    $templates[] = array (
        'id'   => 'custom_locator_map',
        'name' => 'Custom Sotre Locator Map template',
        'path' => get_template_directory() . '/' . 'wpsl-templates/custom_locator_map.php',
    );

    return $templates;
}

add_filter( 'wpsl_templates', 'custom_store_list_template' );

function custom_store_list_template( $templates ) {

    /**
     * The 'id' is for internal use and must be unique ( since 2.0 ).
     * The 'name' is used in the template dropdown on the settings page.
     * The 'path' points to the location of the custom template,
     * in this case the folder of your active theme.
     */
    $templates[] = array (
        'id'   => 'custom_store_list',
        'name' => 'Custom Sotre Locator Map template',
        'path' => get_template_directory() . '/' . 'wpsl-templates/custom_store_list.php',
    );

    return $templates;
}


/**  ENDING THE CUSTOMIZATION  **/


/** ADD THE DEALER TAXONOMY, STATES TAXONOMY AND BRANDS TAXONOMY **/


function dealer_custom_taxonomies()
{
    // Custom Taxonomy dealer
    $dealers = array(
        'name' => _x( 'Dealers', 'taxonomy general name' ),
        'singular_name' => _x( 'Location', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search in Dealers' ),
        'all_items' => __( 'All Dealers' ),
        'most_used_items' => null,
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Dealer' ),
        'update_item' => __( 'Update Dealer' ),
        'add_new_item' => __( 'Add new Dealer' ),
        'new_item_name' => __( 'New Dealer' ),
        'menu_name' => __( 'Dealers' ),
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $dealers,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'dealers' , 'with_front' => false),
        'show_admin_column' => true
    );
    register_taxonomy( 'dealers', array('post'), $args );
}
add_action( 'init', 'dealer_custom_taxonomies', 0 );


// Custom taxonomy dealer display for Posts
add_action('restrict_manage_posts', 'filter_by_tax_dealers');
function filter_by_tax_dealers()
{
    global $typenow;
    $post_type = 'post'; // change to your post type
    $taxonomy  = 'dealers'; // change to your taxonomy
    if ($typenow == $post_type) {
        $selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' => __("Show All {$info_taxonomy->label}"),
            'taxonomy'        => $taxonomy,
            'name'            => $taxonomy,
            'orderby'         => 'name',
            'selected'        => $selected,
            'show_count'      => true,
            'hide_empty'      => true,
        ));
    };
}

// Filter posts by tax dealers for Posts
add_filter('parse_query', 'tax_dealers_convert_id_to_term_in_query');
function tax_dealers_convert_id_to_term_in_query($query)
{
    global $pagenow;
    $post_type = 'post'; // change to your post type
    $taxonomy  = 'dealers'; // change to your taxonomy
    $q_vars    = &$query->query_vars;
    if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
        $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
        $q_vars[$taxonomy] = $term->slug;
    }
}

function states_custom_taxonomies()
{
    // Custom Taxonomy dealer
    $states = array(
        'name' => _x( 'States', 'taxonomy general name' ),
        'singular_name' => _x( 'State', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search in States' ),
        'all_items' => __( 'All States' ),
        'most_used_items' => null,
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit State' ),
        'update_item' => __( 'Update State' ),
        'add_new_item' => __( 'Add New State' ),
        'new_item_name' => __( 'New State' ),
        'menu_name' => __( 'States' ),
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $states,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'states' , 'with_front' => false),
        'show_admin_column' => true
    );
    register_taxonomy( 'states', array('post'), $args );
}
add_action( 'init', 'states_custom_taxonomies', 0 );


// Custom taxonomy states display for Posts
add_action('restrict_manage_posts', 'filter_by_tax_states');
function filter_by_tax_states()
{
    global $typenow;
    $post_type = 'post'; // change to your post type
    $taxonomy  = 'states'; // change to your taxonomy
    if ($typenow == $post_type) {
        $selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' => __("Show All {$info_taxonomy->label}"),
            'taxonomy'        => $taxonomy,
            'name'            => $taxonomy,
            'orderby'         => 'name',
            'selected'        => $selected,
            'show_count'      => true,
            'hide_empty'      => true,
        ));
    };
}

// Filter posts by tax states for Posts
add_filter('parse_query', 'tax_states_convert_id_to_term_in_query');
function tax_states_convert_id_to_term_in_query($query)
{
    global $pagenow;
    $post_type = 'post'; // change to your post type
    $taxonomy  = 'states'; // change to your taxonomy
    $q_vars    = &$query->query_vars;
    if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
        $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
        $q_vars[$taxonomy] = $term->slug;
    }
}

function brands_custom_taxonomies()
{
    // Custom Taxonomy dealer
    $brands = array(
        'name' => _x( 'Brands', 'taxonomy general name' ),
        'singular_name' => _x( 'Brand', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search in Brands' ),
        'all_items' => __( 'All Brands' ),
        'most_used_items' => null,
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Brand' ),
        'update_item' => __( 'Update Brand' ),
        'add_new_item' => __( 'Add New Brand' ),
        'new_item_name' => __( 'New Brand' ),
        'menu_name' => __( 'Brands' ),
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $brands,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'brands' , 'with_front' => false),
        'show_admin_column' => true
    );
    register_taxonomy( 'brands', array('post'), $args );
}
add_action( 'init', 'brands_custom_taxonomies', 0 );


// Custom taxonomy brands display for Posts
add_action('restrict_manage_posts', 'filter_by_tax_brands');
function filter_by_tax_brands()
{
    global $typenow;
    $post_type = 'post'; // change to your post type
    $taxonomy  = 'brands'; // change to your taxonomy
    if ($typenow == $post_type) {
        $selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' => __("Show All {$info_taxonomy->label}"),
            'taxonomy'        => $taxonomy,
            'name'            => $taxonomy,
            'orderby'         => 'name',
            'selected'        => $selected,
            'show_count'      => true,
            'hide_empty'      => true,
        ));
    };
}

// Filter posts by tax brands for Posts
add_filter('parse_query', 'tax_brands_convert_id_to_term_in_query');
function tax_brands_convert_id_to_term_in_query($query)
{
    global $pagenow;
    $post_type = 'post'; // change to your post type
    $taxonomy  = 'brands'; // change to your taxonomy
    $q_vars    = &$query->query_vars;
    if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
        $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
        $q_vars[$taxonomy] = $term->slug;
    }
}

function conditions_custom_taxonomies()
{
    // Custom Taxonomy dealer
    $conditions = array(
        'name' => _x( 'Conditions', 'taxonomy general name' ),
        'singular_name' => _x( 'Condition', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search in Conditions' ),
        'all_items' => __( 'All Conditions' ),
        'most_used_items' => null,
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Condition' ),
        'update_item' => __( 'Update Condition' ),
        'add_new_item' => __( 'Add New Condition' ),
        'new_item_name' => __( 'New Condition' ),
        'menu_name' => __( 'Conditions' ),
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $conditions,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'conditions' , 'with_front' => false),
        'show_admin_column' => true
    );
    register_taxonomy( 'conditions', array('post'), $args );
}
add_action( 'init', 'conditions_custom_taxonomies', 0 );


// Custom taxonomy condition display for Posts
add_action('restrict_manage_posts', 'filter_by_tax_conditions');
function filter_by_tax_conditions()
{
    global $typenow;
    $post_type = 'post'; // change to your post type
    $taxonomy  = 'conditions'; // change to your taxonomy
    if ($typenow == $post_type) {
        $selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' => __("Show All {$info_taxonomy->label}"),
            'taxonomy'        => $taxonomy,
            'name'            => $taxonomy,
            'orderby'         => 'name',
            'selected'        => $selected,
            'show_count'      => true,
            'hide_empty'      => true,
        ));
    };
}

// Filter posts by taxonomy conditionss for Posts
add_filter('parse_query', 'tax_conditions_convert_id_to_term_in_query');
function tax_conditions_convert_id_to_term_in_query($query)
{
    global $pagenow;
    $post_type = 'post'; // change to your post type
    $taxonomy  = 'conditions'; // change to your taxonomy
    $q_vars    = &$query->query_vars;
    if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
        $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
        $q_vars[$taxonomy] = $term->slug;
    }
}




/**  ENDING THE CUSTOMIZATION  **/