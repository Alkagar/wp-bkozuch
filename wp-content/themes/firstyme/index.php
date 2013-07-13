<?php get_header(); ?>
	
		<?php if (false && is_front_page() && !is_paged() && get_header_image() ) :?>
		<div class="header_img">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" title=""/>
		</div>
		<?php endif; ?>
		
                <section style='<?php echo is_front_page() ? '': 'width:780px;';?>' class="center_col" id="posts">
			
			<div id="page_nav_up">
				<?php previous_posts_link(); ?> 
			</div>
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="block_dec_line"></div>
				<div class="block">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><h1><?php the_title(); ?></h1></a>
					<small><?php fistyme_home_post_info_top(); ?></small>
				
					<div class="content">
						<?php if ( has_post_thumbnail() ) { the_post_thumbnail();} ?>
						<?php firstyme_content_display(); ?>
						<?php if( get_the_title() == ""){?>
							<p><small><a href="<?php the_permalink()?>" title="<?php the_title_attribute(); ?>"><?php _e('Go to the post &rsaquo;', 'firstyme'); ?></a></small></p>
						<?php }?>
					</div>
					<!-- /content -->
				
					<div class="clear"></div>
				
					<p><small><?php fistyme_home_post_info_bottom(); ?></small></p>
				</div>
				<!-- /block -->
			</article>
			<!-- /article -->
			<?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts on this blog yet.', 'firstyme'); ?></p>
			<?php endif; ?>
			
			
			<div id="page_nav_down">
				<?php next_posts_link(); ?> 
			</div>
		</section>
		<!-- /center_col -->
	
		<?php get_footer(); ?>
