<!DOCTYPE HTML>
<html>
<head <?php language_attributes();?> >
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>">
	<meta charset="<?php bloginfo('charset'); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<title><?php wp_title('-', true, 'right'); bloginfo( 'name' ); ?></title>
	<?php if( of_get_option('upload_favicon') != '') {echo '<link rel="shortcut icon" type="image" href="' , of_get_option('upload_favicon') , '" />';}?>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link href="<?php echo get_stylesheet_uri() ; ?>" type="text/css" rel="stylesheet">
	<meta name="viewport" content="width=device-width; initial-scale=1.0" />

	<?php
	if( of_get_option('tracking_code') != '') {echo of_get_option('tracking_code');}
	wp_head(); 
	?>
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/print.css" type="text/css" media="print" />
	
</head>
<!-- /head -->
<body <?php body_class(); ?> >
	<div class="site_container">
		<section class="left_col">
			<div class="block" id="logo">
				<a href="<?php echo home_url(); ?>">
					<?php 
					if( of_get_option('upload_logo') != '') {echo '<img src="' , of_get_option('upload_logo') , '" alt="">';}
					else { echo '<h1>' , bloginfo('name') , '</h1>'; }
					?>
				</a>
				<?php if( of_get_option('site_description', '1') == '1') {echo '<small>', bloginfo('description'), '</small>';}?>
			</div>
			<div class="block_dec_line" id="logo"></div>
			<!-- /block -->
			
			<section class="resp_menu" id="sel">
				<a href="javascript:void(0)" onClick="document.getElementById('menu').style.display='block'">Menu</a>
			</section>
			
			<?php get_sidebar(); ?>
			
		</section>
		<!-- /left_col -->
		
		<div class="index-wrapper">
			<div style='float:right; margin-right:-45px; margin-top:-18px;'>
				<a href='/en' title='en'><img src='/wp-content/plugins/qtranslate/flags/gb.png' alt='en' /></a>
				<a href='/' title='pl'><img src='/wp-content/plugins/qtranslate/flags/pl.png' alt='pl' /></a>
			</div>
