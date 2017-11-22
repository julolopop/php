<?php
/**
 * en primer lugar se incluye los ficheros a usar
 * include(......);
 */

 /**
  * Es Segundo lugar se define las constantes
  */
define("TRIANGULO",1);
define("CUADRADO",2);
define("RECTANGULO",3);
define("CIRCUNFERENCIA",4);
define("MAXVALUE",4);
define("MINVALUE",1); 
const PI = 3.14;    

print "<!DOCTYPE html>
<html>
<head>
<meta charset=\"UTF-8\">
<title>Constantes</title>
</head>
<body>";

    $base = 3;
    $altura = 5;
    $lado = 3;
    $lado1 = 3;
    $lado2 = 5;
    $radio = 10;
    
    $figura=rand(MINVALUE,MAXVALUE);
    switch($figura){
        case TRIANGULO:
        print "El area del triangulo con la base : $base y la altura : $altura es ".area_Triangulo($base,$altura)."\n";
        break;
        case CUADRADO:
        print "El area del cuadrado con el lado : $lado  es ".area_Cuadrado($lado)."\n";
        break;
        case RECTANGULO:
        print "El area del rectangulo con el lado1 : $lado1 y el lado2 : $lado2 es ".area_Rectangulo()."\n";
        break;
        case CIRCUNFERENCIA:
        print "El area de la circunferencia con el radio : $radio es ".area_Circunferencia()."\n";
        break;
    }

    function area_Triangulo($base,$altura){
        return ($base*$altura)/2;
    }
    function area_Cuadrado($lado){
        return pow($lado,2);
    }
    function area_Rectangulo(){
        global $lado1,$lado2;
        //si una variable se llama igual a la global se utiliza simpre la local
        //$lado1 = 0;
        //$lado2 = 0;
        return $lado1*$lado2;
    }
    
    function area_Circunferencia(){
        
        
        return 2*PI*$GLOBALS['radio'];
    }

print "</body>
</html>";
?>