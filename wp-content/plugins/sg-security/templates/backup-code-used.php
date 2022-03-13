<style>#login { width:360px; padding:5% 0 0; }</style>

<form name="sgs2fa_form" id="loginform" action="<?php echo $args['redirect_to']; ?>" method="post">
	<h1><?php echo esc_html_e( 'You are logging in with a one-time Backup Code', 'sg-security' ); ?></h1>
	<br />
	<p class="sg-2fa-title"><?php echo esc_html_e( 'We have noticed that you’re using a one-time backup code to log in. This code cannot be used anymore. To make sure that you have access to this website, install the Google Authenticator app and scan the QR code below. This way you can get a new code anytime you need to log in.', 'sg-security' ); ?></p>

	<?php include_once SG_Security\DIR . '/templates/partials/2fa-qr-secret.php'; ?>
	
	<button id="saved_codes" href="<?php echo $args['redirect_to']; ?>" class="button button-primary"><?php esc_html_e( 'Continue', 'sg-security' ); ?></button>
</form>
