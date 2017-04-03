<div id="search-box">
		<form action="<?php echo get_home_url();?>" method="get">
			<input type="text" onBlur="if (this.value == '') {this.value = 'Search...';}" onFocus="if(this.value == 'Search...') {this.value = '';}" value="Search..." id="s" name="s" class="search-field" size="15">
			<input type="submit" id="searchsubmit" value=" &gt; ">
		</form>
	</div>