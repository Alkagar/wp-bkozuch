			<!-- WIDGETS -->
			
			<?php dynamic_sidebar('sidebar'); ?>
			
			<!-- /WIDGETS -->
			
			<p class="in_full"><small>
				<?php 
				echo of_get_option('copy', '&copy; 2012 Firstyme - All rights reserved.'), '<br><br>';
				if( of_get_option('author_link', 'one') == 'one') {
					echo '<a href="http://charlieasemota.net/portfolio/firstyme/"><b>Firstyme WordPress Theme</b></a>.<br> Designed by <a href="', FTHEMEURI, '">Charlie Asemota</a>.';
					}
				?>
				
			</small></p>