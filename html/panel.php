<?php
/**
 * MAIN
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/syntax-high-lighter
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.0
 */

// Globals
global $MELIBU_SYNTAX_HIGH_LIGHTER, $MELIBU_PLUGIN_OPTIONS_06, $wpdb;

// Options
$mbPluginSHLoptions = $MELIBU_PLUGIN_OPTIONS_06->options();
// Settings
$melibu_plugin_shl_settings = $MELIBU_PLUGIN_OPTIONS_06->settings();
// Css
$melibu_plugin_shl_css = $MELIBU_PLUGIN_OPTIONS_06->css();
// RegExp
$melibu_plugin_shl_regexp = $MELIBU_PLUGIN_OPTIONS_06->regexp();

// Plugin datas
$datas = get_plugin_data(MELIBU_PLUGIN_PATH_06 . 'syntax-high-lighter.php', $markup = true, $translate = true);
?>
<div class="wrap">
    <div class="mb-shl-admin-panel st-clear-after">

        <div class="mb-shl-admin-panel--nav mb-st-grid-2">
            <div class="mb-shl-admin-panel--nav-logo">
                <a href="#"></a>
            </div>
            <ul class="mb-shl-admin-panel--nav-list">
                <li class="mb-shl-admin-panel--nav-list-item">
                    <a href="#" class="mb-shl-admin-panel--nav-list-item-link-dashboard" data-mb-id="mb-l-dashboard"><?php _e('Dashboard', 'syntax-high-lighter'); ?></a>
                </li>
<!--                <li class="mb-shl-admin-panel--nav-list-item">
                    <a href="#" class="mb-shl-admin-panel--nav-list-item-link-display" data-mb-id="mb-l-display"><?php _e('Display', 'syntax-high-lighter'); ?></a>
                </li>-->
<!--                <li class="mb-shl-admin-panel--nav-list-item">
                    <a href="#" class="mb-shl-admin-panel--nav-list-item-link-appearance" data-mb-id="mb-l-appearance"><?php _e('Appearance', 'syntax-high-lighter'); ?></a>
                </li>
                <li class="mb-shl-admin-panel--nav-list-item">
                    <a href="#" class="mb-shl-admin-panel--nav-list-item-link-tabs" data-mb-id="mb-l-tabs"><?php _e('Optional', 'syntax-high-lighter'); ?></a>
                </li>-->
                <li class="mb-shl-admin-panel--nav-list-item">
                    <a href="#" class="mb-shl-admin-panel--nav-list-item-link-regexp" data-mb-id="mb-l-regexp"><?php _e('RegExp', 'syntax-high-lighter'); ?></a>
                </li>
<!--                <li class="mb-shl-admin-panel--nav-list-item">
                    <a href="#" class="mb-shl-admin-panel--nav-list-item-link-widget" data-mb-id="mb-l-widget"><?php _e('Modal', 'syntax-high-lighter'); ?></a>
                </li>
                <li class="mb-shl-admin-panel--nav-list-item">
                    <a href="#" class="mb-shl-admin-panel--nav-list-item-link-permission" data-mb-id="mb-l-permission"><?php _e('Privacy', 'syntax-high-lighter'); ?></a>
                </li>-->
                <li class="mb-shl-admin-panel--nav-list-item">
                    <a href="#" class="mb-shl-admin-panel--nav-list-item-link-syntax" data-mb-id="mb-l-syntax"><?php _e('Syntax', 'syntax-high-lighter'); ?></a>
                </li>
                <li class="mb-shl-admin-panel--nav-list-item">
                    <a href="#" class="mb-shl-admin-panel--nav-list-item-link-customcss" data-mb-id="mb-l-customcss"><?php _e('Custom CSS', 'syntax-high-lighter'); ?></a>
                </li>
                <li class="mb-shl-admin-panel--nav-list-item">
                    <a href="#" class="mb-shl-admin-panel--nav-list-item-link-settings" data-mb-id="mb-l-settings"><?php _e('Settings', 'syntax-high-lighter'); ?></a>
                </li>
                <li class="mb-shl-admin-panel--nav-list-item">
                    <a href="#" class="mb-shl-admin-panel--nav-list-item-link-optionsobj" data-mb-id="mb-l-optionsobj"><?php _e('Options OBJ', 'syntax-high-lighter'); ?></a>
                </li>
            </ul>
        </div>

        <div class="mb-shl-admin-panel--main mb-st-grid-10">

            <ul class="mb-shl-admin-panel--main-topbar st-clear-after">
                <li>
                    <a href="https://wordpress.org/plugins/<?php echo $datas['TextDomain']; ?>" title="<?php _e('Information', 'syntax-high-lighter'); ?>" target="_blank">
                        <span class="dashicons dashicons-info"></span> 
                        <?php _e('Info', 'syntax-high-lighter'); ?>
                    </a>
                </li>
                <li>
                    <a href="https://wordpress.org/plugins/<?php echo $datas['TextDomain']; ?>/changelog/" title="<?php _e('Changelog', 'syntax-high-lighter'); ?>" target="_blank">
                        <span class="dashicons dashicons-backup"></span> 
                        <?php _e('Log', 'syntax-high-lighter'); ?>
                    </a>
                </li>
                <li>
                    <a href="https://wordpress.org/plugins/<?php echo $datas['TextDomain']; ?>/stats/" title="<?php _e('Statistics', 'syntax-high-lighter'); ?>" target="_blank">
                        <span class="dashicons dashicons-chart-bar"></span> 
                        <?php _e('Statistics', 'syntax-high-lighter'); ?>
                    </a>
                </li>
                <li>
                    <a href="https://wordpress.org/support/plugin/<?php echo $datas['TextDomain']; ?>/reviews/" title="<?php _e('Statistics', 'syntax-high-lighter'); ?>" target="_blank">
                        <span class="dashicons dashicons-star-filled"></span> 
                        <?php _e('Rate', 'syntax-high-lighter'); ?>
                    </a>
                </li>
                <li>
                    <a href="https://wordpress.org/support/plugin/<?php echo $datas['TextDomain']; ?>" title="<?php _e('Support', 'syntax-high-lighter'); ?>" target="_blank">
                        <span class="dashicons dashicons-sos"></span> 
                        <?php _e('Support', 'syntax-high-lighter'); ?>
                    </a>
                </li>
            </ul>

            <div class="mb-shl-admin-panel--main-content st-clear-after">

                <div class="mb-l-boardstart">

                    <h2><?php _e('Welcome to Melibu Syntax High Lighter', 'syntax-high-lighter'); ?></h2>
                    <P><?php _e('Check this powerfull plugins to', 'syntax-high-lighter'); ?>.</P>

                    <div class="mb-st-grid-4">
                        <div class="melibu-postbox postbox st-margin-top-45">
                            <h2><span>MeliBu WP Download Counter Button</span></h2>
                            <p><?php _e('Do you know, the MeliBu WP Download Counter Button. Turn your downloads into a highlight in seconds and get statistics about your download', 'syntax-high-lighter'); ?>.</p>
                            <img src="<?php echo plugins_url("img/other/dcb.jpg", dirname(__FILE__)); ?>" alt="MeliBu WP Download Counter Button" width="650" class="st-img"/>
                            <p><a href='https://wordpress.org/plugins/download-counter-button/' target="_blank" class='button button-primary'><?php _e('More', 'syntax-high-lighter'); ?>...</a>
                                <a href='plugin-install.php?s=MeliBu+WP+Download+Counter+Button&amp;tab=search&amp;type=term' class='button button-primary'><?php _e('Install', 'syntax-high-lighter'); ?></a></p>
                        </div>
                    </div>

                    <div class="mb-st-grid-4">
                        <div class="melibu-postbox postbox st-margin-top-45">
                            <h2><span>MeliBu WP Syntax High Lighter</span></h2>
                            <p><?php _e('Do you know, the MeliBu WP Syntax High Lighter. Turn your code into a highlight in seconds with short codes in WP Texteditor', 'syntax-high-lighter'); ?>.</p>
                            <img src="<?php echo plugins_url("img/other/shl.png", dirname(__FILE__)); ?>" alt="MeliBu WP Syntax High Lighter" width="650" class="st-img"/>
                            <p><a href='https://wordpress.org/plugins/syntax-high-lighter/' target="_blank" class='button button-primary'><?php _e('More', 'syntax-high-lighter'); ?>...</a>
                                <a href='plugin-install.php?s=MeliBu+WP+Syntax+High+Lighter+&amp;tab=search&amp;type=term' class='button button-primary'><?php _e('Install', 'syntax-high-lighter'); ?></a></p>
                        </div>
                    </div>

                    <div class="mb-st-grid-4">
                        <div class="melibu-postbox postbox st-margin-top-45">
                            <h2><span>MeliBu WP Latest Posts Slides</span></h2>
                            <p><?php _e('Do you know, the MeliBu WP Latest Posts Slides. Powerfull slider with many settings, touch friendly and mouse friendly.', 'syntax-high-lighter'); ?>.</p>
                            <img src="<?php echo plugins_url("img/other/lps.png", dirname(__FILE__)); ?>" alt="MeliBu WP Latest Posts Slides" width="650" class="st-img"/>
                            <p><a href='https://wordpress.org/plugins/latest-posts-slides/' target="_blank" class='button button-primary'><?php _e('More', 'syntax-high-lighter'); ?>...</a>
                                <a href='plugin-install.php?s=MeliBu+WP+Latest+Posts+Slides+&amp;tab=search&amp;type=term' class='button button-primary'><?php _e('Install', 'syntax-high-lighter'); ?></a></p>
                        </div>
                    </div>

                    <div class="st-clear"></div>

                    <div class="mb-st-grid-4">
                        <div class="melibu-postbox postbox st-margin-top-45">
                            <h2><span>MeliBu WP Author Box</span></h2>
                            <p><?php _e("Induviduell Tabs for more flexibility. An interface to the MeliBu WP Sharing Social Safe. And much more...", 'syntax-high-lighter'); ?>.</p>
                            <img src="<?php echo plugins_url("img/other/author-box.png", dirname(__FILE__)); ?>" alt="MeliBu WP Feedback Generate" width="650" class="st-img"/>
                            <p><a href='#' class='button button-primary'><?php _e('Coming soon', 'syntax-high-lighter'); ?></a></p>
                        </div>
                    </div>

                    <div class="mb-st-grid-4">
                        <div class="melibu-postbox postbox st-margin-top-45">
                            <h2><span>MeliBu WP Hits</span></h2>
                            <p><?php _e('Get more statistics, with Melibu WP hits. Learn which share button is clicked the most and many more', 'syntax-high-lighter'); ?>...</p>
                            <img src="<?php echo plugins_url("img/other/hits.jpg", dirname(__FILE__)); ?>" alt="MeliBu WP Hits" width="650" class="st-img"/>
                            <p><a href='#' class='button button-primary'><?php _e('Coming soon', 'syntax-high-lighter'); ?></a></p>
                        </div>
                    </div>

                    <div class="mb-st-grid-4">
                        <div class="melibu-postbox postbox st-margin-top-45">
                            <h2><span>MeliBu WP Feedback Generate</span></h2>
                            <p><?php _e("Our feedback Generate's position all possible forms to create in seconds. Thanks to the sophisticated Melibus Drag N Drop system with live preview you can also see immediately what you are doing. And much more...", 'syntax-high-lighter'); ?>.</p>
                            <img src="<?php echo plugins_url("img/other/fg.png", dirname(__FILE__)); ?>" alt="MeliBu WP Feedback Generate" width="650" class="st-img"/>
                            <p><a href='#' class='button button-primary'><?php _e('Coming soon', 'syntax-high-lighter'); ?></a></p>
                        </div>
                    </div>

                    <div class="st-clear"></div>

                </div>

                <?php require_once 'panel/dashboard.php'; ?>
                <?php // require_once 'panel/appearance.php'; ?>
                <?php // require_once 'panel/optional.php'; ?>
                <?php // require_once 'panel/privacy.php'; ?>
                <?php // require_once 'panel/display.php'; ?>
                <?php require_once 'panel/regexp.php'; ?>
                <?php require_once 'panel/modal.php'; ?>
                <?php require_once 'panel/syntax.php'; ?>
                
                <?php require_once 'panel/customcss.php'; ?>
                
                <?php require_once 'panel/settings.php'; ?>
                <?php require_once 'panel/optionsobj.php'; ?>

            </div>

            <ul class="mb-shl-admin-panel--main-footbar st-clear-after">
                <li><?php _e('Powerd by', 'syntax-high-lighter'); ?> <strong>MeliBu</strong></li>
                <li>
                </li>
            </ul>

        </div>
        <div class="st-melibu-copy">
            <p class="left">
                <em><?php _e('Thank you for your confidence in', 'syntax-high-lighter'); ?></em>
                <a href="http://samet-tarim.de/wordpress/melibu-plugins/"><?php echo $datas['Name']; ?></a> &copy; <?php echo date('Y'); ?>
            </p>
            <p class="right">
                <?php _e('Version', 'syntax-high-lighter'); ?> <?php echo $datas['Version']; ?>
            </p>
        </div>
    </div>
</div>