<?php
$headerSearch = YSetting::g('header_show_search', '0');
if ($headerSearch == '1'): ?>
<div id="search-outer">
	<div id="search">
		<div class="container">
			<div id="search-box">
				<div class="col-md-12">
					<form action="<?php echo home_url(); ?>" method="GET">
						<input type="text" name="s" id="s" value="<?php echo __('Start Typing...', THEME_NAME); ?>" data-placeholder="<?php echo __('Start Typing...', THEME_NAME); ?>" />
					</form>
				</div>
			 </div>
			 <div id="close"><a href="#"><span class="icon-close-x" aria-hidden="true"></span></a></div>
		 </div>
	</div>
</div>
<?php endif; ?>