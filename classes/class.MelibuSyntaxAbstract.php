<?php

/**
 * MELIBU SYNTAX HIGH LIGHTER CLASS
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wp/melibu-plugins/syntax-high-lighter
 * @package     Melibu Syntax High Lighter
 * @since       1.2
 */
if (!class_exists('MELIBU_SYNTAX_HIGH_LIGHTER_ABSTRACT')) {

    abstract class MELIBU_SYNTAX_HIGH_LIGHTER_ABSTRACT {

        /**
         * Clean
         * @param type $sourceCode
         * @return type
         */
        protected function clean($sourceCode) {
            
            return trim(
                    esc_html(
                            strip_shortcodes(
                                    str_ireplace(
                                            array("<br />", "<br>", "<br/>", "<br/ >"), '', $sourceCode
                                    )
                            )
                    )
            );
        }

        /**
         * Toolbar
         * @return string
         */
        protected function toolbar() {

            global $MELIBU_PLUGIN_OPTIONS_06;
            $settings = $MELIBU_PLUGIN_OPTIONS_06->settings();
            $return = '';
            if ($settings['toolbar'] == 1) { // With Toolbar ?
                $return = '<div class="st_highlighter_board"><button class="mb-syntax-open-code" title="Open Code">+</button></div>';
            }
            return $return;
        }

        /**
         * Ruler
         * @return string
         */
        protected function ruler() {

            global $MELIBU_PLUGIN_OPTIONS_06;
            $settings = $MELIBU_PLUGIN_OPTIONS_06->settings();
            $return = '';
            if ($settings['ruler'] == '1') { // With Ruler ?
                $return .= '<div class="st_highlighter_ruler">';
                $return .= '<ul class="st_ruler" data-mb-syntax-items="30"></ul>';
                $return .= '</div>';
            }
            return $return;
        }

        /**
         * WP Clean
         * @return string
         */
        protected function clean_wp($regexp) {

            $regexp['/<p[^>]*?>.*<\/p>/isU'] = ''; // Remove p tags
            $regexp['/(&#8243;|&#8220;|&#8222;)/i'] = '"'; // Double quote
            $regexp['/(&#038;)/i'] = '&'; // And
            $regexp['/(&#8211;)/i'] = '-'; // And
            $regexp['/(&#8230;)/i'] = '.'; // Point
            $regexp['/(&#039;|&#8218;|&#8216;|&#8217;|&#8242;)/i'] = '\''; // Slash
            $regexp['/(\s";)/i'] = ' \'\';';
            return $regexp;
        }

        /**
         * JavaScript
         * @return string
         */
        protected function js($regexp) {

            $regexp['/(?<!\w|\$|\%|\@|\.)(Array|Boolean|DOM|Date|Math|navigator|Number|namespace|
                RegExp|screen|String|window)(?!\w|\=)/'] = '<span class="st_js_keys">$1</span>'; // JavaScript Objects
            $regexp['/(?<!\w|\$|\%|\@)(window|document|jQuery)(?=\.|<)(?!\w|\=)/'] = '<span class="st_script_keys">$1</span>'; // JavaScript keywords
            $regexp['/(\'+.*\+\.?.*\+.*\')/i'] = '<span class="st_js_vars">$1</span>'; // JavaScript Vars
            $regexp['/(?<!:)(\/\/.*\n+)/isU'] = '<span class="st_comment">\\1</span>'; // JavaScript Comment
            return $regexp;
        }

        /**
         * HTML
         * @return string
         */
        protected function html($regexp) {

            $regexp['/(&lt;+[\/?a-zA-Z]+[[:space:]]*.*(\s|\n|)?(\/)?&gt;+)/i'] = '<span class="st_html_tags">$1</span>'; // HTML tags
            $regexp['/(&lt;+(link)+[[:space:]]*.*\/?&gt;+)/i'] = '<span class="st_html_link">$1</span>'; // HTML link tags
            $regexp['/(&lt;+(meta)+[[:space:]]*.*\/?&gt;+)/i'] = '<span class="st_html_meta">$1</span>'; // HTML meta tags
            $regexp['/(&lt;+(\/?style)+[[:space:]]*.*&gt;+)/i'] = '<span class="st_html_style">$1</span>'; // HTML style tags
            $regexp['/(&lt;+(\/*script)+[[:space:]]*.*&gt;+)/i'] = '<span class="st_html_script">$1</span>'; // HTML script tags
            $regexp['/(&lt;\!\-+\-+[[:space:]]*.*[[:space:]]*\-+\-+&gt;)/isU'] = '<span class="st_comment">\\1</span>'; // HTML comments
            return $regexp;
        }

        /**
         * Links
         * @return string
         */
        protected function links($regexp) {

            global $MELIBU_PLUGIN_OPTIONS_06;
            $settings = $MELIBU_PLUGIN_OPTIONS_06->settings();
            if ($settings['url'] == "1") { // With Links ?
                $regexp['/((http\:\/\/|https\:\/\/)(www\.)?(\-|\.|\w|\d|\/)*)/i'] = '<a href="$1" class="link" target="_blank">$1</a>';
            }
            return $regexp;
        }

        /**
         * Links
         * @return string
         */
        protected function custom_regexp($regexp = '') {

            global $MELIBU_PLUGIN_OPTIONS_06;
            $melibu_plugin_shl_regexp = $MELIBU_PLUGIN_OPTIONS_06->regexp();
            if (!empty($melibu_plugin_shl_regexp['keys']) && !empty($melibu_plugin_shl_regexp['values'])) {
                $keys_array = explode(",", $melibu_plugin_shl_regexp['keys']);
                $values_array = explode(",", $melibu_plugin_shl_regexp['values']);
                if (is_array($keys_array) && count($keys_array) > 0) {
                    foreach ($keys_array as $key => $val) {
                        $regexp[$val] = $values_array[$key];
                    }
                }
            }
            return $regexp;
        }

    }

}