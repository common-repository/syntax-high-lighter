<?php
require_once 'class.MelibuBackendAbstract.php';
/**
 * MELIBU PLUGIN BACKEND CLASS
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wp/melibu-plugins/syntax-high-lighter
 * @package     Melibu Syntax High Lighter
 * @since       1.0
 */
if (!class_exists('MELIBU_PLUGIN_BACKEND_06_META_BOX')) {

    class MELIBU_PLUGIN_BACKEND_06_META_BOX extends MELIBU_PLUGIN_BACKEND_06_ABSTRACT {

        protected function admin_meta() {

            /**
             * add_action() WP Since: 1.2.0
             * @see https://developer.wordpress.org/reference/functions/add_action/
             */
            add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
        }

        /**
         * 
         * @param type $translated
         * @param type $text
         * @param type $context
         * @param type $domain
         * @return type
         */
        public function gettext_with_context($translated, $text, $context, $domain) {

            $option = 'melibu_syntax_post_type_' . get_post_type(get_the_ID());
            if (count(get_post_meta(get_the_ID(), 'melibu_syntax_post_current')) > 0 || (get_option($option) != false )) {
                $return = 'MB SYNTAX';
            } else {
                $return = 'Text';
            }

            if ('default' !== $domain) {
                $return = $translated;
            }

            if ('Text' !== $text) {
                $return = $translated;
            }

            if ('Name for the Text editor tab (formerly HTML)' !== $context) {
                $return = $translated;
            }

            return $return;
        }

        /**
         * 
         * @global type $post
         * @param type $content
         * @return string
         */
        public function wp_default_editor($content) {

            if (
                    (count(get_post_meta(get_the_ID(), 'melibu_syntax_post_current')) > 0) ||
                    (get_option('melibu_syntax_post_type_' . get_post_type(get_the_ID())) != false)
            ) {
                return 'html';
            }
            return $content;
        }

        /**
         * 
         * @param type $post_type
         */
        public function add_meta_boxes($post_type) {

            /**
             * 
             * @see https://developer.wordpress.org/reference/functions/add_meta_box/
             */
            add_meta_box(
                    'melibu_plugin_syntax_section_id', // $id
                    __('MB SHL', 'syntax-high-lighter'), // $title
                    array($this, 'custom_box'), // $callback
                    $post_type, // $screen
                    'side', // $context
                    'default' // $priority
            );
        }

        /**
         * 
         * @return boolean
         */
        public function custom_box() {

            echo '<p>';
            _e('Disable the visual area for this post or for all posting formats of this type', 'syntax-high-lighter');
            echo '.</p>';

            $checked = "";
            if (count(get_post_meta(get_the_ID(), 'melibu_syntax_post_current')) > 0) {
                $checked = ' checked="checked" ';
            }

//            var_dump(get_post_meta(get_the_ID(), 'melibu_syntax_post_current'));

            echo '<p>';
            echo '<input type="checkbox" id="melibu_syntax_post_current" name="melibu_syntax_post_current" ' . $checked . '>';
            echo '<label for="melibu_syntax_post_current">';
            _e("Disable for current post", 'syntax-high-lighter');
            echo '</label> ';
            echo '</p>';

            $checked2 = "";
            $option = 'melibu_syntax_post_type_' . get_post_type(get_the_ID());
            if (get_option($option)) {
                $checked2 = ' checked="checked" ';
            }

//            var_dump(get_option($option));

            echo '<p>';
            echo '<input type="checkbox" id="melibu_syntax_post_type" name="melibu_syntax_post_type" ' . $checked2 . '>';
            echo '<label for="melibu_syntax_post_type">';
            _e("Disable for all posts this posting format", 'syntax-high-lighter');
            echo '</label> ';
            echo '</p>';
        }

        /**
         * 
         * @param type $post_id
         * @return boolean
         */
        public function save_post_custom_box() {

            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                return false;
            }

            if (isset($_POST['melibu_syntax_post_current'])) {
                /**
                 * add_post_meta() - WP Since: 1.5.0
                 * @see https://codex.wordpress.org/Function_Reference/add_post_meta
                 */
                add_post_meta(get_the_ID(), 'melibu_syntax_post_current', '1');
            } else {
                /**
                 * delete_post_meta() - WP Since: 
                 * @see https://codex.wordpress.org/Function_Reference/delete_post_meta
                 */
                delete_post_meta(get_the_ID(), 'melibu_syntax_post_current');
            }

            wp_cache_delete('melibu_syntax_post_current');

            $option = 'melibu_syntax_post_type_' . get_post_type(get_the_ID());

            if (isset($_POST['melibu_syntax_post_type'])) {
                /**
                 * update_option - WP Since: 1.0.0
                 * 4.2.0: $autoload parameter added 
                 * @see https://codex.wordpress.org/Function_Reference/update_option
                 */
                update_option($option, '1', '', 'no');
            } else {
                /**
                 * delete_option() - WP Since: 1.2.0
                 * @see https://codex.wordpress.org/Function_Reference/delete_option
                 */
                delete_option($option);
            }

            wp_cache_delete($option);
        }

    }

}
