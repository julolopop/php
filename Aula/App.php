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
        <header align='center'>
        <h1>Aula</h1>
        </header>
        <div id='contenido'>
        <div id='menu'>
        <ol>
            <li>Login</li>
        </ol>
        </div>
        <nav>
        <p>contenido</p>
        ";
    }
    static function showFooter(){
        print "
        </nav>
        </div>
        <footer>
        <p>Hecho por : Juan Manuel Diaz Ortiz</p>
        </footer>
        </div>
        </body>
        </html>
        ";
    }

}
?>