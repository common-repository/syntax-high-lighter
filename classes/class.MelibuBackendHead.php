<?php
require_once 'class.MelibuBackendMenus.php';
/**
 * MELIBU PLUGIN BACKEND CLASS
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wp/melibu-plugins/syntax-high-lighter
 * @package     Melibu Syntax High Lighter
 * @since       1.0
 */
if (!class_exists('MELIBU_PLUGIN_BACKEND_06_HEAD')) {

    class MELIBU_PLUGIN_BACKEND_06_HEAD extends MELIBU_PLUGIN_BACKEND_06_MENUS {

        /**
         * The header call in class.MelibuBackend.php
         */
        protected function admin_header() {

            /**
             * add_action() - WP Since: 1.2.0
             * @see https://developer.wordpress.org/reference/functions/add_action/
             */
            add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));
            add_action('admin_head', array($this, 'admin_head'));
        }

        /**
         * admin_head() - WP Since: 
         * https://codex.wordpress.org/Plugin_API/Action_Reference/admin_head
         */
        public function admin_head() {

            $melibuPlugin_get_syntaxhighlighter_colors_activate = get_option('melibuPlugin_get_syntaxhighlighter_colors_activate');
            $syntaxhighlighter_colors_activate_onOff = '';
            if (isset($melibuPlugin_get_syntaxhighlighter_colors_activate['onoff']) && $melibuPlugin_get_syntaxhighlighter_colors_activate['onoff'] == '1') {
                $syntaxhighlighter_colors_activate_onOff = $melibuPlugin_get_syntaxhighlighter_colors_activate['onoff'];
            }
            $option = 'melibu_syntax_post_type_' . get_post_type(get_the_ID());
            if (count(get_post_meta(get_the_ID(), 'melibu_syntax_post_current')) > 0 || (get_option($option)) != false) {
                ?>
                <style type="text/css">
                    #content-tmce, #content-tmce:hover, #qt_content_fullscreen{
                        display:none;
                    }
                </style>
            <?php } ?>
            <style type="text/css"> 
            <?php
            if ($syntaxhighlighter_colors_activate_onOff == '1') {
                ?>
                    [class*=mb-linecode-] {

                        width:auto;
                    }

                    [class*=mb-linecount-] {

                        float: left;
                        width: auto;
                        min-width: 65px;
                        border-right: 1px solid lawngreen;
                        text-align: right;
                    }

                    .noselect {

                        -webkit-touch-callout: none;
                        -webkit-user-select: none;
                        -moz-user-select: none;
                        -ms-user-select: none;
                    }

                    .pre {

                        display: block;
                        margin: 0;
                        padding: 3em .3em;

                        background-color: transparent;

                        color: #E3CEAB;
                        font-family: 'Consolas', 'Andale Mono', 'Monotype.com', 'Lucida Console', 'Monospace', Serif;
                        font-size: .9rem;
                        white-space: pre;
                        word-wrap: normal;
                    }

                    .htmlcodetitle, .csscodetitle, .lesscodetitle, .sasscodetitle, .jscodetitle, .phpcodetitle, .mysqlcodetitle, .javacodetitle, .rubycodetitle, .perlcodetitle, .wpcodetitle, .outputcodetitle {

                        color: #ECEDEF;
                    }

                    .htmlcodetitle {

                        border-top: 2px solid #E54D26;
                        border-bottom: 2px solid #E54D26;
                        background: #F16529;
                    }

                    .csscodetitle {

                        border-top: 2px solid #0171BB;
                        border-bottom: 2px solid #0171BB;
                        background: #28A9E0;
                    }

                    .lesscodetitle {

                        border-top: 2px solid #333333;
                        border-bottom: 2px solid #333333;
                        background: #1D365D;
                    }

                    .sasscodetitle {

                        border-top: 2px solid #333333;
                        border-bottom: 2px solid #333333;
                        background: #CF649A;
                    }

                    .jscodetitle {

                        border-top: 2px solid #E5A329;
                        border-bottom: 2px solid #E5A329;
                        background: #EFBD24;
                    }

                    .phpcodetitle {

                        border-top: 2px solid #4D588F;
                        border-bottom: 2px solid #4D588F;
                        background: #8892BF;
                    }

                    .mysqlcodetitle {

                        border-top: 2px solid #FFA518;
                        border-bottom: 2px solid #FFA518;
                        background: #5382A1;
                    }

                    .javacodetitle {

                        border-top: 2px solid #4E7896;
                        border-bottom: 2px solid #4E7896;
                        background: #F58219;
                    }

                    .rubycodetitle {

                        border-top: 2px solid #A91401;
                        border-bottom: 2px solid #B31301;
                        background: #CF2B18;
                    }

                    .perlcodetitle {

                        border-top: 2px solid #5D5E83;
                        border-bottom: 2px solid #5D5E83;
                        background: #41436D;
                    }

                    .wpcodetitle {

                        border-top: 2px solid #333333;
                        border-bottom: 2px solid #333333;
                        background: #0073AA;
                    }

                    .outputcodetitle {

                        border-top: 2px solid #000000;
                        border-bottom: 2px solid #000000;
                        background: #333333;
                    }

                    .htmlcode, .csscode, .lesscode, .sasscode, .jscode, .phpcode, .mysqlcode, .javacode, .rubycode, .perlcode, .wpcode {

                        background-color: #222;
                    }
                <?php
                // Is custom colors active
                $melibuPlugin_get_syntaxhighlihter_colors = get_option('melibuPlugin_get_syntaxhighlighter_colors');
                if (isset($melibuPlugin_get_syntaxhighlihter_colors) && is_array($melibuPlugin_get_syntaxhighlihter_colors)) {
                    // Custom colors active
                    foreach ($melibuPlugin_get_syntaxhighlihter_colors as $key => $syntax) {
                        echo '.pre .' . $key . ' { color: ' . $syntax . ' !important; } ';
                    }
                } else {
                    // Default css active
                    echo file_get_contents(MELIBU_PLUGIN_PATH_06 . 'css/melibu_plugin_syntaxhighlight_readable.css');
                }
            } else {
                // Is custom css active
                $melibuPlugin_get_syntaxhighlighter_css = get_option('melibuPlugin_get_syntaxhighlighter_css');
                if (isset($melibuPlugin_get_syntaxhighlighter_css['css']) && !empty($melibuPlugin_get_syntaxhighlighter_css['css'])) {
                    // Custom css active
                    echo $melibuPlugin_get_syntaxhighlighter_css['css'];
                } else {
                    // Default css active
                    echo file_get_contents(MELIBU_PLUGIN_PATH_06 . 'css/melibu_plugin_syntaxhighlight_readable.css');
                }
            }
            ?>
            </style>
            <?php
        }

        /**
         * admin_enqueue_script() - WP Since:
         * @see https://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
         * @see https://developer.wordpress.org/reference/hooks/admin_enqueue_scripts/
         */
        public function admin_enqueue_scripts() {
            
            /**
             * wp_enqueue_style() - WP Since: 2.6.0
             * @see https://developer.wordpress.org/reference/functions/wp_enqueue_style/
             */
            wp_enqueue_style('melibu-plugin-shl-admin', plugins_url('css/admin.min.css', dirname(__FILE__)));
            wp_enqueue_style('melibu-plugin-all-style', plugins_url('css/all.min.css', dirname(__FILE__)));
            
            /**
             * wp_enqueue_script() - WP Since: 2.1.0
             * @see https://developer.wordpress.org/reference/functions/wp_enqueue_script/
             */
            wp_enqueue_script('postbox');
            wp_enqueue_script('melibu-plugin-all-event', plugins_url('js/mb-all-event.js', dirname(__FILE__)));
            
            wp_enqueue_script('melibu-plugin-shl-doc', plugins_url('js/mb-shl-doc.js', dirname(__FILE__)));
            wp_enqueue_script('melibu-plugin-shl-panel', plugins_url('js/mb-shl-panel.js', dirname(__FILE__)));
            
            wp_enqueue_script('melibu-plugin-shl-syntax', plugins_url('/js/mb-shl-syntax.js', dirname(__FILE__)), '', '', true);
            wp_enqueue_script('melibu-plugin-shl-ruler', plugins_url('/js/mb-shl-ruler.js', dirname(__FILE__)), array('jquery'), 1.1, true);
            wp_enqueue_script('melibu-plugin-shl-bbcode', plugins_url('/js/mb-shl-bbcode.js', dirname(__FILE__)), '', '', true);
        }

    }

}
    