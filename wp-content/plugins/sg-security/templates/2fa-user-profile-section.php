<h2><?php esc_html_e( 'Security by SiteGround' ); ?></h2>
<table class="form-table">
<?php 
	// Check if we have backup codes and print the table.
	if ( ! empty( $backup_codes ) ) :
?>
<tr>
	<th>
		<label for="user_location"><?php esc_html_e( '2FA Backup Codes', 'sg-security' ); ?></label>
	</th>
	<td>
		<textarea name="sg_security_2fa_backup_codes" id="sg_security_2fa_backup_codes" disabled="disabled" class="regular-text" rows="8" cols="20" ><?php echo implode( "\n", $backup_codes ); ?></textarea>
		<p class="description"><?php esc_html_e('In case you lose or change your phone and you no longer have access to the Authenticator app, you can use one of the codes below to log in.', 'sg-security' ); ?>
			<b><?php esc_html_e( 'Save the codes to make sure that you don\'t end up locked out of this website.', 'sg-security' );?></b>
			<?php esc_html_e( 'Each code can only be used once.' , 'sg-security' ); ?>
		</p>
	</td>
</tr>
<?php endif; ?>
<?php
	// Check if we have a secret and print it.
	if ( ! empty( $secret ) ):
?>
<tr>
	<th>
		<label for="user_location"><?php esc_html_e( '2FA Secret Key', 'sg-security' ); ?></label>
	</th>
	<td>
		<text name="sg_security_2fa_secret_key" id="sg_security_2fa_secret_key" disabled="disabled" class="regular-text" rows="1"><b><?php echo $secret; ?></b></text>
		<p class="description"><?php esc_html_e( 'Use the secret key as an alternative to the QR code if you want to import your token to a new Authenticator app.', 'sg-security' ); ?></p>
	</td>
</tr>	
<tr>
	<th>
		<label for="user_location"><?php esc_html_e( '2FA QR Code', 'sg-security' ); ?></label>
	</th>
	<td>
		<img src="<?php echo $qr; ?>" name="sg_security_2fa_qr_code" id="sg_security_2fa_qr_code" disabled="disabled" class="image" ></img>
		<p class="description"><?php esc_html_e( 'Scan the QR code with your device with Authenticator app to have the token automatically added to the app.', 'sg-security' ); ?></p>
	</td>
</tr>
<?php endif; ?>
</table>
