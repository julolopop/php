<?php
include_once "App.php";
$app = new App();
$app->validateSession();

APP::showHeader("Aula");

print "
<br/><br/><br/><br/><br/>
<form action='#' method='post' align='center'>
<input type='submit' class='boton' name='busqueda' value='Busqueda Aula' />
<br/><br/><br/>
<input type='submit' class='boton' name='reserva' value='Reserva Aula' />    
<br/><br/><br/>
<input type='submit' class='boton' name='consulta' value='Consulta' />  
<br/>  <br/><br/>
<input type='submit' class='boton' name='alta' value='Alta' />     
<br/><br/><br/>
<input type='submit' class='boton' name='gestion' value='Gestion' />    
</form>
";

if(isset($_REQUEST['busqueda'])){
    print "<script language=\"javascript\">window.location.href=\"Busqueda.php?nick=".$_REQUEST['nick']."\"</script>";
}
if(isset($_REQUEST['reserva'])){
    print "<script language=\"javascript\">window.location.href=\"Reservas.php?nick=".$_REQUEST['nick']."\"</script>";
}
if(isset($_REQUEST['consulta'])){
    print "<script language=\"javascript\">window.location.href=\"Consulta.php?nick=".$_REQUEST['nick']."\"</script>";
}


APP::showFooter();
?>