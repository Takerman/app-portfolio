<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( function_exists( 'kerge_contact_action' ) ) {
	$options = array(
		'contact_form' => array(
			'title'   => esc_html__( 'Contact Form', 'kerge' ),
			'type'    => 'tab',
			'options' => array(
				'contact_form_settings' => array(
					'title'   => esc_html__( 'Contact Form Settings', 'kerge' ),
					'type'    => 'box',
					'options' => array(
						'contact_form_email'	=> array(
							'label' => esc_html__( 'Your Email Address', 'kerge' ),
							'desc'  => esc_html__( 'Messages from the contact form will be sent to this email address.', 'kerge' ),
							'type'  => 'text',
							'value' => get_option("admin_email"),
						),
						'contact_form_admin_email'	=> array(
							'label' => esc_html__( 'Hosting Admin Email Address', 'kerge' ),
							'desc'  => esc_html__( 'This email address will be listed in the From field of the message body. Example: info@yourdomain.com', 'kerge' ),
							'help'  => esc_html__( 'Some hosting providers forbid the sending of messages from their server without specifying the real address of the hosting administrator. Examples of such addresses are: info@yourdomain.com, admin@yourdomain.com.', 'kerge' ),
							'type'  => 'text',
							'value' => '',
						),
						'contact_form_subject'	=> array(
							'label' => esc_html__( 'Message Subject', 'kerge' ),
							'desc'  => esc_html__( 'The title of the message.', 'kerge' ),
							'type'  => 'text',
							'value' => esc_html__( 'New message from contact form', 'kerge' ),
						),
						'contact_form_text'	=> array(
							'label' => esc_html__( 'Start of Message that will be Sent', 'kerge' ),
							'desc'  => esc_html__( 'Start of message that will be sent to your email.', 'kerge' ),
							'type'  => 'text',
							'value' => esc_html__( 'You have new message from Contact Form', 'kerge' ),
						),
						'contact_form_s_message'	=> array(
							'label' => esc_html__( 'Successful Message', 'kerge' ),
							'desc'  => esc_html__( 'This message will be displayed when the message is successfully sent.', 'kerge' ),
							'type'  => 'text',
							'value' => esc_html__( 'Contact form successfully submitted. Thank you, I will get back to you soon!', 'kerge' ),
						),
						'contact_form_e_message'	=> array(
							'label' => esc_html__( 'Error Message', 'kerge' ),
							'desc'  => esc_html__( 'This message will be displayed if an error occurred while sending the message.', 'kerge' ),
							'type'  => 'text',
							'value' => esc_html__( 'There was an error while submitting the form. Please try again later', 'kerge' ),
						),
						'recaptcha'       => array(
							'type'         => 'multi-picker',
							'label'        => false,
							'desc'         => false,
							'picker'       => array(
								'recaptcha_switcher' => array(
									'label'        => esc_html__( 'Google reCaptcha v2', 'kerge' ),
									'type'         => 'switch',
									'right-choice' => array(
										'value' => 'on',
										'label' => esc_html__( 'on', 'kerge' )
									),
									'left-choice'  => array(
										'value' => 'off',
										'label' => esc_html__( 'Off', 'kerge' )
									),
									'value'        => 'on',
									'desc'         => esc_html__( 'Will help protect you from spam.',
										'kerge' ),
								)
							),
							'choices'      => array(
								'on' => array(
									'recaptcha_key'	=> array(
										'label' => esc_html__( 'Google reCaptcha v2 Site Key', 'kerge' ),
										'desc'  => false,
										'type'  => 'text',
										'value' => '6LdqmCAUAAAAAMMNEZvn6g4W5e0or2sZmAVpxVqI',
										'help'    => sprintf(
										esc_html__( 'By default, the theme uses the global site key. You can replace it with your own.', 'kerge' )
										)
									),
									'recaptcha_secret_key'	=> array(
										'label' => esc_html__( 'Google reCaptcha v2 Secret Site Key', 'kerge' ),
										'desc'  => false,
										'type'  => 'text',
										'value' => '6LdqmCAUAAAAANONcPUkgVpTSGGqm60cabVMVaON',
										'help'    => sprintf(
										esc_html__( 'By default, the theme uses the global secret site key. You can replace it with your own.', 'kerge' )
										)
									),
									'contact_form_recaptcha_click_message'	=> array(
										'label' => esc_html__( 'Please click on the reCAPTCHA box Message', 'kerge' ),
										'desc'  => esc_html__( 'This message will be displayed if the user forgot to click on the reCAPTCHA checkbox.', 'kerge' ),
										'type'  => 'text',
										'value' => esc_html__( 'Please click on the reCAPTCHA box.', 'kerge' ),
									),
									'contact_form_recaptcha_error_message'	=> array(
										'label' => esc_html__( 'Robot Verification Failed Message', 'kerge' ),
										'desc'  => esc_html__( 'This message will be displayed if the user has incorrectly passed the verification.', 'kerge' ),
										'type'  => 'text',
										'value' => esc_html__( 'Robot verification failed, please try again.', 'kerge' ),
									),
								),
							),
							'show_borders' => false,
						),

					)
				),
			)
		)
	);
}
