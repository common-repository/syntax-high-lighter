<!--REGEXP START-->
<div class="mb-l-regexp">
    <h2><?php _e('RegExp', 'syntax-high-lighter'); ?></h2>
    <h3><?php _e('Regular expressions', 'syntax-high-lighter'); ?></h3>
    <p><?php _e('Here you can influence the regular expressions or even overwrite them completely', 'syntax-high-lighter'); ?>.<br>
    <?php _e('You can also test your regular expressions here to prevent unintended code', 'syntax-high-lighter'); ?>.</p>
    <form method="post" action="options.php">
        <?php settings_fields('melibuPlugin_syntaxhighlighter_regexp'); ?>
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
            <div class="mb-l-form--head mb-st-grid-4">
                <pre>/(regexp-i)/, /(regexp-i2)/, ...</pre>
                <textarea name="melibuPlugin_get_syntaxhighlighter_regexp[keys]" 
                          placeholder="<?php _e("Keys", "syntax-high-lighter"); ?>"
                          class="mb-textarea"
                          wrap="soft"><?php
                              if (isset($melibu_plugin_shl_regexp['keys']) && !empty($melibu_plugin_shl_regexp['keys'])) {
                                  echo $melibu_plugin_shl_regexp['keys'];
                              }
                              ?></textarea>
                <table class="wp-list-table widefat fixed striped media">
                    <?php
                    foreach (array_keys($MELIBU_SYNTAX_HIGH_LIGHTER->regexp()) as $syntax_keys) {
                        echo "<tr>";
                        echo '<td>' . esc_attr(trim($syntax_keys)) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
            <div class="mb-l-form--head mb-st-grid-4">
                <pre>&lt;i class="i"&gt;$1&lt;/i&gt;, &lt;i class="i2"&gt;$1&lt;i&gt;, ...</pre>
                <textarea name="melibuPlugin_get_syntaxhighlighter_regexp[values]"
                          placeholder="<?php _e("Values", "syntax-high-lighter"); ?>"
                          class="mb-textarea"
                          wrap="soft"><?php
                              if ($melibu_plugin_shl_regexp['values']) {
                                  echo $melibu_plugin_shl_regexp['values'];
                              }
                              ?></textarea>
                <table class="wp-list-table widefat fixed striped media">
                    <?php
                    foreach (array_values($MELIBU_SYNTAX_HIGH_LIGHTER->regexp()) as $syntax_values) {
                        echo "<tr>";
                        echo '<td>' . esc_attr(trim($syntax_values)) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
            <div class="mb-l-form--head mb-st-grid-4">
                <button type="button" class="ed_button button button-small mb-shl-reg-button" id="mb-plugin-shl-reg-html" value="" data-mb-shl-property-start="html" data-mb-shl-property-end="html">html</button>
                <button type="button" class="ed_button button button-small mb-shl-reg-button" id="mb-plugin-shl-reg-css" value="" data-mb-shl-property-start="css" data-mb-shl-property-end="css">css</button>
                <button type="button" class="ed_button button button-small mb-shl-reg-button" id="mb-plugin-shl-reg-less" value="" data-mb-shl-property-start="less" data-mb-shl-property-end="less">less</button>
                <button type="button" class="ed_button button button-small mb-shl-reg-button" id="mb-plugin-shl-reg-sass" value="" data-mb-shl-property-start="sass" data-mb-shl-property-end="sass">sass</button>
                <button type="button" class="ed_button button button-small mb-shl-reg-button" id="mb-plugin-shl-reg-js" value="" data-mb-shl-property-start="js" data-mb-shl-property-end="js">js</button>
                <button type="button" class="ed_button button button-small mb-shl-reg-button" id="mb-plugin-shl-reg-php" value="" data-mb-shl-property-start="php" data-mb-shl-property-end="php">php</button>
                <button type="button" class="ed_button button button-small mb-shl-reg-button" id="mb-plugin-shl-reg-mysql" value="" data-mb-shl-property-start="mysql" data-mb-shl-property-end="mysql">mysql</button>
                <button type="button" class="ed_button button button-small mb-shl-reg-button" id="mb-plugin-shl-reg-java" value="" data-mb-shl-property-start="java" data-mb-shl-property-end="java">java</button>
                <button type="button" class="ed_button button button-small mb-shl-reg-button" id="mb-plugin-shl-reg-ruby" value="" data-mb-shl-property-start="ruby" data-mb-shl-property-end="ruby">ruby</button>
                <button type="button" class="ed_button button button-small mb-shl-reg-button" id="mb-plugin-shl-reg-perl" value="" data-mb-shl-property-start="perl" data-mb-shl-property-end="perl">perl</button>
                <button type="button" class="ed_button button button-small mb-shl-reg-button" id="mb-plugin-shl-reg-wp" value="" data-mb-shl-property-start="wp" data-mb-shl-property-end="wp">wp</button>
                <p>Editor</p>
                <textarea name="melibuPlugin_get_syntaxhighlighter_regexp[code]" 
                          placeholder="<?php _e("Test your RegExp here...", "syntax-high-lighter"); ?>"
                          id="mb-shl-regexp-editor"
                          class="mb-textarea"
                          wrap="soft"><?php
                              if (isset($melibu_plugin_shl_regexp['code']) && !empty($melibu_plugin_shl_regexp['code'])) {
                                  echo $melibu_plugin_shl_regexp['code'];
                              }
                              ?></textarea>
                <table class="wp-list-table widefat fixed striped media">
                    <?php
                    if ($melibu_plugin_shl_regexp['code']) {
                        echo $MELIBU_SYNTAX_HIGH_LIGHTER->bbcode($melibu_plugin_shl_regexp['code']);
                    }
                    ?>
                </table>
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
<!--REGEXP END-->