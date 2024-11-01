<?php
/**
 * MELIBU PLUGIN FRONTEND CLASS
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wp/melibu-plugins/syntax-high-lighter
 * @package     Melibu Syntax High Lighter
 * @since       1.0
 */
if (!class_exists('MELIBU_PLUGIN_FRONTEND_06')) {

    class MELIBU_PLUGIN_FRONTEND_06 {

        private $locale = '';

        /**
         *  Construct
         */
        public function __construct() {

            /**
             * add_action() WP Since: 1.2.0
             * https://developer.wordpress.org/reference/functions/add_action/
             */
            add_action('init', array($this, 'init'));
            add_action('plugins_loaded', array($this, 'plugins_loaded'));
            add_action('wp_enqueue_scripts', array($this, 'wp_enqueue_scripts'));
            add_action('widgets_init', array($this, 'widgets_init'));
            add_action('wp_head', array($this, 'wp_head'));

            /**
             * add_shortcode() WP Since: 2.5
             * https://codex.wordpress.org/Function_Reference/add_shortcode
             */
//            add_shortcode('wp_mb_plugin_syntax', array($this, 'shortcode'));
        }

        /**
         * Init
         */
        public function init() {

            $this->init_filters();
        }

        /**
         * Filters
         */
        protected function init_filters() {

            /**
             * apply_filters() WP Since: 0.71
             * https://developer.wordpress.org/reference/functions/apply_filters/
             */
            $this->locale = apply_filters('plugin_locale', get_locale(), 'syntax-high-lighter');

//            add_filter('widget_text', 'do_shortcode'); // Enable Shortcode in Text Widgets
            add_filter('the_content', array($this, 'the_content'));
            remove_filter('the_content', 'wpautop');
            add_filter('the_content', 'wpautop', 99);
        }

        /**
         * 
         * @param type $content
         * @return type
         */
        public function get_bbcode($content = null) {

            global $MELIBU_SYNTAX_HIGH_LIGHTER;
            return $MELIBU_SYNTAX_HIGH_LIGHTER->bbcode($content);
        }

        /**
         * 
         * @param type $content
         * @return type
         */
        public function the_content($content = null) {

            return $this->get_bbcode($content);
        }

        /**
         * Scripts
         */
        public function wp_enqueue_scripts() {

            /**
             * wp_enqueue_style() WP Since: 2.6.0
             * https://developer.wordpress.org/reference/functions/wp_enqueue_style/
             */
            wp_enqueue_style('melibu-plugin-shl-style', plugins_url('css/style.min.css', dirname(__FILE__)));

            /**
             * wp_enqueue_script() WP Since: 2.1.0
             * https://developer.wordpress.org/reference/functions/wp_enqueue_script/
             */
            wp_enqueue_script('melibu-plugin-all-event', plugins_url('js/mb-all-event.js', dirname(__FILE__)));

            wp_enqueue_script('melibu-plugin-shl-syntax', plugins_url('/js/mb-shl-syntax.js', dirname(__FILE__)), '', '', true);
            wp_enqueue_script('melibu-plugin-shl-ruler', plugins_url('/js/mb-shl-ruler.js', dirname(__FILE__)), array('jquery'), 1.1, true);
        }

        /**
         * Plugins Loaded
         */
        public function plugins_loaded() {

            $this->load_textdomain();
        }

        /**
         * Load Textdomains
         */
        public function load_textdomain() {

            /**
             * load_textdomain() WP Since: 1.5.0
             * https://codex.wordpress.org/Function_Reference/load_textdomain
             */
            load_textdomain('syntax-high-lighter', WP_LANG_DIR . "/plugins/syntax-high-lighter/syntax-high-lighter-$this->locale.mo");

            /**
             * load_plugin_textdomain() WP Since: 1.5.0
             * https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
             */
            load_plugin_textdomain('syntax-high-lighter', false, plugin_basename(MELIBU_PLUGIN_PATH_06 . 'lang/'));
        }

        /**
         * Add Shortcode
         * 
         * @param type $atts
         * @param type $content
         * @return type
         */
        public function shortcode($atts = null, $content = null) {

            return $this->get_bbcode($content);
        }

        /**
         *  register widgets
         */
        public function widgets_init() {

//            require_once MELIBU_PLUGIN_PATH_06 . 'classes/class.MelibuWidget.php';
//            register_widget('MELIBU_PLUGIN_WIDGET_06');
        }

        /**
         * 
         */
        public function wp_head() {
            
            ?><style type="text/css"><?php
            
            global $MELIBU_PLUGIN_OPTIONS_06;
            // Options
            $mbPluginSHLoptions = $MELIBU_PLUGIN_OPTIONS_06->options();
            
            $melibuPlugin_get_syntaxhighlighter_colors_activate = get_option('melibuPlugin_get_syntaxhighlighter_colors_activate');
            $syntaxhighlighter_colors_activate_onOff = '';
            if (isset($melibuPlugin_get_syntaxhighlighter_colors_activate['onoff']) && $melibuPlugin_get_syntaxhighlighter_colors_activate['onoff'] == '1') {
                $syntaxhighlighter_colors_activate_onOff = $melibuPlugin_get_syntaxhighlighter_colors_activate['onoff'];
            }
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
                // Custom colors active
                $melibuPlugin_get_syntaxhighlihter_colors = get_option('melibuPlugin_get_syntaxhighlighter_colors');
                if (isset($melibuPlugin_get_syntaxhighlihter_colors) && is_array($melibuPlugin_get_syntaxhighlihter_colors)) {
                    foreach ($melibuPlugin_get_syntaxhighlihter_colors as $key => $syntax) {
                        echo '.pre .' . $key . ' { color: ' . $syntax . ' !important; } ';
                    }
                } else {
                    // Default css active
                    echo file_get_contents(MELIBU_PLUGIN_PATH_06 . 'css/melibu_plugin_syntaxhighlight_readable.css');
                }
            } else {

                // Is css active
                $melibuPlugin_get_syntaxhighlighter_css = get_option('melibuPlugin_get_syntaxhighlighter_css');
                if (isset($melibuPlugin_get_syntaxhighlighter_css['css']) && !empty($melibuPlugin_get_syntaxhighlighter_css['css'])) {
                    // Custom css active
                    echo $melibuPlugin_get_syntaxhighlighter_css['css'];
                } else {
                    // Default css active
                    echo file_get_contents(MELIBU_PLUGIN_PATH_06 . 'css/melibu_plugin_syntaxhighlight_readable.css');
                }
            }
            /**
             * Custom CSS
             */
            $customCSS = isset($mbPluginSHLoptions['custom-css']) && !empty($mbPluginSHLoptions['custom-css']) ? $mbPluginSHLoptions['custom-css'] : '';
            if ($customCSS) {
                echo $customCSS;
            }
            ?></style><?php
        }

    }

    global $MELIBU_PLUGIN_FRONTEND_06;
    $MELIBU_PLUGIN_FRONTEND_06 = new MELIBU_PLUGIN_FRONTEND_06();
}
