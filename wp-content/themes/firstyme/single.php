<?php get_header(); ?>
		<section class="center_col" id="posts">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="block_dec_line"></div>
				<div class="block" id="post-<?php the_ID(); ?>">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" id="title"><h1><?php the_title(); ?></h1></a>
					<small><?php fistyme_post_info_top(); ?></small>
				
					<div class="content">
						<?php if ( has_post_thumbnail() ) { the_post_thumbnail();} ?>
						<?php the_content(); ?>
					</div>
					<!-- /content -->
					
					<div class="clear"></div>
					
					<?php wp_link_pages( array(
    				'before'           => '<p><small>' . __('Pages:', 'firstyme'),
    				'after'            => '</small></p>',
    				'next_or_number'   => 'number',
    				'pagelink'         => '%',
    				'echo'             => 1 )); ?> 
					
					<p><small><?php fistyme_post_info_bottom(); ?></small></p>
					
				</div>
				<!-- /block -->
			</article>
			<!-- /article -->
			
			<div id="post_nav_links">
				<div id="page_nav_left"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'firstyme' ) . '</span> %title' ); ?></div>
				<div id="page_nav_right"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'firstyme' ) . '</span>' ); ?></div>
			</div>
			
			<div class="clear"></div>
			
			<?php endwhile; else: ?>
				<article id="post">
				<div class="block_dec_line"></div>
				<div class="block">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" id="title"><h1><?php the_title(); ?></h1></a>
				
					<div class="content">
						<h1><?php _e('Sorry, no post matched your criteria', 'firstyme'); ?></h1>
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'fistyme' ); ?></p>
						<br>
						<?php get_search_form(); ?>
						<hr>
						<?php the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ), array( 'widget_id' => '404' ) ); ?>
						
					</div>
					<!-- /content -->
					
					<div class="clear"></div>
				
				</div>
				<!-- /block -->
			</article>
			<!-- /article -->
			<?php endif; ?>
			
			<?php comments_template(); ?>
			
		</section>
		<!-- /center_col -->
		
		<?php get_footer(); ?>