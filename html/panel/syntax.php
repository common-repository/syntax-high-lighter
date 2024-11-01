<!--WIDGET START-->
<div class="mb-l-syntax">
    <h2><?php _e('Syntax', 'syntax-high-lighter'); ?></h2>
    <h3><?php _e('Standard SyntaxHighlighter CSS', 'syntax-high-lighter'); ?></h3>
    <p><?php _e('The overriding this CSS has effect on all the highlights. If you want to restore the default value, erase all content and then save the Standard version is restored.', 'syntax-high-lighter'); ?></p>
    <form method="post" action="options.php">
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-3">
                <button type="submit" class="button-primary"><?php _e('Save', 'syntax-high-lighter'); ?></button>
            </div>
            <div class="mb-l-form--body mb-st-grid-3">
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
            </div>
        </div>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-3"></div>
            <div class="mb-l-form--body mb-st-grid-9">

<!--    <tr>
<td>
<strong><?php // _e('Color-Shema', 'syntax-high-lighter');                                                              ?></strong>
</td>
<td>
<form method="post" action="options.php">
                <?php // settings_fields('melibuPlugin_syntaxhighlihter_shema');  ?>
<select name="melibuPlugin_get_syntaxhighlihter_shema[color_shema]">
<option value="melibu" <?php // checked($melibu_plugin_shl_css['shema'], 'melibu');                                                   ?>>
    Melibu
</option>
<option value="dunkel" <?php // checked($melibu_plugin_shl_css['shema'], 'dunkel');                                                   ?>>
                <?php // _e('Dark', 'syntax-high-lighter');  ?>
</option>
<option value="hell" <?php // checked($melibu_plugin_shl_css['shema'], 'hell');                                                   ?>>
                <?php // _e('Light', 'syntax-high-lighter');  ?>
</option>
<option value="space" <?php // checked($melibu_plugin_shl_css['shema'], 'space');                                                   ?>>
                <?php // _e('Space', 'syntax-high-lighter');  ?>
</option>
</select>
<input type="submit" 
   value="<?php // _e("Save", "syntax-high-lighter");                                                              ?>" 
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
                    ?>
                    <h3><?php _e("Set Colors", "syntax-high-lighter"); ?></h3>
                    <?php settings_fields('melibuPlugin_syntaxhighlighter_colors'); ?>
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
                <?php } else { ?>
                    <?php if ($melibu_plugin_shl_css['css']) { ?>
                        <?php settings_fields('melibuPlugin_syntaxhighlighter_css'); ?>
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
                          <?php } ?>
            </div>
        </div>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-3">
                <button type="submit" class="button-primary"><?php _e('Save', 'syntax-high-lighter'); ?></button>
            </div>
            <div class="mb-l-form--body mb-st-grid-3">
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
            </div>
        </div>
        <?php wp_nonce_field('melibu-plugin-syntax-nonce-action', 'melibu-plugin-syntax-nonce'); ?>
    </form>
</div>
<!--WIDGET END-->