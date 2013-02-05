<?php get_header(); ?>

		<section class="center_col" id="posts">
			
			
			<article id="post">
				<div class="block_dec_line"></div>
				<div class="block">
				
					<div class="content">
						<h1><?php _e('Error 404', 'firstyme'); ?></h1>
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
			
		</section>
		<!-- /center_col -->
		
		<?php get_footer(); ?>