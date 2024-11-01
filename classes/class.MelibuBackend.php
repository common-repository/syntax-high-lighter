<?php
require_once 'class.MelibuBackendHead.php';
/**
 * MELIBU PLUGIN BACKEND CLASS
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wp/melibu-plugins/syntax-high-lighter
 * @package     Melibu Syntax High Lighter
 * @since       1.0
 */
if (!class_exists('MELIBU_PLUGIN_BACKEND_06')) {

    class MELIBU_PLUGIN_BACKEND_06 extends MELIBU_PLUGIN_BACKEND_06_HEAD {

        protected $DB = null;

        /**
         * Attribute
         * @var type
         */
        protected $wppost = null;

        /**
         *  Construct
         */
        public function __construct() {

            $this->admin_action();
            $this->admin_menu();
            $this->admin_meta();
            $this->admin_header();
        }

        /**
         * Admin action
         */
        private function admin_action() {

            /**
             * add_action() WP Since: 1.2.0
             * @see https://developer.wordpress.org/reference/functions/add_action/
             */
            add_action('admin_init', array($this, 'admin_init'));
            add_action('plugins_loaded', array($this, 'plugins_loaded'));
            add_action('plugins_loaded', array($this, 'plugins_loaded_about'), 1);
            add_action('admin_footer', array($this, 'admin_footer'));
            add_action('admin_print_footer_scripts', array($this, 'admin_print_footer_scripts'));
            add_action('save_post', array($this, 'save_post_custom_box'));
        }

        /**
         * Activate
         */
        public static function activate() {

            /**
             * current_user_can() WP Since: 2.0.0
             * @see https://codex.wordpress.org/Function_Reference/current_user_can
             * @see https://codex.wordpress.org/Roles_and_Capabilities
             */
            if (!current_user_can('activate_plugins')) {
                return;
            }

            /**
             * set_transient() WP Since: 2.8
             * @see https://codex.wordpress.org/Function_Reference/set_transient
             */
            set_transient('melibu-plugin-syntax-page-activated', 1, 30);
        }

        /**
         * Deactivate
         */
        public static function deactivate() {

            //..
        }

        /**
         * Uninstall
         */
        public static function uninstall() {

            /**
             * current_user_can() WP Since: 2.0.0
             * @see https://codex.wordpress.org/Function_Reference/current_user_can
             * @see https://codex.wordpress.org/Roles_and_Capabilities
             */
            if (!defined('WP_UNINSTALL_PLUGIN') && !current_user_can('delete_plugins')) {
                return;
            }

            /**
             * unregister_setting() WP Since: 2.7.0
             * @see https://codex.wordpress.org/Function_Reference/unregister_setting
             */
            unregister_setting("melibuPlugin_syntaxhighlighter_shema", "melibuPlugin_get_syntaxhighlighter_shema", "");
            delete_option("melibuPlugin_get_syntaxhighlighter_shema");
            unregister_setting("melibuPlugin_syntaxhighlighter_css", "melibuPlugin_get_syntaxhighlighter_css", "");
            delete_option("melibuPlugin_get_syntaxhighlighter_css");
            unregister_setting("melibuPlugin_syntaxhighlighter_regexp", "melibuPlugin_get_syntaxhighlighter_regexp", "");
            delete_option("melibuPlugin_get_syntaxhighlighter_regexp");
            unregister_setting("melibuPlugin_syntaxhighlighter_regexp_settings", "melibuPlugin_get_syntaxhighlighter_regexp_settings", "");
            delete_option("melibuPlugin_get_syntaxhighlighter_regexp_settings");
            unregister_setting("melibuPlugin_syntaxhighlighter_options", "melibuPlugin_get_syntaxhighlighter_options", "");
            delete_option("melibuPlugin_get_syntaxhighlighter_options");
            unregister_setting("melibuPlugin_syntaxhighlighter_colors", "melibuPlugin_get_syntaxhighlighter_colors", "");
            delete_option("melibuPlugin_get_syntaxhighlighter_colors");
            unregister_setting("melibuPlugin_syntaxhighlighter_colors_activate", "melibuPlugin_get_syntaxhighlighter_colors_activate", "");
            delete_option("melibuPlugin_get_syntaxhighlighter_colors_activate");
            unregister_setting("melibuPlugin_syntaxhighlighter_syntax_copy", "melibuPlugin_syntaxhighlighter_get_syntax_copy", "");
            delete_option("melibuPlugin_syntaxhighlighter_get_syntax_copy");

            /**
             * delete_option() WP Since: 1.2.0
             * @see https://codex.wordpress.org/Function_Reference/delete_option
             */
            delete_option('melibu-plugin-syntax-version');
            delete_option('melibu-plugin-syntax-db-version');

            /**
             * @see https://codex.wordpress.org/Class_Reference/wpdb
             */
            global $wpdb;
            $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}melibu_shl");
            $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}melibu_shl_sub");
        }

        /**
         * Admin Init
         */
        public function admin_init() {

            $this->init_options(); // Option
            $this->init_settings(); // Einstellungen
            $this->init_filter(); // Filter

            global $wpdb;
            if (isset($_POST) && !empty($_POST['mb-shl-get-setting-group'])) {
                if (!isset($_POST['mb-shl-nonce']) || !wp_verify_nonce($_POST['mb-shl-nonce'], 'mb-shl-nonce-action')) {
                    //..
                } else {
                    $melibu_shl = $wpdb->prefix . "melibu_shl";
                    $get = $wpdb->get_results("SELECT * FROM " . $melibu_shl . "");
                    $dbTableName = 'farbe';
                    $bodyguard = true;
                    if ($get) {
                        foreach ($get as $key => $data) {
                            if ($data->name == $dbTableName) {
                                $bodyguard = false;
                                $wpdb->update($melibu_shl, array(
                                    'name' => $dbTableName,
                                    'farbe' => serialize(esc_sql($_POST['mb-shl-get-setting-group'])),
                                    'time' => time()
                                        ), array('id' => $data->id)
                                );
                            }
                        }
                    }
                    if ($bodyguard === true) {
                        $wpdb->insert($melibu_shl, array(
                            'name' => $dbTableName,
                            'farbe' => serialize(esc_sql($_POST['mb-shl-get-setting-group'])),
                            'time' => time()
                        ));
                    }
                }
            }
        }

        /**
         * plugins_loaded() WP Since: 1.5.2
         * 
         * @see https://codex.wordpress.org/Plugin_API/Action_Reference/plugins_loaded
         */
        public function plugins_loaded() {

            $this->update(); // Update
        }

        /**
         * Plugins Loaded Once on Activate
         */
        public function plugins_loaded_about() {

            /**
             * get_transient() WP Since: 2.8
             * @see https://codex.wordpress.org/Function_Reference/get_transient
             */
            if (!get_transient('melibu-plugin-syntax-page-activated')) {
                return;
            }

            /**
             * delete_transient() WP Since: 2.8
             * @see https://codex.wordpress.org/Function_Reference/delete_transient
             */
            delete_transient('melibu-plugin-syntax-page-activated');

            /**
             * wp_redirect() WP Since: 1.5.1
             * @see https://codex.wordpress.org/Function_Reference/wp_redirect
             */
            wp_redirect(
                    /**
                     * admin_url() WP Since:2.6.0
                     * @see https://codex.wordpress.org/Function_Reference/admin_url
                     */
                    admin_url('admin.php?page=melibu-plugin-syntax-admin-control-menu-4')
            );
            exit;
        }

        /**
         * admin_footer() - WP Since: 
         * @see https://codex.wordpress.org/Plugin_API/Action_Reference/admin_footer
         */
        public function admin_footer() {
            
        }

        /**
         * admin_print_footer_scripts() - WP Since: 2.8.0
         * @see https://developer.wordpress.org/reference/hooks/admin_print_footer_scripts/
         */
        public function admin_print_footer_scripts() {

            if (wp_script_is('quicktags')) {
                ?>
                <script type="text/javascript">
                    jQuery(function ($) {
                        $('textarea#content, textarea#wp_mce_fullscreen').keydown(function (e) {
                            if (e.keyCode != 9)
                                return;
                            e.preventDefault();
                            var
                                    textarea = $(this)[0],
                                    start = textarea.selectionStart,
                                    before = textarea.value.substring(0, start),
                                    after = textarea.value.substring(start, textarea.value.length);
                            textarea.value = before + "\t" + after;
                            textarea.setSelectionRange(start + 1, start + 1);
                        });
                    });
                    QTags.addButton('htmlcode', 'html', '[html]', '[/html]', 'hmtl', 'HTML code tag', 100);
                    QTags.addButton('csscode', 'css', '[css]', '[/css]', 'css', 'CSS code tag', 100);
                    QTags.addButton('lesscode', 'less', '[less]', '[/less]', 'less', 'LESS code tag', 100);
                    QTags.addButton('sasscode', 'sass', '[sass]', '[/sass]', 'sass', 'SASS code tag', 100);
                    QTags.addButton('jscode', 'js', '[js]', '[/js]', 'js', 'JS code tag', 100);
                    QTags.addButton('phpcode', 'php', '[php]', '[/php]', 'php', 'PHP code tag', 100);
                    QTags.addButton('mysql', 'mysql', '[mysql]', '[/mysql]', 'mysql', 'MySQL code tag', 100);
                    QTags.addButton('javacode', 'java', '[java]', '[/java]', 'java', 'JAVA code tag', 100);
                    QTags.addButton('rubycode', 'ruby', '[ruby]', '[/ruby]', 'ruby', 'RUBY code tag', 100);
                    QTags.addButton('perlcode', 'perl', '[perl]', '[/perl]', 'perl', 'PERL code tag', 100);
                    QTags.addButton('wpcode', 'wp', '[wp]', '[/wp]', 'wp', 'WP code tag', 100);
                    QTags.addButton('outputcode', 'output', '[output]', '[/output]', 'output', 'Output code tag', 100);
                    QTags.addButton('pre', 'pre', '<pre>', '</pre>', 'pre', 'pre code tag', 100);
                </script>
                <?php

            }
        }

    }

}
    