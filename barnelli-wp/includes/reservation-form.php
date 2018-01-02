<?php

function barnelli_checkOpeningTime() {
	header('Content-Type: application/json');

	$openingTimes = barnelli_openingTimes($_POST['date'], $_POST['time'], true);

	echo json_encode($openingTimes);
	die();
}

function barnelli_sendReservationFormMessage() {

	$customerEmail = $_POST['email'];

	if ( YSettings::g( 'mail_destination' ) ) {
		$reservation_send_to = YSettings::g( 'mail_destination' );
	}

	if (isset($_POST['name'])) {
		$validation = array();

		if (YSettings::g('reservation_name_required', '1') == '1') {
			if (!isset($_POST['name']) || $_POST['name'] == '') {
				$validation[] = array('message'=>'Please enter Your Name', 'id'=>'email');
			}
		}

		if (YSettings::g('reservation_email_required', '1') == '1') {
			if (!isset($_POST['email']) || $_POST['email'] == '') {
				$validation[] = array('message'=>'Please enter email', 'id'=>'email');
			}

			if ( isset($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$validation[] = array('message' => 'Please enter valid email', 'id' => 'email');
			}
		} else {
			if (isset($reservation_send_to)) {
				$_POST['email'] = $reservation_send_to;
			} else {
				$_POST['email'] = get_bloginfo('admin_email');
			}
		}

		if (YSettings::g('reservation_captcha_enabled', '1') == '1') {
			require_once THEME_INCLUDES . '/securimage/securimage.php';
			$securimage = new Securimage();

			if ($securimage->check($_POST['captcha']) == false) {
				$validation[] = array('message' => 'Wrong captcha code', 'id' => 'form-captcha');
			}
		}

		$custom_one = isset($_POST['custom-1']) ? $_POST['custom-1'] : '';
		$custom_two = isset($_POST['custom-2']) ? $_POST['custom-2'] : '';
		$custom_three = isset($_POST['custom-3']) ? $_POST['custom-3'] : '';

		$terms = isset($_POST['terms']) ? $_POST['terms'] : '';

		$phone = $_POST['phone'];
		$amount = $_POST['amount'];
		$message = '';

		$day = $_POST['day'];
		$month = $_POST['month'];
		$year = $_POST['year'];

		$hour = $_POST['hour'];
		$minute = $_POST['minute'];

		$ampm = $_POST['ampm'];

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";		
		$headers .= 'From: '. $_POST['email']. "\r\n" .'Reply-To: '. $_POST['email']. "\r\n" .'X-Mailer: PHP/' . phpversion();

		$message .= "\n\n";

		if (YSettings::g("reservation_disable_opening_check", "0") == "1") {
			$message .= '<table><tr><td><b>Reservation</b></td></tr>';
		} else {
			$message .= '<table><tr><td><b>Reservation for: </b></td><td>' . $day.' '.$month.' '.$year.', '.$hour.':'.$minute.''.$ampm.'</td></tr>';
		}

		if (!empty($amount)) {
			$message .= '<tr><td><b>Amount: </b></td><td>' . $amount . '</td></tr>';
		}

		if (!empty($phone)) {
			$message .= '<tr><td><b>Phone: </b></td><td>' . $phone . '</td></tr>';
		}

		if (!empty($_POST['name'])) {
			$message .= '<tr><td><b>Name: </b></td><td>' .$_POST['name'] . '</td></tr>';
		}

		if (!empty($_POST['email'])) {
			$message .= '<tr><td><b>E-mail: </b></td><td>' . $_POST['email'] . '</td></tr>';
		}

		if (YSettings::g('reservation_custom_1')) {
			$message .= '<tr><td><b>'.YSettings::g('reservation_custom_1') . ': </b></td><td>' . $custom_one . '</td></tr>';
		}

		if (YSettings::g('reservation_custom_2')) {
			$message .= '<tr><td><b>'.YSettings::g('reservation_custom_2') . ': </b></td><td>' . $custom_two . '</td></tr>';
		}

		if (YSettings::g('reservation_custom_3')) {
			$message .= '<tr><td><b>'.YSettings::g('reservation_custom_3') . ': </b></td><td>' . $custom_three . '</td></tr>';
		}

		if (YSettings::g('reservation_terms')) {
			$message .= '<tr><td><b>'.YSettings::g('reservation_terms') . ': </b></td><td>' . ( ($terms == 'on') ? 'Yes' : 'No' ) . '</td></tr>';
		}

		if (!empty($_POST['message'])) {
			$message .= '<tr><td><b>Message: </b></td><td>' . $_POST['message'] . '</td></tr>';
		}

		$message .= '</table>';

		$subject = 'Reservation details';

		if (isset($reservation_send_to)) {
			$email = $reservation_send_to;
		} else {
			$email = get_bloginfo('admin_email');
		}

		header('Content-Type: application/json');

		if (empty($validation)) {
			if (wp_mail($email, $subject, $message, $headers)) {

				// Send reservation detauls to customer ?
				if (YSettings::g('reservation_send_confirmation', '0') == '1') {
					$summarySubject = __('Reservation Summary', THEME_NAME);
					$summaryMessage = "Reservation Details<br/><br/>";

					$summaryMessage .= $message;

					$summaryHeaders = 'MIME-Version: 1.0' . "\r\n";
					$summaryHeaders .= 'Content-type: text/html; charset=utf-8' . "\r\n";
					$summaryHeaders .= 'From: ' . $email . "\r\n" .'Reply-To: ' . $email . "\r\n" .'X-Mailer: PHP/' . phpversion();

					wp_mail($customerEmail, $summarySubject, $summaryMessage, $summaryHeaders);
				}

				echo json_encode(array('success'=>(bool)true));
			} else {
				echo json_encode(array('success'=>(bool)false, 'type'=>'system', 'data'=>array('message'=>'Sending error, please try again later')));
			}
		} else {
			echo json_encode(array('success'=>(bool)false, 'type'=>'validation', 'data'=>$validation));
		}

		die();
	}
}
?>