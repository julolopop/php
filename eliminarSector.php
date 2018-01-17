<?php
include_once "App.php";
APP::show_head("Eliminación");
$app = new App();
$id = $_REQUEST['id_dependency'];




    print "<p>Esta seguro</p>";
    print "
    <form action='eliminarSector.php' method='post'>
    <input type='hidden'  name='id_dependency' value='".$id."'/>
    <input type='submit' name='Eliminar' value='Eliminar'  onclick=".eliminar($id)."  />
    </form>";   


function eliminar($id){
    if(isset($_REQUEST['Eliminar'])){
    $app = new App();
    $app->deleteSectorId($id);
    print "<script language=\"javascript\">window.location.href=\"inventory.php\"</script>";
    }
}



APP::show_foot();
?>