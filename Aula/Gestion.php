<?php
include_once "App.php";
$app = new App();
$app->validateSession();

APP::showHeader("Aula");


$aulas = $app->AulasGestion()->fetchAll();

print "<h2 align='center'>Bienvenido  ".$_REQUEST['nick']."</h2><br/><br/><br/><br/>";


print "<p align='center'> Lista de reservas Sin caducar</p><br/>";

if(count($aulas)==0){

 print "
 <br/><br/><br/><br/><p align='center'>No hay aulas ocupadas</p>";
}else{
print "
<br/><br/>
<table align='center' border='1'>
<tr>
    <th>Nombre</th>
    <th>Nombre Corto</th>
    <th>Ubicacion</th>
    <th>Tic</th>
    <th>Ordenadores</th>
    <th>Fecha</th>
    <th>Usuario</th>
    <th>Eliminar</th>
</tr>
    ";
    foreach ($aulas as $row) {
        print "
        <tr>
        <td>".$row[7]."</td>
        <td>".$row['nombreCorto']."</td>
        <td>".$row['ubicacion']."</td>
        <td>";
        if ($row['tic']==0){
            print "No";
        }else
        {
            print "Si";
        }
        print "</td>
        <td>".$row['ordenadores']."</td>
        <td>".$row['fecha']."</td>
        <td>".$row[13]."</td>
        <td><a href='Eliminar.php?nick=".$_REQUEST['nick']."&id=".$row[0]."'>Eliminar</a></td>
       </tr>";
    }      
 
print "
</table>
";
}



APP::showFooter();
?>