<?php

$html = '[html]<!-- HTML Kommentar -->
<!DOCTYPE html>
<html dir="ltr" class="page-dashboard">

  <head>
  
    <meta charset="utf-8">
    <title>Create New Post</title>
    <link href="/plugins/dashboard/lib/css/shell.css" rel="stylesheet">
    
    <style type="text/css">
    pre, 
    pre::before, 
    pre:hover {
        display:block;
        background-color:#3F3F3F;
        margin:1.5em 0;
        padding:1em;
        font:normal normal 13px/1.4 Consolas,"Andale Mono WT","Andale Mono","Lucida Console","Lucida Sans Typewriter","DejaVu Sans Mono","Bitstream Vera Sans Mono","Liberation Mono","Nimbus Mono L",Monaco,"Courier New",Courier,Monospace;
        color:#E3CEAB;
        overflow:auto;
        white-space:pre;
        word-wrap:normal;
      
        filter: "ms:alwaysHasItsOwnSyntax.For.Stuff()";
    }
    
    .pre, .code {
        font:inherit;
        color:inherit;
    }

    #pre .span-2.N {color:#8CD0D3; background: rgba(255,255,255,0.1); } /* Numbers */
    #pre span.S {color:#CC9385} /* Strings */
    </style>
    
    <script type="text\JavaScript">
    if (!zeichen) {
        zeichen = "0";
    }

    var formatiert = "" + this;
    while (formatiert.length < stellenzahl) {
        formatiert = zeichen + formatiert;
    }
    </script>
    
  </head>
  <body>
    <div class="wrapper">
    <h1>Hallo</h1>
    <p>Willkommen beim Syntax Highlighter</p>
    </div>
    <!-- Test comment -->
  </body>
</html>[/html]';
echo $MELIBU_SYNTAX_HIGH_LIGHTER->bbcode($html);

$css = '[css]/* ********************* *
 *  W3C 5 Selectors CSS
 * ********************* */

// 5.2.1 Grouping
h1, h2, h3 { font-family: sans-serif }

// 5.3 Universal selector
*[lang=fr] and [lang=fr] are equivalent.
// *.warning and .warning are equivalent.
*#myid and #myid are equivalent. 
    
// 5.4 Type selectors
h1 { font-family: sans-serif }

// 5.5 Descendant selectors
h1 { color: red }

// 5.6 Child selectors
body > P { line-height: 1.3 }

// 5.7 Adjacent sibling selectors
h1.opener + h2 { margin-top: -5mm; }

// 5.8 Attribute selectors
[class*="coco"] {
    color:inherit;
}

*[lang|="en"] { color : red }
*[lang=fr] { display : none }

a[rel~="copyright"] {}
a[rel^="copyright"] {}
a[rel*="copyright"] {}

span[class=example] { color: blue; }
    
[input="checkbox"] {
    color:inherit;
}

// 5.8.3 Class selectors
*.pastoral { color: green }  /* all elements with class~=pastoral */
h1.chapter1 { text-align: center }

.pre_count-c-c-22, .code_snippet-c {

    font:inherit;
    color:inherit;
}

.pre, 
.code {
    font:inherit;
    color:inherit;
}

// 5.9 ID selectors
h1#chapter1 { text-align: center }
*#pastoral { color: green }  /* all elements with class~=pastoral */

// HEX colors
#p1 {background-color: #ff0000;}   /* red */
#p2 {background-color: #00ff00;}   /* green */
#p3 {background-color: #0000ff;}   /* blue */ 

// RGB colors
.p1 {background-color: rgb(255, 0, 0);}   /* red with opacity */
.p2 {background-color: rgb(0, 255, 0);}   /* green with opacity */
.p3 {background-color: rgb(0, 0, 255);}   /* blue with opacity */ 

// RGBA colors
input[type="checkbox"].p1 {background-color: rgba(255, 0, 0, 0.3);}   /* red with opacity */
input[type="checkbox"].p2 {background-color: rgba(0, 255, 0, 0.3);}   /* green with opacity */
input[type="checkbox"].p3 {background-color: rgba(0, 0, 255, 0.3);}   /* blue with opacity */ 

// HSL colors
input[type="checkbox"]#p1 {background-color: hsl(120, 100%, 50%);}   /* green */
input[type="checkbox"]#p2 {background-color: hsl(120, 100%, 75%);}   /* light green */
input[type="checkbox"]#p3 {background-color: hsl(120, 100%, 25%);}   /* dark green */
input[type="checkbox"]#p4 {background-color: hsl(120, 60%, 70%);}    /* pastel green */ 

// HSLA colors
#p1 {background-color: hsla(120, 100%, 50%, 0.3);}   /* green with opacity */
#p2 {background-color: hsla(120, 100%, 75%, 0.3);}   /* light green with opacity */
#p3 {background-color: hsla(120, 100%, 25%, 0.3);}   /* dark green with opacity */
#p4 {background-color: hsla(120, 60%, 70%, 0.3);}    /* pastel green with opacity */ 
[/css]';
echo $MELIBU_SYNTAX_HIGH_LIGHTER->bbcode($css);

$less = '[less]@base: #f938ab;

.box-shadow(@style, @c) when (iscolor(@c)) {

  -webkit-box-shadow: @style @c;
  box-shadow:         @style @c;
}

.box-shadow(@style, @alpha: 50%) when (isnumber(@alpha)) {

  .box-shadow(@style, rgba(0, 0, 0, @alpha));
}

.box {

  color: saturate(@base, 5%);
  border-color: lighten(@base, 30%);
  div { .box-shadow(0 0 5px, 30%) }
  
}[/less]';
echo $MELIBU_SYNTAX_HIGH_LIGHTER->bbcode($less);

$sass = '[sass]// Variables
$font-stack: Helvetica, sans-serif;
$primary-color: #333;

body {
  font: 100% $font-stack;
  color: $primary-color;
}

// Nesting
nav {
  ul {
    margin: 0;
    padding: 0;
    list-style: none;
  }

  li { display: inline-block; }

  a {
    display: block;
    padding: 6px 12px;
    text-decoration: none;
  }
}

// Import
@import \'reset\';

body {
  font: 100% Helvetica, sans-serif;
  background-color: #efefef;
}

// Mixins
@mixin border-radius($radius) {
  -webkit-border-radius: $radius;
     -moz-border-radius: $radius;
      -ms-border-radius: $radius;
          border-radius: $radius;
}

.box { @include border-radius(10px); }

// Extend/Inheritance
.message {
  border: 1px solid #ccc;
  padding: 10px;
  color: #333;
}

.success {
  @extend .message;
  border-color: green;
}

.error {
  @extend .message;
  border-color: red;
}

.warning {
  @extend .message;
  border-color: yellow;
}[/sass]';
echo $MELIBU_SYNTAX_HIGH_LIGHTER->bbcode($sass);

$js = '[js]function dateiauswahl(evt) {
    
    var reader = "Hallo";
    var reader = \'\';
    var f = \'\';
    var files = evt.target.files;

    // Auslesen der gespeicherten Dateien durch Schleife.
    for (var i=0; i < files.length; i++) {
                    
        f = files[i];
                    
        // Nur weitermachen, wenn Dateien Bilder sind.
        if (!f.type.match(\'image.*\')) {
                        
            continue;
        }

        reader = new FileReader(); // Lege neues Filereader-Objekt an

        // Dateiinformationen auslesen.
        reader.onload = (function (theFile) {
                        
            return function (e) {
                            
                // Thumbnail erstellen
                var span = document.createElement(\'div\');
                            
                span.innerHTML = [\'<img class="thumb" src="\' + e.target.result + \'" title="\' + theFile.name + \'"/>\'].join(\'\');
                            
                document.getElementById(\'list\').insertBefore(span, null);
            };
                        
        })(f);

        // Dateipfad aus Datei erzeugen.
        reader.readAsDataURL(f);
     }
}
    document.write("Dateiauswahl");  
    // Auf neue Auswahl reagieren und gegebenenfalls Funktion dateiauswahl neu ausführen.
    document.getElementById(\'files\').addEventListener(\'change\', dateiauswahl, false);
    
jQuery(document).ready(function ($) {
    
    // Build "dynamic" rulers by adding items
    $(".st_ruler[data-items]").each(function () {
        
        var ruler = $(this).empty(),
                len = Number(ruler.attr("data-items")) || 0,
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
[/js]';
echo $MELIBU_SYNTAX_HIGH_LIGHTER->bbcode($js);

$php = '[php]namespace \Scripts;

require \'inc/class.php\';
require_once \'inc/class.php\';
include_once \'inc/class.php\';
include \'inc/class.php\';

// Example inline comment
function theme_include($file) {

    $file = strip_tags(trim(htmlentities($file, ENT_QUOTES, "UTF-8")));
    
    $theme_folder = Config::meta(\'theme\');
    $base = PATH . \'themes\' . DS . $theme_folder . DS;

    /**
     * Example multiline comment
     * Another comment
     */
    if(is_readable($path = $base . ltrim($file, DS) . EXT)) {
        return $path;
    }
    else
    {
        return false;
    }
    
    $GALO = new Config::meta(); // Instanzieren
    $GALO->tako(\'theme\');
    
    return true;

}[/php]';
echo $MELIBU_SYNTAX_HIGH_LIGHTER->bbcode($php);

$mysqloutput = '[mysql]SELECT
    postId, created, keyword, title, teaser
FROM 
    pn_blog_posts
WHERE 
    keyword = "hello-world" 
AND
    status >= 2
ORDER 
   BY 
    created 
DESC[/mysql]';
echo $MELIBU_SYNTAX_HIGH_LIGHTER->bbcode($mysqloutput);

$javacode = '[java]public class HalloWelt {
     public static void main(String[] args) {
         System.out.println("Hallo Welt!");
     }
 }[/java]';
echo $MELIBU_SYNTAX_HIGH_LIGHTER->bbcode($javacode);

$rubycode = '[ruby]def fact(n)
  if n == 0
    1
  else
    n * fact(n-1)
  end
end

def iterator
        yield "yield,"
       	yield "blocks,"
	yield "Ruby"
end
iterator {|yeilded| print "use #{yeilded}"}    # outputs, use yield, use blocks, use Ruby

puts "Hi!"                   # puts the string to stdout
print "enter your name:"     # print does not terminate with default \n at the end of execution
name = gets.chomp            # read from stdin
puts "Hi! #{name}"           # interpolates the string, replaces name with its value[/ruby]';
echo $MELIBU_SYNTAX_HIGH_LIGHTER->bbcode($rubycode);

$perlcode = '[perl]Def * locate(string index = "") {

    int start = 0, stop = 0;
    index = trim(index, "\t\n\r /");
    
    if(index.empty()) return this;

    // Descent into the tree
    Def * d = this;
    do {
        stop = index.find_first_of("/", start);
        string name = index.substr(start, stop - start);
        start = stop + 1;
        d = d->children[name];
    } 
    while(stop != string::npos && d);

    return d;
}[/perl]';
echo $MELIBU_SYNTAX_HIGH_LIGHTER->bbcode($perlcode);

$wpcode = '[wp]function pluginprefix_setup_post_type() {
 
    // Register our "book" custom post type
    register_post_type("book", array("public" => "true" ) );
 
}
add_action( "init", "pluginprefix_setup_post_type" );
 
function pluginprefix_install() {
 
    // Trigger our function that registers the custom post type
    pluginprefix_setup_post_types();
 
    // Clear the permalinks after the post type has been registered
    flush_rewrite_rules();
 
}
register_activation_hook( __FILE__, "pluginprefix_install" );[/wp]';
echo $MELIBU_SYNTAX_HIGH_LIGHTER->bbcode($wpcode);

$codeoutput = '[output]Here Comes your OUTPUT off Code[/output]';
echo $MELIBU_SYNTAX_HIGH_LIGHTER->bbcode($codeoutput);
