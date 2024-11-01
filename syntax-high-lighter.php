<?php

/*
  Plugin Name: MeliBu WP Syntax High Lighter
  Plugin URI:  http://samet-tarim.de/wp/melibu-plugins/syntax-high-lighter
  Description: With our plugin Mark your syntax for PHP, HTML, CSS (LESS, SASS), JS (AJAX, jQuery), PERL and many more. Suitable for everyone and easy use. Rate this plugin <a href="https://wordpress.org/support/view/plugin-reviews/syntax-high-lighter">MeliBu WP Syntax High Lighter</a> we welcome any support. Your Melibu Team
  Version:     1.4.0
  Author:      Samet Tarim
  Author URI:  http://samet-tarim.de/
  Text Domain: syntax-high-lighter
  Domain Path: /lang/
  License:     GPLv2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html

  MeliBu WP Syntax High Lighter is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 2 of the License, or
  any later version.
 
  MeliBu WP Syntax High Lighter is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.
 
  You should have received a copy of the GNU General Public License
  along with MeliBu WP Syntax High Lighter. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 */

// SECURE SCRIPT ///////////////////////////////////////////////////////////////

if (!defined('ABSPATH')) {
    exit;
}

// DEFINE FULLPATH /////////////////////////////////////////////////////////////

if (!defined('MELIBU_PLUGIN_PATH_06')) {
    define('MELIBU_PLUGIN_PATH_06', plugin_dir_path(__FILE__));
}

if (!defined('MELIBU_PLUGIN_URL_06')) {
    define('MELIBU_PLUGIN_URL_06', plugin_dir_url(__FILE__));
}

// DEFINE GLOBALS //////////////////////////////////////////////////////////////

global $MELIBU_PLUGIN_BACKEND_06, $MELIBU_PLUGIN_FRONTEND_06, $MELIBU_SYNTAX_HIGH_LIGHTER;

// LOAD BACKEND ////////////////////////////////////////////////////////////////
// Check Admin
if (is_admin()) {

    // Require Backend Class
    require_once MELIBU_PLUGIN_PATH_06 . 'classes/class.MelibuBackend.php';
    // Check if class
    if (class_exists('MELIBU_PLUGIN_BACKEND_06')) {

        // Instantiate the plugin class
        $MELIBU_PLUGIN_BACKEND_06 = new MELIBU_PLUGIN_BACKEND_06();

        // Installation and uninstallation hooks
        register_activation_hook(__FILE__, array('MELIBU_PLUGIN_BACKEND_06', 'activate'));
        register_deactivation_hook(__FILE__, array('MELIBU_PLUGIN_BACKEND_06', 'deactivate'));
        register_uninstall_hook(__FILE__, array('MELIBU_PLUGIN_BACKEND_06', 'uninstall'));
    }
}

// LOAD FRONTEND ///////////////////////////////////////////////////////////////
// Require Frontend Class
require_once MELIBU_PLUGIN_PATH_06 . 'classes/class.MelibuFrontend.php';
require_once MELIBU_PLUGIN_PATH_06 . 'classes/class.MelibuOptions.php';
require_once MELIBU_PLUGIN_PATH_06 . 'classes/class.MelibuSyntax.php';