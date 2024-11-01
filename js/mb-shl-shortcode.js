/**
 * MELIBU SHORTCODE
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/syntax-high-lighter
 * @package     Melibu Syntax High Lighter
 * @since       1.0
 */

tinymce.init({
  selector: "html",  // change this value according to your HTML
  plugins: "nonbreaking",
  mewnubar: "insert",
  toolbar: "nonbreaking",
  nonbreaking_force_tab: true
});

tinymce.create('tinymce.plugins.melibuPlugin06', {
    init: function (ed, url) {
        
        ed.addButton('melibuPlugin_syntax_button', {
            type: 'splitbutton',
            text: 'MB SYNTAX',
            icon: ' fa fa-code',
            title: 'Insert MB Syntax shortcodes',
            menu: [{
                    text: 'Insert HTML Code',
                    cmd: 'melibu_plugin_insert_shortcode',
                    icon: ' fa fa-code',
                    image: url + '/img/HTML5.png',
                    onclick: function () {

                        return_text = melibu_plugin_03_schortcode_gen(ed, 'html', 'html');
                        ed.insertContent(return_text);
                    }
                }, {
                    text: 'Insert CSS Code',
                    cmd: 'melibu_plugin_insert_shortcode1',
                    icon: ' fa fa-code',
                    image: url + '/img/css3.png',
                    onclick: function () {

                        return_text = melibu_plugin_03_schortcode_gen(ed, 'css', 'css');
                        ed.insertContent(return_text);
                    }
                }, {
                    text: 'Insert JS Code',
                    cmd: 'melibu_plugin_insert_shortcode2',
                    icon: ' fa fa-code',
                    image: url + '/img/javascript.png',
                    onclick: function () {

                        return_text = melibu_plugin_03_schortcode_gen(ed, 'js', 'js');
                        ed.insertContent(return_text);
                    }
                }, {
                    text: 'Insert PHP Code',
                    cmd: 'melibu_plugin_insert_shortcode3',
                    icon: ' fa fa-code',
                    image: url + '/img/php.png',
                    onclick: function () {

                        return_text = melibu_plugin_03_schortcode_gen(ed, 'php', 'php');
                        ed.insertContent(return_text);
                    }
                }]
        });
    }
});

tinymce.PluginManager.add('melibu_plugin_syntax_button_script', tinymce.plugins.melibuPlugin06);

function melibu_plugin_03_schortcode_gen(ed, startcode, endcode) {

    var selected = ed.selection.getContent();
    var return_text = '';
    if (selected) {
        return_text = '[' + startcode + ']' + selected + '[/' + endcode + ']';
    } else {
        return_text = '[' + startcode + ']...Enter here your code...[/' + endcode + ']';
    }
    ed.insertContent(return_text);
}