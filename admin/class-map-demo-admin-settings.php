<?php

class Map_Demo_Admin_Settings {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

  }

  public function setup_plugin_options_menu() {

    add_plugins_page(
      'Map Demo Options',
      'Map Demo Options',
      'manage_options',
      'map_demo_options',
      array( $this, 'render_settings_page_content' )
    );

  }

  public function render_settings_page_content( $active_tab = '' ) {
    ?>
    <div class="wrap">

      <h2><?php _e( 'Map Demo Options', 'map-demo' ); ?></h2>

      <?php if ( isset( $_GET[ 'tab' ] ) ) {
        $active_tab = $_GET[ 'tab' ];
      } else if ( $active_tab = 'map_display' ) {
        $active_tab = 'map_display';
      } else if ( $active_tab = 'map_options' ) {
        $active_tab = 'map_options';
      } ?>

      <h2 class="nav-tab-wrapper">
        <a href="?page=map_demo_options&tab=map_display" class="nav-tab <?php  echo $active_tab == 'map_display' ? 'nav-tab-active' : '' ?>">
          <?php _e('Map Display', 'map-demo') ?>
        </a>
        <a href="?page=map_demo_options&tab=map_options" class="nav-tab <?php  echo $active_tab == 'map_options' ? 'nav-tab-active' : '' ?>">
          <?php _e('Map Options', 'map-demo') ?>
        </a>
      </h2>

      <form method="post" action="option.php">
        <?php

        if ($active_tab == 'map_display') {
          settings_fields('map_display');
          do_settings_sections('map_display');
        } else if ($active_tab == 'map_options') {
          settings_fields('map_options');
          do_settings_sections('map_options');
        }
        submit_button();

        ?>
      </form>

    </div>
    <?php
  }

}
