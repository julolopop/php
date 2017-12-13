<?php
include "biblioteca.php";
include "Estudiante.php";


print show_head("Titulo");

$personas = new Personas("lulu","noches","23");
$modulos = array ("Deint","Segemp");
$estudiate = new Estudiante("ash","Ketchum","33",23,$modulos);


print $personas->saludar();
print $estudiate-> saludar();

$arrayPersonas = array();
$arrayPersonas[0] = $personas;
$arrayPersonas[1] = $estudiate;

for ($i=0; $i < count($arrayPersonas); $i++) { 
    if($arrayPersonas[$i] instanceof Estudiante){
        echo "<h1>Estuciante</h1>";
        echo "<p>nombre ".$arrayPersonas[$i]->getNombre()."</p>";
        echo "<p>apellido ".$arrayPersonas[$i]->getApellido()."</p>";
        echo "<p>edad ".$arrayPersonas[$i]->getEdad()."</p>";
        echo "<p>codigo ".$arrayPersonas[$i]->getCodigo()."</p>";
        echo "<p>matricula ".print_r ($arrayPersonas[$i]->getMatricula())."</p>";
    }else{
        echo "<h1>Persona</h1>";
        echo "<p>nombre ".$arrayPersonas[$i]->getNombre()."</p>";
        echo "<p>apellido ".$arrayPersonas[$i]->getApellido()."</p>";
        echo "<p>edad ".$arrayPersonas[$i]->getEdad()."</p>";
    }
}

//para destruir un objeto se utiliza unset()
unset($personas);
unset($estudiate);
print show_foot();
?>