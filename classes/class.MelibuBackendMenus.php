<?php
require_once 'class.MelibuBackendMetaBox.php';
/**
 * MELIBU PLUGIN BACKEND CLASS
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wp/melibu-plugins/syntax-high-lighter
 * @package     Melibu Syntax High Lighter
 * @since       1.0
 */
if (!class_exists('MELIBU_PLUGIN_BACKEND_06_MENUS')) {

    class MELIBU_PLUGIN_BACKEND_06_MENUS extends MELIBU_PLUGIN_BACKEND_06_META_BOX {

        /**
         * Admin Menu
         */
        protected function admin_menu() {

            /**
             * add_action() WP Since: 1.2.0
             * @see https://developer.wordpress.org/reference/functions/add_action/
             */
            add_action('admin_menu', array($this, 'add_menu'));
        }

        /**
         * Add Menus
         */
        public function add_menu() {

            if (!current_user_can('manage_options')) {
                return;
            }

            /**
             * add_menu_page()
             * @see https://developer.wordpress.org/reference/functions/add_menu_page/
             */
            add_menu_page('MeliBu WP SHL - Welcome', // $page_title
                    'MB Syntax', // $menu_title
                    'manage_options', // $capability
                    'melibu-plugin-syntax-admin', // $menu_slug
                    array($this, 'doc'), // $function
                    plugins_url('img/icon-MB-20.png', dirname(__FILE__)) // $icon_url
            );

            /**
             * add_submenu_page() WP Since: 1.5.0
             * @see https://developer.wordpress.org/reference/functions/add_submenu_page/
             */
            add_submenu_page('melibu-plugin-syntax-admin', // $parent_slug
                    'MeliBu WP SHL - Options', // $page_title
                    __('Options', 'syntax-high-lighter'), // $menu_title
                    'manage_options', // $capability
                    'melibu-plugin-syntax-admin-control-menu-1', // $menu_slug
                    array($this, 'panel') // $function
            );

            /**
             * add_submenu_page() WP Since: 1.5.0
             * @see https://developer.wordpress.org/reference/functions/add_submenu_page/
             */
            add_submenu_page('melibu-plugin-syntax-admin', // $parent_slug
                    'MeliBu WP SHL - About', // $page_title
                    __('About', 'syntax-high-lighter'), // $menu_title
                    'manage_options', // $capability
                    'melibu-plugin-syntax-admin-control-menu-4', // $menu_slug
                    array($this, 'about') // $function
            );
        }

        /**
         * Menu Welcome
         */
        public function doc() {

            require_once MELIBU_PLUGIN_PATH_06 . 'html/doc.php';
        }

        /**
         * Menu Panel
         */
        public function panel() {

            require_once MELIBU_PLUGIN_PATH_06 . 'html/panel.php';
        }

        /**
         * Menu About
         */
        public function about() {

            require_once MELIBU_PLUGIN_PATH_06 . 'html/about.php';
        }

        /**
         * 
         * @param type $links
         * @return type
         */
        public function plugin_action_links($links) {

            $settings_link = '<a href="admin.php?page=melibu-plugin-syntax-admin-control-menu-1">' . __('Options', 'syntax-high-lighter') . '</a>';
            array_unshift($links, $settings_link);
            return $links;
        }

    }

}
