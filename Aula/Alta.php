<?php
include_once "App.php";
$app = new App();
$app->validateSession();

APP::showHeader("Aula");


print "<h2 align='center'>Bienvenido  ".$_REQUEST['nick']."</h2>";

print "
<br/><br/><br/><br/><h2 align='center'>Alta del aula</h2><br/><br/><br/>";


if(isset($_REQUEST['agregar'])){
    $app->altaConsulta($_REQUEST['nick'],$_REQUEST['fecha']." ".$_REQUEST['tipo'],$_REQUEST['nombre'],$_REQUEST['descripcion']);


    print "
    <br/><br/><br/><br/><p align='center'>Se agrego correctamente</p><br/><br/><br/>";

}else{

print '
<form align="center" action="#" method="get">
    <p>Agrega una descripción</p><br/><br/>';
    print "<input type='hidden' name='fecha' value='".$_REQUEST['fecha']."'/>";
    print "<input type='hidden' name='tipo' value='".$_REQUEST['tipo']."'/>";
    print "<input type='hidden' name='nombre' value='".$_REQUEST['nombre']."'/>";
    print "<input type='hidden' name='nick' value='".$_REQUEST['nick']."'/>";
print '<p>descripción <input class="texto" type="text" name="descripcion" requiered/></p>
    <br/><input class="boton" type="submit" value="Agregar" name="agregar"/>
</form>
';
}

APP::showFooter();
?>