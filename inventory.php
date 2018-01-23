<?php
include_once "App.php";
$app = new App();

$app->validateSession();

$rows  = $app->showDependency();
App::show_head("Lista Dependencia");




    

    if(count($rows) > 0){
print "<table border='1' class='table-condensed'>";
print "<tr>";
print "<th>".$rows->getColumnMeta(0)['name']."</th>";
print "<th>".$rows->getColumnMeta(1)['name']."</th>";
print "<th>".$rows->getColumnMeta(2)['name']."</tthd>";
print "<th>".$rows->getColumnMeta(3)['name']."</th>";
print "<th>Sector</th>";
print "<th>Editar</th>";
print "<th>Eliminar</th>";
print "</tr>";

foreach($rows as $row){
    
    print "<tr>";
    print "<td>".$row['id'] ."</td>";
    print "<td>".$row['name'] ."</td>";
    print "<td>".$row['shortname'] ."</td>";
    print "<td>".$row['description'] ."</td>";
    print"<td align='center'><a href='sector.php?id_dependency=".$row['id']."'><img src='./img/gps.png' height='35' width='35'/></a></td>";
    print"<td align='center'><a href='sector.php?id_dependency=".$row['id']."'><img src='./img/edit.jpg' height='35' width='35'/></a></td>";
    print"<td align='center'><a href='eliminarDependency.php?id_dependency=".$row['id']."'><img src='./img/delete.jpg' height='35' width='35'/></a></td>";
    print "</tr>";
}
print "</table>";


}else{
    print "<p>No hay datos en la base de datos</p>";
}


print "
<form action='inventory.php'  method='post'>
<input type='text' value='nombre' name='nombre' placeholder='nombre' required='required' />
<input type='text' value='nombrecorto' name='nombrecorto' placeholder='nombrecorto' required='required' />
<input type='text' value='descripcion' name='descripcion' placeholder='descripcion' required='required' />
<input type='submit' name='anadir' value='Añadir'  onclick=".anadir()."  />
</form>
";

function anadir(){
    if(isset($_REQUEST['anadir'])){
    $nombre = $_REQUEST['nombre'];
    $nombrecorto = $_REQUEST['nombrecorto'];
    $descripcion = $_REQUEST['descripcion'];
    $app = new App();
    $app->anadirDependencia($nombre,$nombrecorto,$descripcion);
    print "<script language=\"javascript\">window.location.href=\"inventory.php\"</script>";
    }
}

App::show_foot();
?>
