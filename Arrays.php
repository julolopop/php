<?php
print "<!DOCTYPE html>
<html>
<head>
<meta charset=\"UTF-8\">
<title>Matrices</title>
</head>
<body>";

echo "<p>";
    $nacimiento = ["Juanma","Diaz","Ortiz",1859];
    print ("Matriz nacimiento $nacimiento[0],$nacimiento[1],$nacimiento[2],$nacimiento[3]");
echo "</p>";

echo "<p>";
    $nacimiento = ["nombre"=>"Juanma","apellidos"=>"Diaz Ortiz","anio" =>1859];
    print ("Matriz nacimiento $nacimiento[nombre],$nacimiento[apellidos],$nacimiento[anio]");
echo "</p>";

echo "<p>";//para multidimensionales se tiene que concatenar
    $nacimiento = [["nombre"=>"Juanma","apellidos"=>"Diaz Ortiz","anio" =>1859],
                  ["nombre"=>"Juanma","apellidos"=>"Diaz Ortiz","anio" =>1859]];
              print ("<p>Matriz nacimiento ".$nacimiento[0]["nombre"].",".$nacimiento[0]["apellidos"].",".$nacimiento[0]["anio"]."</p>");
              print ("<p>Matriz nacimiento ".$nacimiento[1]["nombre"].",".$nacimiento[1]["apellidos"].",".$nacimiento[1]["anio"]."</p>");
echo "</p>";


echo "Pecualidades o sobreEscrituras";

echo "<p>";
$abecedario = array(
    1=>"a",
    "1" => "b",
    1.5 => "c",
    true => "d"

);//php no distinge ya que combierte todo en un mismo tipo
print ("<p>".print_r($abecedario,true)."</p>");
echo "</p>";

echo "<p>";
$abecedario = array(
    "uno"=>"a",
    "dos" => "b",
    100=> "c",
    -100 => "d"

);
print ("<p>".print_r($abecedario,true)."</p>");
echo "</p>";

echo "<p>";
$abecedario = array(
    "a",
    "b",
    6=>"c",
    "d"

);
print ("<p>".print_r($abecedario,true)."</p>");
echo "</p>";


print "</body>
</html>";
?>