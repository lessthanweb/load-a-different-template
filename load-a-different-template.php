<?php
/*
Plugin Name: lessthanweb. How To: Load A Different Template
Plugin URI: https://www.lessthanweb.com/blog/load-a-different-template
Description: lessthanweb. How To: Load A Different Template example code.
Version: 1.0
Author: lessthanweb.
Author URI: https://www.lessthanweb.com
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: lessthanweb
*/

/*
lessthanweb. How To: Load A Different Template is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
lessthanweb. How To: Load A Different Template is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Add Additional Fields To The User Profile. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

// Make sure we don't expose any info if called directly
if ( ! function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	die();
}

/**
 * If user is administrator, load administrator template.
 *
 * @param	string	$template 
 * @return	string
 *
 */
function lessthanweb_custom_template( $template = '' ) {
	if ( current_user_can( 'manage_options' ) ) {
		//	This is just to demonstrate the template change.
		//	Use proper hooks to locate the template.
		$admin_template = plugin_dir_path( __FILE__ ) . 'admin-template.php';
		
		//	If template found, use it!
		if ( $admin_template != '' ) {
			return $admin_template ;
		}
	}

	return $template;
}
//	Execute filter as late as possible so we set a high number like 99.
add_filter( 'template_include', 'lessthanweb_custom_template', 99 );