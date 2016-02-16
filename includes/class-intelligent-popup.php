<?php
class Intelligent_Popup {

    protected $loader;
    protected $plugin_name;
    protected $version;

    public function __construct() {
        $this->plugin_name = 'intelligent-popup';
        $this->version = '0.0.1';

        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->define_public_hooks();

    }

    private function load_dependencies() {
      require_once plugin_dir_path( __FILE__ ) . 'class-intelligent-popup-loader.php';
      require_once plugin_dir_path( dirname( __FILE__ )) . 'public/class-intelligent-popup-public.php';
      require_once plugin_dir_path( dirname( __FILE__ )) . 'admin/class-intelligent-popup-options-page.php';

      $this->loader = new Intelligent_Popup_Loader();
    }

    private function define_admin_hooks() {
      $plugin_admin = new Intelligent_Popup_Options_Page( $this->get_plugin_name(), $this->get_version() );
      //$admin = new Single_Post_Meta_Manager_Admin( $this->get_version() );
      //$this->loader->add_action( 'admin_enqueue_scripts', $admin, 'enqueue_styles' );
      //$this->loader->add_action( 'add_meta_boxes', $admin, 'add_meta_box' );
    }

    private function define_public_hooks() {
  		$plugin_public = new Intelligent_Popup_Public( $this->get_plugin_name(), $this->get_version() );
  		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
  		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
      $this->loader->add_action( 'wp_footer', $plugin_public, 'divcom_popup_html' );
  	}

    public function run() {
      $this->loader->run();
    }

    public function get_plugin_name() {
  		return $this->plugin_name;
  	}

    public function get_version() {
        return $this->version;
    }
}
?>
