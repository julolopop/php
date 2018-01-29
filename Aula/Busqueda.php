<?php
include_once "App.php";
$app = new App();
$app->validateSession();

APP::showHeader("Aula");

$aulas = $app->Aulas()->fetchAll();


print "
<br/><br/>
<p align='center'>Buscador de Aulas</p>

<form action='#' method='get' align='center'>
<input type='radio' name='tipo' value='nombre' checked> Nombre </input>
<input type='radio' name='tipo' value='nombreCorto'> Nombre Corto</input>

<p>Valor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='text' class='texto' name='valor' required/></p>
<br/>
<input type='submit' class='boton' name='buscar' value='Buscar' />    
</form>
";


if(isset($_REQUEST['buscar'])){
    switch ($_REQUEST['tipo']) {
        case 'nombre':
                $aulas = $app->AulasN($_REQUEST['valor'])->fetchAll();
            break;
        case 'nombreCorto':
                $aulas = $app->AulasNC($_REQUEST['valor'])->fetchAll();
            break;
        }
}

if(count($aulas)==0){

 print "
 <br/><br/><br/><br/><p align='center'>No hay Aulas</p>";
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
       </tr>";
    }        

print "
</table>
";
}



APP::showFooter();
?>