<?php
define ("DATABASE","aulas");
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
            $state =$this->conn->query("SELECT * FROM aula");

             return $state;
        }catch(PDOException $e){
            echo $e;
        }
    }

    function AulasConsultaDao(){
        try{
            $state =$this->conn->query("SELECT * FROM consulta as t1 , aula as t2 , cliente as t3  WHERE t1.fecha!='null' AND t1.id_aulas=t2.id");

             return $state;
        }catch(PDOException $e){
            echo $e;
        }
    }

    function AulasConsultaFDao($fecha){
        try{
            //Extrae de la BD las filas con la fecha dada
            $esnulo = $this->conn->query("SELECT * FROM consulta  WHERE fecha='".$fecha."'");
            $esnulofecth = $esnulo->fetchAll();

            //Extrae de la BD todas las aulas
            $state = $this->conn->query("SELECT * FROM aula");
            $listaAulas = $state->fetchAll();


                //Comprobamos que al menos haya un elemento
                if(count($esnulofecth)!=0){   
                    //Si es del mismo tamaño, están todas las filas agregadas
                    //Y no se puede agregar más, es decir, si hay aulas libres
                    if (count($esnulofecth) != count($listaAulas)){      
                        //Recorro las filas de la consulta, son las aulas ocupadas para
                        //una fecha dada
                        foreach ($esnulofecth as $row) {
                            //Recorro todas las aulas
                            for ($i=0; $i < count($listaAulas); $i++) { 
                            
                                if($listaAulas[$i]['id'] == $row['id_aulas']){
                                    array_splice($listaAulas,$i,1);
                                }
                            }
                        }
                    }else{
                      $listaAulas = array();
                    }
                }
        return $listaAulas;
        
        }catch(PDOException $e){
            echo $e;
        }
    }

    function AulasConsultaFAllDao($fecha){
        try{
            
            $state = $this->conn->query("SELECT * FROM consulta as t1 , aula as t2 , cliente as t3  WHERE t1.fecha='".$fecha."' AND t1.id_aulas=t2.id");
            
        return $state;
        
        }catch(PDOException $e){
            echo $e;
        }
    }


    function anadirConsultaDao($tipo,$fecha,$nombre){
        try{ 
            $state =$this->conn->prepare("INSERT INTO consulta (fecha,id_aulas) SELECT '".$fecha." ".$tipo."',id FROM aula as t1 WHERE nombre='".$nombre."' ");
         
            $state->execute();

         return $state;
    
        }catch(PDOException $e){
            echo $e;
        }
    }

    function AulasNDao($nombre){
        try{
            $state =$this->conn->query("SELECT * FROM aula WHERE nombre='".$nombre."'");

             return $state;
        }catch(PDOException $e){
            echo $e;
        }
    }
    function AulasNCDao($nombrecorto){
        try{
            $state =$this->conn->query("SELECT * FROM aula WHERE nombreCorto='".$nombrecorto."'");

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
    function AulasGestionDao(){
        try{
            $fecha = getdate()['year']."-".sprintf("%'.02d", getdate()['mon'])."-".sprintf("%'.02d",getdate()['mday'])." ".sprintf("%'.02d",getdate()['hours'])
            .":".sprintf("%'.02d",getdate()['minutes']).":".sprintf("%'.02d",getdate()['seconds']);
            $state =$this->conn->query("SELECT * FROM consulta as t1 , aula as t2 , cliente as t3  WHERE t1.fecha>='".$fecha."' GROUP  BY t1.id_aulas");

             return $state;
        }catch(PDOException $e){
            echo $e;
        }
    }

    function altaConsultaDao($nick,$fecha,$nombre,$descripcion){
        try{ 
            $state =$this->conn->prepare("INSERT INTO consulta SELECT null,'".$fecha."',t1.id ,'".$descripcion."', t2.id ,null FROM aula as t1 , cliente as t2 WHERE t1.nombre='".$nombre."' AND t2.nick='".$nick."'");

         $state->execute();


         return $state;
    
        }catch(PDOException $e){
            echo $e;
        }
    }


    function EliminarGestionDao($id,$descripcion){
        try{ 
            $state =$this->conn->prepare("UPDATE consulta SET fecha = null  , eliminacion='".$descripcion."' WHERE id =".$id);

         $state->execute();


         return $state;
    
        }catch(PDOException $e){
            echo $e;
        }
    }

}
?>