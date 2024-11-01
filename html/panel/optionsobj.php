<!--OPTIONS START-->
<div class="mb-l-optionsobj">
    <h2><?php _e('Options OBJ', 'syntax-high-lighter'); ?></h2>
    <p><?php _e('See the globally object to use', 'syntax-high-lighter'); ?></p>
    <?php
    $melibu_shl = $wpdb->prefix . "melibu_shl";
    $result = $wpdb->get_results("SELECT * FROM " . $melibu_shl . " WHERE name='farbe'");
    if (isset($result[0])) {
        echo '<h3>' . __('Options OBJ', 'syntax-high-lighter') . '</h3>';
        echo '<pre>';
        var_dump($result[0]);
        echo '</pre>';
        echo '<h3>' . __('Options OBJ (Array)', 'syntax-high-lighter') . '</h3>';
        echo '<pre>';
        var_dump(unserialize($result[0]->farbe));
        echo '</pre>';
    }
    ?>
</div>
<!--OPTIONS END-->