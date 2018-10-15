<?php
/**
 * ClickToAddress Integration
 *
 * @package  ClickToAddress Integration
 * @category Integration
 * @author   Crafty Clicks
 */

if ( ! class_exists( 'WC_ClickToAddress_Autocomplete_Integration' ) ) :

class WC_ClickToAddress_Autocomplete_Integration extends WC_Integration {

	/**
	 * Init and hook in the integration.
	 */
	public function __construct() {
		global $woocommerce;

		$this->id				 = 'clicktoaddress_autocomplete';
		$this->method_title	   = __( 'ClickToAddress Auto-Complete', 'woocommerce-clicktoaddress-autocomplete' );
		$this->method_description = __( 'Adds CraftyClicks\' Address Auto-Complete to WooCommerce checkout pages.', 'woocommerce-clicktoaddress-autocomplete' );

		// Load the settings.
		$this->init_form_fields();
		$this->init_settings();

		// Define user set variables.
		$this->config = (object) array(
			'enabled_checkout' => 		$this->get_option( 'enabled_checkout' ),
			'enabled_orders' =>			$this->get_option( 'enabled_orders' ),
			'enabled_users' =>			$this->get_option( 'enabled_users' ),
			'access_token' =>			$this->get_option( 'access_token' ),
			'layout' =>					(int) $this->get_option( 'layout' ),
			'ambient' =>				$this->get_option( 'ambient' ),
			'accent' =>					$this->get_option( 'accent' ),
			'hide_fields' =>			(int) $this->get_option( 'hide_fields' ),
			'hide_buttons' =>			(int) $this->get_option( 'hide_buttons' ),
			'search_line_1' =>			(int) $this->get_option( 'search_line_1' ),
			'show_logo' =>				(int) $this->get_option( 'show_logo' ),
			'match_countries' =>		(int) $this->get_option( 'match_countries' ),
			'lock_country' =>			(int) $this->get_option( 'lock_country' ),
			'ip_location' =>			(int) $this->get_option( 'ip_location' ),
			'language' =>				$this->get_option( 'language' ),
			'search_label' =>			$this->get_option( 'search_label' ),
			'reveal_button' =>			$this->get_option( 'reveal_button' ),
			'hide_button' =>			$this->get_option( 'hide_button' ),
			'default_placeholder' =>	$this->get_option( 'default_placeholder' ),
			'country_placeholder' =>	$this->get_option( 'country_placeholder' ),
			'country_button' =>			$this->get_option( 'country_button' ),
			'generic_error' =>			$this->get_option( 'generic_error' ),
			'no_results' =>				$this->get_option( 'no_results' )
		);

		// Actions.
		add_action( 'woocommerce_update_options_integration_' .  $this->id, array( $this, 'process_admin_options' ) );
		add_action( 'woocommerce_settings_integration', array( $this, 'addConfigJs' ) );
		if($this->config->enabled_checkout){
			add_action( 'woocommerce_checkout_billing', array( $this, 'addCheckoutJs' ) );
			add_action( 'woocommerce_before_edit_account_address_form', array( $this, 'addCheckoutJs' ) );
		}
		if($this->config->enabled_users){
			add_action( 'edit_user_profile', array( $this, 'addUsersJs' ) );
		}
		if($this->config->enabled_orders){
			add_action( 'dbx_post_advanced', array( $this, 'addOrdersJs' ) );
		}
		// Filters.
		add_filter( 'woocommerce_settings_api_sanitized_fields_' . $this->id, array( $this, 'sanitize_settings' ) );
	}

	public function addConfigJs(){
		wp_enqueue_style('clicktoaddress-autocomplete-css-popup',plugins_url( '../admin/css/popup.css', __FILE__ ));
		wp_enqueue_script('clicktoaddress-autocomplete-js-popup',plugins_url( '../admin/js/popup.min.js', __FILE__ ));
		wp_enqueue_script('clicktoaddress-autocomplete-js-config',plugins_url( '../admin/js/config.js', __FILE__ ));
	}

	public function addJs($type, $dir){
		if($this->config->access_token != ''){
			$script_name = 'clicktoaddress-autocomplete-js-';
			wp_enqueue_script($script_name . 'core', 'https://cc-cdn.com/generic/scripts/v1/cc_c2a.min.js');
			wp_enqueue_script($script_name . $type, plugins_url( '../'.$dir.'/js/'.$type.'.js', __FILE__ ));
			wp_add_inline_script($script_name . $type, 'var cc_c2a_config = ' . json_encode($this->config) . ';', 'before');
		}
	}

	public function addCheckoutJs(){ $this->addJs('checkout', 'frontend'); }

	public function addUsersJs(){ $this->addJs('users', 'admin'); }

	public function addOrdersJs(){
		global $post;
		if($post->post_type == 'shop_order'){
			$this->addJs('orders', 'admin');
		}
	}


	/**
	 * Initialize integration settings form fields.
	 *
	 * @return void
	 */
	public function init_form_fields() {
		$this->form_fields = array(
			'enabled_checkout' => array(
				'title'			 => __( 'Enabled - Frontend', 'woocommerce-clicktoaddress-autocomplete' ),
				'type'			  => 'select',
				'description'	   => __( 'Enable address lookup on the checkout and account pages', 'woocommerce-clicktoaddress-autocomplete' ),
				'desc_tip'		  => true,
				'default'		   => 1,
				'options'     => array(
					0 => __('No', 'woocommerce' ),
					1 => __('Yes', 'woocommerce' )
				)
			),
			'enabled_orders' => array(
				'title'			 => __( 'Enabled - Backend (Orders Page)', 'woocommerce-clicktoaddress-autocomplete' ),
				'type'			  => 'select',
				'description'	   => __( 'Enable address lookup on the orders page (admin panel)', 'woocommerce-clicktoaddress-autocomplete' ),
				'desc_tip'		  => true,
				'default'		   => 1,
				'options'     => array(
					0 => __('No', 'woocommerce' ),
					1 => __('Yes', 'woocommerce' )
				)
			),
			'enabled_users' => array(
				'title'			 => __( 'Enabled - Backend (Users Page)', 'woocommerce-clicktoaddress-autocomplete' ),
				'type'			  => 'select',
				'description'	   => __( 'Enable address lookup on the users page (admin panel)', 'woocommerce-clicktoaddress-autocomplete' ),
				'desc_tip'		  => true,
				'default'		   => 1,
				'options'     => array(
					0 => __('No', 'woocommerce' ),
					1 => __('Yes', 'woocommerce' )
				)
			),
			'access_token' => array(
				'title'			=> __( 'Access Token', 'woocommerce-clicktoaddress-autocomplete' ),
				'type'			=> 'text',
				'description'	=> __( 'Enter the access token you received by email when you signed up for a Crafty Clicks account.', 'woocommerce-clicktoaddress-autocomplete' ),
				'desc_tip'		=> true,
				'default'		=> 'xxxxx-xxxxx-xxxxx-xxxxx',
				'placeholder'	=> 'xxxxx-xxxxx-xxxxx-xxxxx'
			),
			'layout' => array(
				'title'			=> __( 'Search Layout', 'woocommerce-clicktoaddress-autocomplete' ),
				'type'			=> 'select',
				'description'	=> __( 'Choose a layout type', 'woocommerce-clicktoaddress-autocomplete' ),
				'desc_tip'		=> true,
				'default'		=> 1,
				'options'		=> array(
					1 => __('Below', 'woocommerce' ),
					2 => __('Surround', 'woocommerce' )
				)
			),
			'ambient' => array(
				'title'			=> __( 'Colour Scheme', 'woocommerce-clicktoaddress-autocomplete' ),
				'type'			=> 'select',
				'description'	=> __( 'Choose a light or dark colour scheme', 'woocommerce-clicktoaddress-autocomplete' ),
				'desc_tip'		=> true,
				'default'		=> 'light',
				'options'     => array(
					'light' => __('light', 'woocommerce' ),
					'dark' => __('dark', 'woocommerce' )
				)
			),
			'accent' => array(
				'title'			=> __( 'Accent', 'woocommerce-clicktoaddress-autocomplete' ),
				'type'			=> 'select',
				'description'	=> __( 'Choose a secondary colour', 'woocommerce-clicktoaddress-autocomplete' ),
				'desc_tip'		=> true,
				'default'		=> 'default',
				'options'     => array(
					'default'		=> __('default', 'woocommerce' ),
					'red'			=> __('red', 'woocommerce' ),
					'pink'			=> __('pink', 'woocommerce' ),
					'purple'		=> __('purple', 'woocommerce' ),
					'deepPurple'	=> __('deepPurple', 'woocommerce' ),
					'indigo'		=> __('indigo', 'woocommerce' ),
					'blue'			=> __('blue', 'woocommerce' ),
					'lightBlue'		=> __('lightBlue', 'woocommerce' ),
					'cyan'			=> __('cyan', 'woocommerce' ),
					'teal'			=> __('teal', 'woocommerce' ),
					'green'			=> __('green', 'woocommerce' ),
					'lightGreen'	=> __('lightGreen', 'woocommerce' ),
					'lime'			=> __('lime', 'woocommerce' ),
					'yellow'		=> __('yellow', 'woocommerce' ),
					'amber'			=> __('amber', 'woocommerce' ),
					'orange'		=> __('orange', 'woocommerce' ),
					'deepOrange'	=> __('deepOrange', 'woocommerce' ),
					'brown'			=> __('brown', 'woocommerce' ),
					'grey'			=> __('grey', 'woocommerce' ),
					'blueGrey'		=> __('blueGrey', 'woocommerce' )
				)
			),
			'hide_fields' => array(
				'title'			=> __( 'Hide Address Fields', 'woocommerce-clicktoaddress-autocomplete' ),
				'type'			=> 'select',
				'description'	=> __( 'Hide the address fields until a search result is selected', 'woocommerce-clicktoaddress-autocomplete' ),
				'desc_tip'		=> true,
				'default'		=> 1,
				'options'		=> array(
					0 => __('No', 'woocommerce' ),
					1 => __('Yes', 'woocommerce' )
				)
			),
			'hide_buttons' => array(
				'title'			=> __( 'Disable Buttons on Result Selected', 'woocommerce-clicktoaddress-autocomplete' ),
				'type'			=> 'select',
				'description'	=> __( 'Show and hide fields buttons do not appear once a search result has been selected', 'woocommerce-clicktoaddress-autocomplete' ),
				'desc_tip'		=> true,
				'default'		=> 1,
				'options'     => array(
					0 => __('No', 'woocommerce' ),
					1 => __('Yes', 'woocommerce' )
				)
			),
			'search_line_1' => array(
				'title'			=> __( 'Search in Address Line 1', 'woocommerce-clicktoaddress-autocomplete' ),
				'type'			=> 'select',
				'description'	=> __( 'Use address line 1 as the search field rather than adding a separate search field', 'woocommerce-clicktoaddress-autocomplete' ),
				'desc_tip'		=> true,
				'default'		=> 0,
				'options'     => array(
					0 => __('No', 'woocommerce' ),
					1 => __('Yes', 'woocommerce' )
				)
			),
			'show_logo' => array(
				'title'			=> __( 'Show ClickToAddress Logo', 'woocommerce-clicktoaddress-autocomplete' ),
				'type'			=> 'select',
				'description'	=> __( 'Show or hide the ClickToAddress logo', 'woocommerce-clicktoaddress-autocomplete' ),
				'desc_tip'		=> true,
				'default'		=> 1,
				'options'     => array(
					0 => __('No', 'woocommerce' ),
					1 => __('Yes', 'woocommerce' )
				)
			),
			'match_countries' => array(
				'title'			=> __( 'Match WooCommerce Country List', 'woocommerce-clicktoaddress-autocomplete' ),
				'type'			=> 'select',
				'description'	=> __( 'The country list in the search interface will match the country list in WooCommerce.', 'woocommerce-clicktoaddress-autocomplete' ),
				'desc_tip'		=> true,
				'default'		=> 1,
				'options'     => array(
					0 => __('No', 'woocommerce' ),
					1 => __('Yes', 'woocommerce' )
				)
			),
			'lock_country' => array(
				'title'			=> __( 'Lock Country to Dropdown', 'woocommerce-clicktoaddress-autocomplete' ),
				'type'			=> 'select',
				'description'	=> __( 'The selected country in the search interface is locked to the selected country in the dropdown.', 'woocommerce-clicktoaddress-autocomplete' ),
				'desc_tip'		=> true,
				'default'		=> 0,
				'options'     => array(
					0 => __('No', 'woocommerce' ),
					1 => __('Yes', 'woocommerce' )
				)
			),
			'ip_location' => array(
				'title'			=> __( 'Geolocation', 'woocommerce-clicktoaddress-autocomplete' ),
				'type'			=> 'select',
				'description'	=> __( 'Set the default country to the user\'s location based on IP address (frontend only)', 'woocommerce-clicktoaddress-autocomplete' ),
				'desc_tip'		=> true,
				'default'		=> 0,
				'options'     => array(
					0 => __('No', 'woocommerce' ),
					1 => __('Yes', 'woocommerce' )
				)
			),
			'language' => array(
				'title'			=> __( 'Language', 'woocommerce-clicktoaddress-autocomplete' ),
				'type'			=> 'select',
				'description'	=> __( 'Set the language used for the country list. Note that the other texts will not be translated, but you can customise them below.', 'woocommerce-clicktoaddress-autocomplete' ),
				'desc_tip'		=> true,
				'default'		=> 'en',
				'options'     => array(
					'en' => __('English', 'woocommerce' ),
					'de' => __('Deutsch', 'woocommerce' )
				)
			),
			'search_label' => array(
				'title'			=> __( 'Search Field Label', 'woocommerce-clicktoaddress-autocomplete' ),
				'type'			=> 'text',
				'description'	=> __( 'Text to be displayed as the label for the address search field', 'woocommerce-clicktoaddress-autocomplete' ),
				'desc_tip'		=> true,
				'default'		=> 'Find Address',
				'placeholder'	=> 'Find Address'
			),
			'reveal_button' => array(
				'title'			=> __( 'Reveal Button Text', 'woocommerce-clicktoaddress-autocomplete' ),
				'type'			=> 'text',
				'description'	=> __( 'When the form fields are hidden, this text is displayed on the button that reveals the fields', 'woocommerce-clicktoaddress-autocomplete' ),
				'desc_tip'		=> true,
				'default'		=> 'Enter Address Manually',
				'placeholder'	=> 'Enter Address Manually'
			),
			'hide_button' => array(
				'title'			=> __( 'Hide Button Text', 'woocommerce-clicktoaddress-autocomplete' ),
				'type'			=> 'text',
				'description'	=> __( 'This text is displayed on the button to hide the form fields and show the address search field', 'woocommerce-clicktoaddress-autocomplete' ),
				'desc_tip'		=> true,
				'default'		=> 'Search For Address',
				'placeholder'	=> 'Search For Address'
			),
			'default_placeholder' => array(
				'title'			=> __( 'Default Placeholder', 'woocommerce-clicktoaddress-autocomplete' ),
				'type'			=> 'text',
				'description'	=> __( 'Text to be displayed as the default placeholder', 'woocommerce-clicktoaddress-autocomplete' ),
				'desc_tip'		=> true,
				'default'		=> 'Start with post/zip code or street',
				'placeholder'	=> 'Start with post/zip code or street'
			),
			'country_placeholder' => array(
				'title'			=> __( 'Country Placeholder', 'woocommerce-clicktoaddress-autocomplete' ),
				'type'			=> 'text',
				'description'	=> __( 'Text to be displayed as the country placeholder', 'woocommerce-clicktoaddress-autocomplete' ),
				'desc_tip'		=> true,
				'default'		=> 'Type here to search for a country',
				'placeholder'	=> 'Type here to search for a country'
			),
			'country_button' => array(
				'title'			=> __( 'Country Button', 'woocommerce-clicktoaddress-autocomplete' ),
				'type'			=> 'text',
				'description'	=> __( 'Text to be displayed on the country button', 'woocommerce-clicktoaddress-autocomplete' ),
				'desc_tip'		=> true,
				'default'		=> 'Change Country',
				'placeholder'	=> 'Change Country'
			),
			'generic_error' => array(
				'title'			=> __( 'Generic Error', 'woocommerce-clicktoaddress-autocomplete' ),
				'type'			=> 'text',
				'description'	=> __( 'Text to be displayed when an error occurs', 'woocommerce-clicktoaddress-autocomplete' ),
				'desc_tip'		=> true,
				'default'		=> 'An error occurred. Please enter your address manually',
				'placeholder'	=> 'An error occurred. Please enter your address manually'
			),
			'no_results' => array(
				'title'			=> __( 'No Results', 'woocommerce-clicktoaddress-autocomplete' ),
				'type'			=> 'text',
				'description'	=> __( 'Text to be displayed when no results are found', 'woocommerce-clicktoaddress-autocomplete' ),
				'desc_tip'		=> true,
				'default'		=> 'No results found',
				'placeholder'	=> 'No results found'
			)
		);
	}

	/**
	 * Santize our settings
	 * @see process_admin_options()
	 */
	public function sanitize_settings( $settings ) {
		if ( isset( $settings ) &&
			 isset( $settings['api_key'] ) ) {
			$settings['api_key'] = strtoupper( $settings['api_key'] );
		}
		return $settings;
	}

}

endif;
