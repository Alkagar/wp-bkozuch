<?php get_header(); ?>

		<section class="center_col" id="posts">
			
			
			<article id="post" style="width:780px;">
				<div class="block_dec_line"></div>
				<div class="block">
				
					<div class="content">
<?php 

$noPageId = 178;
$post = get_post($noPageId);
$content = $post->post_content;
$title = $post->post_title;
?>


						<h1><?php _e($title); ?></h1><br />
						<p><?php _e($content); ?></p>
						<?php //get_search_form(); ?>
						<hr>
						<!-- <?php the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ), array( 'widget_id' => '404' ) ); ?> -->
						
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