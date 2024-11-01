/**
 * MELIBU SYNTAX ruler
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/syntax-high-lighter
 * @package     Melibu
 * @subpackage  Syntax High Lighter
 * @since       1.0
 */
jQuery(document).ready(function ($) {
    // Build "dynamic" rulers by adding items
    $(".st_ruler[data-mb-syntax-items]").each(function () {
        
        var ruler = $(this).empty(),
                len = Number(ruler.attr("data-mb-syntax-items")) || 0,
                item = $(document.createElement("li")),
                i;
                
        for (i = 0; i < len; i++) {
            ruler.append(item.clone().text(i + 1));
        }
    });
    // Change the spacing programatically
    function changeRulerSpacing(spacing) {
        $(".st_ruler").
                css("padding-right", spacing).
                find("li").
                css("padding-left", spacing);
    }
    
    $("#spacing").change(function () {
        changeRulerSpacing($(this).val());
    });
});