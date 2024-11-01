<?php

/**
 * MELIBU PLUGIN HELPER CLASS
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wp/melibu-plugins/syntax-high-lighter
 * @package     Melibu Syntax High Lighter
 * @since       1.0
 */
if (!class_exists('MELIBU_PLUGIN_OPTIONS_06')) {

    class MELIBU_PLUGIN_OPTIONS_06 {
        
        /**
         * 
         * @return type
         */
        public function settings() {

            $collector = array();
            $melibuPlugin_get_syntaxhighlighter_options = get_option('melibuPlugin_get_syntaxhighlighter_options');
            $collector['light'] = '';
            if (isset($melibuPlugin_get_syntaxhighlighter_options['light']) && !empty($melibuPlugin_get_syntaxhighlighter_options['light'])) {
                $collector['light'] = $melibuPlugin_get_syntaxhighlighter_options['light'];
            }
            $collector['toolbar'] = '';
            if (isset($melibuPlugin_get_syntaxhighlighter_options['toolbar']) && !empty($melibuPlugin_get_syntaxhighlighter_options['linenumbers'])) {

                $collector['toolbar'] = $melibuPlugin_get_syntaxhighlighter_options['toolbar'];
            }
            $collector['linenumbers'] = '';
            if (isset($melibuPlugin_get_syntaxhighlighter_options['linenumbers']) && !empty($melibuPlugin_get_syntaxhighlighter_options['linenumbers'])) {

                $collector['linenumbers'] = $melibuPlugin_get_syntaxhighlighter_options['linenumbers'];
            }
            $collector['url'] = '';
            if (isset($melibuPlugin_get_syntaxhighlighter_options['url']) && !empty($melibuPlugin_get_syntaxhighlighter_options['url'])) {

                $collector['url'] = $melibuPlugin_get_syntaxhighlighter_options['url'];
            }
            $collector['ruler'] = '';
            if (isset($melibuPlugin_get_syntaxhighlighter_options['ruler']) && !empty($melibuPlugin_get_syntaxhighlighter_options['ruler'])) {
                $collector['ruler'] = $melibuPlugin_get_syntaxhighlighter_options['ruler'];
            }
            $melibuPlugin_get_syntaxhighlighter_colors_activate = get_option('melibuPlugin_get_syntaxhighlighter_colors_activate');
            $collector['colors'] = '';
            if (isset($melibuPlugin_get_syntaxhighlighter_colors_activate['onoff']) && !empty($melibuPlugin_get_syntaxhighlighter_colors_activate['onoff'])) {
                $collector['colors'] = $melibuPlugin_get_syntaxhighlighter_colors_activate['onoff'];
            }
            $melibu_plugin_syntaxhighlighter_get_regexp_setting = get_option('melibu_plugin_get_syntaxhighlighter_regexp_setting');
            $collector['regexp'] = '';
            if (isset($melibu_plugin_syntaxhighlighter_get_regexp_setting['onoff']) && !empty($melibu_plugin_syntaxhighlighter_get_regexp_setting['onoff'])) {
                $collector['regexp'] = $melibu_plugin_syntaxhighlighter_get_regexp_setting['onoff'];
            }
            $melibu_plugin_get_syntax_copy = get_option('melibuPlugin_syntaxhighlighter_get_syntax_copy');
            $collector['copy'] = '';
            if (isset($melibu_plugin_get_syntax_copy['onoff']) && !empty($melibu_plugin_get_syntax_copy['onoff'])) {
                $collector['copy'] = $melibu_plugin_get_syntax_copy['onoff'];
            }
            return $collector;
        }
        
        /**
         * 
         * @return type
         */
        public function regexp() {

            $collector = array();
            $melibuPlugin_get_syntaxhighlighter_regexp = get_option('melibuPlugin_get_syntaxhighlighter_regexp');
            $collector['keys'] = '';
            if (isset($melibuPlugin_get_syntaxhighlighter_regexp['keys']) && !empty($melibuPlugin_get_syntaxhighlighter_regexp['keys'])) {
                $collector['keys'] = $melibuPlugin_get_syntaxhighlighter_regexp['keys'];
            }
            $collector['values'] = '';
            if (isset($melibuPlugin_get_syntaxhighlighter_regexp['values']) && !empty($melibuPlugin_get_syntaxhighlighter_regexp['values'])) {
                $collector['values'] = $melibuPlugin_get_syntaxhighlighter_regexp['values'];
            }
            $collector['code'] = '';
            if (isset($melibuPlugin_get_syntaxhighlighter_regexp['code']) && !empty($melibuPlugin_get_syntaxhighlighter_regexp['code'])) {
                $collector['code'] = $melibuPlugin_get_syntaxhighlighter_regexp['code'];
            }
            return $collector;
        }
        
        /**
         * 
         * @return type
         */
        public function css() {

            $collector = array();
            $melibuPlugin_get_syntaxhighlihter_shema = get_option('melibuPlugin_get_syntaxhighlihter_shema');
            $collector['shema'] = 'melibu';
            if (isset($melibuPlugin_get_syntaxhighlihter_shema['color_shema']) && !empty($melibuPlugin_get_syntaxhighlihter_shema['color_shema'])) {
                $collector['shema'] = $melibuPlugin_get_syntaxhighlihter_shema['color_shema'];
            }
            $melibuPlugin_get_syntaxhighlighter_colors = get_option('melibuPlugin_get_syntaxhighlighter_colors');
            $collector['csscolors'] = '';
            if (isset($melibuPlugin_get_syntaxhighlighter_colors) && !empty($melibuPlugin_get_syntaxhighlighter_colors)) {
                $collector['csscolors'] = $melibuPlugin_get_syntaxhighlighter_colors;
            }
            $melibuPlugin_get_syntaxhighlighter_css = get_option('melibuPlugin_get_syntaxhighlighter_css');
            $collector['css'] = '';
            if (isset($melibuPlugin_get_syntaxhighlighter_css['css']) && !empty($melibuPlugin_get_syntaxhighlighter_css['css'])) {
                $collector['css'] = $melibuPlugin_get_syntaxhighlighter_css['css'];
            }
            return $collector;
        }

        /**
         * 
         * @return type
         */
        public function defaults() {

            $mbPluginSHLdefaultOptions = array(
                'custom-css' => '',
            );
            $mbPluginSHLdefaultOptions = wp_parse_args(get_option('mb-author-box-get-setting-group'), $mbPluginSHLdefaultOptions);
            return $mbPluginSHLdefaultOptions;
        }
        
        /**
         * 
         * @global type $wpdb
         * @return type
         */
        public function options() {

            global $wpdb;
            $mbPluginSHLoptions = $this->defaults();
            $melibu_shl = $wpdb->prefix . "melibu_shl";
            $get = $wpdb->get_results("SELECT * FROM " . $melibu_shl . " WHERE name='farbe'");
            if (isset($get)) {
                if (isset($get[0]->farbe)) {
                    $data = unserialize($get[0]->farbe);
                    if (isset($data)) {
                        $mbPluginSHLoptions = $data;
                    }
                }
            }
            return $mbPluginSHLoptions;
        }

    }

    global $MELIBU_PLUGIN_OPTIONS_06;
    $MELIBU_PLUGIN_OPTIONS_06 = new MELIBU_PLUGIN_OPTIONS_06();
}
