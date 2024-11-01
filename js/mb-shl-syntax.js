/**
 * MELIBU SYNTAX
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/syntax-high-lighter
 * @package     Melibu
 * @subpackage  Syntax High Lighter
 * @since       1.0
 */
var melibu_plugin_syntax = {
    oc: '',
    og: '',
    /**
     * 
     * @returns {undefined}
     */
    start: function () {

        if (document.querySelectorAll('.mb-syntax-open-code')) {
            this.oc = document.querySelectorAll('.mb-syntax-open-code');
            for (var i = 0; i < this.oc.length; i++) {
                this.oc[i].id = 'mb' + i;
                melibu_plugin_event.addEvent(this.oc[i], 'click', this.openCode);
            }
        }

        if (document.querySelectorAll('.st_highlighter_style')) {
            this.og = document.querySelectorAll('.st_highlighter_style');
            for (var j = 0; j < this.oc.length; j++) {
                if (this.og[j]) {
                    this.og[j].id = 'mb-syntax-plugin-opencode-mb' + j;
                }
            }
        }
    },
    /**
     * 
     * @param {type} e
     * @returns {undefined}
     */
    openCode: function (e) {

        var st_highlighter_style = document.querySelector('#mb-syntax-plugin-opencode-' + e.target.id);
        var st_highlighter_mb = document.querySelector('#' + e.target.id);
        /**
         * offsetHeight
         * Chrome - FF - Safari - Opera - IE
         */
        if (st_highlighter_style.offsetHeight <= '200') {

            st_highlighter_style.style.maxHeight = '1000em';
            st_highlighter_style.style.height = 'auto';
            st_highlighter_mb.innerHTML = '-';

        } else {

            st_highlighter_style.style.maxHeight = '200px';
            st_highlighter_mb.innerHTML = '+';
        }
    }
};

document.addEventListener('DOMContentLoaded', function () {
    melibu_plugin_syntax.start();
});