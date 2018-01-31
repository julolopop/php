<?php
include_once "App.php";
$app = new App();
$app->validateSession();

APP::showHeader("Aula");


print "<h2 align='center'>Bienvenido  ".$_REQUEST['nick']."</h2>";

print "
<br/><br/><br/><br/><h2 align='center'>Eliminar consulta del aula</h2><br/><br/><br/>";


if(isset($_REQUEST['eliminar'])){
    
    
    $app->EliminarGestion($_REQUEST['id'],$_REQUEST['descripcion']);
    
    print "<p align='center'>Se ha eliminado correctamente</p>";
    

}else{

print '
<form align="center" action="#" method="get">;
    <p>Agrega una descripción</p><br/><br/>';
    print "<input type='hidden' name='id' value='".$_REQUEST['id']."'/>";
    print "<input type='hidden' name='nick' value='".$_REQUEST['nick']."'/>";
print '<p>descripción para eliminar <input class="texto" type="text" name="descripcion" requiered/></p>
    <br/><input class="boton" type="submit" value="Eliminar" name="eliminar"/>
</form>
';
}

APP::showFooter();
?>