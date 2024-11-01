<!--TABS START-->
<div class="mb-l-settings">
    <h2><?php _e('Settings', 'syntax-high-lighter'); ?></h2>
    <p><?php _e('Global settings that are commonly applied', 'syntax-high-lighter'); ?>.</p>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <form method="post" action="options.php">
        <?php settings_fields('melibuPlugin_syntaxhighlighter_options'); ?>
        <table class="wp-list-table widefat fixed striped media">
            <tr>
                <th><?php _e('Description', 'syntax-high-lighter'); ?></th>
                <th><?php _e('Example', 'syntax-high-lighter'); ?></th>
            </tr>
            <tr>
                <td>
                    <p>
                        <label class="st-checkbox-switch">
                            <input type="checkbox" 
                                   name="melibuPlugin_get_syntaxhighlighter_options[toolbar]" 
                                   id="melibuPlugin_get_syntaxhighlighter_options_toolbar" 
                                   value="1" 
                                   class="st-checkbox-switch-input" 
                                   <?php checked($melibu_plugin_shl_settings['toolbar'], '1'); ?>>
                            <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                            <span class="st-checkbox-switch-handle"></span>
                        </label>            
                    </p>
                </td>
                <td><img src="<?php echo MELIBU_PLUGIN_URL_06; ?>/img/toolbar.png" alt="Toolbar option" width="200" class="st-img"></td>
            </tr>
            <tr>
                <td>
                    <p id="mb-doc-linenumbers">
                        <label class="st-checkbox-switch">
                            <input type="checkbox" 
                                   name="melibuPlugin_get_syntaxhighlighter_options[linenumbers]" 
                                   id="melibuPlugin_get_syntaxhighlighter_options_linenumbers" 
                                   value="1" 
                                   class="st-checkbox-switch-input" 
                                   <?php checked($melibu_plugin_shl_settings['linenumbers'], '1'); ?>>
                            <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                            <span class="st-checkbox-switch-handle"></span>
                        </label>
                    </p>
                </td>
                <td><img src="<?php echo MELIBU_PLUGIN_URL_06; ?>/img/linenumbers.png" alt="Toolbar option" width="200" class="st-img"></td>
            </tr>
            <tr>
                <td>
                    <p>
                        <label class="st-checkbox-switch">
                            <input type="checkbox" 
                                   name="melibuPlugin_get_syntaxhighlighter_options[url]" 
                                   id="melibuPlugin_get_syntaxhighlighter_options_url" 
                                   value="1" 
                                   class="st-checkbox-switch-input" 
                                   <?php checked($melibu_plugin_shl_settings['url'], '1'); ?>>
                            <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                            <span class="st-checkbox-switch-handle"></span>
                        </label>
                    </p>
                </td>
                <td><img src="<?php echo MELIBU_PLUGIN_URL_06; ?>/img/url.png" alt="Toolbar option" width="200" class="st-img"></td>
            </tr>
            <tr>
                <td>
                    <p>
                        <label class="st-checkbox-switch">
                            <input type="checkbox" 
                                   name="melibuPlugin_get_syntaxhighlighter_options[ruler]" 
                                   id="melibuPlugin_get_syntaxhighlighter_options_ruler" 
                                   value="1" 
                                   class="st-checkbox-switch-input" 
                                   <?php checked($melibu_plugin_shl_settings['ruler'], '1'); ?>>
                            <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                            <span class="st-checkbox-switch-handle"></span>
                        </label>
                    </p>

<!--                <p>
    <input type="checkbox" 
           name="melibuPlugin_get_syntaxhighlighter_options[light]" 
           id="melibuPlugin_get_syntaxhighlighter_options_light" 
           value="1" 
           class="mb_switch" 
                    <?php // checked($light, '1'); ?> />
    <label for="melibuPlugin_get_syntaxhighlighter_options_light"><?php // _e('Light activate', 'syntax-high-lighter');                                    ?></label>
</p>-->
                </td>
                <td><img src="<?php echo MELIBU_PLUGIN_URL_06; ?>/img/ruler.png" alt="Toolbar option" width="200" class="st-img"></td>
            </tr>
        </table> 
        <p>
            <input type="submit" 
                   value="<?php _e('Save', 'syntax-high-lighter'); ?>" 
                   class="button-primary" />
        </p>
        <?php wp_nonce_field('melibu-plugin-syntax-nonce-action', 'melibu-plugin-syntax-nonce'); ?>
    </form>
    <h2><?php _e('Colors', 'syntax-high-lighter'); ?></h2>
    <form method="post" action="options.php">
        <?php settings_fields('melibuPlugin_syntaxhighlighter_colors_activate'); ?>                                    
        <table class="wp-list-table widefat fixed striped media">
            <tr>
                <th><?php _e('Description', 'syntax-high-lighter'); ?></th>
                <th><?php _e('Basic', 'syntax-high-lighter'); ?></th>
                <th><?php _e('Example', 'syntax-high-lighter'); ?></th>
            </tr>
            <tr>
                <td>
                    <p>
                        <input name="st_melibuPlugin_list_item"
                               class="st_melibuPlugin_list_item_1" 
                               type="hidden"
                               value="3">

                        <label class="st-checkbox-switch">
                            <input type="checkbox" 
                                   name="melibuPlugin_get_syntaxhighlighter_colors_activate[onoff]" 
                                   id="melibuPlugin_get_syntaxhighlighter_colors_activate" 
                                   value="1" 
                                   class="st-checkbox-switch-input" 
                                   <?php checked($melibu_plugin_shl_settings['colors'], '1'); ?>>
                            <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                            <span class="st-checkbox-switch-handle"></span>
                        </label>
                    </p>
                </td>
                <td>
                    <h3><?php _e("Colors Activate", "syntax-high-lighter"); ?></h3>
                    <p><?php _e('Here you can change the colors if you are not familiar with the CSS. You can influence the color and overwrite the CSS option. (Limited)', 'syntax-high-lighter'); ?></p>
                </td>
                <td>
                    <div class="mb-st-grid-5">
                        <img src="<?php echo MELIBU_PLUGIN_URL_06; ?>/img/css.png" alt="Toolbar option" width="200" class="st-img"> 
                    </div>
                    <div class="mb-st-grid-2"> &lt;-&gt; </div>
                    <div class="mb-st-grid-5">
                        <img src="<?php echo MELIBU_PLUGIN_URL_06; ?>/img/colors.png" alt="Toolbar option" width="200" class="st-img">
                    </div>
                    <div class="st-clear"></div>
                </td>
            </tr>
        </table> 
        <?php wp_nonce_field('melibu-plugin-syntax-nonce-action', 'melibu-plugin-syntax-nonce'); ?>
        <p>
            <input type="submit" 
                   value="<?php _e('Save', 'syntax-high-lighter'); ?>" 
                   class="button-primary" />
        </p>
    </form> 
    <h2><?php _e('RegExp', 'syntax-high-lighter'); ?></h2>
    <form method="post" action="options.php">
        <?php settings_fields('melibu_plugin_syntaxhighlighter_regexp_setting'); ?>
        <table class="wp-list-table widefat fixed striped media">
            <tr>
                <th><?php _e('Description', 'syntax-high-lighter'); ?></th>
                <th><?php _e('Basic', 'syntax-high-lighter'); ?></th>
                <th><?php _e('Example', 'syntax-high-lighter'); ?></th>
            </tr>
            <tr>
                <td>
                    <p>
                        <input name="st_melibuPlugin_list_item"
                               class="st_melibuPlugin_list_item_1" 
                               type="hidden"
                               value="3">

                        <label class="st-checkbox-switch">
                            <input type="checkbox" 
                                   name="melibu_plugin_get_syntaxhighlighter_regexp_setting[onoff]" 
                                   id="melibu_plugin_get_syntaxhighlighter_regexp_setting" 
                                   value="1" 
                                   class="st-checkbox-switch-input" 
                                   <?php checked($melibu_plugin_shl_settings['regexp'], '1'); ?> />
                            <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                            <span class="st-checkbox-switch-handle"></span>
                        </label>
                    </p>
                </td>
                <td>
                    <h3><?php _e("RegExp", "syntax-high-lighter"); ?></h3>
                    <p><?php _e('Here you can deactivate the MeliBu RegExp and write totally from scratch your own RegExp', 'syntax-high-lighter'); ?>.</p>
                </td>
                <td>
                </td>
            </tr>
        </table> 
        <?php wp_nonce_field('melibu-plugin-syntax-nonce-action', 'melibu-plugin-syntax-nonce'); ?>
        <p>
            <input type="submit" 
                   value="<?php _e('Save', 'syntax-high-lighter'); ?>" 
                   class="button-primary" />
        </p>
    </form>
    <h2><?php _e('Support', 'syntax-high-lighter'); ?></h2>
    <form method="post" action="options.php">
        <?php settings_fields('melibuPlugin_syntaxhighlighter_syntax_copy'); ?>
        <table class="wp-list-table widefat fixed striped media">
            <tr>
                <th><?php _e('Description', 'syntax-high-lighter'); ?></th>
                <th><?php _e('Basic', 'syntax-high-lighter'); ?></th>
                <th><?php _e('Example', 'syntax-high-lighter'); ?></th>
            </tr>
            <tr>
                <td>
                    <p>
                        <label class="st-checkbox-switch">
                            <input type="checkbox" 
                                   name="melibuPlugin_syntaxhighlighter_get_syntax_copy[onoff]" 
                                   id="melibuPlugin_syntaxhighlighter_get_syntax_copy" 
                                   value="on" 
                                   class="st-checkbox-switch-input" 
                                   <?php checked($melibu_plugin_shl_settings['copy'], 'on'); ?> />
                            <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                            <span class="st-checkbox-switch-handle"></span>
                        </label>
                    </p>
                </td>
                <td>
                    <h3><i class="fa fa-life-ring" aria-hidden="true"></i> <?php _e('Support us', 'syntax-high-lighter'); ?></h3>
                    <p><?php _e('Here you can show/hide', 'syntax-high-lighter'); ?> Copyright - Powerd by &copy; Melibu<br />
                        <small>* <?php _e('Please activate this to help us, for share this plugin', 'syntax-high-lighter'); ?></small></p>
                </td>
                <td>
                </td>
            </tr>
        </table> 
        <?php wp_nonce_field('melibu-plugin-syntax-nonce-action', 'melibu-plugin-syntax-nonce'); ?>
        <p>
            <input type="submit" 
                   value="<?php _e('Save', 'syntax-high-lighter'); ?>" 
                   class="button-primary" />
        </p>
    </form>
</div> 
<!--TABS END-->