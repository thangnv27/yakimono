<div id="footer" class="">
	<div class="row">
		<?php if (YSettings::g('theme_footer_columns', '4') == '4'): ?>
		<div class="col-md-3"><?php dynamic_sidebar('footer1'); ?></div>
		<div class="col-md-3"><?php dynamic_sidebar('footer2'); ?></div>
		<div class="col-md-3"><?php dynamic_sidebar('footer3'); ?></div>
		<div class="col-md-3"><?php dynamic_sidebar('footer4'); ?></div>
		<?php elseif (YSettings::g('theme_footer_columns', '4') == '3'): ?>
		<div class="col-md-4"><?php dynamic_sidebar('footer1'); ?></div>
		<div class="col-md-4"><?php dynamic_sidebar('footer2'); ?></div>
		<div class="col-md-4"><?php dynamic_sidebar('footer3'); ?></div>
		<?php elseif (YSettings::g('theme_footer_columns', '4') == '2'): ?>
		<div class="col-md-6"><?php dynamic_sidebar('footer1'); ?></div>
		<div class="col-md-6"><?php dynamic_sidebar('footer2'); ?></div>
		<?php else: ?>
		<div class="col-md-12"><?php dynamic_sidebar('footer1'); ?></div>
		<?php endif; ?>
	</div>
</div>