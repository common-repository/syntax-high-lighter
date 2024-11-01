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
?>
<h3>CSS</h3>
<!--    <tr>
        <td>
            <strong><?php // _e('Color-Shema', 'syntax-high-lighter');                                          ?></strong>
        </td>
        <td>
            <form method="post" action="options.php">
<?php // settings_fields('melibuPlugin_syntaxhighlihter_shema');  ?>
                <select name="melibuPlugin_get_syntaxhighlihter_shema[color_shema]">
                    <option value="melibu" <?php // checked($melibu_plugin_shl_css['shema'], 'melibu');                               ?>>
                        Melibu
                    </option>
                    <option value="dunkel" <?php // checked($melibu_plugin_shl_css['shema'], 'dunkel');                               ?>>
<?php // _e('Dark', 'syntax-high-lighter');  ?>
                    </option>
                    <option value="hell" <?php // checked($melibu_plugin_shl_css['shema'], 'hell');                               ?>>
<?php // _e('Light', 'syntax-high-lighter');  ?>
                    </option>
                    <option value="space" <?php // checked($melibu_plugin_shl_css['shema'], 'space');                               ?>>
<?php // _e('Space', 'syntax-high-lighter');  ?>
                    </option>
                </select>
                <input type="submit" 
                       value="<?php // _e("Save", "syntax-high-lighter");                                          ?>" 
                       class="button-primary" />
<?php // wp_nonce_field('melibu-plugin-syntax-nonce-action', 'melibu-plugin-syntax-nonce');  ?>
            </form>
        </td>
        <td>
<?php // _e('Chose your Color-Shema.', 'syntax-high-lighter');  ?>
        </td>
    </tr>-->

<?php
// Is colors activated
if ($melibu_plugin_shl_settings['colors'] == '1') {
    _e('Colors is activated', 'syntax-high-lighter');
} else {
    ?>
    <form method="post" action="options.php">
        <?php settings_fields('melibuPlugin_syntaxhighlighter_css'); ?>
        <div class="mb-l-form st-clear-after">
            <input type="submit" 
                   value="<?php _e("Save", "syntax-high-lighter"); ?>" 
                   class="button-primary">
        </div>
        <?php if ($melibu_plugin_shl_css['css']) { ?>
            <strong>
                <?php _e('Your CSS is now active', 'melibuPlugin_syntaxhighlighter'); ?>
            </strong>
            <textarea name="melibuPlugin_get_syntaxhighlighter_css[css]" 
                      class="mb-textarea"
                      style="min-height:2205px; height: auto;"><?php echo $melibu_plugin_shl_css['css'] ?></textarea>
                  <?php } else { ?>
            <strong>
                <?php _e('Default CSS is active, modify and save to activate your modified css', 'syntax-high-lighter'); ?>
            </strong>
            <textarea name="melibuPlugin_get_syntaxhighlighter_css[css]"
                      class="mb-textarea"
                      style="min-height:2205px; height: auto;"><?php echo file_get_contents(MELIBU_PLUGIN_PATH_06 . 'css/melibu_plugin_syntaxhighlight_readable.css'); ?></textarea>
                  <?php } ?>
        <div class="mb-l-form st-clear-after">
            <input type="submit" 
                   value="<?php _e("Save", "syntax-high-lighter"); ?>" 
                   class="button-primary">
        </div>
        <?php wp_nonce_field('melibu-plugin-syntax-nonce-action', 'melibu-plugin-syntax-nonce'); ?>
    </form>
    <?php
}