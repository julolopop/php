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

    function showSectorDao(){
        try{
            $sql = "SELECT * FROM sector";
            
            
            $statement = $this->conn->query($sql);
    
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