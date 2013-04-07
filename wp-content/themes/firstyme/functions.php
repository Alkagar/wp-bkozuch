<?php

##### Define content width;
if ( ! isset( $content_width ) ) $content_width = 500; 

// GENERAL
define('FTHEMEURI','http://charlieasemota.net');

// THEME SUPPORT

function firstyme_setup(){
	
	##### Feed Links
	
	add_theme_support( 'automatic-feed-links' );
	
	##### Post Thumbnails
	
	add_theme_support('post-thumbnails');
	
	##### Editor Style
	
	add_editor_style('custom-editor-style.css');
	
	##### Custom Header
	
	$defaults = array(
		'default-image'          => get_template_directory_uri() . '/img/header-default.jpg',
		'random-default'         => false,
		'width'                  => 700,
		'height'                 => 250,
		'flex-height'            => false,
		'flex-width'             => false,
		'default-text-color'     => '',
		'header-text'            => false,
		'uploads'                => true,
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $defaults );

	##### Add custom Background
	
	$def = array(
		'default-color'          => '',
		'default-image'          => get_template_directory_uri() . '/img/bg-default.png',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);
	add_theme_support( 'custom-background', $def );
	
	##### Register menu
	
	register_nav_menu( 'main_menu', 'Main menu' );
	
	##### Translation

	load_theme_textdomain( 'firstyme', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";

	if ( is_readable($locale_file) )
		require_once($locale_file);

}

add_action( 'after_setup_theme', 'firstyme_setup' );

##### Register sidebar
	
function firstyme_sidebar() {
	register_sidebar(array('name' => 'Sidebar',
		'before_widget' => '<div class="block_dec_line"></div><div class="block">',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		'after_widget' => '</div><!-- /block -->'
	));
}
	
add_action( 'widgets_init', 'firstyme_sidebar' );

// COMMENTS

##### Enqueue comment-reply script

function firstyme_comment_reply() {
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
                wp_enqueue_script( 'comment-reply' );
        }
}
add_action( 'wp_enqueue_scripts', 'firstyme_comment_reply' );

##### Single comment layout

if ( ! function_exists( 'firstyme_comments' ) ) :
	function firstyme_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>

						<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
							<div id="div-comment-<?php comment_ID() ?>" class="f_comment">
								<div class="comment_meta">
									<small>
										by <?php comment_author_link(); ?><br>
										<?php get_comment_date(); ?>
										<?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
										<?php edit_comment_link() ?>
									</small>
								</div>
								<!-- /comment_meta -->
								<div class="comment_content">
									<?php if ($comment->comment_approved == '0') : ?>
									<em><?php _e('Your comment is awaiting moderation.', 'firstyme') ?></em>
									<?php else : ?>
									<?php comment_text() ?>
									<?php endif; ?>
								</div>
								<!-- /comment_content -->
								<div class="clear"></div>
							</div>

<?php } endif; 

##### Before Comment Form
function firstyme_before_form() {
	echo '<div id="comments_form"><div class="block_dec_line"></div><div class="block">';
	}
add_action('comment_form_before', 'firstyme_before_form');
##### After Comment Form
function firstyme_after_form() {
	echo '</div><!-- /block --></div><!-- /comments_form -->';
	}
add_action('comment_form_after', 'firstyme_after_form');



/*-----------------------------------------------------------------------------------*/
/* Options Framework Theme
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'optionsframework_init' ) ) {
	
/* Set the file path based on whether the Options Framework Theme is a parent theme or child theme */

if ( get_stylesheet_directory()  == get_template_directory() ) {
	define('OPTIONS_FRAMEWORK_URL', get_template_directory() . '/admin/');
	define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/');
} else {
	define('OPTIONS_FRAMEWORK_URL', get_stylesheet_directory() . '/admin/');
	define('OPTIONS_FRAMEWORK_DIRECTORY', get_stylesheet_directory_uri() . '/admin/');
}

require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');

}

/* 
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});
	
	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}
	
});
</script>

<?php
}

### theme configuration functions

function fistyme_home_post_info_top() {
	$info_multicheck = of_get_option('post_info');
	if ($info_multicheck['one'] == "1" ) the_date('Y/m/d'); 
	if ($info_multicheck['one'] == "1" && $info_multicheck['two'] == "1") echo " - ";
	if ($info_multicheck['two'] == "1" ) {_e('Author:', 'firstyme'); echo " "; the_author();}
	}
function fistyme_home_post_info_bottom() {
	$info_multicheck = of_get_option('post_info');
	if ($info_multicheck['five'] == "1" ) {
		if ( ! have_comments() ): if ( ! comments_open() ) : _e('Comments are closed', 'firstyme');  else: comments_number(); endif;  else: comments_number(); endif;
		}
	if ($info_multicheck['five'] == "1" && $info_multicheck['three'] == "1") echo " - ";
	if ($info_multicheck['three'] == "1" ) {_e('Categories:', 'firstyme'); echo " "; the_category(', ');}
	}
function fistyme_post_info_top() {
	$info_multicheck = of_get_option('post_info');
        if ($info_multicheck['one'] == "1" ) the_date('Y/m/d'); 
	if ($info_multicheck['one'] == "1" && $info_multicheck['two'] == "1") echo " - ";
	if ($info_multicheck['two'] == "1" ) {_e('Author:', 'firstyme'); echo " "; the_author();}
	if (($info_multicheck['one'] == "1" && $info_multicheck['five'] == "1") || (($info_multicheck['two'] == "1" && $info_multicheck['five'] == "1"))) echo " - ";
	if ($info_multicheck['five'] == "1" ) {
		if ( ! have_comments() ): if ( ! comments_open() ) : _e('Comments are closed', 'firstyme');  else: comments_number(); endif;  else: comments_number(); endif;
		}
	}
function fistyme_post_info_bottom() {
	$info_multicheck = of_get_option('post_info');
	if ($info_multicheck['three'] == "1" ) {_e('Categories:', 'firstyme'); echo " "; the_category(', ');}
	if ($info_multicheck['four'] == "1" ) {the_tags(' - Tag: ');}
	}
	
function firstyme_content_display() {
	if( of_get_option('post_home', 'one') == 'one') {the_content();}
	else {the_excerpt();}
	}
function firstyme_menu_position() {
        return '';
	of_get_option('nav_position', 'one');
	if(of_get_option('nav_position', 'one') == "one") return "fixed";
	else return "absolute";
	}
	
function firstyme_custom_style() {
	echo
	'<style type="text/css">
	body, article a#title {color:', of_get_option('main_color', '#413d3d') , '}
	#logo.block, input[type="submit"], button {background:', of_get_option('main_color', '#413d3d'), '}
	nav ul li a:hover, #nav ul li.current_page_item a {color:', of_get_option('main_color', '#413d3d'), '; border-left-color:', of_get_option('main_color', '#413d3d'), ';}
	input[type="text"], input[type="password"], textarea, .block_dec_line, #sel a {background:', of_get_option('secondary_color', '#aeacac'), '}
	input[type="submit"], button, #nav ul li a {color:', of_get_option('secondary_color', '#aeacac'), '}
	#nav ul li a {border-left: 5px solid ', of_get_option('secondary_color', '#aeacac'), '}
	b, strong {background:', of_get_option('bold_bg', '#FF3'), ';}
	.block {background:', of_get_option('content_background', '#ffffff'), '}
	.sticky .block {background:', of_get_option('sticky', '#FF9'), '}
	a {color:', of_get_option('links_color', '#6b1deb'), '}
	.wp-caption {background:', of_get_option('caption_background', '#f1f1f1'), '}
	blockquote {background:', of_get_option('quotes_background', '#E4E4E7'), '; color:', of_get_option('quotes_color', '#333'), ';}
	#nav ul {position:', firstyme_menu_position(), ';}
	table {background: ', of_get_option('table_bg', '#E4E4E7'), ';}
	td, th {border-bottom: 1px solid', of_get_option('content_background', '#ffffff'), ';}
	td {color:', of_get_option('table_font', '#333'), ';}
	th {color:', of_get_option('table_h_font', '#fff'), '; background:', of_get_option('table_h_bg', '#aeacac'), '; }
	.bypostauthor {background:', of_get_option('author_comment', '#ffff33'), ';}
	ul.children {padding-left:20px; border-left:5px solid ', of_get_option('secondary_color', '#aeacac'), ';}',
	of_get_option('cust_css')
	,'</style>'
	;
	
}
	
add_action( 'wp_head', 'firstyme_custom_style' );

function firstyme_html5_google(){
	echo '<!--[if IE]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->';
}
add_action( 'wp_head', 'firstyme_html5_google' ) ;

?>
