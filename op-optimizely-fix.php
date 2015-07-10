<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.optimizepress.com/
 * @since             1.0.0
 * @package           Op_Instapage_Fix
 *
 * @wordpress-plugin
 * Plugin Name:       OptimizePress Optimizely fix
 * Plugin URI:        http://www.optimizepress.com/
 * Description:       Removes optimizely_enqueue_scripts action from LiveEditor pages
 * Version:           1.0.0
 * Author:            OptimizePress
 * Author URI:        http://www.optimizepress.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       op-optimizely-fix
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
add_action('admin_enqueue_scripts' , 'deactivate_scripts_in_le',1);

function deactivate_scripts_in_le(){
    if ( $_GET['page'] == 'optimizepress-page-builder' ){
        remove_action( 'admin_enqueue_scripts', 'optimizely_enqueue_scripts' );
    }
}