<?php

class App{
    static function showHeader($titulo){
        
        print "
        <!DOCTYPE html>
        <html>
        <head lang = \"es\">
        <meta charset=\"UTF-8\">
        <title>$titulo</title>
        <link href=\"css\stylo.css\" rel=\"stylesheet\">
        </head>
        <body>
        <div id='principal'>
        <header>
        </header>
        ";
    }
    static function showFooter(){
        print "
        
        <footer>
        </footer>
        </div>
        </body>
        </html>
        ";
    }

}
?>