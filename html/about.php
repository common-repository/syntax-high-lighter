<?php
/**
 * MELIBU ABOUT
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wp/melibu-plugins/syntax-high-lighter
 * @package     Melibu Syntax High Lighter
 * @since       1.0
 */
if (!defined('ABSPATH') && !is_admin()) {
    exit;
}

$datas = get_plugin_data(MELIBU_PLUGIN_PATH_06 . 'syntax-high-lighter.php', $markup = true, $translate = true);
?>
<div class="melibu-syntax-about wrap about-wrap">

    <h1>
        <?php _e('Welcome to', 'syntax-high-lighter'); ?> <span style="color:#FF7F01;"><?php echo $datas['Name']; ?></span>&nbsp;<?php echo $datas['Version']; ?>
    </h1>
    <div class="about-text"><?php printf(__('%s', 'syntax-high-lighter'), $datas['Description']); ?></div>
    <div class="wp-badge"><?php _e('Version', 'syntax-high-lighter'); ?> <?php echo $datas['Version']; ?></div>

    <div class="st-melibuPlugin-area">
        <div class="st_melibuPlugin_list st_melibuPlugin_list_flip">
            <input name="st_melibuPlugin_list_item"
                   id="st_melibuPlugin_list_item_1" 
                   class="st_melibuPlugin_list_item_1" 
                   type="radio" 
                   value="1" checked="checked">
            <label for="st_melibuPlugin_list_item_1">
                <span><span class="dashicons dashicons-admin-home"></span> 
                    <?php _e('Welcome', 'syntax-high-lighter'); ?></span>
            </label>
            <input name="st_melibuPlugin_list_item" 
                   id="st_melibuPlugin_list_item_2" 
                   class="st_melibuPlugin_list_item_2" 
                   type="radio" 
                   value="2">
            <label for="st_melibuPlugin_list_item_2">
                <span><span class="dashicons dashicons-editor-code"></span> 
                    <?php _e('Functions', 'syntax-high-lighter'); ?></span>
            </label>
            <input name="st_melibuPlugin_list_item" 
                   id="st_melibuPlugin_list_item_3" 
                   class="st_melibuPlugin_list_item_3" 
                   type="radio" 
                   value="3">
            <label for="st_melibuPlugin_list_item_3">
                <span><span class="dashicons dashicons-sos"></span> 
                    <?php _e('Support', 'syntax-high-lighter'); ?> </span>
            </label>
            <input name="st_melibuPlugin_list_item" 
                   id="st_melibuPlugin_list_item_4" 
                   class="st_melibuPlugin_list_item_4" 
                   type="radio" 
                   value="4">
            <label for="st_melibuPlugin_list_item_4">
                <span><span class="dashicons dashicons-hammer"></span> 
                    <?php _e('Development', 'syntax-high-lighter'); ?> </span>
            </label>
            <input name="st_melibuPlugin_list_item" 
                   id="st_melibuPlugin_list_item_5" 
                   class="st_melibuPlugin_list_item_5" 
                   type="radio" 
                   value="5">
            <label for="st_melibuPlugin_list_item_5">
                <span><span class="dashicons dashicons-translation"></span> 
                    <?php _e('Translation', 'syntax-high-lighter'); ?> </span>
            </label>
            <input name="st_melibuPlugin_list_item" 
                   id="st_melibuPlugin_list_item_6" 
                   class="st_melibuPlugin_list_item_6" 
                   type="radio" 
                   value="6">
            <label for="st_melibuPlugin_list_item_6">
                <span><span class="dashicons dashicons-carrot"></span> 
                    <?php _e('Donate', 'syntax-high-lighter'); ?> </span>
            </label>
            <ul>
                <li class="st_melibuPlugin_list_item_1">
                    <div class="st_melibuPlugin_list_content">
                        <h3>MeliBu &copy;</h3>
                        <hr />
                        <?php
                        if ($datas) {
                            foreach ($datas as $key => $data) {
                                echo '<strong>' . $key . '</strong>: ' . $data . '<br />';
                            }
                        }
                        ?>
                        <hr />
                        <p>
                            <?php _e('More Professional', 'syntax-high-lighter'); ?> <a href="http://samet-tarim.de/wordpress/melibu-themes" target="_blank"><?php _e('Themes', 'syntax-high-lighter'); ?></a> <?php _e('and', 'syntax-high-lighter'); ?> <a href="http://samet-tarim.de/wordpress/melibu-plugins" target="_blank"><?php _e('Plugins', 'syntax-high-lighter'); ?> </a>
                        </p>
                        <hr />
                        <div class="headline-feature feature-video" style="background-color:#191E23;">
                            <img src="<?php echo plugins_url("screenshot-1.png", dirname(__FILE__)); ?>" alt="screenshot-1" width="650" class="st-img"/>
                        </div>
                    </div>
                </li>
                <li class="st_melibuPlugin_list_item_2">
                    <div class="st_melibuPlugin_list_content">
                        <div class="under-the-hood three-col">
                            <h3><?php _e('Functions', 'syntax-high-lighter'); ?></h3>
                            <hr />
                            <div class="col">
                                <h3><?php _e('Functionality', 'syntax-high-lighter'); ?></h3>
                                <ul class="st-list">
                                    <li><?php _e('Better recognizable code', 'syntax-high-lighter'); ?></li>
                                    <li><?php _e('Raises code optimally forth', 'syntax-high-lighter'); ?></li>
                                    <li><?php _e('Special Highlightings', 'syntax-high-lighter'); ?></li>
                                    <li><?php _e('WP Codex Highlighting', 'syntax-high-lighter'); ?></li>
                                    <li><?php _e('Multi code Highlighting', 'syntax-high-lighter'); ?></li>
                                    <li><?php _e('Code output field', 'syntax-high-lighter'); ?></li>
                                    <li><?php _e('Codeing in WP Editor with short codes', 'syntax-high-lighter'); ?></li>
                                    <li><?php _e('Clickable links', 'syntax-high-lighter'); ?></li>
                                    <li><?php _e('Ruler', 'syntax-high-lighter'); ?></li>
                                    <li><?php _e('Fully modifiable CSS', 'syntax-high-lighter'); ?></li>
                                    <li><?php _e('Prevents number copy', 'syntax-high-lighter'); ?></li>
                                    <li><?php _e('Own Regular Expressions', 'syntax-high-lighter'); ?></li>
                                    <li><?php _e('Prepare everything for a decent coding', 'syntax-high-lighter'); ?></li>
                                </ul>
                            </div>
                            <div class="col">
                                <h3><?php _e('Options', 'syntax-high-lighter'); ?></h3>
                                <ul class="st-list">
                                    <li><?php _e('Full CSS access', 'syntax-high-lighter'); ?></li>
                                    <li><?php _e('Custom CSS', 'syntax-high-lighter'); ?></li>
                                    <li><?php _e('Custom Colors', 'syntax-high-lighter'); ?></li>
                                    <li><?php _e('Custom RegExp', 'syntax-high-lighter'); ?></li>
                                    <li><?php _e('Optional disable Visual WP Editor', 'syntax-high-lighter'); ?></li>
                                    <li><?php _e('Optional Toolbar', 'syntax-high-lighter'); ?></li>
                                    <li><?php _e('Optional Linenumbers', 'syntax-high-lighter'); ?></li>
                                    <li><?php _e('Optional clickable links', 'syntax-high-lighter'); ?></li>
                                    <li><?php _e('Optional copyright', 'syntax-high-lighter'); ?></li>
                                </ul>
                            </div>
                            <div class="col">
                                <h3><?php _e('Extras', 'syntax-high-lighter'); ?></h3>
                                <ul class="st-list">
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="st_melibuPlugin_list_item_3">
                    <div class="st_melibuPlugin_list_content">
                        <h3><?php _e('Support', 'syntax-high-lighter'); ?></h3>
                        <hr />
                        <div class="feature-section two-col">
                            <div class="col">
                                <h3><?php _e('In like please give', 'syntax-high-lighter'); ?> <?php echo $datas['Name']; ?></h3>
                                <ul>
                                    <li><span class="dashicons dashicons-thumbs-up"></span>
                                        <a href="https://wordpress.org/support/view/plugin-reviews/<?php echo $datas['TextDomain']; ?>" target="_blank"><?php _e('WordPress Rate', 'syntax-high-lighter'); ?></a>
                                    </li>
                                    <li><span class="dashicons dashicons-thumbs-up"></span>
                                        <a href="https://plus.google.com/u/0/b/112736162951079313360/112736162951079313360" target="_blank"><?php _e('Google+ plus', 'syntax-high-lighter'); ?></a>
                                    </li>
                                    <li><span class="dashicons dashicons-thumbs-up"></span>
                                        <a href="https://www.facebook.com/wordpress.melibu/" target="_blank"><?php _e('Facebook Like', 'syntax-high-lighter'); ?></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col">
                                <h3><?php _e('Feel free and post your question, suggestion, idea or criticism. We love it!', 'syntax-high-lighter'); ?></h3>
                                <ul>
                                    <li><span class="dashicons dashicons-sos"></span> <?php _e('For Plugin English Support', 'syntax-high-lighter'); ?>
                                        <a href="https://wordpress.org/support/plugin/<?php echo $datas['TextDomain']; ?>" target="_blank"><?php _e('Support EN', 'syntax-high-lighter'); ?></a>
                                    </li>
                                    <li><span class="dashicons dashicons-sos"></span> <?php _e('For Plugin German Support', 'syntax-high-lighter'); ?>
                                        <a href="https://plus.google.com/u/0/communities/106070505484298900786" target="_blank"><?php _e('Support DE', 'syntax-high-lighter'); ?></a>
                                    </li>
                                    <li><span class="dashicons dashicons-sos"></span> <?php _e('For Plugin Turkey Support', 'syntax-high-lighter'); ?>
                                        <a href="https://plus.google.com/u/0/communities/111364399553479782817" target="_blank"><?php _e('Support TR', 'syntax-high-lighter'); ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="st_melibuPlugin_list_item_4">
                    <div class="st_melibuPlugin_list_content">
                        <h3><?php _e('Development ', 'syntax-high-lighter'); ?></h3>
                        <hr />
                        <ul>
                            <li>
                                <h3><?php _e('Author', 'syntax-high-lighter'); ?></h3>
                                <a href="https://profiles.wordpress.org/prodeveloper/">
                                    <img src="//secure.gravatar.com/avatar/d15ce54d18adb5cf02bd9676be830485?s=150&d=mm&r=g" class="avatar user-14722029-avatar avatar-150 photo" alt="Profile picture of Samet Tarim" height="150" width="150">
                                </a>
                                <p>
                                    <?php _e('Founder and Project Manager', 'syntax-high-lighter'); ?><br />
                                    <span class="dashicons dashicons-welcome-learn-more"></span>
                                    <a href="http://samet-tarim.de/" target="_blank">Dipl. Web Engineer, Samet Tarim</a>
                                </p>
                            </li>
                            <li>
                                <h3><?php _e('Contributors', 'syntax-high-lighter'); ?></h3>
                                <a href="https://profiles.wordpress.org/projectmate/">
                                    <img src="//www.gravatar.com/avatar/403021844ef89f1ced9663c5708eb3ab?s=150&amp;r=g&amp;d=mm" class="avatar user-14822683-avatar avatar-150 photo" alt="Profile picture of Volkan Tarim" height="150" width="150">
                                </a>
                                <p>
                                    <?php _e('Economic Computer Science', 'syntax-high-lighter'); ?><br />
                                    <a href="http://volkan-tarim.de/" target="_blank">Volkan Tarim</a>
                                </p>
                            </li>

                            <li class="wp-person">
                                <h3><?php _e('Marketing', 'syntax-high-lighter'); ?></h3> 
                                <p>
                                    <a href="http://samet-tarim.de/" target="_blank">Samet Tarim</a>, 
                                    <a href="http://volkan-tarim.de/" target="_blank">Volkan Tarim</a>
                                </p>
                            </li>
                            <li class="wp-person">
                                <h3><?php _e('Developer', 'syntax-high-lighter'); ?></h3>
                                <p>
                                    <a href="http://samet-tarim.de/" target="_blank">Samet Tarim</a>, 
                                    <a href="http://volkan-tarim.de/" target="_blank">Volkan Tarim</a>
                                </p>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="st_melibuPlugin_list_item_5">
                    <div class="st_melibuPlugin_list_content">
                        <h3><?php _e('Thanks all Translaters', 'syntax-high-lighter'); ?></h3>
                        <p>
                            <span class="dashicons dashicons-translation"></span> <?php _e('Translate this Plugin', 'syntax-high-lighter'); ?>: <a href="https://translate.wordpress.org/projects/wp-plugins/<?php echo $datas['TextDomain']; ?>" target="_blank"><?php _e('Translate', 'syntax-high-lighter'); ?></a>
                        </p>
                        <hr />
                    </div>
                </li>
                <li class="st_melibuPlugin_list_item_6">
                    <div class="st_melibuPlugin_list_content">
                        <h3><?php _e('Donate', 'syntax-high-lighter'); ?></h3>
                        <p>
                            <?php _e('Development is fueled by your praise and feedback', 'syntax-high-lighter'); ?>
                        </p>
                        <hr />
                        <p>
                            <?php _e('In how you can support us so that we can further develop this plugin regularly, it may not always be financially, so you will give us feedback or recommend us, please give us a review, Liken our Facebook page or sponsor us, so that we further useful free plugins can develop.', 'syntax-high-lighter'); ?>
                        </p>    
                        <p>
                            <?php _e('You see, it is much more possible if you want to support something, thanks to all the Support Us.', 'syntax-high-lighter'); ?>
                        </p>
                        <img src="<?php echo plugins_url('img/paypal-logo.jpg', dirname(__FILE__)); ?>" alt="" width="130" height="35"/>
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="BN988PMGBEB2S">
                            <input type="image" src="https://www.paypalobjects.com/de_DE/DE/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="<?php _e('Now simply, quickly and safely pay online - with PayPal.', 'syntax-high-lighter'); ?>">
                            <img alt="" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1">
                        </form>
                        <p>
                            <?php _e('LOOK FOR SPONSOR !!!', 'syntax-high-lighter'); ?>
                        </p>
                        <p>
                            <em><?php _e('Your Melibu Team', 'syntax-high-lighter'); ?></em>
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</div>