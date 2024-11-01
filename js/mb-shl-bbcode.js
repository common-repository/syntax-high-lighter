/**
 * MELIBU SYNTAX bbcode
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/syntax-high-lighter
 * @package     Melibu
 * @subpackage  Syntax High Lighter
 * @since       1.3
 */

var melibu_plugin_shl_bbcode = {
    name: 'MeliBu Syntax BBCODE',
    textarea: 'mb-shl-regexp-editor',
    buttons: 'mb-shl-reg-button',
    start: function () {
        var all = document.getElementsByClassName(melibu_plugin_shl_bbcode.buttons);
        for (var i = 0; i < all.length; i++) {
            melibu_plugin_event.addEvent(all[i], 'click', melibu_plugin_shl_bbcode.insertProperty);
        }
    },
    /**
     *  Insert
     *  @param {type} prop
     *  @param {type} val
     */
    insertProperty: function (e) {
        e.preventDefault();
        var startTag = e.target.getAttribute('data-mb-shl-property-start');
        var endTag = e.target.getAttribute('data-mb-shl-property-end');
        if (startTag && endTag) {
            melibu_plugin_shl_bbcode.insertText('[' + startTag + ']', '[\/' + endTag + ']');
        }
    },
    /**
     *  Falls unterscheidung IE
     *  @param {type} vor
     *  @param {type} nach
     */
    insertText: function (vor, nach) {

        var textfeld = document.getElementById(melibu_plugin_shl_bbcode.textarea);
        textfeld.focus(); // falls Cursor außerhalb war fokus auf Textarea

        // Für IE und auch Opera
        if (typeof document.selection !== 'undefined') {
            melibu_plugin_shl_bbcode.insertIE(vor, nach);
        }
        // Geckos und Chrome
        else if (typeof textfeld.selectionStart !== 'undefined') {
            melibu_plugin_shl_bbcode.insertGecko(textfeld, vor, nach);
        }
    },
    /**
     * IE
     * @param {type} vor
     * @param {type} nach
     * https://msdn.microsoft.com/en-us/library/ms536422%28v=vs.85%29.aspx
     */
    insertIE: function (vor, nach) {

        if (document.selection) { // IE
            rangeIE = document.selection.createRange();
        }

        document.getElementById(melibu_plugin_shl_bbcode.textarea).focus();

        // Wenn wir nicht in Textarea sind
        if (rangeIE.parentElement().id !== melibu_plugin_shl_bbcode.textarea) {
            rangeIE = null; // null
            return; // und zurück
        }

        var alterText = rangeIE.text; // Selektierter text
        rangeIE.text = vor + alterText + nach; // Auswahl um BBCode ergänzen

        // Cursor neu setzen
        if (alterText.length === 0) {
            rangeIE.move('character', -nach.length);
        } else {
            rangeIE.moveStart('character', rangeIE.text.length);
        }

        rangeIE.select();
        getSelectionIE();
        rangeIE = null;
    },
    /**
     * GECKO, SAFARI, OPERA und CHROME
     * @param {type} textfeld
     * @param {type} vor
     * @param {type} nach
     */
    insertGecko: function (textfeld, vor, nach) {

        // Anfang und Ende
        markierungstart = textfeld.selectionStart;
        markierungende = textfeld.selectionEnd;

        // Text zerlegen
        start = textfeld.value.slice(0, markierungstart);
        mitte = textfeld.value.slice(markierungstart, markierungende);
        ende = textfeld.value.slice(markierungende);

        // BBC einfügen und ins Textfeld schreiben
        textfeld.value = start + vor + mitte + nach + ende;

        // Cursor neu setzen
        if (markierungende - markierungstart === 0) {
            textfeld.selectionStart = markierungstart + vor.length;
            textfeld.selectionEnd = textfeld.selectionStart;
        } else {
            textfeld.selectionEnd = markierungende + vor.length + nach.length;
            textfeld.selectionStart = textfeld.selectionEnd;
        }
    }
};

document.addEventListener('DOMContentLoaded', function () {
    melibu_plugin_shl_bbcode.start();
});