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

            <div class="block" id="logo">
                <a href="<?php echo home_url(); ?>">
                    <?php 
                        if( of_get_option('upload_logo') != '') {echo '<img src="' , of_get_option('upload_logo') , '" alt="">';}
                        else { echo '<h1>' , bloginfo('name') , '</h1>'; }
                    ?>
                </a>
                <?php if( of_get_option('site_description', '1') == '1') {echo '<small>', bloginfo('description'), '</small>';}?>

                <div style='float:right; position:relative; left:15px; top:15px;'>
                    <a href='/' title='pl'><img src='/wp-content/plugins/qtranslate/flags/pl.png' alt='pl' /></a>
                    <a href='/en' title='en'><img src='/wp-content/plugins/qtranslate/flags/gb.png' alt='en' /></a>
                </div>
            </div>
            <div class="block_dec_line" id="logo"></div>
            <?php if (is_front_page()) : ?>
            <section class="left_col">
                <img src='<?php echo get_template_directory_uri();?>/img/zdjecie.jpg' width="180" alt='Barbara Kożuch' />
                <?php //get_sidebar(); ?>
            </section>
            <?php endif; ?>
            
            <div id='ddd' class="index-wrapper">
