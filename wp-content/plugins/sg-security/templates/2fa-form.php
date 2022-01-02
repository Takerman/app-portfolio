<?php if ( ! empty( $error ) ) : ?>
	<div id="login_error"><strong><?php echo esc_html( $error ); ?></strong><br /></div>
<?php endif ?>

<?php
$action = esc_url( add_query_arg( 'action', 'sgs2fa', wp_login_url() ) );

if ( ( isset( $_GET['action'] ) && 'load_sgs2fabc' == $_GET['action'] ) ) {
	$action = esc_url( add_query_arg( 'action', 'sgs2fabc', wp_login_url() ) );
}

$backup_codes_action = add_query_arg(
	array(
		'action'      => 'load_sgs2fabc',
		'sg-user-id'  => $user->ID,
		'rememberme'  => $rememberme,
		'redirect_to' => $redirect_to,
	),
	wp_login_url()
);

?>

<form name="sgs2fa_form" id="loginform" action="<?php echo $action ?>" method="post">
	<?php if ( isset( $_GET['action'] ) && 'load_sgs2fabc' == $_GET['action'] ) : ?>
		<p class="sg-2fa-title"><?php esc_html_e( 'In order to log in, please enter one of the backup codes you have received on your first login:', 'sg-security' ); ?></p>
	<?php else : ?>	
		<p class="sg-2fa-title"><?php esc_html_e( 'In order to log in, please enter the verification code from you Authenticator app:', 'sg-security' ); ?></p>
	<?php endif; ?>

	<?php if ( ! empty( $qr_url ) ) : ?>
		<div class="qr-section" style="text-align: center">
			</br>
			<img src="<?php echo esc_url( $qr_url ); ?>">
			<input type="hidden" name="sgs-2fa-setup" value="1" />
		</div>
	<?php endif ?>

	<?php if ( isset( $_GET['action'] ) && 'load_sgs2fabc' == $_GET['action'] ) : ?>
		<p>
			</br>
			<label for="sgc2fabackupcode"><?php esc_html_e( 'Backup Code:', 'sg-security' ); ?></label>
			<input name="sgc2fabackupcode" id="sgc2fabackupcode" class="input" value="" size="20" pattern="[0-9]*" autofocus />
		</p>
	<?php else : ?>
		<p>
			</br>
			<label for="sgc2facode"><?php esc_html_e( 'Authentication Code:', 'sg-security' ); ?></label>
			<input name="sgc2facode" id="sgc2facode" class="input" value="" size="20" pattern="[0-9]*" autofocus />
		</p>
	<?php endif ?>

	<input type="hidden" name="sg-user-id"    id="sg-user-id"    value="<?php echo esc_attr( $user->ID ); ?>" />

	<?php if ( $interim_login ) : ?>
		<input type="hidden" name="interim-login" value="1" />
	<?php else : ?>
		<input type="hidden" name="redirect_to" value="<?php echo esc_attr( $redirect_to ); ?>" />
	<?php endif; ?>

	<input type="hidden" name="rememberme" id="rememberme" value="<?php echo esc_attr( $rememberme ); ?>" />

	<?php submit_button( __( 'Authenticate', 'sg-security' ) ); ?>
</form>

<?php if ( empty( $qr_url ) ) : ?>
	<a href="<?php echo esc_url( $backup_codes_action ); ?>" style="text-align:center; display:block; padding: 10px">
		<?php esc_html_e( 'Login using backup codes', 'sg-security' ); ?>
	</a>
<?php endif ?>
