<?php
/**
 * @package INTELLIGENTPOPUP
 * Plugin Name: Intelligent Popup
 * Description: This plugin adds a popup to the webpage.
 * Version: 0.0.1
 * Author: Paul King
 * License: GPL2
 */
if ( ! defined( 'WPINC' ) ) {
    die;
}

require_once plugin_dir_path( __FILE__ ) . 'includes/class-intelligent-popup.php';

function run_intelligent_popup() {
    $intelligentpopup = new Intelligent_Popup();
    $intelligentpopup->run();
}

run_intelligent_popup();

?>
