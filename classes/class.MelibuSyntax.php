<?php
require_once 'class.MelibuSyntaxAbstract.php';
/**
 * MELIBU SYNTAX HIGH LIGHTER CLASS
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wp/melibu-plugins/syntax-high-lighter
 * @package     Melibu Syntax High Lighter
 * @since       1.0
 */
if (!class_exists('MELIBU_SYNTAX_HIGH_LIGHTER')) {

    class MELIBU_SYNTAX_HIGH_LIGHTER extends MELIBU_SYNTAX_HIGH_LIGHTER_ABSTRACT {

        /**
         * BBcode
         * 
         * @param type $message
         * @return type
         */
        public function bbcode($message) {

            $formattedCode = '';
            $message = $this->parse($message, 'js');
            $message = $this->parse($message, 'html');
            $message = $this->parse($message, 'css');
            $message = $this->parse($message, 'less');
            $message = $this->parse($message, 'sass');
            $message = $this->parse($message, 'php');
            $message = $this->parse($message, 'mysql');
            $message = $this->parse($message, 'java');
            $message = $this->parse($message, 'ruby');
            $message = $this->parse($message, 'perl');
            $message = $this->parse($message, 'wp');
            $message = $this->parse($message, 'output');
            $formattedCode .= $message;

            return $formattedCode;
        }

        /**
         * Parse
         * 
         * @param type $message
         * @param type $parse
         * @return type
         */
        public function parse($message, $parse) {

            global $MELIBU_PLUGIN_OPTIONS_06;
            $settings = $MELIBU_PLUGIN_OPTIONS_06->settings();
            $formattedCode = '';
            if (preg_match('#\[' . $parse . '\](.*)\[\/' . $parse . '\]#is', $message)) { // Find code
                $sourceCodeVorne = preg_replace('#(.*)\[' . $parse . '\](.*)\[\/' . $parse . '\](.*)#is', "$1", $message);
                $sourceCode = $this->clean(preg_replace('#(.*)\[' . $parse . '\](.*)\[\/' . $parse . '\](.*)#is', '$2', $message));
                $sourceCodeHinten = preg_replace('#(.*)\[' . $parse . '\](.*)\[\/' . $parse . '\](.*)#is', "$3", $message);
                $formattedCode .= $this->parse($sourceCodeVorne, $parse); // Parse Prev
                $formattedCode .= '<div class="' . $parse . 'codetitle"><i class="fa fa-code"></i> // ' . strtoupper($parse) . ' CODE</div>';
                $formattedCode .= '<div class="st_highlighter">';
                $formattedCode .= $this->toolbar(); // With Toolbar ?
                if ($parse != 'output') {
                    $formattedCode .= '<div class="' . $parse . 'code st_highlighter_style">';
                    $formattedCode .= $this->process($sourceCode);
                } else {
                    $formattedCode .= '<div class="' . $parse . 'code">';
                    $formattedCode .= $sourceCode;
                }
                $formattedCode .= '</div>';
                $formattedCode .= '</div>';
                if ($settings['copy'] == 'on') {
                    $formattedCode .= '<span class="st-copy">';
                    $formattedCode .= __('Powerd by &copy;', 'syntax-high-lighter') . ' <a href="http://samet-tarim.de/wordpress/melibu-plugins/syntax-high-lighter/" target="_blank">Melibu</a>';
                    $formattedCode .= '</span>';
                }
                $formattedCode .= $this->parse($sourceCodeHinten, $parse); // Parse Next
            } else {
                $formattedCode .= $message; // No Process
            }

            return $formattedCode;
        }

        /**
         * Process
         * 
         * @param type $text
         * @return string
         */
        public function process($text) {

            global $MELIBU_PLUGIN_OPTIONS_06;
            $settings = $MELIBU_PLUGIN_OPTIONS_06->settings();

            if (count($this->regexp()) > 0) {
                $textReplaced = preg_replace(array_keys($this->regexp()), array_values($this->regexp()), $text); // Replace text with regexp
            } else {
                $textReplaced = $text;
            }
            $sourceCodeExplode = explode("\n", str_ireplace(array("\r\n", "\r"), "\n", $textReplaced)); // Read lines

            $lineCount = 0; // Linenumber
            $formattedCode = ''; // Code begin
            $formattedCode .= $this->ruler(); // With Ruler ?
            $formattedCode .= '<code class="code">';
            $formattedCode .= '<pre class="pre">';
            foreach ($sourceCodeExplode as $codeLine) { // Loop lines
                if ($settings['linenumbers'] == 1) { // With Linenumbers ?
                    $formattedCode .= '<div class="mb-linecount-' . $lineCount . ' noselect"> ' . $lineCount . ' </div>'; // Linecount with no select
                }
                $formattedCode .= '<div class="mb-linecode-' . $lineCount . '" nowrap> ' . $codeLine . ' </div>'; // Linecode with nowrap
                $lineCount++; // Increment
            }
            $formattedCode .= '</pre>';
            $formattedCode .= '</code>';

            return $formattedCode;
        }

        /**
         * RegExp
         * 
         * @return string
         */
        public function regexp() {

            global $MELIBU_PLUGIN_OPTIONS_06;
            $melibu_plugin_shl_settings = $MELIBU_PLUGIN_OPTIONS_06->settings();

            if ($melibu_plugin_shl_settings['regexp'] == '1') {
                $regexp = array();
            } else {
                $regexp = array(
//                '/(?<!\!)([\+\|\=\-]+)(?!>|&gt;)/'
//                => '<span class="st-shl-punctation">\\1</span>',
//             WP P-Tags and Quotes
                    '/<p[^>]*?>.*<\/p>/isU' => '',
                    '/(&#8243;|&#8220;|&#034;)/i' => '"',
                    '/(&#038;)/i' => '&',
                    '/(&#8211;)/i' => '-',
                    '/(&#8230;)/i' => '.',
                    '/(&#039;)/i' => '\'',
                    '/(&#8218;|&#8216;|&#8217;|&#8242;)/i' => '\'',
                    '/(&#8222;)/i' => '"',
                    '/(\s";)/i' => ' \'\';',
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    "/(&lt;+[\/?a-zA-Z]+[[:space:]]*.*(\s|\n|)?(\/)?&gt;+)/i"       // HTML Tags
                    => '<span class="st_html_tags">$1</span>',
                    '/(&lt;+(link)+[[:space:]]*.*\/?&gt;+)/i'                       // HTML link tag
                    => '<span class="st_html_link">$1</span>',
                    '/(&lt;+(meta)+[[:space:]]*.*\/?&gt;+)/i'                       // HTML meta tag
                    => '<span class="st_html_meta">$1</span>',
                    '/(&lt;+(\/?style)+[[:space:]]*.*&gt;+)/i'                      // HTML style tag
                    => '<span class="st_html_style">$1</span>',
                    "/(&lt;+(\/*script)+[[:space:]]*.*&gt;+)/i"                     // HTML script tag
                    => '<span class="st_html_script">$1</span>',
                    "/(&lt;\!\-+\-+[[:space:]]*.*[[:space:]]*\-+\-+&gt;)/isU"       // HTML Comment
                    => '<span class="st_comment">\\1</span>',
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    "/(?<!:)((\/\/).*\n+)/isU"                                      // JavaScript Comment
                    => '<span class="st_comment">\\1</span>',
                    "/(?<!:)(#+\s+\{{0,0}\}{0,0}.*\n?)/i"                           // JavaScript Comment
                    => '<span class="st_comment">\\1</span>',
                    "/(?<!\w\s)((\/\*|\/\*\*\s*|\*)(.*)?(\*\/)?)(?!\#)/i"           // CSS Comment
                    => '<span class="st_comment">\\1</span>',
//            "#(\/\*.*\*\/)#isU"                                               // CSS Comment
//            => '<span class="st_comment">\\1</span>',
//            "#(\*+)(?!.*?)#i"                                                 // CSS Comment
//            => '<span class="c">\\1</span>',
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    // ALL QUOTES
//            '/([\$|&circ;|\^|&tilde;|\~|\*|\|]*\=+)(&quot;.*quot;|&apos;.*apos;|\'.*\')/i'
//            => '<span class="st_quotes_d">\\1</span>'
//            . '<span class="st_quotes_d">\\2</span>'
//            . '<span class="st_quotes_d">\\3</span>'
//            . '<span class="st_quotes_d">\\4</span>',
                    '/(&#034;(.*)&#034;|&#8243;(.*)&#8243;|&#8220;(.*)&#8220;|&#8222;(.*)&#8222;|&#039;(.*)&#039;|&quot;(.*)quot;|&apos;(.*)apos;|\'(.*)\')/U'
                    => '<span class="st_quotes">\\1</span>',
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    // CSS
                    '/(?<!\&|\"|\'|&quot;|&#8220;|&#8243;|&#8217;|&#8222;|&#8242;|
                &#8216;|&#8218;|&#039;)(\#[\w|\d|\-|_]+)(?!&quot;|\'|\"|&#8220;|
                &#8243;|&#8217;|&#8222;|&#8242;|&#8216;|&#8218;|&#039;)/i'      // CSS ID
                    => '<span class="st_css_id">$1</span>',
//            "/(?<!\&|\"|\'|\-|&quot;|&#8220;|&#8243;|&#8217;|&#8222;|&#8242;|
//            &#8216;|&#8218;|&#039;)(\.{1,1}(\w+|\d|\-|\_))(?!&quot;|\'|\"|
//            &#8220;|&#8243;|&#8217;|&#8222;|&#8242;|&#8216;|&#8218;|&#039;|
//            \/)/i"                                                            // CSS Class
//            => '<span class="st_css_class">$1</span>',
                    "/(?<!\w)((\-)(webkit|moz|o|ms|filter)+(\-))/i"                 // CSS Filter
                    => '<span class="st_css_webkit">$1</span>',
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    // ALL COLORS
                    "/((0x|\#)([a-f0-9]+))(?=[a-f0-9]*)(?![e-z])/i"                 // HEX
                    => '<span class="st_numbers">$1</span>',
                    "/((rgb|rgba|argb|hsl|hsla|hsv|hsva)\(\d+,\d+,\d+,?\d*?\))/i"   // RGB|ARGB|HSL|HSV
                    => '<span class="st_css_color">$1</span>'
                    . '<span class="st_css_color">$2</span>',
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    // ALL NUMBERS
                    "/(?<!\&|\w|#|\-)(\d+\.+(\.|\d)(pt|pc|in|px|em|cm|mm|rem|ms|s|
                deg|grad|rad|turn|\%)*)(?!\w)/i"                                // Numbers with commata
                    => '<span class="st_numbers">$1</span>',
                    "/(?<!\w|#|\-)((\d+)(pt|pc|in|px|em|cm|mm|rem|ms|s|deg|grad|
                rad|turn|\%)*)(?!\w|\.)/i"                                      // Numbers without commata
                    => '<span class="st_numbers">$1</span>',
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    // LESS @vars 
                    "/((\=?\@\{?)+(\w|_|\-|\-&gt;)+)/i"
                    => '<span class="st_vars">$1</span>',
                    // LESS Mixin
                    '/(\.[\w|\d\-|_]+)(\()(.*)(\))/i'
                    => '<span class="st_less_mix">$1</span>'
                    . '<span class="st_less_mix">$2</span>'
                    . '$3'
                    . '<span class="st_less_mix">$4</span>',
                    // LESS Misc Functions
                    "/(?<!\w|\$|\%|\@)(color|image-size|image-width|image-height|convert|
                data-uri|default|unit|get-unit|svg-gradient)(?=\()(?!\w|\=|\:)/"
                    => '<span class="st_less_misc">$1</span>',
                    // LESS String Functions
                    "/(?<!\w|\$|\%|\@)(escape|e|%|replace|length|extract)(?=\()(?!\w|\=|\:)/"
                    => '<span class="st_less_string">$1</span>',
                    // LESS Math Functions
                    "/(?<!\w|\$|\%|\@)(ceil|floor|percentage|round|sqrt|abs|sin|asin|cos|acos|
                tan|atan|pi|pow|mod|min|max)(?=\()(?!\w|\=|\:)/"
                    => '<span class="st_less_math">$1</span>',
                    // LESS Type Functions
                    "/(?<!\w|\$|\%|\@)(isnumber|isstring|iscolor|iskeyword|isurl|ispixel|isem|
                ispercentage|isunit|isruleset)(?=\()(?!\w|\=|\:)/"
                    => '<span class="st_less_type">$1</span>',
                    // LESS Color Channel Functions
                    "/(?<!\w|\$|\%|\@)(hue|saturation|lightness|hsvhue|hsvsaturation|hsvvalue|
                red|green|blue|alpha|luma|luminance)(?=\()(?!\w|\=|\:)/"
                    => '<span class="st_less_color_channel">$1</span>',
                    // LESS
                    "/(?<!\w|\$|\%|\@)(when)(?!\w|\=)/"
                    => '<span class="st_less_when">$1</span>',
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    // ALL KEYWORDS (PHP-JS-PERL-RUBY-JAVA)
                    "/(?<!\w|\$|\%|\@|\/|\[|\.|<|&lt;|\/\/|\:)(&amp;&amp;|and|or|xor|for|do|while|foreach|as|
                    return|die|exit|if|endif|then|else|elseif|try|throw|catch|finally|class|function|
                    string|object|resource|var|bool|boolean|int|integer|float|double|
                    real|string|global|const|static|public|private|protected|parent|
                    published|extends|switch|true|false|null|void|this|self|struct|end|
                    char|signed|unsigned|short|long|public|continue(\-&gt;.*)?)+(?!\w|\=|\*|\.|\~|\|<|&gt;)/x"
                    => '<span class="st_script_keys">$1</span>',
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    // ALL KEYWORDS (RUBY)
                    "/(?<!\w|\$|\%|\@|\/|\[|\.|<|&lt;|\/\/|\:)(def|puts(\-&gt;.*)?)+(?!\w|\=|\*|\.|\~|\|<|&gt;)/x"
                    => '<span class="st_script_keys">$1</span>',
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    // ALL MEDIA TYPES
                    "/(?<!\w|\$|\%|\@|\/|\[|\.|<)(all|print|screen|speech|aural|braille|embossed|
                    handheld|projection|tty|tv)(?!\w|\=|\*|\.|\~|&tilde;|\|<)/x"
                    => '<span class="st_css_media">\\1</span>',
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    "/(&lt;\?php|\?&gt;)/i"
                    => '<span class="st_php_tags">$1</span>',
                    // PHP String-Functions
                    "/(?<!\w|\$|\%|\@|\/|<|&lt;|\:|\.)(\s?addcslashes|addslashes|bin2hex|chop|chr|chunk_​split|
                    convert_​cyr_​string|convert_​uudecode|convert_​uuencode|count_​chars|crc32|
                    crypt|echo|explode|fprintf|get_​html_​translation_​table|hebrev|hebrevc|array_push|
                    hex2bin|html_​entity_​decode|htmlentities|htmlspecialchars_​decode|strip_tags|
                    htmlspecialchars|implode|join|lcfirst|levenshtein|localeconv|ltrim|defined|define|
                    md5_​file|md5|metaphone|money_​format|nl_​langinfo|nl2br|number_​format|array|
                    ord|parse_​str|print|printf|quoted_​printable_​decode|quoted_​printable_​encode|
                    quotemeta|rtrim|setlocale|sha1_​file|sha1|similar_​text|soundex|sprintf|
                    sscanf|str_​getcsv|str_​ireplace|str_​pad|str_​repeat|str_​replace|str_​rot13|
                    str_​shuffle|str_​split|str_​word_​count|strcasecmp|strchr|strcmp|strcoll|
                    strcspn|strip_​tags|stripcslashes|stripos|stripslashes|stristr|is_readable|
                    strlen|strnatcasecmp|strnatcmp|strncasecmp|strncmp|strpbrk|strpos|strrchr|strrev|
                    strripos|strrpos|strspn|strstr|strtok|strtolower|strtoupper|strtr|substr_​compare|
                    substr_​count|substr_​replace|substr|trim|ucfirst|ucwords|vfprintf|vprintf|vsprintf|
                    wordwrap)(?!\w|\=|\*|\.|\~|&tilde;)/x"
                    => '<span class="st_php_tags">$1</span>',
                    // PHP Funktionen zur Behandlung von Variablen
                    "/(?<!\w|\$|\%|\@|\/|<|&lt;|\:)(boolval|debug_​zval_​dump|doubleval|empty|floatval|
                    get_​defined_​vars|get_​resource_​type|gettype|import_​request_​variables|intval|function_exists|
                    is_​array|is_​bool|is_​callable|is_​double|is_​float|is_​int|is_​integer|is_​long|class_exists|
                    is_​null|is_​numeric|is_​object|is_​real|is_​resource|is_​scalar|is_​string|isset|
                    print_​r|serialize|settype|strval|unserialize|unset|var_​dump|var_​export)(?!\w|\=|\*|\.|\~|&tilde;)/x"
                    => '<span class="st_php_keys">$1</span>',
                    // PHP PCRE-Funktionen
                    "/(?<!\w|\$|\%|\@|\/|<|&lt;)(preg_​filter|preg_​grep|preg_​last_​error|preg_​match_​all|preg_​match|
                    preg_​quote|preg_​replace_​callback_​array|preg_​replace_​callback|preg_​replace|preg_​split)(?!\w|\=|\*|\.|\~|&tilde;)/x"
                    => '<span class="st_php_keys">$1</span>',
//            // PHP Dateisystem
//            "/(?<!\w|\$|\%|\@|\/|<|&lt;)(basename|chgrp|chmod|chown|clearstatcache|copy|delete|dirname|
//                    disk_​free_​space|disk_​total_​space|diskfreespace|fclose|feof|fflush|fgetc|fgetcsv|
//                    fgets|fgetss|file_​exists|file_​get_​contents|file_​put_​contents|file|fileatime|
//                    filectime|filegroup|fileinode|filemtime|fileowner|fileperms|filesize|filetype|
//                    flock|fnmatch|fopen|fpassthru|fputcsv|fputs|fread|fscanf|fseek|fstat|ftell|
//                    ftruncate|fwrite|glob|is_​dir|is_​executable|is_​file|is_​readable|is_​uploaded_​file|
//                    is_​writable|is_​writeable|lchgrp|lchown|link|linkinfo|lstat|mkdir|move_​uploaded_​file|
//                    parse_​ini_​file|parse_​ini_​string|pathinfo|pclose|popen|readfile|readlink|realpath_​cache_​get|
//                    realpath_​cache_​size|realpath|rename|rewind|rmdir|set_​file_​buffer|stat|symlink|tempnam|
//                    tmpfile|touch|umask|unlink)+(?!\w|\=|\*|\.|\~|&tilde;)/x"
//            => '<span class="kPHP">$1</span>',
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    // PHP/Perl Vars: $var, %var
                    '/(?<!\w)((\$|\%)+(_|\-|\-&gt;|\w)*)(?!\w)/i'
                    => '<span class="st_variables">$1</span>',
                    // PHP static | CSS 
                    '/(?<!\w|\d|\[|\-)([\$?a-z|\-]*)(\:)+(a-z0-9|\#|\s|\-)+/i'
                    => '<span style="color:#DEB887;">\\1</span>'
                    . '<span class="st_css_media">\\2</span>'
                    . '<span class="st_css_media">\\3</span>',
                    // PHP JS PERL backreferences
                    "/(?<!\w|\$|\%|\@)(new|require|require_once|include|include_once|return)(?!\w|\=)/"
                    => '<span class="st_script_back">$1</span>',
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    // JAVASCRIPT JavaScript
                    "/(?<!\w|\$|\%|\@|\.)(Array|Boolean|DOM|Date|Math|navigator|Number|namespace|
                RegExp|screen|String|window)(?!\w|\=)/"                                     // JS OBJECTS
                    => '<span class="st_js_keys">$1</span>',
                    // JAVASCRIPT Keywords
                    "/(?<!\w|\$|\%|\@)(document|jQuery)(?=\.|<)(?!\w|\=)/"
                    => '<span class="st_script_keys">$1</span>',
                    // JAVASCRIPT + variable +
                    "/(\'+.*\+\.?.*\+.*\')/i"
                    => '<span class="st_js_vars">$1</span>',
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    // WORDPRESS CODEX
                    // https://codex.wordpress.org/Function_Reference
                    // Post, Custom Post Type, Page, Attachment and Bookmarks Functions
                    "/(?<!\w|\$|\%|\@|\/|<|&lt;)(get_adjacent_post|get_boundary_post|get_children|get_extended|get_next_post|get_next_posts_link|
            next_posts_link|get_permalink|the_permalink|get_the_excerpt|the_excerpt|get_the_post_thumbnail|get_post|get_post_field|
            get_post_ancestors|get_post_mime_type|get_post_status|get_post_format|set_post_format|get_edit_post_link|get_delete_post_link|
            get_previous_post|get_previous_posts_link|previous_posts_link|get_posts|have_posts|is_single|s_sticky|get_the_ID|the_ID|
            the_post|wp_get_recent_posts|has_post_thumbnail|has_excerpt|has_post_format|register_post_status|
            register_activation_hook|register_deactivation_hook|plugin_dir_path|add_action|
            current_user_can|set_transient|get_transient|delete_transient|add_menu_page|add_submenu_page|
            add_option|update_option|delete_option|get_option|add_shortcode|delete_site_option|add_filter|apply_filters|wp_enqueue_style|
            load_textdomain|load_plugin_textdomain|unregister_setting|is_admin|register_setting|unregister_setting|
            check_admin_referer|WP_Widget|WP_Screen|shortcode_atts|register_widget|wp_redirect|admin_url|wp_nonce_field|
            settings_fields|_e|__|_x|register_post_type|flush_rewrite_rules|home_url|wp_safe_redirect|
            is_email|term_exists|username_exists|validate_file|sanitize_key|sanitize_text_field|update_post_meta|sanitize_email|
            sanitize_file_name|sanitize_html_class|sanitize_meta|sanitize_mime_type|sanitize_option|sanitize_sql_orderby|sanitize_title|
            sanitize_title_for_query|sanitize_title_with_dashes|sanitize_user|esc_url_raw|wp_filter_post_kses|wp_filter_nohtml_kses|
            esc_html|esc_url|esc_js|esc_attr|esc_html__|esc_html_e|esc_html_x|esc_attr__|esc_attr_e|esc_attr_x|wp_kses|wp_kses_post|
            wp_create_nonce|add_query_arg|wp_verify_nonce|do_action|remove_action|remove_filter|remove_all_filters|remove_all_actions|
            current_filter|did_action|add_dashboard_page|add_posts_page|add_media_page|add_links_page|add_pages_page|
            add_comments_page|add_theme_page|add_plugins_page|add_users_page|add_management_page|add_options_page|add_settings_field|
            add_settings_section|do_settings_sections|do_settings_fields|add_settings_error|get_settings_errors|settings_errors|
            plugins_url|wp_enqueue_script)(?!\w|\=|\*|\.|\~|&tilde;)/x"
                    => '<span class="st_wp_funct">$1</span>',
                    // WP CODEX Deprecated
                    // @see https://codex.wordpress.org/Function_Reference#Theme-Related_Functions
                    // Hier weiter machen Theme-Related Functions
                    "/(?<!\w|\$|\%|\@|\/|<|&lt;)(is_post|wp_get_single_post|get_all_category_ids|is_taxonomy|is_term|get_page|
            image_resize|wp_create_thumbnail|fetch_rss|get_rss|permalink_single_rss|the_content_rss|wp_rss|get_profile|
            get_usernumposts|set_current_user|user_pass_ok)(?!\w|\=|\*|\.|\~|&tilde;)/x"
                    => '<span class="st_wp_funct_dep">$1</span>',
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
//            // Ein Buchstabe alleinstehend
//            "/(?<= |\(|\!)([a-z]{0,1})(?= |\.|\)|<|\=|\+)/i"
//            => '<span style="color: #ff0;">$1</span>',
                    /////////////////////////////////
                    // BOOLSCHE
                    // Keywords Bools false null usw.
                    "/(?<!\w|\$|\%|\@|&lt;|\<)(null|false|delete|\!)(?!\w|\=)/i"
                    => '<span class="st_script_boolfalses">$1</span>',
                    // Keywords Bools true
                    "/(?<!\w|\$|\%|\@)(true)(?!\w|\=)/i"
                    => '<span class="st_script_booltrues">$1</span>',
                    // Alles in Eckigen Klammern
                    "/((\[)+(.*)(\])+)/isU"
                    => '<span style="color:lightblue;">$2</span>'
                    . '<span style="color:#E5A329;">$3</span>'
                    . '<span style="color:lightblue;">$4</span>',
                    // ALLES Großgeschriebenes
                    '/(?<!\w|>|\#|\$)([A-Z_0-9]{2,})(?!\w)/x'
                    => '<span class="st_uppercases">$1</span>',
                    '/(_{2,2}[a-z_0-9]{2,}_{2,2})/x'
                    => '<span class="st_uppercases">$1</span>',
                        // defines
//            '/(?<!\w|\#|\$)(\s*defined|define)(?!\w)/x' 
//            => '<span class="st_uppercases">$1</span>'
                );

                $regexp = $this->links($regexp);
            }

            $regexp = $this->custom_regexp($regexp);

            return $regexp;
        }

    }
    
    global $MELIBU_SYNTAX_HIGH_LIGHTER;
    $MELIBU_SYNTAX_HIGH_LIGHTER = new MELIBU_SYNTAX_HIGH_LIGHTER();
}