<?php

/**
 * Fired during plugin activation
 *
 * @link       https://ashique12009.blogspot.com
 * @since      1.0.0
 *
 * @package    Most_Read_In_X_Days
 * @subpackage Most_Read_In_X_Days/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Most_Read_In_X_Days
 * @subpackage Most_Read_In_X_Days/includes
 * @author     Khandoker Ashique Mahamud <ashique12009@gmail.com>
 */
class Most_Read_In_X_Days_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		$table_sql = "CREATE TABLE `wp_most_read_posts` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`post_id` int(11) NOT NULL,
			`read_counter` int(11) NOT NULL,
			`read_date` date NOT NULL,
			PRIMARY KEY (`id`)
		   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta($table_sql);
	}

}
