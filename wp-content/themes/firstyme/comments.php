<?php if ( post_password_required() ) : ?>
			<div id="comments-list-wrapper">
				<div class="block_dec_line"></div>
				<div class="block">
					
					<p class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'firstyme'); ?></p>
					
				</div>
				<!-- /block -->
			</div>
			<!-- /comments-list-wrapper -->	
<?php return; endif; ?>
					
<?php if ( have_comments() ) : ?>

			<div id="comments-list-wrapper">
				<div class="block_dec_line"></div>
				<div class="block">

					<h1><?php _e('Discussion', 'firstyme') ?> (<?php comments_number(); ?>)</h1>

					<ol class="comment_list">
					
						<div id="page_nav_up">
							<?php next_comments_link(); ?>
						</div>
						<!-- /page_nav_up -->
						
						<?php wp_list_comments( array( 'callback' => 'firstyme_comments' ) );?>
						
						<div id="page_nav_down">
							<?php previous_comments_link(); ?>
						</div>
						<!-- /page_nav_up -->
						
					</ol>
					
				</div>
				<!-- /block -->
			</div>
			<!-- /comments-list-wrapper -->
			
<?php else : // or, if we don't have comments:
# If there are no comments and comments are closed
if ( ! comments_open() ) :
# If there are no comments and comments are open
else:
endif; // end ! comments_open()
endif; // end have_comments() ?>
	
<?php 
comment_form(); 
?>


