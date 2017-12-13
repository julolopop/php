<?php
    class Personas{
        private $nombre;
        private $apellido;
        private $edad;
        
        public function __construct($nombre,$apellido,$edad){
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->edad = $edad;
        }

        public function saludar(){
            return "Hola soy ".$this->nombre." ".$this->apellido." y tengo ".$this->edad." años";
        }


        public function getNombre(){
            return $this->nombre;
        }
        public function getApellido(){
            return $this->apellido;
        }
        public function getEdad(){
            return $this->edad;
        }

        public function __destruct(){
            $this->nombre=null;
            $this->apellido =null;
            $this->edad = null;
        }
    }
?>