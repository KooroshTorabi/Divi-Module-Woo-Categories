<?php
/*
Plugin Name: Woo Category And Count
Description: Woocommerce product count text
Version:     1.0.0
Author:      Kourosh TorabiJafroudi

Woo Category And Count is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Woo Category And Count is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

*/


if ( ! function_exists( 'wcac_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function wcac_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/WooCategoryAndCount.php';
}
add_action( 'divi_extensions_init', 'wcac_initialize_extension' );
endif;
