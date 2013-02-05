		<section class="right_col" id="nav">
			<?php wp_nav_menu( array('theme_location' => 'main_menu' )); ?>
		</section>
		<!-- /right_col -->
	</div>
	<!-- /index-wrapper -->
		<div class="clear" id="page_end"></div>
	</div>
	<!-- /site_container -->
	<section class="resp_menu" id="menu">
		<div class="site_container">
			<div id="sel">
				<a href="javascript:void(0)" onclick="document.getElementById('menu').style.display='none'">Hide menu</a>
			</div>
			<?php wp_nav_menu( array('theme_location' => 'main_menu' )); ?>
		</div>
	</section>
		
	 <?php wp_footer(); ?>
</body>
</html>
