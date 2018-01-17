<?php
include_once "App.php";
APP::show_head("Eliminación");
$app = new App();
$id = $_REQUEST['id_dependency'];


$sectores = $app->showSector($id)->fetchAll();

if (count($sectores) == 0){
    $app->deleteDependency($id);
    print "<p>Se ha eliminado correctamente</p>";
}else{
    print "<p>No se ha podido eliminar la dependencia por que tiene sectores</p>";
    print "<p>Desea eliminar los Sectores junto a la dependencia</p>";
    print "
    <form action='eliminarDependency.php' method='post'>
    <input type='hidden'  name='id_dependency' value='".$id."'/>
    <input type='submit' name='Eliminar' value='Eliminar'  onclick=".eliminar($id)."  />
    </form>";   
}

function eliminar($id){
    if(isset($_REQUEST['Eliminar'])){
    $app = new App();
    $app->deleteSectorIdDependency($id); 
    $app->deleteDependency($id);
    print "<script language=\"javascript\">window.location.href=\"inventory.php\"</script>";
    }
}



APP::show_foot();
?>