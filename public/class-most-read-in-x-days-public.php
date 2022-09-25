<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://ashique12009.blogspot.com
 * @since      1.0.0
 *
 * @package    Most_Read_In_X_Days
 * @subpackage Most_Read_In_X_Days/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Most_Read_In_X_Days
 * @subpackage Most_Read_In_X_Days/public
 * @author     Khandoker Ashique Mahamud <ashique12009@gmail.com>
 */
class Most_Read_In_X_Days_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Most_Read_In_X_Days_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Most_Read_In_X_Days_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/most-read-in-x-days-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Most_Read_In_X_Days_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Most_Read_In_X_Days_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/most-read-in-x-days-public.js', array( 'jquery' ), $this->version, false );

	}

	public function most_read_add_shortcode_for_posts() {
		add_shortcode('show_most_read_posts', [$this, 'make_query_and_show_posts']);
	}

	public function make_query_and_show_posts() {
		echo 'HELLO';
	}

	public function most_read_track_post_views($post_id) {
		if (!is_single()) {
			return;
		}
		if (empty($post_id)) {
			global $post;
			$post_id = $post->ID;
		}

		$this->most_read_set_post_views($post_id);
	}

	public function most_read_set_post_views($post_id) {
		global $wpdb;

		$table_name = $wpdb->prefix . 'most_read_posts';

		$today_date = date('Y-m-d', time());

		// Get last read counter of today's date
		$result = $wpdb->get_results("SELECT * FROM $table_name WHERE read_date='$today_date' AND post_id=" . $post_id, OBJECT);

		if (count($result) > 0) { // Update counter as today date found
			$data = [
				'read_counter' => $result[0]->read_counter+1
			];
			$where = [
				'read_date' => $today_date
			];
			
			$wpdb->update($table_name, $data, $where);
		}
		else {
			$data = [
				'post_id' => $post_id,
				'read_counter' => 1,
				'read_date' => date('Y-m-d', time())
			];

			$wpdb->insert($table_name, $data);
		}
	}

}
