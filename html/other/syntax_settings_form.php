<?php
/**
 * Share
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Melibu WP Sharing Social Safe
 * @since       1.3
 */
$melibu_plugin_get_syntax_copy = get_option('melibuPlugin_syntaxhighlighter_get_syntax_copy');
$melibu_plugin_get_syntax_copy_onoff = '';
if (isset($melibu_plugin_get_syntax_copy['onoff']) && $melibu_plugin_get_syntax_copy['onoff']) {
    $melibu_plugin_get_syntax_copy_onoff = $melibu_plugin_get_syntax_copy['onoff'];
}
?>
<table class="wp-list-table widefat fixed striped media">
    <tr>
        <th><?php _e('Description', 'syntax-high-lighter'); ?></th>
        <th><?php _e('Basic', 'syntax-high-lighter'); ?></th>
    </tr>
    <tr>
        <td>
            <h3><i class="fa fa-life-ring" aria-hidden="true"></i> <?php _e('Support us', 'syntax-high-lighter'); ?></h3>
            <p><?php _e('Here you can show/hide', 'syntax-high-lighter'); ?> Copyright - Powerd by &copy; Melibu<br />
                <small>* <?php _e('Please activate this to help us, for share this plugin', 'syntax-high-lighter'); ?></small></p>
        </td>
        <td>
            <form method="post" action="options.php">
                <?php settings_fields('melibuPlugin_syntaxhighlighter_syntax_copy'); ?>
                <p>
                    <input type="checkbox" 
                           name="melibuPlugin_syntaxhighlighter_get_syntax_copy[onoff]" 
                           id="melibuPlugin_syntaxhighlighter_get_syntax_copy" 
                           value="on" 
                           class="mb_switch" 
                           <?php checked($melibu_plugin_get_syntax_copy_onoff, 'on'); ?> />
                    <label for="melibuPlugin_syntaxhighlighter_get_syntax_copy"><?php _e('Turn On', 'syntax-high-lighter'); ?></label>
                </p>
                <p>
                    <input type="submit" 
                           value="<?php _e('Save', 'syntax-high-lighter'); ?>" 
                           class="button-primary" />
                </p>
                <?php wp_nonce_field('melibu-plugin-syntax-nonce-action', 'melibu-plugin-syntax-nonce'); ?>
            </form>
        </td>
    </tr>
</table>