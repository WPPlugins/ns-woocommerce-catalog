<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function ns_wcatalog_free_options_group() {
    register_setting('woocommerce_catalog_free_options', 'wcf_enabled_plugin');
    register_setting('woocommerce_catalog_free_options', 'wcf_hide_cart_button_single_product');
    register_setting('woocommerce_catalog_free_options', 'wcf_hide_cart_button_all_product');
    register_setting('woocommerce_catalog_free_options', 'wcf_hide_cart_checkout_page');
}
 
add_action ('admin_init', 'ns_wcatalog_free_options_group');



function ns_catalog_update_options_form() {
	$wt_repeat = get_option('wcf_enabled_plugin');
	$wt_repeat = get_option('wcf_hide_cart_button_single_product');
	$wt_repeat = get_option('wcf_hide_cart_button_all_product');
	$wt_repeat = get_option('wcf_hide_cart_checkout_page');

    ?>
       <div class="wrap">
		<a href="http://www.nsthemes.com/product/woocommerce-catalog/?utm_source=WooCommerce%20Catalog%20Bannerone&utm_medium=Bannerone%20dashboard&utm_campaign=WooCommerce%20Catalog%20Bannerone%20premium"><img src="<?php echo CATALOG_NS_PLUGIN_URL; ?>/img/woo-catalog-bannerooone.png" style="width: 100%; height: auto;"></a>
        <div class="icon32" id="icon-options-general"><br /></div>
        <h2>NS WooCommerce Catalog settings</h2>
        <p>&nbsp;</p>
        <form method="post" action="options.php" enctype="multipart/form-data">
            <?php settings_fields('woocommerce_catalog_free_options'); ?>
            <table class="form-table">
                <tbody>
					<tr valign="top">
						<th class="titledesc" scope="row">
							<label for="wcf_enabled_plugin"><?php _e('Enabled Plugin', 'ns-woocommerce-catalog'); ?></label>
							<div class="ns-tooltip">?<span class="ns-tooltiptext"><?php _e('Unselect to disabled plugin', 'ns-woocommerce-catalog'); ?></span></div>
						</th>
                        <td class="forminp">
							<?php $checked = (get_option('wcf_enabled_plugin') AND get_option('wcf_enabled_plugin') == 'on') ? ' checked="checked"' : ''; ?>
                            <input type="checkbox" name="wcf_enabled_plugin" id="wcf_enabled_plugin" <?php echo $checked; ?>>
							<span class="description"></span>
                        </td>
                    </tr>
					<tr valign="top">
						<th class="titledesc" scope="row">
							<label for="wcf_hide_cart_button_single_product"><?php _e('Hide cart in product detail page', 'ns-woocommerce-catalog'); ?></label>
							<div class="ns-tooltip">?<span class="ns-tooltiptext"><?php _e('Hide "Add to Cart" button in product detail page', 'ns-woocommerce-catalog'); ?></span></div>
						</th>
                        <td class="forminp">
							<?php $checked = (get_option('wcf_hide_cart_button_single_product') AND get_option('wcf_hide_cart_button_single_product') == 'on') ? ' checked="checked"' : ''; ?>
                            <input type="checkbox" name="wcf_hide_cart_button_single_product" id="wcf_hide_cart_button_single_product" <?php echo $checked; ?>>
							<span class="description"></span>
                        </td>
                    </tr>
					<tr valign="top">
						<th class="titledesc" scope="row">
							<label for="wcf_hide_cart_button_all_product"><?php _e('Hide cart in other page', 'ns-woocommerce-catalog'); ?></label>
							<div class="ns-tooltip">?<span class="ns-tooltiptext"><?php _e('Hide "Add to Cart" button in the other pages of the site', 'ns-woocommerce-catalog'); ?></span></div>
						</th>
                        <td class="forminp">
							<?php $checked = (get_option('wcf_hide_cart_button_all_product') AND get_option('wcf_hide_cart_button_all_product') == 'on') ? ' checked="checked"' : ''; ?>
                            <input type="checkbox" name="wcf_hide_cart_button_all_product" id="wcf_hide_cart_button_all_product" <?php echo $checked; ?>>
							<span class="description"></span>
                        </td>
                    </tr>
					<tr valign="top">
						<th class="titledesc" scope="row">
							<label for="wcf_hide_cart_checkout_page"><?php _e('Hide cart and checkout page', 'ns-woocommerce-catalog'); ?></label>
							<div class="ns-tooltip">?<span class="ns-tooltiptext"><?php _e('If select the cart and checkout page redirect to home', 'ns-woocommerce-catalog'); ?></span></div>
						</th>
                        <td class="forminp">
							<?php $checked = (get_option('wcf_hide_cart_checkout_page') AND get_option('wcf_hide_cart_checkout_page') == 'on') ? ' checked="checked"' : ''; ?>
                            <input type="checkbox" name="wcf_hide_cart_checkout_page" id="wcf_hide_cart_checkout_page" <?php echo $checked; ?>>
							<span class="description"></span>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th class="titledesc" scope="row"></th>
						<td class="forminp">

						</td>
                    </tr>
					<tr>
						<td colspan="2">
							<p><a href="http://www.nsthemes.com/product/woocommerce-catalog/?utm_source=WooCommerce%20Catalog%20Bannerino&utm_medium=Bannerino%20dentro%20settings&utm_campaign=WooCommerce%20Catalog%20Bannerino%20premium"><img src="<?php echo CATALOG_NS_PLUGIN_URL; ?>/img/woo-catalog-banneriiino.png"></a></p>
						</td>
					</tr>
                </tbody>
            </table>
			<p class="submit">
				<input type="submit" class="button-primary" id="submit" name="submit" value="<?php _e('Save Changes', 'ns-woocommerce-catalog'); ?>" />
			</p>
        </form>
    </div>
    <?php
}


?>