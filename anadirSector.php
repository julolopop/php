<?php
include_once "App.php";


App::show_head("Añadir sectores");

print "
<br/><br/><br/>
<h3 class=\"text-center\">Añadir Sectores</h3>
<br/>
<br/>
<form action='sector.php?id_dependency=".$_REQUEST['id_dependency']."'  method='post'>

<table >
<tr valign='top'>
<td><p>Nombre</p></td>
<td><input type='text' value='nombre' name='nombre' placeholder='nombre' required='required' /></td>
</tr>
<tr valign='top'>
<td><p>Abrebacion</p></td>
<td><input type='text' value='nombrecorto' name='nombrecorto' placeholder='nombrecorto' required='required' /></td>
</tr>
<tr valign='top'>
<td><p>Descripcion</p></td>
<td><input type='text' value='descripcion' name='descripcion' placeholder='descripcion' required='required' /></td>
</tr>
<tr align='center'>
<td colspan='2'><input type='submit' name='anadir' value='Añadir'  onclick='".anadir()."' /></td>
</tr>
</table>
</form>
";


function anadir(){
    if(isset($_REQUEST['anadir'])){
    $nombre = $_REQUEST['nombre'];
    $nombrecorto = $_REQUEST['nombrecorto'];
    $descripcion = $_REQUEST['descripcion'];
    $idDependency = $_REQUEST['id_dependency'];
    $app = new App();
    $app->anadirSector($nombre,$nombrecorto,$descripcion,$idDependency);
    print "<script language=\"javascript\">window.location.href=\"sector.php?id_dependency=".$idDependency."\"</script>";
    }
}
App::show_foot();


?>