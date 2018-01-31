<?php
include_once "App.php";
$app = new App();
$app->validateSession();

APP::showHeader("Aula");



print "<h2 align='center'>Bienvenido  ".$_REQUEST['nick']."</h2><br/><br/><br/><br/>";
if(isset($_REQUEST['buscar'])){
    $aulas = $app->AulasConsultaFAll($_REQUEST['fecha']." ".$_REQUEST['tipo'])->fetchAll();
}else{
    $aulas = $app->AulasConsulta()->fetchAll();
}


print "
<br/><br/>
<p align='center'>Buscador de Aulas libres</p>

<form action='#' method='get' align='center'>
<p>Hora</p>

<input type='hidden'name='nick' value='".$_REQUEST['nick']."'/>

<input type='radio' name='tipo' value='8:15:00' checked> 8:15 </input>
<input type='radio' name='tipo' value='9:15:00'> 9:15</input>
<input type='radio' name='tipo' value='10:15:00'> 10:15</input>
<input type='radio' name='tipo' value='11:45:00'> 11:45</input>
<input type='radio' name='tipo' value='12:45:00'> 12:45</input>
<input type='radio' name='tipo' value='13:45:00'> 13:45</input>
<br/><br/>
<p>Fecha : <input type='date' name='fecha' /></p>
<br/>
<input type='submit' class='boton' name='buscar' value='Buscar' />    
</form>
";

if(isset($aulas))
if(count($aulas)==0){

 print "
 <br/><br/><br/><br/><p align='center'>No hay Aulas libres</p>";
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
    <th>Descripcion</th>
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
        <td>".$row[12]."</td>
        <td>".$row[3]."</td>
       </tr>";
    }        
 
print "
</table>
";
}


APP::showFooter();
?>