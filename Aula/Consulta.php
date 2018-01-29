<?php
include_once "App.php";
$app = new App();
$app->validateSession();

APP::showHeader("Aula");

$aulas = $app->AulasConsulta()->fetchAll();




if(count($aulas)==0){

 print "
 <br/><br/><br/><br/><p align='center'>No hay Consultas</p>";
}else{
print "
<br/><br/>
<p align='center'>Consultas</p>
<br/><br/>
<table align='center' border='1'>
<tr>
    <th>Nombre</th>
    <th>Nombre Corto</th>
    <th>Ubicacion</th>
    <th>Tic</th>
    <th>Ordenadores</th>
    <th>Fecha</th>
</tr>
    ";
    foreach ($aulas as $row) {
        print "
        <tr>
        <td>".$row['nombre']."</td>
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
       </tr>";
    }        

print "
</table>
";
}



APP::showFooter();
?>