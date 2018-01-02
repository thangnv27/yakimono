<?php
/*
Template Name: Reservation
*/
global $post;

get_header();

if (is_page() && $post->post_parent) {
	$wrapperClass = str_replace(" ", "-", get_the_title($post->post_parent));
} else {
	$wrapperClass = str_replace(" ", "-", get_the_title());
}

$wrapperClass = preg_replace("/[^a-zA-Z0-9\-]+/", "", $wrapperClass);

?>
<div class="dynamic-content <?php echo $wrapperClass; ?>-wrapper container" id="main-content">
	<div class=" padding-wrapper reservation">
		<div class="row ">
			<div class="hidden-xs col-md-7">
				<?php
				 if (have_posts()) {
					while (have_posts()) {
						the_post();
						the_content();
					}
				}
				?>
			</div>
			<div class="col-xs-12 col-md-5">
				<div class="info-reservation">
						<?php $reservation = YSettings::gWPML('reservation_title', YSettings::g('reservation_title', '')); if (!empty($reservation)) : ?> 
						<h1><?php echo $reservation; ?></h1>
						<?php endif; ?>
						<?php $description = YSettings::gWPML('reservation_description', YSettings::g('reservation_description', '')); if (!empty($description)) : ?>
						<p><?php echo $description; ?></p>
						<?php endif; ?>
						<?php if (YSettings::g('reservation_disable_opening_check', '0') == '0') : ?>
						<h1><?php echo YSettings::gWPML('reservation_date_header', YSettings::g('reservation_date_header', 'Date')); ?></h1>
						<?php
						$closed = YSettings::gWPML('reservation_closed', YSettings::g('reservation_closed', 'Closed'));
						$format = YSettings::g('opening_times_format', '24h');
						$day = strtolower(date('l'));
						$open = YSettings::g('theme_'.$day.'_open', 'Closed');
						$close = YSettings::g('theme_'.$day.'_close', 'Closed');
						$open_second = YSettings::g('theme_'.$day.'_open_second', '-');
						$close_second = YSettings::g('theme_'.$day.'_close_second', '-');

						if ($format == '24h') {
							$openings = '';
							if ( ($open == 'Closed') && (($open_second != '-') && ($close_second != '-'))) {
								$openings .= $open_second . ' - ' . $close_second;
							} else {
								$openings .= ($open == 'Closed') ? $closed : $open . ' - ' . $close;
							}

							if ($open != 'Closed') {
								if (($open_second != '-') && ($close_second != '-')) {
									$openings .= ' / ' . $open_second . ' - ' . $close_second;
								}
							}
						} else {
							$openings = '';
							if ( ($open == 'Closed') && (($open_second != '-') && ($close_second != '-'))) {
								$openings .= date("g:i a", strtotime($open_second)) . ' - ' . date("g:i a", strtotime($close_second));
							} else {
								$openings .= ($open == 'Closed') ? $closed : date("g:i a", strtotime($open)) . ' - ' . date("g:i a", strtotime($close));
							}

							if ($open != 'Closed') {
								if (($open_second != '-') && ($close_second != '-')) {
									$openings .= ' / ' . date("g:i a", strtotime($open_second)) . ' - ' . date("g:i a", strtotime($close_second));
								}
							}
						}
						?>
						<div class="opening-description">
							<?php echo YSettings::gWPML('reservation_current_label', YSettings::g('reservation_current_label', 'Opening hours')); ?>
						</div>
						<div class="opening">
							<?php echo $openings; ?>
						</div>
						<div class="select-date">
							<?php
							$currentDay = date('j');
							$currentMonth = strtolower(date('F'));
							$currentYear = date('Y');
							?>
							<div class="select-time day"><span><?php echo $currentDay; ?></span>
								<select id="select-day">
									<?php
									$timezone = YSettings::g('restaurant_location_timezone', 'Europe/Warsaw');
									//date_default_timezone_set($timezone);
									// get current month days
									$num = date('t', mktime(0, 0, 0, date('n'), 1, date('Y'))); 

									for($i = 1; $i <= $num; $i++) :
									?>
									<option value="<?php echo $i;?>" <?php if ($i == $currentDay) { echo ' selected="selected"'; } ?>><?php echo $i;?></option>
									<?php endfor;?>
								</select>
							</div> 
							<div class="select-time month"><span><?php echo YSettings::gWPML("reservation_$currentMonth", YSettings::g("reservation_$currentMonth", date('F'))); ?></span>
								<select id="select-month">
									<?php $monthsTranslated = array(
										YSettings::gWPML('reservation_january', YSettings::g('reservation_january', 'January')),
										YSettings::gWPML('reservation_february', YSettings::g('reservation_february', 'February')),
										YSettings::gWPML('reservation_march', YSettings::g('reservation_march', 'March')),
										YSettings::gWPML('reservation_april', YSettings::g('reservation_april', 'April')),
										YSettings::gWPML('reservation_may', YSettings::g('reservation_may', 'May')),
										YSettings::gWPML('reservation_june', YSettings::g('reservation_june', 'June')),
										YSettings::gWPML('reservation_july', YSettings::g('reservation_july', 'July')),
										YSettings::gWPML('reservation_august', YSettings::g('reservation_august', 'August')),
										YSettings::gWPML('reservation_september', YSettings::g('reservation_september', 'September')),
										YSettings::gWPML('reservation_october', YSettings::g('reservation_october', 'October')),
										YSettings::gWPML('reservation_november', YSettings::g('reservation_november', 'November')),
										YSettings::gWPML('reservation_december', YSettings::g('reservation_december', 'December'))
									);
									$months = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');
									?>
									<?php for ($i=0;$i<count($months);$i++) : ?>
									<option <?php if ($months[$i] == $currentMonth) { echo 'selected="selected"'; } ?> data-name="<?php echo $monthsTranslated[$i]; ?>" value="<?php echo $i+1; ?>"><?php echo $monthsTranslated[$i]; ?></option>
									<?php endfor; ?>
								</select>
							</div>
							<div class="select-time year"><span><?php echo $currentYear;?></span>
								<select id="select-year">
									<?php $years = array('2013', '2014', '2015', '2016'); ?>
									<?php foreach ($years as $year) : ?>
									<option <?php if ($year == $currentYear) { echo 'selected="selected"'; } ?> value="<?php echo $year; ?>"><?php echo $year; ?></option>
									<?php endforeach; ?>
								</select>
							</div><div class="clearfix visible-xs"></div>
							<?php
							$hours = array('00', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
							$currentHour = date('h');

							if (YSettings::g('reservation_time_format', '12h') == '24h') {
								$currentHour = date('H');
								$hours = array_merge($hours, array('13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23'));
							}
							?>
							<div class="select-time hour"><span><?php echo $currentHour;?></span>
								<select id="select-hour">
									<?php foreach ($hours as $hour): ?>
									<?php if ($hour == $currentHour) : ?>
									<option selected="selected" value="<?php echo $hour; ?>"><?php echo $hour; ?></option>
									<?php else: ?>
									<option value="<?php echo $hour; ?>"><?php echo $hour; ?></option>
									<?php endif;?>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="select-time minutes"><span>00</span>
								<select id="select-minutes">
									<option selected="selected" value="00">00</option>
									<option value="05">05</option>
									<option value="10">10</option>
									<option value="15">15</option>
									<option value="20">20</option>
									<option value="25">25</option>
									<option value="30">30</option>
									<option value="35">35</option>
									<option value="40">40</option>
									<option value="45">45</option>
									<option value="50">50</option>
									<option value="55">55</option>
								</select>
							
							</div>
							<?php if (YSettings::g('reservation_time_format', '12h') == '12h') : ?>
							<div class="select-time part">pm</div>
							<?php endif;?>
						</div>
					<?php endif; ?>
					<h1><?php echo YSettings::gWPML('reservation_form_header', YSettings::g('reservation_form_header', '')); ?></h1>
					<section class="form">
						<form id="reservation-form" name="reservation-form" method="post">

							<input type="hidden" name="day" id="day" value="" />
							<input type="hidden" name="month" id="month" value="" />
							<input type="hidden" name="year" id="year" value="" />
							<input type="hidden" name="hour" id="hour" value="" />
							<input type="hidden" name="minute" id="minute" value="" />
							<input type="hidden" name="ampm" id="ampm" value="" />

							<div class="input-wrapper name">
								<input class="contact-form" type="text" placeholder="<?php echo YSettings::gWPML( 'reservation_name', YSettings::g( 'reservation_name', 'Name' ) ); ?>" name="form-name" id="form-name">
							</div>
							<div class="input-wrapper email">
								<input class="contact-form" type="text" placeholder="<?php echo YSettings::gWPML( 'reservation_email', YSettings::g( 'reservation_email', 'Email' ) ); ?>" name="form-email" id="form-email">
							</div>
							<div class="input-wrapper phone">
								<input class="contact-form" type="text" placeholder="<?php echo YSettings::gWPML( 'reservation_phone', YSettings::g( 'reservation_phone', 'Phone' ) ); ?>" name="form-phone" id="form-phone">
							</div>
							<div class="input-wrapper amount">
								<input class="contact-form" type="text" placeholder="<?php echo YSettings::gWPML( 'reservation_people_amount', YSettings::g( 'reservation_people_amount', 'People amount' ) ); ?>" name="form-amount" id="form-amount">
							</div>
							<?php if (YSettings::g('reservation_custom_1')) : ?>
							<div class="input-wrapper custom">
								<input class="contact-form" type="text" placeholder="<?php echo YSettings::gWPML( 'reservation_custom_1', YSettings::g( 'reservation_custom_1', '' ) ); ?>" name="form-custom-1" id="form-custom-1">
							</div>
							<?php endif;?>
							<?php if (YSettings::g('reservation_custom_2')) : ?>
							<div class="input-wrapper custom">
								<input class="contact-form" type="text" placeholder="<?php echo YSettings::gWPML( 'reservation_custom_2', YSettings::g( 'reservation_custom_2', '' ) ); ?>" name="form-custom-2" id="form-custom-2">
							</div>
							<?php endif;?>
							<?php if (YSettings::g('reservation_custom_3')) : ?>
							<div class="input-wrapper custom">
								<input class="contact-form" type="text" placeholder="<?php echo YSettings::gWPML( 'reservation_custom_3', YSettings::g( 'reservation_custom_3', '' ) ); ?>" name="form-custom-3" id="form-custom-3">
							</div>
							<?php endif;?>
							<div class="input-wrapper message">
								<textarea class="contact-form" placeholder="<?php echo YSettings::gWPML( 'reservation_message', YSettings::g( 'reservation_message', 'Message' ) ); ?>" name="form-message" id="form-message"></textarea>
							</div>

							<?php if (YSettings::g('reservation_captcha_enabled')) : ?>
							<div class="input-wrapper">
								<div class="captcha-container">
									<div>
										<input class="contact-form" type="text" placeholder="<?php echo YSettings::gWPML( 'reservation_captcha_placeholder', YSettings::g( 'reservation_captcha_placeholder', 'captcha' ) ); ?>" name="form-captcha" id="form-captcha" />
										<?php
										$captchaType = YSettings::g('reservation_captcha_type', 'mathematic');
										$captchaStringLength = YSettings::g('reservation_captcha_string_length', '6');
										$captchaParameter = 'type=' . $captchaType;

										if ($captchaType == 'string') {
											if ($captchaStringLength > 8) {
												$captchaStringLength = 8;
											}
											if ($captchaStringLength < 2) {
												$captchaStringLength = 2;
											}
											$captchaParameter .= '&length=' . (int)$captchaStringLength;
										}
										?>
										<img id="captcha" src="<?php echo THEME_INCLUDES_URI . '/securimage/securimage_show.php?' . $captchaParameter; ?>" alt="CAPTCHA" />
										<button class="refresh-captcha" data-captcha-type="<?php echo $captchaType; ?>" data-captcha-string-length="<?php echo $captchaStringLength;?>" ><i class="fa fa-refresh"></i></button>
									</div>
								</div>
							</div>
							<?php endif;?>

							<?php if ((YSettings::g('reservation_terms') != '') && (YSettings::g('reservation_terms') != ' ')) : ?>
							<div class="input-wrapper message">
								<input type="checkbox" name="terms" id="form-terms" /> <?php echo YSettings::gWPML( 'reservation_terms', YSettings::g( 'reservation_terms', '' ) ); ?>
							</div>
							<?php endif; ?>

							<div class="alert alert-success hidden"><?php echo YSettings::gWPML( 'reservation_send_message', YSettings::g( 'reservation_send_message', 'Reservation message was sent. Thank you!' ) ); ?></div>
							<div class="alert alert-danger hidden"><?php echo YSettings::gWPML( 'reservation_send_fail', YSettings::g( 'reservation_send_fail', 'Error occurred! Try again later!' ) ); ?></div>
							<div class="input-wrapper submit">
								<input id="reservation-submit" type="submit" value="<?php echo YSettings::gWPML( 'button_value', YSettings::g( 'button_value', 'Confirm' ) ); ?>" class="buttonform">
							</div>
						</form>
					</section>
					<script>
					var custom1Required = <?php echo YSettings::g('reservation_custom_1_required', '0'); ?>;
					var custom2Required = <?php echo YSettings::g('reservation_custom_2_required', '0'); ?>;
					var custom3Required = <?php echo YSettings::g('reservation_custom_3_required', '0'); ?>;
					</script>
				</div>
			</div>
		</div>
	</div>
	<?php get_template_part('content', 'pagefooter'); ?>
</div>
<?php get_footer(); ?>