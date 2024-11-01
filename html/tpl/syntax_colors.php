<?php
/**
 * MELIBU FORM
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wp/melibu-plugins/syntax-high-lighter
 * @package     Melibu Syntax High Lighter
 * @since       1.0
 */
global $MELIBU_PLUGIN_OPTIONS_06;
$melibu_plugin_shl_settings = $MELIBU_PLUGIN_OPTIONS_06->settings();
$melibu_plugin_shl_css = $MELIBU_PLUGIN_OPTIONS_06->css();
if ($melibu_plugin_shl_settings['colors'] == '1') {
    ?>
    <h3><?php _e("Set Colors", "syntax-high-lighter"); ?></h3>
    <form method="post" action="options.php">
        <?php settings_fields('melibuPlugin_syntaxhighlighter_colors'); ?>

        <p>
            <input type="submit" 
                   value="<?php _e("Save", "syntax-high-lighter"); ?>" 
                   class="button-primary">
        </p>

        <table class="wp-list-table widefat fixed striped media">
            <tr>
                <th><?php _e('Description', 'syntax-high-lighter'); ?></th>
                <th><?php _e('Basic', 'syntax-high-lighter'); ?></th>
            </tr>
            <?php
            if (isset($melibu_plugin_shl_css['csscolors']) && is_array($melibu_plugin_shl_css['csscolors'])) {
                foreach ($melibu_plugin_shl_css['csscolors'] as $key => $syntax) {
                    ?>
                    <tr>
                        <td><?php echo trim($key); ?></td>
                        <td><input type="text" 
                                   name="melibuPlugin_get_syntaxhighlighter_colors[<?php echo trim(str_replace(".", "", $key)); ?>]" 
                                   value="<?php echo $syntax; ?>" 
                                   style="display:block; padding:5px; border-radius:5px; background-color:<?php echo $syntax; ?>;" 
                                   class="input">
                        </td>
                    </tr>
                    <?php
                }
            } else {
                $lines = file(MELIBU_PLUGIN_PATH_06 . 'css/melibu_plugin_syntaxhighlight_readable.css');
                $suchmuster = '/.pre(.*){color:(.*);}/i';
                if (is_array($lines)) {
                    foreach ($lines as $line_num => $line) {
                        if (preg_match($suchmuster, $line, $treffer)) {
                            ?>
                            <tr>
                                <td><?php echo ucfirst(trim(str_ireplace(array(".", "_", "st", "span", "pre"), " ", $treffer[0]))); ?></td>
                                <td><input type="text" 
                                           name="melibuPlugin_get_syntaxhighlighter_colors[<?php echo trim(str_replace(".", "", $treffer[1])); ?>]" 
                                           value="<?php echo $treffer[2]; ?>" 
                                           style="display:block; padding:5px; border-radius:5px; background-color:<?php echo $treffer[2]; ?>;" 
                                           class="input">
                                </td>
                            </tr>
                            <?php
                        }
                    }
                }
            }
            ?>
        </table>

        <p>
            <input type="submit" 
                   value="<?php _e("Save", "syntax-high-lighter"); ?>" 
                   class="button-primary">
        </p>
        
        <?php wp_nonce_field('melibu-plugin-syntax-nonce-action', 'melibu-plugin-syntax-nonce'); ?>
    </form>
    <?php
}