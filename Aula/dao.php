<?php
define ("DATABASE","aula");
define ("MYSQL_HOST","localhost");
define ("MYSQL_USER","root");


class Dao{
    private $conn;


    function __construct(){
       // $this->conn = new mysql_connect("localhost","root","",false,0);
    }

}
?>