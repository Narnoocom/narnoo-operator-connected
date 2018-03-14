<?php
/*
Plugin Name: Narnoo Operator Connected
Plugin URI: http://narnoo.com/
Description: Allows Wordpress users to display their Narnoo media on their Wordpress site. You will need the Narnoo Operator Plugin to activate this plugin.
Version: 1.0.0
Author: Narnoo Wordpress developer
Author URI: http://www.narnoo.com/
License: GPL2 or later
*/

/*  Copyright 2018  Narnoo.com  (email : info@narnoo.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
// plugin definitions
define( 'NARNOO_OPERATOR_CONNECTED_PLUGIN_NAME', 'Narnoo Operator Connected' );
define( 'NARNOO_OPERATOR_CONNECTED_CURRENT_VERSION', '1.0.0' );
define( 'NARNOO_OPERATOR_CONNECTED_I18N_DOMAIN', 'narnoo-operator-connected' );

define( 'NARNOO_OPERATOR_CONNECTED_URL', plugin_dir_url( __FILE__ ) );
define( 'NARNOO_OPERATOR_CONNECTED_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );



// begin!
new Narnoo_Connected();

class Narnoo_Connected {

	/**
	 * Plugin's main entry point.
	 **/
	function __construct() {
		if ( is_admin() ) {

			add_action( 'admin_menu', array( &$this, 'create_menu' ) );

		}else{
		
					
			add_filter( 'widget_text', 'do_shortcode' );

		}
		
		
	}

	/**
	*	Create the shortcode help menu
	**/
	function create_menu(){	

		add_menu_page( 
			__('Narnoo Operator Connect Information', 	NARNOO_OPERATOR_CONNECTED_I18N_DOMAIN), 
			__('Operators', 			NARNOO_OPERATOR_CONNECTED_I18N_DOMAIN),  
			'manage_options', 
			'narnoo_operators_info', 
			array( &$this, 'narnoo_operators_info' ), 
			NARNOO_OPERATOR_CONNECTED_URL . 'images/icon-16.png'
			);
	}

	/*
	*
	*	title: Narnoo page to display help information
	*	date created: 15-09-16
	*/
	function narnoo_operators_info(){
		ob_start();
		require( NARNOO_OPERATOR_CONNECTED_PLUGIN_PATH . 'libs/html/help_info_tpl.php' );
		echo ob_get_clean();
	}




}
