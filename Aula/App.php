<?php
include_once "dao.php";
class App{
    private $dao;
    
        function __construct(){
            $this->dao = new Dao();
        }

        function Loggear($nick){
            return $this->dao->LoggearDao($nick);
        }
        function anadirUsuario($nick,$contrasena,$usuario){
            return $this->dao->anadirUsuarioDao($nick,$contrasena,$usuario);
        }
        function Aulas(){
            return $this->dao->AulasDao();
        }

        function AulasN($nombre){
            return $this->dao->AulasNDao($nombre);
        }
        function AulasNC($nombrecorto){
            return $this->dao->AulasNCDao($nombrecorto);
        }
        function AulasConsulta(){
            return $this->dao->AulasConsultaDao();
        }
        function AulasConsultaF($fecha){
            return $this->dao->AulasConsultaFDao($fecha);
        }
        function AulasConsultaFAll($fecha){
            return $this->dao->AulasConsultaFAllDao($fecha);
        }
        function AulasGestion(){
            return $this->dao->AulasGestionDao();
        }
        function anadirConsulta($tipo,$fecha,$nombre){
            return $this->dao->anadirConsultaDao($tipo,$fecha,$nombre);
        }
        function altaConsulta($nick,$fecha,$nombre,$descripcion){
            return $this->dao->altaConsultaDao($nick,$fecha,$nombre,$descripcion);
        }
        function EliminarGestion($id,$descripcion){
            return $this->dao->EliminarGestionDao($id,$descripcion);
        }


        function init_sesion($user){
            if(!isset($_SESSION['user'])){
                $_SESSION['user'] = $user;
            }
        }
    
        function validateSession(){
            session_start();
            if(!$this->isLogger()){
                $this->showLoggin();
            }
        }
        function isLogger(){
            return isset($_SESSION['user']); 
        }
        function showLoggin(){
            header ("Location: Login.php");
            exit;
        }
        function delete_session(){
            if (isset($_SESSION['user'])){
                unset($_SESSION['user']);
            }
            session_destroy();
            $this->showLoggin();
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
                <li><a href='Aulas.php?nick=".$_REQUEST['nick']."'>Aulas</a></li>
                </ol>
        
        </div>
        <nav>
        ";
    }

    static function showHeaderIndex($titulo){
        
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


}
?>