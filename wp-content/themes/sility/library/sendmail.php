<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
if (isset($_REQUEST['type']) && $_REQUEST['type'] == 'widget'){
	if (isset($_REQUEST['wcontactemail'])){ $mailTo = sanitize_title($_REQUEST['wcontactemail']); }
	if (isset($_REQUEST['wname'])){ $mailFromName = sanitize_title($_REQUEST['wname']); }
	if (isset($_REQUEST['wemail'])){ $mailFromEmail = sanitize_email($_REQUEST['wemail']); }
	if (isset($_REQUEST['wmessage'])){ $message = sanitize_text_field($_REQUEST['wmessage']); }
	$mailFromWebsite = $_SERVER['SERVER_NAME'];
	$subject = 'E-mail from website visitor';
	
	$msg = "This message was sent from: $mailFromWebsite \n\nby: $mailFromName \n\nEmail: $mailFromEmail \n\nSubject: $subject \n\nText of message: $message";
	$headers = "MIME-Version: 1.0\r\n Content-type: text/html; charset=utf-8\r\n From: $mailFromEmail\r\n Reply-To: $mailFromEmail";
	
	mail($mailTo, $subject, $msg, $headers);
}
?>