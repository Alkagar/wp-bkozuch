<form method="get" name="searchform" action="<?php echo home_url() ?>/" >
	<input type="text" name="s" class='search-f' value="<?php _e('Search', 'firstyme'); ?>..." onfocus="if (this.value == '<?php _e('Search', 'firstyme'); ?>...') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search', 'firstyme'); ?>...';}"/>
	<input class="n" type="submit" name="search" value="<?php _e('Search', 'firstyme'); ?>"/>
</form>