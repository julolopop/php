<?php
include_once "App.php";

App::showHeader("Inicio");

$app = new App();

print "
<br/>
<h2 align='center'>Login de Usuarios de Aulas</h2>
<br/>
<br/>
<br/>


<form action='' method='post' align='center'>
<p>Usuario &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type='text' class='texto' name='' required/></p>
<p>Contraseña : <input type='text' class='texto' name='' required/></p>
<br/>
<input type='submit' class='boton' name='enviar' value='Enviar' />
<input type='submit' class='boton' name='registrarse' value='Registrarse' />    
</form>
";



App::showFooter();
?>