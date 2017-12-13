<?php
include "biblioteca.php";
include "Triangulo.php";

print show_head("Titulo");

$triangulo = new Triangulo(2,3,5,2);

print "<p>la hiponetunas del triangul es ".$triangulo->getHipotenusa()."</p>";

print "<p>el Area del triangul es ".$triangulo->getArea()."</p>";

unset($triangulo);
print show_foot();
?>