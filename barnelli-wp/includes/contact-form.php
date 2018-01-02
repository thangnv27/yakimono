<?php
function barnelli_sendContactFormMessage() {

	if (!isset($_POST['form-type'])) {
		$formtype = 'single';
	} else {
		$formtype = $_POST['form-type'];
	}

	if ($formtype == 'single') {
		if (YSettings::g('contact_mail_to')) {
			$send_to = YSettings::g( 'contact_mail_to' );
		}
	} else {
		if (YSettings::g('multiple_contact_mail_to')) {
			$send_to = YSettings::g('multiple_contact_mail_to');
		}
	}

	if (isset($_POST['form-name'])) {
		$validation = array();

		// if (!isset($_POST['form-name']) || $_POST['form-name'] == '') {
		// 	$validation[] = array('message' => 'Please enter Your Name', 'id' => 'form-name');
		// }

		if (!isset($_POST['form-email']) || $_POST['form-email'] == '') {
			$validation[] = array('message' => 'Please enter email', 'id' => 'form-email');
		}

		if (isset($_POST['form-email']) && !filter_var($_POST['form-email'], FILTER_VALIDATE_EMAIL)) {
			$validation[] = array('message' => 'Please enter valid email', 'id' => 'form-email');
		}

		if (YSettings::g('contact_captcha_enabled','1') == '1') {
			require_once THEME_INCLUDES . '/securimage/securimage.php';
			$securimage = new Securimage();

			if ($securimage->check($_POST['captcha']) == false) {
				$validation[] = array('message' => 'Wrong captcha code', 'id' => 'form-captcha');
			}
		}

		$terms = isset($_POST['terms']) ? $_POST['terms'] : '';

		if (!empty($_POST['form-subject'])) {
			$subject = $_POST['form-subject'];
		} else {
			$subject = "Restaurant Contact Form Message";
		}

		$message_template = YSettings::g('contact_message_template', '<table>
<tr><td><b>Message: </b></td><td>[message]</td></tr>
<tr><td><b>E-mail: </b></td><td>[email]</td></tr>
<tr><td><b>Name: </b></td><td>[name]</td></tr>
<tr><td><b>Terms: </b></td><td>[terms]</td></tr>
</table>');

		$message = '';
		$message = str_replace('[message]', $_POST['form-message'], $message_template );
		$message = str_replace('[email]', $_POST['form-email'], $message);
		$message = str_replace('[name]', $_POST['form-name'], $message);
		$message = str_replace('[terms]', $terms, $message);
		$message = str_replace("\r\n", "<br/>", $message);
		$message = str_replace("\n", "<br/>", $message);

		// $message = '<table><tr><td><b>Message: </b></td><td>'. $_POST['form-message']. '</td></tr>';
		// $message .= '<tr><td><b>E-mail: </b></td><td>'. $_POST['form-email']. '</td></tr><tr><td><b>'.'Name: </b></td><td>'. $_POST['form-name'].'</td></tr>';

		// if (YSettings::g('contact_terms')) {
		// 	$message .= '<tr><td><b>'.YSettings::g('contact_terms') . ': </b></td><td>' . ( ($terms == 'on') ? 'Yes' : 'No' ) . '</td></tr>';
		// }

		// $message .= '</table>';

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

		if ($_POST['form-name'] != '') {
			$headers .= 'From: "'. $_POST['form-name']. '" <' . $_POST['form-email']. ">\r\n" .'Reply-To: '. $_POST['form-email']. "\r\n" .'X-Mailer: PHP/' . phpversion();	
		} else {
			$headers .= 'From: "'.$_POST['form-email'].'" <' . $_POST['form-email']. ">\r\n" .'Reply-To: '. $_POST['form-email']. "\r\n" .'X-Mailer: PHP/' . phpversion();	
		}

		if (isset($send_to)) {
			$email = $send_to;
		} else {
			$email = get_bloginfo('admin_email');
		}

		header('Content-Type: application/json');

		if (empty($validation)) {
			if (wp_mail($email, $subject, $message, $headers)) {
				echo json_encode(array('success' => (bool)true));
			} else {
				echo json_encode(array('success' => (bool)false, 'type' => 'system', 'data' => array('message' => 'Sending error, please try again later')));
			}
		} else {
			echo json_encode(array('success' => (bool)false, 'type' => 'validation', 'data' => $validation));
		}

		die();
	}
}
?>