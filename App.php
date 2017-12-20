<?php
include_once "dao.php";
class App{
    protected $dao;

    function __construct(){
        $this->dao = new Dao();
    }

    static function show_head($titulo){
        print "<!DOCTYPE html>
        <html>
        <head lang = \"es\">
        <meta charset=\"UTF-8\">
        <title>$titulo</title>
        <!-- Bootstrap core CSS -->
        <link href=\"bootstrap/css/bootstrap.css\" rel=\"stylesheet\">
        <!--<script src=\"bootstrap/js/http://code.jquery.com/jquery.js\"/>
        <script src=\"bootstrap/js/bootstrap.min.js\"/>-->
        </head>
        <body>";
    }
     
    static function show_foot(){
    print "</body>
    </html>";
    }

    function getDao(){
        return $this->dao;
    }

    /**
     * Functión que guarfa el nombre de usuario en la variable $_SESSION;
     * cuando el usuario se ha logeado en SingIn.php
     */
    function init_sesion($user){
        if( !isset($_SESSION['user'])){
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
        header ("Location: SingIn.php");
        exit;
    }

    function delete_session(){
        if (isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }
        session_destroy();
        $this->showLoggin();
    }
}

?>