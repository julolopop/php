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
        print "
        <header>
        <h1 class=\"text-center\">".$titulo."</h1>
        </header>";
        print "
        <script src='http://code.jquery.com/jquery.js'></script>
        <script src='js/bootstrap.min.js'></script>
        <nav>
        <ul>
            <li><a href='info.php'>Información</a></li>
            <li><a href='SingIn.php'>Login</a></li>  
            <li><a href='sector.php?id_dependency=-1'>Sectores</a></li>
            <li><a href='inventory.php'>Dependency</a></li>
        </ul>
    </nav>";

        print "<div class='container-fluid'>
        <div class='container'>
        <div class='row'>
        <div class=\"col-12 col-md-4 offset-md-4\">";


    }
    static function show_headLogin($titulo){
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
        print "
        <header>
        <h1 class=\"text-center\">".$titulo."</h1>
        </header>";
        print "
        <script src='http://code.jquery.com/jquery.js'></script>
        <script src='js/bootstrap.min.js'></script>
        <nav>
        <ul>
            <li><a href='info.php'>Información</a></li>
            <li><a href='SingIn.php'>Login</a></li> 
        </ul>
    </nav>";

        print "<div class='container-fluid'>
        <div class='container'>
        <div class='row'>
        <div class=\"col-12 col-md-4 offset-md-4\">";


    }
     
    static function show_foot(){
        print "</div> <!--col-md-4 -->    
        </div>
        </div>
        </div> <!-- Container -->";
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

    function showDependency(){
        return $this->dao->showDependencyDao();
    }
   function showSector($id){
        return $this->dao->showSectorDao($id);
    }

    function deleteDependency($id){
        return $this->dao->deleteDependencyDao($id);
    }

    function deleteSectorIdDependency($id){
        return $this->dao->deleteSectorIdDependencyDao($id);
    }
    function deleteSectorId($id){
        return $this->dao->deleteSectorIdDao($id);
    }

    function anadirDependencia($nombre,$nombrecorto,$descripcion){
        return $this->dao->anadirDependenciaDao($nombre,$nombrecorto,$descripcion);
    }
}

?>