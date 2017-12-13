<?php
class Triangulo{
    private $base;
    private $altura;
    private $cateto1;
    private $cateto2;

    public function __construct($base,$altura,$cateto1,$cateto2){
        $this->base=$base;
        $this->altura=$altura;
         $this->cateto1=$cateto1;
        $this->cateto2=$cateto2;
    }

    public function getHipotenusa (){
        return sqrt(pow($this->cateto1,2)+pow($this->cateto2,2));
    }
    public function getArea (){
        return ($this->base*$this->altura)/2;
    }
    
    public function __destruct(){
        $this->base=null;
        $this->altura=null;
        $this->cateto1=null;
        $this->cateto2=null;
    }
}
?>