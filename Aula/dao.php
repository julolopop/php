<?php
define ("DATABASE","aula");
define ("MYSQL_HOST","mysql:host=localhost;dbname=".DATABASE);
define ("MYSQL_USER","root");
define ("MYSQL_PASSWORD","toor");


class Dao{
    private $conn;
    private $error;

    function __construct(){
        try{
         $this->conn = new PDO(MYSQL_HOST,MYSQL_USER);
        }catch(PDOException $e){
         $this->error = "Error en la conesion".$e->getMessage();
         $this->conn = null;
        }
    }

    function LoggearDao($nick){
        try{
            $state =$this->conn->query("SELECT * FROM cliente WHERE nick ='".$nick."'");

             return $state;
        }catch(PDOException $e){
            echo $e;
        }
    }

    
    function AulasDao(){
        try{
            $state =$this->conn->query("SELECT * FROM aulas");

             return $state;
        }catch(PDOException $e){
            echo $e;
        }
    }

    function AulasConsultaDao(){
        try{
            $state =$this->conn->query("SELECT * FROM aulas as t1 , consulta as t2 WHERE t2.fecha!='null' AND t1.id=t2.id_aulas");

             return $state;
        }catch(PDOException $e){
            echo $e;
        }
    }

    function AulasConsultaFDao($fecha){
        try{
        $state = $this->conn->query("SELECT * FROM consulta  WHERE fecha='".$fecha."'");


        
        if(count($state->fetchAll())==0){
            $state = $this->conn->query("SELECT * FROM aulas");
        }else{
            $state = $this->conn->query("SELECT * FROM consulta as t1 , aulas as t2 WHERE fecha='".$fecha."' AND t2.id!=t1.id_aulas GROUP BY t2.id");
        }

        return $state;
        }catch(PDOException $e){
            echo $e;
        }
    }

    function anadirConsultaDao($tipo,$fecha,$nombre){
        try{ 
            $state =$this->conn->prepare("INSERT INTO consulta (fecha,id_aulas) SELECT '".$fecha." ".$tipo."',id FROM aulas as t1 WHERE nombre='".$nombre."' ");
         
            $state->execute();

         return $state;
    
        }catch(PDOException $e){
            echo $e;
        }
    }

    function AulasNDao($nombre){
        try{
            $state =$this->conn->query("SELECT * FROM aulas WHERE nombre='".$nombre."'");

             return $state;
        }catch(PDOException $e){
            echo $e;
        }
    }
    function AulasNCDao($nombrecorto){
        try{
            $state =$this->conn->query("SELECT * FROM aulas WHERE nombreCorto='".$nombrecorto."'");

             return $state;
        }catch(PDOException $e){
            echo $e;
        }
    }


    function anadirUsuarioDao($nick,$contrasena,$usuario){
        try{ 
            $state =$this->conn->prepare("INSERT INTO cliente VALUES (null,'".$usuario."','".$contrasena."','".$nick."')");

         $state->execute();

         return $state;
    
        }catch(PDOException $e){
            echo $e;
        }
    }


}
?>