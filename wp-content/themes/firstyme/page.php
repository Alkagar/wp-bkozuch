<?php get_header(); ?>

                <section style='<?php echo is_front_page() ? '': 'width:780px;';?>' class="center_col" id="posts">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article id="post">
				<div class="block_dec_line"></div>
				<div class="block">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" id="title"><h1><?php the_title(); ?></h1></a>
<br />
				
					<div class="content">
						<?php if ( has_post_thumbnail() ) { the_post_thumbnail();} ?>
						<?php the_content(); ?>
					</div>
					<!-- /content -->
					
					<div class="clear"></div>
				
				</div>
				<!-- /block -->
			</article>
			<!-- /article -->
			<?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.', 'firstyme'); ?></p>
			<?php endif; ?>
			
			<?php comments_template(); ?>
			
		</section>
		<!-- /center_col -->
		
		<?php get_footer(); ?>
