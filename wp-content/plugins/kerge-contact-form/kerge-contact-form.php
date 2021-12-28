<?php
/*
Plugin Name: Kerge Contact Form
Plugin URI: http://lmpixels.com
Description: Kerge Contact Form
Author: LMPixels
Version: 1.1.0
*/

add_action( 'plugins_loaded', 'kerge_cf_textdomain' );

function kerge_cf_textdomain() {
    load_plugin_textdomain( 'kerge-contact-form', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}

/**
 * LMPixels Contact form action
 */

if( ! function_exists( 'kerge_contact_action' ) ){
  function kerge_contact_action(){
    // configure
    $sendTo = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('contact_form_email') : get_option("admin_email");
    $subject = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('contact_form_subject') : __( 'New message from contact form', 'kerge-contact-form' );
    $from = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('contact_form_admin_email') : '';
    if(empty($from)){
        $from = $_REQUEST['email'];
    }
    $okMessage = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('contact_form_s_message') : __( 'Contact form successfully submitted. Thank you, I will get back to you soon!', 'kerge-contact-form' );
    $errorMessage = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('contact_form_e_message') : __( 'There was an error while submitting the form. Please try again later', 'kerge-contact-form' );
    $recaptcha = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('recaptcha/recaptcha_switcher') :  'on';
    $emailStartText = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('contact_form_text') : __( 'You have new message from Contact Form', 'kerge-contact-form' );

    // let's do the sending
    if( $recaptcha == 'on' ) {
        $recaptchaClickMessage = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('recaptcha/on/contact_form_recaptcha_click_message') : __('Please click on the reCAPTCHA box.', 'kerge-contact-form');
        $recaptchaErrorMessage = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('recaptcha/on/contact_form_recaptcha_error_message') : __('Robot verification failed, please try again.', 'kerge-contact-form');
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
            //your site secret key
            $recaptcha_secret_key = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('recaptcha/on/recaptcha_secret_key') : '6LdqmCAUAAAAANONcPUkgVpTSGGqm60cabVMVaON';
            //get verify response data
            $response = wp_remote_get('https://www.google.com/recaptcha/api/siteverify?secret='.$recaptcha_secret_key.'&response='.$_POST['g-recaptcha-response']);
            $responseVerify = $response['body'];

            $responseData = json_decode($responseVerify);
            if($responseData->success):
                try
                {
                    ob_start();
                    $emailText = nl2br(esc_html( $emailStartText )) . "<br>";

                    if(isset($_POST["cf_field"]) && is_array($_POST["cf_field"])){
                        $emailText .= implode(", <br>", array_filter($_POST["cf_field"]));
                    } else {
                        $fields = array('name' => 'Name', 'email' => 'Email', 'subject' => 'Subject', 'message' => 'Message');
                        foreach ($_POST as $key => $value) {
                            if (isset($fields[$key])) {
                                $emailText .= nl2br("$fields[$key]: $value\n");
                            }
                        }
                    }

                    $headers = array('Content-Type: text/html; charset="UTF-8";',
                        'From: ' . $from,
                        'Reply-To: ' . $from,
                        'Return-Path: ' . $from,
                    );
                    
                    wp_mail($sendTo, esc_html( $subject ), $emailText, implode("\n", $headers));
                    if ( !function_exists('wp_mail') ) {
                        throw new phpmailerException();
                    }
                    ob_end_clean();
                    throw new Exception($okMessage);
                } catch (phpmailerException $ee) {
                    $response_st = 'danger';
                    $response_m = esc_html( $errorMessage );
                } catch (Exception $e) {
                    $response_st = 'success';
                    $response_m = esc_html( $okMessage );
                }
                echo json_encode(array("type" => $response_st, "message" => $response_m));
                die();
            else:
                $responseArray = array('type' => 'danger', 'message' => esc_html( $recaptchaErrorMessage ));
                echo json_encode($responseArray);
                die();
            endif;
        } else {
            $responseArray = array('type' => 'danger', 'message' => esc_html( $recaptchaClickMessage));
            echo json_encode($responseArray);
            die();
        }
    } else {
        try
            {
                ob_start();
                $emailText = nl2br(esc_html( $emailStartText )) . "<br>";

                if(isset($_POST["cf_field"]) && is_array($_POST["cf_field"])){
                    $emailText .= implode(", <br>", array_filter($_POST["cf_field"]));
                } else {
                    $fields = array('name' => 'Name', 'email' => 'Email', 'subject' => 'Subject', 'message' => 'Message');
                    foreach ($_POST as $key => $value) {
                        if (isset($fields[$key])) {
                            $emailText .= nl2br("$fields[$key]: $value\n");
                        }
                    }
                }

                $headers = array('Content-Type: text/html; charset="UTF-8";',
                    'From: ' . $from,
                    'Reply-To: ' . $from,
                    'Return-Path: ' . $from,
                );
                
                wp_mail($sendTo, $subject, $emailText, implode("\n", $headers));
                if ( !function_exists('wp_mail') ) {
                    throw new phpmailerException();
                }
                ob_end_clean();
                throw new Exception($okMessage);
            } catch (phpmailerException $ee) {
                $response_st = 'danger';
                $response_m = $errorMessage;
            } catch (Exception $e) {
                $response_st = 'success';
                $response_m = $okMessage;
            }
            echo json_encode(array("type" => $response_st, "message" => $response_m));
            die();
    }

  }
}

add_action( 'wp_ajax_kerge_contact_action',  'kerge_contact_action');
add_action( 'wp_ajax_nopriv_kerge_contact_action',  'kerge_contact_action');

/* ================================================================================================ */