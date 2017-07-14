<?php
/*
Plugin Name: NS WooCommerce Catalog
Plugin URI: https://wordpress.org/plugins/ns-woocommerce-catalog/
Description: Switch their WooCommerce site in online catalogue
Version: 2.0.0
Author: NsThemes
Author URI: http://nsthemes.com
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! defined( 'CATALOG_NS_PLUGIN_DIR' ) )
    define( 'CATALOG_NS_PLUGIN_DIR', untrailingslashit( dirname( __FILE__ ) ) );

if ( ! defined( 'CATALOG_NS_PLUGIN_URL' ) )
    define( 'CATALOG_NS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/* *** include css admin *** */
function ns_wcatalog_css_admin( $hook ) {
	wp_enqueue_style('ns-catalog-style-admin', CATALOG_NS_PLUGIN_URL . '/css/style.css');
}
add_action( 'admin_enqueue_scripts', 'ns_wcatalog_css_admin' );

/* *** include css *** */
function ns_wcatalog_css( $hook ) {
	if (get_option('wcf_hide_cart_button_single_product') AND get_option('wcf_hide_cart_button_single_product') == 'on'	AND get_option('wcf_enabled_plugin') AND get_option('wcf_enabled_plugin') == 'on' ) {
		wp_enqueue_style('ns-catalog-style-single-product', CATALOG_NS_PLUGIN_URL . '/css/disabled-single-product.css');
	}
	if (get_option('wcf_hide_cart_button_all_product') AND get_option('wcf_hide_cart_button_all_product') == 'on' AND get_option('wcf_enabled_plugin') AND get_option('wcf_enabled_plugin') == 'on' ) {
		wp_enqueue_style('ns-catalog-style-all-product', CATALOG_NS_PLUGIN_URL . '/css/disabled-all-product.css');
	}
}
add_action( 'wp_enqueue_scripts', 'ns_wcatalog_css' );

/* *** include js *** */
function ns_wcatalog_js( $hook ) {
	wp_enqueue_script('ns-custom-script', CATALOG_NS_PLUGIN_URL . '/js/custom.js', array('jquery', 'wp-color-picker'));
}
add_action( 'admin_enqueue_scripts', 'ns_wcatalog_js' );

/* *** include single product catalog *** */
// require_once( CATALOG_NS_PLUGIN_DIR.'/woocommerce-catalog-single-product.php');

/* *** include admin option *** */
require_once( CATALOG_NS_PLUGIN_DIR.'/ns-woocommerce-catalog-admin.php');

function ns_catalog_activate_set_default_options() {
    add_option('wcf_enabled_plugin', 'on');
    add_option('wcf_hide_cart_button_single_product', 'on');
    add_option('wcf_hide_cart_button_all_product', 'on');
    add_option('wcf_hide_cart_checkout_page', 'on');
}
 
register_activation_hook( __FILE__, 'ns_catalog_activate_set_default_options');

function ns_wcatalog_remove_cart_checkout() {
	echo '
	<style>
	* {
		display: none !important;
	}
	</style>
	<script>
		window.location.href = "'.home_url().'";
	</script>';
	die();
}


if (get_option('wcf_hide_cart_checkout_page') AND get_option('wcf_hide_cart_checkout_page') == 'on' AND get_option('wcf_enabled_plugin') AND get_option('wcf_enabled_plugin') == 'on' ) {
	add_action( 'woocommerce_after_checkout_billing_form', 'ns_wcatalog_remove_cart_checkout' );
	add_action( 'woocommerce_before_cart', 'ns_wcatalog_remove_cart_checkout' );	
}

function ns_woo_catalog_free_add_option_page() {
    add_menu_page('NS Catalog', 'NS Catalog', 'manage_options', 'ns-catalog-options-page-free', 'ns_catalog_update_options_form', CATALOG_NS_PLUGIN_URL.'/img/backend-sidebar-icon.png', 60);
}
 
add_action('admin_menu', 'ns_woo_catalog_free_add_option_page');


add_action( 'plugins_loaded', 'ns_catalog_free_load_textdomain' );

function ns_catalog_free_load_textdomain() {
  load_plugin_textdomain( 'ns-woocommerce-catalog', false, basename( dirname( __FILE__ ) ) . '/languages' ); 
}

?>