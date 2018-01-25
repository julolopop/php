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
         $this->conn = new PDO(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD);
        }catch(PDOException $e){
         $this->error = "Error en la conesion".$e->getMessage();
         $this->conn = null;
        }
    }

}
?>