<?php
class Intelligent_Popup_Options_Page {

  private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}

	public function admin_menu() {
		add_options_page(
			'Intelligent Popup Settings',
			'Intelligent Popup',
			'manage_options',
			'intelligent-popup-options',
			array(
				$this,
				'settings_page'
			)
		);
	}

	public function  settings_page() {
		echo 'This is the page content';
	}
}
?>
