<?php
print "<!DOCTYPE html>
<html>
<head>
<meta charset=\"UTF-8\">
<title>Hola Mundo</title>
</head>
<body>";
/**
 * Una variable static se inicializa en la primera llamada de la función pero el valor de esa variable
 * no se pierde . Se utiliza den finciones recursivas.
 */
function contador_visitas(){
    static $visitas =1;//si se pone static no se vuelva a inaliciar
    static $visitas = 1+2 ; //Es correcto desde php 5.6 y siguientes
    //static $visitas = sqrt(121); // NO se puede utilizar en la inicializacion de una constante en el resultado de una funcion
    print("<p>se ha visitado la pagina : $visitas veces</p>");
    $visitas++;
}



contador_visitas();
contador_visitas();
contador_visitas();

print "</body>
</html>";
?>