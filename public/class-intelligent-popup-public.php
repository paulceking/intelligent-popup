<?php

class Intelligent_Popup_Public {

	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/intelligent-popup.css', array(), $this->version, 'all' );
	}

	public function enqueue_scripts() {
    wp_enqueue_script($this->plugin_name.'-cookie', plugin_dir_url( __FILE__ ) . 'js/js.cookie.js', array(), $this->version, false );
  	wp_enqueue_script($this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/intelligent-popup.js', array(), $this->version, false );
	}

  public function intelligent_popup_html() {
     echo '<div id="intelligent-popup" class="overlay">';
     echo '<div class="popup">';
     echo '<h2>Here i am</h2>';
     echo '<a class="close" href="#">&times;</a>';
     echo '<div class="content">';
     echo 'Popup Text.';
     echo '</div>';
     echo '</div>';
     echo '</div>';
  }

}
