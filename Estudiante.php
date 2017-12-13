<?php
include "Personas.php";

class Estudiante extends Personas{
    private $codigo;
    private $matricula;

    function __construct($nombre,$apellido,$edad,$codigo,$matricula){
        parent::__construct($nombre,$apellido,$edad);
        $this->codigo = $codigo;
        $this->matricula = $matricula;        
    }


    public function getCodigo(){
        return $this->codigo;
    }
    public function getMatricula(){
        return $this->matricula;
    }

    public function __destruct(){
        parent::__destruct();
        $this->codigo;
        $this->matricula;
    }
}
?>