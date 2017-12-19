<?php
define ("DATABASE","Inventory");
define ("MYSQL_HOST","msql:host=localhost;dbname=".DATABASE);
define ("MYSQL_USER","www-data");
define ("MYSQL_PASSWORD","1234");

define ("TABLE_USER","user");
define ("COLUNM_NAME","name");
define ("COLUNM_PASSWORD","password");
define ("COLUNM_EMAIL","email");


class Dao{
    protected $conn;
    public $error;

    function __construct (){
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


    /**
     * destrictor
     */
    function __destruct(){
        $this->conn = null;
        unset($this->error);
    }

}
?>