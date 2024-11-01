<!--CUSSTOM CSS START-->
<?php
$sample = '';
$breaks = array("<br />", "<br>", "<br/>");
$sample = str_ireplace($breaks, "\r\n", $sample);
?>
<div class="mb-l-customcss">
    <h2><?php _e('Custom CSS', 'syntax-high-lighter'); ?></h2>
    <h3><?php _e('Customize it', 'syntax-high-lighter'); ?></h3>
    <p><?php _e('Use your own CSS to override the current design', 'syntax-high-lighter'); ?>.</p>
    <form action="admin.php?page=melibu-plugin-syntax-admin-control-menu-1" method="post">
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
            <div class="mb-l-form--head mb-st-grid-3">
                <h4><?php _e('Custom CSS', 'syntax-high-lighter'); ?></h4>
            </div>
            <div class="mb-l-form--body mb-st-grid-9">
                <textarea name="mb-shl-get-setting-group[custom-css]" placeholder="<?php echo $sample; ?>" class="mb-l-form--textarea"><?php echo (isset($mbPluginSHLoptions['custom-css']) ? str_ireplace(array('\r\n', '\r', '\n'), "\n", $mbPluginSHLoptions['custom-css']) : ''); ?></textarea>
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
        <?php wp_nonce_field('mb-shl-nonce-action', 'mb-shl-nonce'); ?>
    </form>
</div>
<!--CUSSTOM CSS END-->