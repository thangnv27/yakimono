<?php
function barnelli_configure_smtp(PHPMailer $phpmailer) {
	$phpmailer->isSMTP();
	$phpmailer->Host = YSettings::g('barnelli_smtp_host', '');
	$phpmailer->SMTPAuth = (YSettings::g('barnelli_smtp_auth') == 'yes') ? true : false;
	$phpmailer->Port = YSettings::g('barnelli_smtp_port', 465);
	$phpmailer->Username = YSettings::g('barnelli_smtp_username', '');
	$phpmailer->Password = YSettings::g('barnelli_smtp_password', '');
	$phpmailer->SMTPSecure = YSettings::g('barnelli_smtp_secure', 'tls');
}

if (YSettings::g('barnelli_smtp_enabled', 'no') == 'yes') {
	add_action( 'phpmailer_init', 'barnelli_configure_smtp' );
}