<?php

class App{
    private $dao;
    
        function __construct(){
            $this->dao = new Dao();
        }


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
                <li>Login
                <ol>
                <li><a href='Login.php'>Iniciar</a></li>
                <li><a href='Registrar.php'>Registrarse</a></li>
                </ol></li>
                <li>Login</li>
                <li>Login</li>
                </ol>
        
        </div>
        <nav>
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

    function ValidarNick($nick){
        return true;
    }
}
?>