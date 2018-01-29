<?php
include_once "App.php";
$app = new App();
$app->validateSession();

APP::showHeader("Aula");


print "
<br/><br/><br/><br/><h2 align='center'>Alta del aula</h2><br/><br/><br/>";

print '
<form align="center" action="#" method="get">
    <p>Agrega una descripción</p><br/><br/>';
    print "<input type='hidden' name='fecha' value='".$_REQUEST['fecha']." ".$_REQUEST['tipo']."'/>";
    print "<input type='hidden' name='nombre' value='".$_REQUEST['nombre']."'/>";
print '<p>descripción <input class="texto" type="text" name="descripcion" requiered/></p>
    <br/><input class="boton" type="submit" value="Agregar" name="agregar"/>
</form>
';

if(isset($_REQUEST['agregar'])){
    
}

APP::showFooter();
?>