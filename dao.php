<?php
define ("DATABASE","Inventory");
define ("MYSQL_HOST","mysql:host=localhost;dbname=".DATABASE);
define ("MYSQL_USER","www-data");
define ("MYSQL_PASSWORD","www-data");

define ("TABLE_USER","user");
define ("COLUNM_NAME","name");
define ("COLUNM_PASSWORD","password");
define ("COLUNM_EMAIL","email");


class Dao{
    protected $conn;
    public $error;

    public function __construct (){
        try{
            $this->conn = new PDO(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD);
            
        }catch(PDOException $e){
            $this->error = "Error en la conesion".$e->getMessage();
            $this->conn = null;
        }
    }

    public function isConnective(){
        return $this->conn == null;

    }
    /**
     * Funcion que comprueva se el usuario existe en la base de datos 
     */
    function validateUser($user,$password){
        try{
            $sql = "SELECT * FROM ".TABLE_USER." WHERE ".COLUNM_NAME."='".$user."' AND ".COLUNM_PASSWORD."='".sha1($password)."'";
            
            
            $statement = $this->conn->query($sql);
            if($statement->rowCount() == 1){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            $this->error = "Error en la conesion".$e->getMessage();
            $this->conn = null;
        }
    }


    function showDependencyDao(){
        try{
            $sql = "SELECT * FROM Dependency";
            
            
            $statement = $this->conn->query($sql);
    
            return $statement;
            
        }catch(PDOException $e){
            $this->error = "Error en la conesion".$e->getMessage();
            $this->conn = null;
        }
    }


    function deleteDependencyDao($id){
        try{
            $sql = "DELETE FROM Dependency WHERE id=:id";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(":id",$id);
            $statement->execute();
            
            
    
            return $statement;
            
        }catch(PDOException $e){
            $this->error = "Error en la conesion".$e->getMessage();
            $this->conn = null;
        }
    }


    function showSectorDao($id){
        try{

            if ($id != -1){
            $sql = "SELECT * FROM sector WHERE id_dependency=:id_dependency";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(":id_dependency",$id);
            $statement->execute();
/*
            $sql = "SELECT * FROM sector WHERE id_dependency=?";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(":id_dependency",$id);
            */          
        }else{
            $sql = "SELECT * FROM sector";
            $statement = $this->conn->query($sql);

        }

            return $statement;
            
        }catch(PDOException $e){
            $this->error = "Error en la conesion".$e->getMessage();
            $this->conn = null;
        }
    }

    function deleteSectorIdDependencyDao($id){
        
            try{
                $sql = "DELETE FROM sector WHERE id_dependency=:id_dependency";
                $statement = $this->conn->prepare($sql);
                $statement->bindParam(":id_dependency",$id);
                $statement->execute();
  
    
                return $statement;
                
            }catch(PDOException $e){
                $this->error = "Error en la conesion".$e->getMessage();
                $this->conn = null;
            }
    }
    function deleteSectorIdDao($id){
        
            try{
                $sql = "DELETE FROM sector WHERE id=:id";
                $statement = $this->conn->prepare($sql);
                $statement->bindParam(":id",$id);
                $statement->execute();
  
    
                return $statement;
                
            }catch(PDOException $e){
                $this->error = "Error en la conesion".$e->getMessage();
                $this->conn = null;
            }
    }
    function anadirDependenciaDao($nombre,$nombrecorto,$descripcion){
        
        try{
            $sql = "INSERT INTO Dependency VALUES (null,'".$nombre."','".$nombrecorto."','".$descripcion."');";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            return $statement;
            
        }catch(PDOException $e){
            $this->error = "Error en la conesion".$e->getMessage();
            $this->conn = null;
        }
    }

    function anadirSectorDao($nombre,$nombrecorto,$descripcion,$idDependency){
        try{
            $sql = "INSERT INTO sector VALUES (null,'".$nombre."','".$nombrecorto."','".$descripcion."',".$idDependency.");";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            return $statement;
            
        }catch(PDOException $e){
            $this->error = "Error en la conesion".$e->getMessage();
            $this->conn = null;
        }
    }
    /**
     * destrictor
     */
    public function __destruct(){
        $this->conn = null;
        unset($this->error);
    }

}
?>