<?php

/**
 * MELIBU PLUGIN BACKEND CLASS
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wp/melibu-plugins/syntax-high-lighter
 * @package     Melibu Syntax High Lighter
 * @since       1.0
 */
if (!class_exists('MELIBU_PLUGIN_BACKEND_06_ABSTRACT')) {

    abstract class MELIBU_PLUGIN_BACKEND_06_ABSTRACT {

        const VERSION = '1.4.0';
        const DB_VERSION = '1.0.3.1';

        /**
         * Create Custom Tables
         */
        public function create() {

            /**
             * Create Custom Table
             * @see https://codex.wordpress.org/Creating_Tables_with_Plugins
             */
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            global $wpdb;

            $charset_collate = $wpdb->get_charset_collate();

            $melibu_plugin_syntax_table_name = $wpdb->prefix . 'melibu_shl';
            $melibu_plugin_syntax_create_sql = "CREATE TABLE IF NOT EXISTS " . $melibu_plugin_syntax_table_name . " (
		id int(11) NOT NULL AUTO_INCREMENT,
		name varchar(100) NOT NULL,
                farbe varchar(100) NOT NULL,
                time int(11) NOT NULL,
		PRIMARY KEY id (id)
            ) $charset_collate;";

            dbDelta($melibu_plugin_syntax_create_sql);
        }

        /**
         * Update Custom Tables
         * @global type $wpdb
         * @return type
         */
        public function update() {

            global $wpdb;
            $this->DB = $wpdb;

            set_time_limit(0); // no PHP timeout for running updates

            $this->create();

            /**
             * get_option() WP Since: 1.5.0
             * @see https://codex.wordpress.org/Function_Reference/get_option
             */
            if (self::DB_VERSION > get_option('melibu-plugin-syntax-db-version')) {

                $melibu_shl = $this->DB->prefix . 'melibu_shl';

                $row1 = $this->DB->get_results("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name='" . $melibu_shl . "' AND column_name='farbe'");
                if (!empty($row1)) {
                    $alter_sql1 = "ALTER TABLE " . $melibu_shl . " MODIFY farbe TEXT NOT NULL;";
                    $this->DB->query($alter_sql1);
                }

                /**
                 * update_option() WP Since: 1.0.0
                 * https://codex.wordpress.org/Function_Reference/update_option
                 */
                update_option("melibu-plugin-syntax-db-version", self::DB_VERSION);
            }

            if (self::VERSION > get_option('melibu-plugin-syntax-version')) {
                update_option("melibu-plugin-syntax-version", self::VERSION);
            }
        }

        /**
         * Options
         */
        public function init_options() {

            /**
             * add_option() WP Since: 1.0.0
             * @see https://codex.wordpress.org/Function_Reference/add_option
             */
            add_option('melibu-plugin-syntax-version', self::VERSION);
            add_option('melibu-plugin-syntax-db-version', self::DB_VERSION);
        }

        /**
         * Filter
         */
        public function init_filter() {

            /**
             * add_filter() WP Since: 0.71
             * @see https://developer.wordpress.org/reference/functions/add_filter/
             */
            add_filter('wp_default_editor', array($this, 'wp_default_editor')); // Metabox
            add_filter('gettext_with_context', array($this, 'gettext_with_context'), 10, 4); // Metabox
            add_filter('tiny_mce_before_init', array($this, 'tiny_mce_before_init'));
            add_filter("plugin_action_links_syntax-high-lighter", array($this, 'plugin_action_links'));

            // Visual (Shortcode)
//            add_filter('mce_buttons', array($this, 'add_button'));
//            add_filter("mce_external_plugins", array($this, 'register_button'));
        }

        /**
         * Tabs in WP Editor (Visual)
         * @param array $initArray
         * @return string
         */
        public function tiny_mce_before_init($initArray) {

            $initArray['setup'] = '[function(editor) {
                    editor.onKeyDown.add(function(editor, event) {
                    if ( 9 == event.keyCode ) { // tab pressed
                    editor.execCommand( "mceInsertContent", false, "&emsp;&emsp;" ); // inserts tab
                    event.preventDefault();
                    return false;
                    }
                    });
                    }][0]';

            return $initArray;
        }

        /**
         * TinyMCE Button (Shortcode)
         * @param type $buttons
         * @return type
         */
        public function add_button($buttons) {

            /**
             * array_push() PHP Since: PHP 4
             * @see http://php.net/manual/de/function.array-push.php
             */
            array_push($buttons, "button_eek", "button_green", "melibuPlugin_syntax_button", "melibuPlugin_syntax_button1", "melibuPlugin_syntax_button2", "melibuPlugin_syntax_button3");
            return $buttons;
        }

        /**
         * TinyMCE Button (Shortcode)
         * @param array $plugin_array
         * @return type
         */
        public function register_button($plugin_array) {

            /**
             * plugins_url() WP Since: 2.6.0
             * @see https://codex.wordpress.org/Function_Reference/plugins_url
             */
            $plugin_array['melibu_plugin_syntax_button_script'] = plugins_url("js/mb-shl-shortcode.js", dirname(__FILE__));
            return $plugin_array;
        }

        /**
         * Settings
         */
        public function init_settings() {

            /**
             * register_setting() WP Since: 2.7.0
             * @see https://codex.wordpress.org/Function_Reference/register_setting
             */
            // SYNTAXHIGHLIGHTER SHEMA
            register_setting(
                    "melibuPlugin_syntaxhighlighter_shema", // ID
                    "melibuPlugin_get_syntaxhighlighter_shema", // Datenbankeintrag 
                    array($this, 'save_option') // Funktion die aufgerufen wird
            );

            // SYNTAXHIGHLIGHTER CSS
            register_setting(
                    "melibuPlugin_syntaxhighlighter_css", // ID
                    "melibuPlugin_get_syntaxhighlighter_css", // Datenbankeintrag
                    array($this, 'save_option') // Funktion die aufgerufen wird
            );

            // SYNTAXHIGHLIGHTER REGEXP
            register_setting(
                    'melibuPlugin_syntaxhighlighter_regexp', // ID
                    'melibuPlugin_get_syntaxhighlighter_regexp', // Datenbankeintrag
                    array($this, 'save_option') // Funktion die aufgerufen wird
            );

            // SYNTAXHIGHLIGHTER REGEXP SETTINGS
            register_setting(
                    'melibu_plugin_syntaxhighlighter_regexp_setting', // ID
                    'melibu_plugin_get_syntaxhighlighter_regexp_setting', // Datenbankeintrag
                    array($this, 'save_option') // Funktion die aufgerufen wird
            );

            // SYNTAXHIGHLIGHTER TOOLBAR
            register_setting(
                    'melibuPlugin_syntaxhighlighter_options', // ID
                    'melibuPlugin_get_syntaxhighlighter_options', // Datenbankeintrag
                    array($this, 'save_option') // Funktion die aufgerufen wird
            );

            // SYNTAXHIGHLIGHTER COLORS
            register_setting(
                    'melibuPlugin_syntaxhighlighter_colors', // ID
                    'melibuPlugin_get_syntaxhighlighter_colors', // Datenbankeintrag
                    array($this, 'save_option') // Funktion die aufgerufen wird
            );

            // SYNTAXHIGHLIGHTER COLORS ACTIVATE
            register_setting(
                    'melibuPlugin_syntaxhighlighter_colors_activate', // ID
                    'melibuPlugin_get_syntaxhighlighter_colors_activate', // Datenbankeintrag
                    array($this, 'save_option') // Funktion die aufgerufen wird
            );

            // SYNTAXHIGHLIGHTER COPY ACTIVATE
            register_setting(
                    'melibuPlugin_syntaxhighlighter_syntax_copy', // ID
                    'melibuPlugin_syntaxhighlighter_get_syntax_copy', // Datenbankeintrag
                    array($this, 'save_option') // Funktion die aufgerufen wird
            );
        }

        /**
         * 
         * @param type $input
         * @return boolean
         */
        public function save_option($input) {

            $return = $input;
            if (!empty($_POST) && check_admin_referer('melibu-plugin-syntax-nonce-action', 'melibu-plugin-syntax-nonce')) {

                /**
                 * current_user_can() WP Since: since 2.0.0
                 * @see https://codex.wordpress.org/Function_Reference/current_user_can
                 * @see https://codex.wordpress.org/Roles_and_Capabilities
                 */
                if (!current_user_can('manage_options')) {
                    $return = false;
                }

                return $return;
            }
        }

        /**
         * 
         * @return type
         */
        public function save_upload() {

            if (!function_exists('wp_handle_upload')) {
                require_once( ABSPATH . 'wp-admin/includes/file.php' );
            }

            if (!empty($_POST) && check_admin_referer('melibu-plugin-syntax-nonce-action', 'melibu-plugin-syntax-nonce')) {

                /**
                 * current_user_can() WP Since: since 2.0.0
                 * @see https://codex.wordpress.org/Function_Reference/current_user_can
                 * @see https://codex.wordpress.org/Roles_and_Capabilities
                 */
                if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
                    return false;
                }

                $melibuPlugin_get_download_button_logo = get_option('melibu-plugin-syntax-logo-get');
                unlink($melibuPlugin_get_download_button_logo['file']);

                $uploadedfile = $_FILES['melibu-plugin-syntax-logo-get'];
                $upload_overrides = array('test_form' => false);
                $movefile = wp_handle_upload($uploadedfile, $upload_overrides);

                if ($movefile && !isset($movefile['error'])) {
                    return $movefile;
                } else {
                    /**
                     * Error generated by _wp_handle_upload()
                     * @see _wp_handle_upload() in wp-admin/includes/file.php
                     */
                    echo $movefile['error'];
                }
            }
        }

    }

}
