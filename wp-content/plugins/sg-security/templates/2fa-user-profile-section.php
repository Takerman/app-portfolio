<h2><?php esc_html_e( 'Security by SiteGround' ); ?></h2>
<table class="form-table">
<?php 
	// Check if we have backup codes and print the table.
	if ( ! empty( $backup_codes ) ) :
?>
<tr>
	<th>
		<label for="user_location"><?php esc_html_e( '2FA Backup Codes' ); ?></label>
	</th>
	<td>
		<textarea name="sg_security_2fa_backup_codes" id="sg_security_2fa_backup_codes" disabled="disabled" class="regular-text" rows="8" cols="20" ><?php echo implode( "\n", $backup_codes ); ?></textarea>
		<p class="description">In case you lose or change your phone and you no longer have access to the Authenticator app, you can use one of the codes below to log in. <b>Save the codes to make sure that you don't end up locked out of this website.</b> Each code can only be used once.</p>
	</td>
</tr>
<?php endif; ?>
<?php
	// Check if we have a secret and print it.
	if ( ! empty( $secret ) ):
?>
<tr>
	<th>
		<label for="user_location"><?php esc_html_e( '2FA Secret Key' ); ?></label>
	</th>
	<td>
		<text name="sg_security_2fa_secret_key" id="sg_security_2fa_secret_key" disabled="disabled" class="regular-text" rows="1"><b><?php echo $secret; ?></b></text>
		<p class="description">Use the secret key as an alternative to the QR code if you want to import your token to a new Authenticator app.</p>
	</td>
</tr>	
<tr>
	<th>
		<label for="user_location"><?php esc_html_e( '2FA QR Code' ); ?></label>
	</th>
	<td>
		<img src="<?php echo $qr; ?>" name="sg_security_2fa_qr_code" id="sg_security_2fa_qr_code" disabled="disabled" class="image" ></img>
		<p class="description">Scan the QR code with your device with Authenticator app to have the token automatically added to the app.</p>
	</td>
</tr>
<?php endif; ?>
</table>
