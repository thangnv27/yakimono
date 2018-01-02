
<?php 

require_once '../../../../wp-config.php';



?>
<html>
	<head>
		<script type="text/javascript" src="<?php echo home_url();?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
		<script type="text/javascript" src="<?php echo home_url();?>/wp-includes/js/jquery/jquery.js"></script>
        <link rel="stylesheet" href="<?php echo YoPressBase::instance()->getCoreUrl();?>/css/grid.css">
        <link rel="stylesheet" href="<?php echo YoPressBase::instance()->getCoreUrl();?>/yopress/admin/css/popups.css">
	</head>
	<body>
        <div class="custm-tab">
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <td colspan="2">
                            <h3>Embed icon</h3>
                            <p><strong>Note:</strong> <i>You can embed icons into buttons for more personalised look.</i></p>
                        </td>
                    </tr>
                    <tr valign="top">
                        <td colspan="2">
                            <span class="icon icon-addtag"></span>
                            <span class="icon icon-alarm"></span>
                            <span class="icon icon-anchors"></span>
                            <span class="icon icon-arrow-down"></span>
                            <span class="icon icon-arrow-left"></span>
                            <span class="icon icon-arrow-right"></span>
                            <span class="icon icon-arrow-up"></span>
                            <span class="icon icon-article-add"></span>
                            <span class="icon icon-article-remove"></span>
                            <span class="icon icon-article"></span>
                            <span class="icon icon-attachment-2"></span>
                            <span class="icon icon-attachment"></span>
                            <span class="icon icon-basil"></span>
                            <span class="icon icon-basket"></span>
                            <span class="icon icon-beer-empty"></span>
                            <span class="icon icon-beer"></span>
                            <span class="icon icon-bike"></span>
                            <span class="icon icon-bill"></span>
                            <span class="icon icon-block"></span>
                            <span class="icon icon-bottle-w-label"></span>
                            <span class="icon icon-bottle"></span>
                            <span class="icon icon-bowl-of-chopsticks-1"></span>
                            <span class="icon icon-bowl-of-chopsticks-2"></span>
                            <span class="icon icon-box"></span>
                            <span class="icon icon-bread"></span>
                            <span class="icon icon-breads"></span>
                            <span class="icon icon-briefcase"></span>
                            <span class="icon icon-brightness"></span>
                            <span class="icon icon-browser"></span>
                            <span class="icon icon-bubble-1"></span>
                            <span class="icon icon-bubble-2"></span>
                            <span class="icon icon-bubble-3"></span>
                            <span class="icon icon-bubble-4"></span>
                            <span class="icon icon-cake"></span>
                            <span class="icon icon-calculator"></span>
                            <span class="icon icon-calendar-2"></span>
                            <span class="icon icon-calendar"></span>
                            <span class="icon icon-camera"></span>
                            <span class="icon icon-candy"></span>
                            <span class="icon icon-caps"></span>
                            <span class="icon icon-car"></span>
                            <span class="icon icon-card"></span>
                            <span class="icon icon-cassette"></span>
                            <span class="icon icon-charging-battery"></span>
                            <span class="icon icon-chart"></span>
                            <span class="icon icon-chicken"></span>
                            <span class="icon icon-classicbus"></span>
                            <span class="icon icon-clipboard-w-tick"></span>
                            <span class="icon icon-clipboard"></span>
                            <span class="icon icon-cloud"></span>
                            <span class="icon icon-cocktail-classic"></span>
                            <span class="icon icon-cocktail"></span>
                            <span class="icon icon-coffee-1"></span>
                            <span class="icon icon-coffee-2"></span>
                            <span class="icon icon-compass"></span>
                            <span class="icon icon-controller"></span>
                            <span class="icon icon-crop"></span>
                            <span class="icon icon-cross"></span>
                            <span class="icon icon-cupcake"></span>
                            <span class="icon icon-details"></span>
                            <span class="icon icon-diamond"></span>
                            <span class="icon icon-disk"></span>
                            <span class="icon icon-documents"></span>
                            <span class="icon icon-download"></span>
                            <span class="icon icon-dribbble"></span>
                            <span class="icon icon-drop"></span>
                            <span class="icon icon-egg"></span>
                            <span class="icon icon-email-back"></span>
                            <span class="icon icon-email-front"></span>
                            <span class="icon icon-empty-battery"></span>
                            <span class="icon icon-eraser"></span>
                            <span class="icon icon-eye"></span>
                            <span class="icon icon-facebook"></span>
                            <span class="icon icon-female"></span>
                            <span class="icon icon-files"></span>
                            <span class="icon icon-fish"></span>
                            <span class="icon icon-flag"></span>
                            <span class="icon icon-folder-add"></span>
                            <span class="icon icon-folder-remove"></span>
                            <span class="icon icon-folder"></span>
                            <span class="icon icon-fork-knife"></span>
                            <span class="icon icon-fork-spoon"></span>
                            <span class="icon icon-fridge"></span>
                            <span class="icon icon-full-battery"></span>
                            <span class="icon icon-fullscreen"></span>
                            <span class="icon icon-gear-1"></span>
                            <span class="icon icon-gear-2"></span>
                            <span class="icon icon-gear-3"></span>
                            <span class="icon icon-glasses"></span>
                            <span class="icon icon-globe"></span>
                            <span class="icon icon-grid-2"></span>
                            <span class="icon icon-grid"></span>
                            <span class="icon icon-grill"></span>
                            <span class="icon icon-group"></span>
                            <span class="icon icon-gym"></span>
                            <span class="icon icon-half-battery"></span>
                            <span class="icon icon-headphones"></span>
                            <span class="icon icon-heart"></span>
                            <span class="icon icon-home"></span>
                            <span class="icon icon-hot-food"></span>
                            <span class="icon icon-ice-cream-2"></span>
                            <span class="icon icon-ice-cream-3"></span>
                            <span class="icon icon-ice-cream"></span>
                            <span class="icon icon-imac"></span>
                            <span class="icon icon-instagram-1"></span>
                            <span class="icon icon-instagram-2"></span>
                            <span class="icon icon-ipad-landscape"></span>
                            <span class="icon icon-ipad-portrait-and-landscape-1"></span>
                            <span class="icon icon-ipad-portrait-and-landscape-2"></span>
                            <span class="icon icon-ipad-portrait"></span>
                            <span class="icon icon-iphone-landscape"></span>
                            <span class="icon icon-iphone-portrait-and-landscape-2"></span>
                            <span class="icon icon-iphone-portrait-and-landscape"></span>
                            <span class="icon icon-iphone-portrait"></span>
                            <span class="icon icon-jar"></span>
                            <span class="icon icon-ketchup"></span>
                            <span class="icon icon-key"></span>
                            <span class="icon icon-laptop"></span>
                            <span class="icon icon-list-w-images"></span>
                            <span class="icon icon-list"></span>
                            <span class="icon icon-location-2"></span>
                            <span class="icon icon-location"></span>
                            <span class="icon icon-locomotive"></span>
                            <span class="icon icon-lollipop-1"></span>
                            <span class="icon icon-lollipop-2"></span>
                            <span class="icon icon-magicmouse"></span>
                            <span class="icon icon-male"></span>
                            <span class="icon icon-map"></span>
                            <span class="icon icon-mastercard-1"></span>
                            <span class="icon icon-mastercard-2"></span>
                            <span class="icon icon-mayo"></span>
                            <span class="icon icon-medbrief"></span>
                            <span class="icon icon-meter"></span>
                            <span class="icon icon-mic-1"></span>
                            <span class="icon icon-mic-2"></span>
                            <span class="icon icon-microwave"></span>
                            <span class="icon icon-minus"></span>
                            <span class="icon icon-modernbus"></span>
                            <span class="icon icon-music"></span>
                            <span class="icon icon-news"></span>
                            <span class="icon icon-next"></span>
                            <span class="icon icon-notepad"></span>
                            <span class="icon icon-pause"></span>
                            <span class="icon icon-pen"></span>
                            <span class="icon icon-pencil-w-paper"></span>
                            <span class="icon icon-pencil"></span>
                            <span class="icon icon-person"></span>
                            <span class="icon icon-photo-1"></span>
                            <span class="icon icon-photo-2"></span>
                            <span class="icon icon-pizza-1"></span>
                            <span class="icon icon-pizza-2"></span>
                            <span class="icon icon-plane"></span>
                            <span class="icon icon-plate"></span>
                            <span class="icon icon-play"></span>
                            <span class="icon icon-plus"></span>
                            <span class="icon icon-polaroid-1"></span>
                            <span class="icon icon-polaroid-2"></span>
                            <span class="icon icon-power"></span>
                            <span class="icon icon-presentation"></span>
                            <span class="icon icon-prev"></span>
                            <span class="icon icon-ramen"></span>
                            <span class="icon icon-refresh"></span>
                            <span class="icon icon-reload"></span>
                            <span class="icon icon-removetag"></span>
                            <span class="icon icon-repeat"></span>
                            <span class="icon icon-ribbon"></span>
                            <span class="icon icon-rocket"></span>
                            <span class="icon icon-scooter"></span>
                            <span class="icon icon-search"></span>
                            <span class="icon icon-share"></span>
                            <span class="icon icon-ship"></span>
                            <span class="icon icon-shoppingbag-1"></span>
                            <span class="icon icon-shoppingbag-2"></span>
                            <span class="icon icon-shuffle"></span>
                            <span class="icon icon-spatula"></span>
                            <span class="icon icon-sportscar"></span>
                            <span class="icon icon-star"></span>
                            <span class="icon icon-stats-down"></span>
                            <span class="icon icon-stats-up"></span>
                            <span class="icon icon-stop"></span>
                            <span class="icon icon-tag-1"></span>
                            <span class="icon icon-tag-2"></span>
                            <span class="icon icon-tag-3"></span>
                            <span class="icon icon-task"></span>
                            <span class="icon icon-tea"></span>
                            <span class="icon icon-thermometer"></span>
                            <span class="icon icon-thumbsdown"></span>
                            <span class="icon icon-thumbsup"></span>
                            <span class="icon icon-tick"></span>
                            <span class="icon icon-tickets"></span>
                            <span class="icon icon-tie-1"></span>
                            <span class="icon icon-tie-2"></span>
                            <span class="icon icon-train"></span>
                            <span class="icon icon-trashcan"></span>
                            <span class="icon icon-tv"></span>
                            <span class="icon icon-twitter"></span>
                            <span class="icon icon-unlocked-1"></span>
                            <span class="icon icon-unlocked-2"></span>
                            <span class="icon icon-unlocked-3"></span>
                            <span class="icon icon-upload"></span>
                            <span class="icon icon-video"></span>
                            <span class="icon icon-videonegative"></span>
                            <span class="icon icon-volume-max"></span>
                            <span class="icon icon-volume-med"></span>
                            <span class="icon icon-volume-min"></span>
                            <span class="icon icon-volume-mute"></span>
                            <span class="icon icon-warning"></span>
                            <span class="icon icon-water"></span>
                            <span class="icon icon-wine-2"></span>
                            <span class="icon icon-wine"></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
		
		
			<script type="text/javascript">
					
					


			function closeDialog() {
				tinyMCEPopup.close();
			}

			window.onload = function() {
				$ = jQuery;
//				$('#wpadminbar').remove();
//				
//				$('.icon').on('mouseover', function(){
//					$(this).css('border', '1px solid white');
//					$(this).css('margin', '0px');
//				})
//				$('.icon').on('mouseout', function(){
//					$(this).css('border', '0px solid white');
//					$(this).css('margin', '1px');
//				})
//				
				$('.icon').on('click', function(){
					$(this).removeClass('icon');
					var attr = $(this).attr('class');

					tinyMCEPopup.editor.execCommand('mceInsertContent', false, '[icon class='+attr+'][/icon]' ) ;
					closeDialog();
				});
			}
		</script>
		<?php //wp_footer();?>
	</body>
</html>
