/**
 * MELIBU SYNTAX documentation
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/syntax-high-lighter
 * @package     Melibu
 * @subpackage  Syntax High Lighter
 * @since       1.3
 */
var melibu_plugin_syntax_docu = {
    name: 'MB Syntax Documentaion Label',
    selector: 'melibu-shl-docu',
    started: '',
    startIcon: '',
    choosed: '',
    chooseIcon: '',
    payed: '',
    payIcon: '',
    wraped: '',
    wrapIcon: '',
    shiped: '',
    shipIcon: '',
    licensed: '',
    licenseIcon: '',
    part_6: '',
    part_6Icon: '',
    line: '',
    /**
     * 
     * @returns {undefined}
     */
    init: function () {

        melibu_plugin_syntax_docu.started = document.querySelector("." + melibu_plugin_syntax_docu.selector + " .start");
        melibu_plugin_syntax_docu.startIcon = document.querySelector("." + melibu_plugin_syntax_docu.selector + " .start > .melibu-shl-docu-icon");
        melibu_plugin_syntax_docu.choosed = document.querySelector("." + melibu_plugin_syntax_docu.selector + " .part-1");
        melibu_plugin_syntax_docu.chooseIcon = document.querySelector("." + melibu_plugin_syntax_docu.selector + " .part-1 > .melibu-shl-docu-icon");
        melibu_plugin_syntax_docu.payed = document.querySelector("." + melibu_plugin_syntax_docu.selector + " .part-2");
        melibu_plugin_syntax_docu.payIcon = document.querySelector("." + melibu_plugin_syntax_docu.selector + " .part-2 > .melibu-shl-docu-icon");
        melibu_plugin_syntax_docu.wraped = document.querySelector("." + melibu_plugin_syntax_docu.selector + " .part-3");
        melibu_plugin_syntax_docu.wrapIcon = document.querySelector("." + melibu_plugin_syntax_docu.selector + " .part-3 > .melibu-shl-docu-icon");
        melibu_plugin_syntax_docu.shiped = document.querySelector("." + melibu_plugin_syntax_docu.selector + " .part-4");
        melibu_plugin_syntax_docu.shipIcon = document.querySelector("." + melibu_plugin_syntax_docu.selector + " .part-4 > .melibu-shl-docu-icon");
        melibu_plugin_syntax_docu.line = document.querySelector("." + melibu_plugin_syntax_docu.selector + " .line");

        melibu_plugin_event.addEvent(melibu_plugin_syntax_docu.started, 'click', melibu_plugin_syntax_docu.starter);
        melibu_plugin_event.addEvent(melibu_plugin_syntax_docu.choosed, 'click', melibu_plugin_syntax_docu.part1);
        melibu_plugin_event.addEvent(melibu_plugin_syntax_docu.payed, 'click', melibu_plugin_syntax_docu.part2);
        melibu_plugin_event.addEvent(melibu_plugin_syntax_docu.wraped, 'click', melibu_plugin_syntax_docu.part3);
        melibu_plugin_event.addEvent(melibu_plugin_syntax_docu.shiped, 'click', melibu_plugin_syntax_docu.part4);
    },
    starter: function () {

        melibu_plugin_syntax_docu.started.classList.add('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.startIcon.classList.add('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.choosed.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.chooseIcon.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.payed.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.payIcon.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.wraped.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.wrapIcon.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.shiped.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.shipIcon.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.line.classList.add('one');
        melibu_plugin_syntax_docu.line.classList.remove('two', 'three', 'four', 'five');

        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .first").classList.add("active");
        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .second").classList.remove("active");
        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .third").classList.remove("active");
        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .fourth").classList.remove("active");
        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .fifth").classList.remove("active");
    },
    part1: function () {

        melibu_plugin_syntax_docu.started.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.startIcon.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.choosed.classList.add('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.chooseIcon.classList.add('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.payed.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.payIcon.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.wraped.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.wrapIcon.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.shiped.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.shipIcon.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.line.classList.add('two');
        melibu_plugin_syntax_docu.line.classList.remove('one', 'three', 'four', 'five');

        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .first").classList.remove("active");
        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .second").classList.add("active");
        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .third").classList.remove("active");
        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .fourth").classList.remove("active");
        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .fifth").classList.remove("active");
    },
    part2: function () {

        melibu_plugin_syntax_docu.started.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.startIcon.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.choosed.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.chooseIcon.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.payed.classList.add('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.payIcon.classList.add('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.wraped.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.wrapIcon.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.shiped.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.shipIcon.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.line.classList.add('three');
        melibu_plugin_syntax_docu.line.classList.remove('one', 'two', 'four', 'five');

        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .first").classList.remove("active");
        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .second").classList.remove("active");
        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .third").classList.add("active");
        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .fourth").classList.remove("active");
        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .fifth").classList.remove("active");
    },
    part3: function () {
        
        melibu_plugin_syntax_docu.started.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.startIcon.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.choosed.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.chooseIcon.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.payed.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.payIcon.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.wraped.classList.add('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.wrapIcon.classList.add('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.shiped.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.shipIcon.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.line.classList.add('four');
        melibu_plugin_syntax_docu.line.classList.remove('one', 'two', 'three', 'five');

        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .first").classList.remove("active");
        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .second").classList.remove("active");
        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .third").classList.remove("active");
        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .fourth").classList.add("active");
        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .fifth").classList.remove("active");
    },
    part4: function () {

        melibu_plugin_syntax_docu.started.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.startIcon.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.choosed.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.chooseIcon.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.payed.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.payIcon.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.wraped.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.wrapIcon.classList.remove('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.shiped.classList.add('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.shipIcon.classList.add('melibu-shl-docu-active');
        melibu_plugin_syntax_docu.line.classList.add('five');
        melibu_plugin_syntax_docu.line.classList.remove('one', 'two', 'three', 'four');

        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .first").classList.remove("active");
        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .second").classList.remove("active");
        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .third").classList.remove("active");
        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .fourth").classList.remove("active");
        document.querySelector("." + melibu_plugin_syntax_docu.selector + " .fifth").classList.add("active");
    }
};

document.addEventListener('DOMContentLoaded', function () {

    melibu_plugin_syntax_docu.init();
});