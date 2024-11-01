<?php
/**
 * MELIBU WELCOME
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wp/melibu-plugins/syntax-high-lighter
 * @package     Melibu
 * @subpackage  Melibu WP Syntax High Lighter
 * @since       1.0
 */
if (!defined('ABSPATH') && !is_admin()) {
    exit;
}
// PLUGIN DATAS
$datas = get_plugin_data(MELIBU_PLUGIN_PATH_06 . 'syntax-high-lighter.php', $markup = true, $translate = true);
?>
<div class="wrap">
    <div class="st-wp-brand">
        <h1>
            <img src="<?php echo plugins_url("syntax-high-lighter/img/icon-MB.png"); ?>" alt="icon-MB-20" width="50" class="st-wp-logo"> 
            <?php echo $datas['Name']; ?>
            <span><?php _e('Professional Themes and Plugins for WordPress', 'syntax-high-lighter'); ?></span>
        </h1>
    </div>
    <hr />
    <div class="st-wp-brand-box">
        <p>
            <?php _e('Version', 'syntax-high-lighter'); ?>: <?php echo get_option('melibu-plugin-syntax-version'); ?> | DB <?php _e('Version', 'syntax-high-lighter'); ?>: <?php echo get_option('melibu-plugin-syntax-db-version'); ?>
        </p>
    </div>
    <hr />
    <div class="mb-st-grid-9">
        <div class="st-melibuPlugin-area">
            <div class="welcome-panel">

                <div class="welcome-panel-column-container">
                    
                    <p class="about-description">
                        <?php _e('This documentation should help you.', 'syntax-high-lighter'); ?>
                    </p>
                    
                    <br>

                    <div class="melibu-shl-docu">

                        <div class="melibu-shl-docu-left">
                            <ul>
                                <li class="start st-active">
                                    <div class="melibu-shl-docu-icon melibu-shl-docu-active">
                                        <span class="dashicons dashicons-dashboard"></span>
                                    </div>
                                    <?php _e('Start', 'syntax-high-lighter'); ?>
                                </li>
                                <li class="part-1">
                                    <div class="melibu-shl-docu-icon">
                                        <span class="dashicons dashicons-editor-textcolor"></span>
                                    </div>
                                    <?php _e('CSS / Color', 'syntax-high-lighter'); ?>
                                </li>
                                <li class="part-2">
                                    <div class="melibu-shl-docu-icon">
                                        <span class="dashicons dashicons-welcome-write-blog"></span>
                                    </div>
                                    RegExp
                                </li>
                                <li class="part-3">
                                    <div class="melibu-shl-docu-icon">
                                        <span class="dashicons dashicons-admin-generic"></span>
                                    </div>
                                    <?php _e('Settings', 'syntax-high-lighter'); ?>
                                </li>
                                <li class="part-4">
                                    <div class="melibu-shl-docu-icon">
                                        <span class="dashicons dashicons-editor-code"></span>
                                    </div>
                                    <?php _e('Short codes', 'syntax-high-lighter'); ?>
                                </li>
                            </ul>
                        </div>

                        <div class="border">
                            <div class="line one"></div>
                        </div>

                        <div class="right-side">

                            <div class="first active">
                                <div class="melibu-shl-docu-icon melibu-shl-docu-big">
                                    <span class="dashicons dashicons-dashboard"></span>
                                </div>
                                <h1><?php _e('To use Melibu WP Syntax High Lighter properly', 'syntax-high-lighter'); ?></h1>
                                <h2>Melibu WP Syntax High Lighter</h2>
                                <p><?php _e('Thank you that you use MeliBu WP Syntax High Lighter', 'syntax-high-lighter'); ?>.</p>
                                <img src="<?php echo plugins_url("screenshot-1.png", dirname(__FILE__)); ?>" alt="screenshot-1" width="650" class="st-img"/>
                            </div>

                            <div class="second">
                                <div class="melibu-shl-docu-icon melibu-shl-docu-big">
                                    <span class="dashicons dashicons-editor-textcolor"></span>
                                </div>
                                <h1><?php _e("Let's start now with the CSS", 'syntax-high-lighter'); ?></h1>
                                <h2><?php _e("Custom CSS", 'syntax-high-lighter'); ?></h2>
                                <p><?php _e('You were asked two options for disposal, if you are familiar with CSS you can revise and save the absolute CSS', 'syntax-high-lighter'); ?>.</p>
                                <a href="admin.php?page=melibu-plugin-syntax-admin-control-menu-1" class="mb-btn"><?php _e('Try it', 'syntax-high-lighter'); ?>!</a>
                                <p><?php _e('If you are not familiar with CSS, you have the possibility to change their style to just color code and thus must enter with only a color code to influence the colors', 'syntax-high-lighter'); ?>.</p>
                                <a href="admin.php?page=melibu-plugin-syntax-admin-control-menu-3" class="mb-btn"><?php _e('Set it', 'syntax-high-lighter'); ?>!</a>
                            </div>

                            <div class="third">
                                <div class="melibu-shl-docu-icon melibu-shl-docu-big">
                                    <span class="dashicons dashicons-welcome-write-blog"></span>
                                </div>
                                <h1><?php _e('Regular Expressions', 'syntax-high-lighter'); ?></h1>
                                <h2><?php _e("Full RegExp", 'syntax-high-lighter'); ?></h2>
                                <p><?php _e('For advanced we have the regular expressions, which you can add to MeliBu RegExp', 'syntax-high-lighter'); ?>.</p>
                                <a href="admin.php?page=melibu-plugin-syntax-admin-control-menu-2" class="mb-btn"><?php _e('Try it', 'syntax-high-lighter'); ?></a>
                                <p><?php _e('Or complete the expressions rewrite in the disable MeliBu RegExp in the settings', 'syntax-high-lighter'); ?>.</p>
                                <a href="admin.php?page=melibu-plugin-syntax-admin-control-menu-3" class="mb-btn"><?php _e('Set it', 'syntax-high-lighter'); ?></a>
                            </div>

                            <div class="fourth">
                                <div class="melibu-shl-docu-icon melibu-shl-docu-big">
                                    <span class="dashicons dashicons-admin-generic"></span>
                                </div>
                                <h1><?php _e('Settings', 'syntax-high-lighter'); ?></h1>
                                <h2><?php _e('Example', 'syntax-high-lighter'); ?></h2>
                                <p><?php _e('Activate linenumbers', 'syntax-high-lighter'); ?>.</p>
                                <a href="admin.php?page=melibu-plugin-syntax-admin-control-menu-3#mb-doc-linenumbers" class="mb-btn"><?php _e('Activate linenumbers', 'syntax-high-lighter'); ?></a>
                                <p><?php _e('You can make and optimize with many various settings', 'syntax-high-lighter'); ?>.</p>
                                <a href="admin.php?page=melibu-plugin-syntax-admin-control-menu-3" class="mb-btn"><?php _e('Set it', 'syntax-high-lighter'); ?></a>
                            </div>

                            <div class="fifth">
                                <div class="melibu-shl-docu-icon melibu-shl-docu-big">
                                    <span class="dashicons dashicons-editor-code"></span>
                                </div>
                                <h1><?php _e('Short codes', 'syntax-high-lighter'); ?></h1>
                                <h2><?php _e('Quick use', 'syntax-high-lighter'); ?></h2>
                                <p><?php _e('Use the short code in your WP Editor for set your highlight', 'syntax-high-lighter'); ?>.</p>
                                <div>
                                    <img src="<?php echo MELIBU_PLUGIN_URL_06 . 'screenshot-11.png'; ?>" alt="">
                                    <ul>
                                        <li>
                                            <code>[html]..code..[/html]</code>: <br />
                                            <?php _e('This short code raises specifically HTML produced', 'syntax-high-lighter'); ?>.
                                        </li>
                                        <li>
                                            <code>[css]..code..[/css]</code>: <br />
                                            <?php _e('This short code raises specifically CSS produced', 'syntax-high-lighter'); ?>.
                                        </li>
                                        <li>
                                            <code>[less]..code..[/less]</code>: <br />
                                            <p><?php _e('This short code raises specifically LESS produced', 'syntax-high-lighter'); ?>.</p>
                                        </li>
                                        <li>
                                            <code>[sass]..code..[/sass]</code>: <br />
                                            <?php _e('This short code raises specifically SASS produced', 'syntax-high-lighter'); ?>.
                                        </li>
                                        <li>
                                            <code>[js]..code..[/js]</code>: <br />
                                            <?php _e('This short code raises specifically JS produced', 'syntax-high-lighter'); ?>.
                                        </li>
                                        <li>
                                            <code>[php]..code..[/php]</code>: <br />
                                            <?php _e('This short code raises specifically PHP produced', 'syntax-high-lighter'); ?>.
                                        </li>
                                        <li>
                                            <code>[mysql]..code..[/mysql]</code>: <br />
                                            <?php _e('This short code raises specifically MYSQL produced', 'syntax-high-lighter'); ?>.
                                        </li>
                                        <li>
                                            <code>[java]..code..[/java]</code>: <br />
                                            <?php _e('This short code raises specifically JAVA produced', 'syntax-high-lighter'); ?>.
                                        </li>
                                        <li>
                                            <code>[ruby]..code..[/ruby]</code>: <br />
                                            <?php _e('This short code raises specifically RUBY produced', 'syntax-high-lighter'); ?>.
                                        </li>
                                        <li>
                                            <code>[perl]..code..[/perl]</code>: <br />
                                            <?php _e('This short code raises specifically PERL produced', 'syntax-high-lighter'); ?>.
                                        </li>
                                        <li>
                                            <code>[wp]..code..[/wp]</code>: <br />
                                            <?php _e('This short code raises specifically WP produced', 'syntax-high-lighter'); ?>.
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="mb-st-grid-3">
        <div class="melibu-postbox postbox  st-margin-top-15">
            <img src="<?php echo MELIBU_PLUGIN_URL_06; ?>screenshot-8.png" alt="screenshot-8" width="650">
            <h2><span><?php _e('Use Textarea in WP Editor', 'syntax-high-lighter'); ?></span></h2>
            <p><?php _e('Disable the visual area in WP Editor for the current post', 'syntax-high-lighter'); ?>. </p>
        </div>
    </div>
    <div class="mb-st-grid-3">
        <div class="melibu-postbox postbox">
            <img src="<?php echo MELIBU_PLUGIN_URL_06; ?>screenshot-9.png" alt="screenshot-9" width="650">
            <h2><span><?php _e('Use Textarea in WP Editor', 'syntax-high-lighter'); ?></span></h2>
            <p><?php _e('Disable the visual range in the WP editor for all posts of this art', 'syntax-high-lighter'); ?>.</p>
        </div>
    </div>
</div>