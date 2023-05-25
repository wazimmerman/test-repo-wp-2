<?php
/*
        _               _                  _____        _     _ _     _   _   _                         
       (_)             | |                | ____|      | |   (_) |   | | | | | |                        
  _ __  _  ___ ___  ___| |_ _ __ __ _ _ __| |__     ___| |__  _| | __| | | |_| |__   ___ _ __ ___   ___ 
 | '_ \| |/ __/ _ \/ __| __| '__/ _` | '_ \___ \   / __| '_ \| | |/ _` | | __| '_ \ / _ \ '_ ` _ \ / _ \
 | |_) | | (_| (_) \__ \ |_| | | (_| | |_) |__) | | (__| | | | | | (_| | | |_| | | |  __/ | | | | |  __/
 | .__/|_|\___\___/|___/\__|_|  \__,_| .__/____/   \___|_| |_|_|_|\__,_|  \__|_| |_|\___|_| |_| |_|\___|
 | |                                 | |                                                                
 |_|                                 |_|                                                                

                                                       
*************************************** WELCOME TO PICOSTRAP ***************************************

********************* THE BEST WAY TO EXPERIENCE SASS, BOOTSTRAP AND WORDPRESS *********************

    PLEASE WATCH THE VIDEOS FOR BEST RESULTS:
    https://www.youtube.com/playlist?list=PLtyHhWhkgYU8i11wu-5KJDBfA9C-D4Bfl

*/

/*
	Dev
*/

// DE-ENQUEUE PARENT THEME BOOTSTRAP JS BUNDLE
add_action( 'wp_print_scripts', function(){
    wp_dequeue_script( 'bootstrap5' );
}, 100 );

// ENQUEUE THE BOOTSTRAP JS BUNDLE FROM THE CHILD THEME DIRECTORY
add_action( 'wp_enqueue_scripts', function() {
    //enqueue js in footer, async
    wp_enqueue_script( 'bootstrap5-childtheme', get_stylesheet_directory_uri() . "/js/bootstrap.bundle.min.js#asyncload", array(), null, true );
} ,101);

// ENQUEUE YOUR CUSTOM JS FILES, IF NEEDED 
add_action( 'wp_enqueue_scripts', function() {	   
    
    //UNCOMMENT next row to include the js/custom.js file globally
    wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js', array(/* 'jquery' */), null, true); 

    //UNCOMMENT next 3 rows to load the js file only on one page
    //if (is_page('mypageslug')) {
    //    wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js', array(/* 'jquery' */), null, true); 
    // }  

});

// OPTIONAL: ADD MORE NAV MENUS
//register_nav_menus( array( 'third' => __( 'Third Menu', 'picostrap' ), 'fourth' => __( 'Fourth Menu', 'picostrap' ), 'fifth' => __( 'Fifth Menu', 'picostrap' ), ) );
// THEN USE SHORTCODE:  [lc_nav_menu theme_location="third" container_class="" container_id="" menu_class="navbar-nav"]


// CHECK PARENT THEME VERSION as Bootstrap 5.2 requires an updated SCSSphp, so picostrap5 v2 is required
// add_action( 'admin_notices', function  () {
//     if( (pico_get_parent_theme_version())>=2) return;
// 	$class = 'notice notice-error';
// 	$message = __( 'This Child Theme requires at least Picostrap Version 2 for the SCSS compiler to work properly. Please update the parent theme.', 'picostrap' );
// 	printf( '<div class="%1$s"><h1>%2$s</h1></div>', esc_attr( $class ), esc_html( $message ) );
// } );

// FOR SECURITY: DISABLE APPLICATION PASSWORDS. Remove if needed (unlikely!)
add_filter( 'wp_is_application_passwords_available', '__return_false' );

// ADD YOUR CUSTOM PHP CODE DOWN BELOW /////////////////////////
add_theme_support('align-wide');

add_shortcode('bcn_display','bcn_display');

// Posts External Url
add_filter('post_link', 'site_posts_external_url', 10, 3);
add_filter('post_type_link', 'site_posts_external_url', 10, 3);
function site_posts_external_url($url, $post, $leavename = false)
{
	if (get_field('site_post_external_url', $post->ID)) {
		$url = get_field('site_post_external_url', $post->ID);
	}
	
	return $url;
}

// Posts Carousel - SC
add_action('wp_enqueue_scripts', 'site_posts_carousel_assets', 9);
function site_posts_carousel_assets()
{
	wp_enqueue_style(
		'site-posts-carousel-style',
		'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css',
		[],
		'1.0',
		'screen'
	);
	wp_enqueue_script(
		'site-posts-carousel-script',
		'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js',
		[],
		'1.0',
		'true'
	);
}
add_shortcode('site_posts_carousel', 'site_posts_carousel');
function site_posts_carousel($atts, $content, $tag)
{
	$html = '';

	$args = [
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 10,
		'orderby' => 'date',
		'order' => 'DESC'
	];
	$posts = get_posts($args);

	if (empty($posts)) {
		return;
	}

	$html .= '<div class="site-posts-carousel">';
		$html .= '<div class="e-container">';

			$html .= '<div class="e-top">';
				$html .= '<div class="e-top-row">';
					$html .= '<div class="e-top-col">';
						$html .= '<h2 class="e-top-title">News</h2>';
					$html .= '</div>';
					$html .= '<div class="e-top-col-auto">';
						$html .= '<div class="e-top-nav">';
							$html .= '<button class="e-slide-prev">&lt;</button>';
							$html .= '<button class="e-slide-next">&gt;</button>';
							$html .= '<a href="/category/news/in-the-news/" class="e-slide-link">All News &gt;</a>';
						$html .= '</div>';
					$html .= '</div>';
				$html .= '</div>';
			$html .= '</div>';

			$html .= '<div class="swiper">';
				$html .= '<div class="swiper-wrapper">';
					global $post;
					foreach ($posts as $post) {
						setup_postdata($post);
						$html .= '<div class="swiper-slide">';
							$html .= '<a href="'. get_permalink() .'" class="e-post-slide">';
								$html .= '<div class="e-post-slide-row">';

									$html .= '<div class="e-post-slide-image-col">';
										$html .= '<figure class="e-post-slide-image">';
											$html .= get_the_post_thumbnail(get_the_ID(), 'full');
										$html .= '</figure>';
									$html .= '</div>';

									$html .= '<div class="e-post-slide-content-col">';
										$html .= '<div class="e-post-slide-content">';
											$html .= '<p class="e-post-slide-meta">';
												$terms = get_the_terms(get_the_ID(), 'category');
												if (!empty($terms)) {
													$post_terms = [];
													foreach ($terms as $term) {
														// print_r($term);
														if ($term->parent) {
															$post_terms[] = $term->name;
														}
													}
													// $post_terms = wp_list_pluck($terms, 'name');
													if (!empty($post_terms)) {
														$html .= implode(', ', $post_terms);
														$html .= '<span style="margin: 0 0.5rem;">/</span>';
													}
												}
												// $html .= 'OP-ED';
												$html .= get_the_date('M j, Y');
											$html .= '</p>';
											$html .= '<h2 class="e-post-slide-title">';
												$html .= get_the_title();
											$html .= '</h2>';
										$html .= '</div>';
									$html .= '</div>';

								$html .= '</div>';
							$html .= '</a>';
						$html .= '</div>';
					}
					wp_reset_postdata();
				$html .= '</div>';
			$html .= '</div>';

		$html .= '</div>';
	$html .= '</div>';

	return $html;
}


