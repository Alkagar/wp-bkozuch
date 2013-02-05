<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function firstyme_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = wp_get_theme(get_stylesheet_directory()  . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$firstyme_settings = get_option('firstyme');
	$firstyme_settings['id'] = $themename;
	update_option('firstyme', $firstyme_settings);
	
	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function firstyme_options() {
	
	// Options values
	$menu_position = array("one" => "Fixed","two" => "Static");
	$post_home = array("one" => "Full content","two" => "Excerpt");
	$post_info = array("one" => "Date", "two" => "Author", "three" => "Categories", "four" => "Tag", "five" => "Comments count");
		$post_info_defaults = array("one" => "1", "two" => "1" ,"five" => "1", "three" => "1","four" => "1");
	$author_links = array("one" => "Yes","two" => "No");
	
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_stylesheet_directory_uri() . '/images/';
		
	$options = array();
	
	##### Basic Settings
	$options[] = array( "name" => "Basic Settings",
						"type" => "heading");
	
	$options[] = array( "name" => "Custon Logo",
						"desc" => "Upload a logo for your website, or specify the url of the image.",
						"id" => "upload_logo",
						"type" => "upload");
						
	$options[] = array( "name" => "Custon Favicon",
						"desc" => "Upload a 16x16 px image that will represent your favicon.",
						"id" => "upload_favicon",
						"type" => "upload");
							
	$options[] = array( "name" => "Site Description",
						"desc" => "Display site description?",
						"id" => "site_description",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => "Tracking Code",
						"desc" => "Paste your Google Analytics or any other tracking code here.",
						"id" => "tracking_code",
						"std" => "",
						"type" => "textarea"); 
						
	##### Style Settings
	$options[] = array( "name" => "Style",
						"type" => "heading");
						
	$options[] = array( "name" => "Main Color",
						"desc" => "The main color of the theme.",
						"id" => "main_color",
						"std" => "#413d3d",
						"type" => "color");
						
	$options[] = array( "name" => "Secondary Color",
						"desc" => "The secondary color of the theme.",
						"id" => "secondary_color",
						"std" => "#aeacac",
						"type" => "color");
	
	$options[] = array( "name" => "Content Background",
						"desc" => "Choose a background color for the content.",
						"id" => "content_background",
						"std" => "#ffffff",
						"type" => "color");
	
	$options[] = array( "name" => "Sticky post Content Background",
						"desc" => "Choose a background color for the sticky post content.",
						"id" => "sticky",
						"std" => "#ffff99",
						"type" => "color");
						
	$options[] = array( "name" => "Bold text background",
						"desc" => "Choose a background color for <b>&lt;b&gt;&lt;/b&gt;</b> and  <b>&lt;strong&gt;&lt;/strong&gt;</b>.",
						"id" => "bold_bg",
						"std" => "#FFFF33",
						"type" => "color");
						
	$options[] = array( "name" => "Links color",
						"id" => "links_color",
						"std" => "#6b1deb",
						"type" => "color");
						
	$options[] = array( "name" => "Caption Background",
						"id" => "caption_background",
						"std" => "#f1f1f1",
						"type" => "color");
						
	$options[] = array( "name" => "Quotes Background",
						"desc" => "Choose a background color for quotes.",
						"id" => "quotes_background",
						"std" => "#E4E4E7",
						"type" => "color");
						
	$options[] = array( "name" => "Quotes font color",
						"id" => "quotes_color",
						"std" => "#333333",
						"type" => "color");
						
	$options[] = array( "name" => "Table Background",
						"desc" => "Choose a background color for the tables content.",
						"std" => "#E4E4E7",
						"id" => "table_bg",
						"type" => "color");
						
	$options[] = array( "name" => "Table font color",
						"desc" => "Choose a color for the fonts in tables body.",
						"id" => "table_font",
						"std" => "#333333",
						"type" => "color");
						
	$options[] = array( "name" => "Table header Background",
						"desc" => "Choose a background color for the tables Headers.",
						"std" => "#aeacac",
						"id" => "table_h_bg",
						"type" => "color");
						
	$options[] = array( "name" => "Table header font color",
						"desc" => "Choose a color for the fonts in tables Headers.",
						"std" => "#ffffff",
						"id" => "table_h_font",
						"type" => "color");
						
	$options[] = array( "name" => "Author comments",
						"desc" => "Choose a background color for authors comments.",
						"std" => "#FFFF33",
						"id" => "author_comment",
						"type" => "color");
	
	$options[] = array( "name" => "Navigatin Position",
						"id" => "nav_position",
						"std" => "one",
						"type" => "radio",
						"options" => $menu_position);
	
	$options[] = array( "name" => "Custom CSS Styles",
						"desc" => "Insert your custom css here, so you won't loose your custom style when updating your website.",
						"id" => "cust_css",
						"std" => "body {}",
						"type" => "textarea"); 
	
	##### Post settings
	$options[] = array( "name" => "Posts &amp; Pages",
						"type" => "heading");
						
	$options[] = array( "name" => "Post info",
						"desc" => "Informations you want to display in your posts.",
						"id" => "post_info",
						"std" => $post_info_defaults,
						"type" => "multicheck",
						"options" => $post_info);
	
	$options[] = array( "name" => "Display post content",
						"desc" => "Choose how you want to display your posts in home page or in the archives",
						"id" => "post_home",
						"std" => "one",
						"type" => "radio",
						"options" => $post_home);
						
						
	##### Credits
	$options[] = array( "name" => "Credits",
						"type" => "heading");
						
	$options[] = array( "name" => "About the author",
						"desc" => 
						
						"
						<p>Thanks for downloading my theme, I'm glad you liked it.</p>
						<p>My name is Charlie Asemota, I'm a young Web & UI designer and developer based in Italy.</p>
						
						<p>I've always been passionate about computers, web and technology in general, but a few years ago I decided to focus on the field of Web design and development of web applications.</p>
						<hr>
						<p>If you are interested in my works and would like to stay updated, you can follow me here:</p>
						<ol>
							<li>Twitter: <a href='https://twitter.com/CharlieAsemota'>@CharlieAsemota</a></li>
							<li>Skype: Asemota_94</li>
							<li>Facebook: <a href='https://www.facebook.com/CharlieasemotaWebDesign'>Charlie Asemota</a></li>
							<li>Website: <a href='http://charlieasemota.net'>charlieasemota.net<a></li>
						</ol>
						
						",
						"type" => "info");
						
	$options[] = array( "name" => "Copy",
						"desc" => "The text you write in here will be displayed at the bottom of your sidebar.",
						"id" => "copy",
                                                "std" => "&copy; 2013 mrowiec.org - All rights reserved.",
						"type" => "textarea"); 
						
	$options[] = array( "name" => "Show Author Credit links",
						"desc" => "Do you want to display my credit links at the bottom of your sidebar? (If you like the theme, it would be a nice thing if you leave the links, thanks)",
						"id" => "author_link",
						"std" => "one",
						"type" => "radio",
						"options" => $author_links);
						
	##### Credits
	$options[] = array( "name" => "Support",
						"type" => "heading");
						
	$options[] = array( "name" => "Get support",
						"desc" => 
						
						"
						<p>You can easily get support from the authors facebook or twitter page.</p>
				<ul>
					<li><b>Facebook</b>: Like the <a href='https://www.facebook.com/CharlieasemotaWebDesign' target='_blank'>Authors page</a> and post your question</li>
					<li><b>Twitter</b>: Follow the author account <a href='https://twitter.com/CharlieAsemota'>@CharlieAsemota</a> and send him a tweet </li>
					<li>In case you don't have one of those you can write to support@charlieasemota.net</li>
				</ul>
				
						",
						"type" => "info");
	$options[] = array( "name" => "Give Support",
						"desc" => 
						
						"
						<p>If you liked the Theme please donate any ammount to support the author and show your appreciation. Thanks.</p>
				<p><a href='https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=B2VW6C6Y32FZY'>Click here to donate</a></p>

						",
						"type" => "info");
			
	return $options;
}
