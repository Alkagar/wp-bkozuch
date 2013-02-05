<?php get_header(); ?>
		<section class="center_col" id="posts">
		
			<div class="block" id="logo">
				<h3>
					<?php _e('Archive for', 'firstyme'); ?>:
					<?php 
					if ( is_month() ) : echo get_the_date( _x( 'F Y', 'monthly archives date format', 'firstyme' ) );
					elseif ( is_year() ) : echo get_the_date( _x( 'Y', 'yearly archives date format', 'firstyme' ) );
					elseif ( is_day() ) : echo get_the_date();
					else :  single_cat_title(); endif; ?>
				</h3>
			</div>
			<div class="block_dec_line" id="logo"></div>
			<!-- /block -->
			
			<div id="page_nav_up">
				<?php previous_posts_link(); ?> 
			</div>
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
				<div class="block_dec_line"></div>
				<div class="block">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" id="title"><h1><?php the_title(); ?></h1></a>
					<small><?php fistyme_home_post_info_top(); ?></small>
				
					<div class="content">
						<?php if ( has_post_thumbnail() ) { the_post_thumbnail();} ?>
						<?php the_content(); ?>
						<?php if( get_the_title() == ""){?>
							<p><small><a href="<?php the_permalink()?>" title="<?php the_title_attribute() ?>"><?php _e('Go to the post &rsaquo;', 'firstyme'); ?></a></small></p>
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
			
			
			<div id="page_nav_down">
				<?php next_posts_link(); ?> 
			</div>
		</section>
		<!-- /center_col -->
		
		<?php get_footer(); ?>