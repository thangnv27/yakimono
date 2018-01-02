<div id="yopress-wrap" class="wrap">
	<div class="yopress-header">
		<h3><?php
       	if (!defined("THEME_PRETTY")) {
           echo "<strong>yo</strong>press";
       	} else {
           echo THEME_PRETTY;
        }
       	?></h3>
		<p class="about-description"><?php _t('admin panel');?></p>
	</div>

	<div class="yopress-adminmenuback"></div>
	<div class="yopress-adminmenuwrap">
			<ul class="yopress-admin-menu">
			<?php 
				if(!isset($_GET['tab'])) $_GET['tab'] = 'general-settings';
				foreach($pages as $page){
					foreach($page as $p){
						$current = '';
						if($_GET['tab'] == $p['id']) $current = 'current';
						echo '<li class="menu-top '.$current.'"><a class="menu-top" href="'.get_admin_url().'themes.php?page='.YoPressBase::instance()->getAdminPageId().'&tab='.$p['id'].'"><div class="wp-menu-name">'.$p['name'].'</div></a></li>';
					}
				}
			?>
			</ul>
	</div>

<div id="wpcontent">
	<div id="wpbody">
		<div id="wpbody-content" tabindex="0">
			<div class="wrap">
				<div class="yopress-navbar">
					<ul>
						<li>
							<small id="yopress-saved" style="margin-right:10px;font-size:14px;float:right; color: rgb(68, 197, 0); display: none"><?php _t('Settings saved');?></small>
						</li>
					</ul>
				</div>
				<div class="yopress-admin-content">
					
					<?php 
						$formRenderer = YoPressFormModule::instance();
						
						$class = '';
						
						foreach($pages as $levels){
							foreach($levels as $page){ 
								
								if($page['id'] == $_GET['tab']) { ?>
								<div id="<?php echo $page['id'];?>" class="yopress-admin-page <?php echo $class;?>">
									<?php if(isset($settings[$page['id']])) : ?>
									<form name="yopress" id="yopress" method="post" action="">
										<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _t('Save Changes');?>"></p>
										<?php wp_nonce_field() ?>
										
										<!--<h2><?php echo $page['name'];?></h2>-->
										<?php foreach($settings[$page['id']] as $levels) :
													$setting = array();
													foreach($levels as $s) :
														if (isset($s['param'])) {
															$setting = call_user_func_array($s['func'], array($s['param']));	
														} else {
															$setting = call_user_func($s['func']);
														}
														
														?>
														<h3><?php echo $s['name'];?></h3>
														<table class="form-table">
															<tbody>					
																	<?php foreach($setting as $singleSetting) : ?>
																		<?php $formRenderer->activeRow($singleSetting['name'], $singleSetting); ?>
																	<?php endforeach;?>
															</tbody>
														</table>
													<?php endforeach; ?>
										<?php endforeach; ?>
							
										<p class="submit"><input type="submit" name="submit" id="submitbottom" class="button button-primary" value="<?php _t('Save Changes');?>"></p>
																
										</form>
									<?php endif;?>
								</div>
					
								<?php	} 
								//$class = 'hidden';
							}
						}
					?>
					<input type="hidden" value="" id="yopress-admin-currentpage"/>
				</div>			

			</div>

			<div class="clear"></div>

		</div><!-- wpbody-content -->
		<div class="clear"></div>

	</div><!-- wpbody -->
	<div class="clear"></div>

</div><!-- wpcontent -->

<div class="yopress-footer">
	<p class="alignleft"><span id="footer-thankyou"><?php _t('Created by');?> <a href="http://yosoftware.com/">yosoftware</a>.</span></p>
	<p class="alignright"><?php $theme = wp_get_theme(); _t('Theme Version');?> <?php echo $theme->version; ?></p>
<div class="clear"></div>
</div>


	
</div>
