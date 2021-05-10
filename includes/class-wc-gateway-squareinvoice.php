<?php
/**
 * Class WC_Gateway_BANK_JP file.
 *
 * @package WooCommerce\Gateways
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Bank Payment Gateway in Japanese
 *
 * Provides a Bank Payment Gateway in Japanese. Based on code by Shohei Tanaka.
 *
 * @class 		WC_Gateway_BANK_JP
 * @extends		WC_Payment_Gateway
 * @version		2.1.10
 * @package		WooCommerce/Classes/Payment
 * @author 		Artisan Workshop
 */

class WC_Gateway_SQUAREINVOICE extends WC_Payment_Gateway {

    /**
     * Constructor for the gateway.
     */
    public function __construct() {
		$this->id                 = 'squareinvoice';
		$this->icon               = apply_filters('woocommerce_squareinvoice_icon', '');
		$this->has_fields         = false;
		$this->method_title       = __( 'INVOICE PAYMENT FOR JCB CREDIT CAR', 'lb-payment' );
		$this->method_description = __( 'Allows payments by creating an invoice through Square.', 'lb-payment' );
        		// Load the settings.
		$this->init_form_fields();
		$this->init_settings();
		
		// Get setting values
		foreach ( $this->settings as $key => $val ) $this->$key = $val;

        // Define user set variables
		$this->title        = $this->get_option( 'title' );
		$this->description  = $this->get_option( 'description' );
		$this->instructions = $this->get_option( 'instructions' );

		// BANK Japan account fields shown on the thanks page and in emails
		$this->account_details = get_option( 'woocommerce_squareinvoice_accounts',
			array(
				array(
					'bank_name'      => $this->get_option( 'bank_name' ),
					'bank_branch'    => $this->get_option( 'bank_branch' ),
					'bank_type'      => $this->get_option( 'bank_type' ),
					'account_number' => $this->get_option( 'account_number' ),
					'account_name'   => $this->get_option( 'account_name' ),
				)
			)
		);

		// Actions
		// add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
		// add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'save_account_details' ) );
	    // add_action( 'woocommerce_thankyou_bankjp', array( $this, 'thankyou_page' ) );

	    // Customer Emails
	    // add_action( 'woocommerce_email_before_order_table', array( $this, 'email_instructions' ), 10, 3 );
    }

}