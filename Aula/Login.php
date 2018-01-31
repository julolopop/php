<?php
include_once "App.php";
session_start();
App::showHeaderIndex("Inicio");

$app = new App();

print "
<br/>
<h2 align='center'>Login de Usuarios de Aulas</h2>
<br/>
<br/>
<br/>


<form action='#' method='get' align='center'>
<p>Usuario &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='text' class='texto' name='user' required/></p>
<p>Contraseña : <input type='password' class='texto' name='pas' required/></p>
<br/>
<input type='submit' class='boton' name='enviar' value='Enviar' />  
</form>
<br/>
<form action='#' method='post' align='center'>
<input type='submit' class='boton' name='registrarse' value='Registrarse' />    
</form>
";

if(isset($_REQUEST['registrarse'])){
    print "<script language=\"javascript\">window.location.href=\"Registrar.php\"</script>";
}

if(isset($_REQUEST['enviar'])){
    $nick = $_REQUEST['user'];
    $contrasena = $_REQUEST['pas'];
    $valor = $app->Loggear($nick);


    if(count($valor) != 0){
            $valores = $valor->fetch();
            if($valores[2] == $contrasena){
                $app->init_sesion($nick);
                print "<script language=\"javascript\">window.location.href=\"Aulas.php?nick=".$nick."\"</script>";

            }else{
                print "<p align='center'>Error con la contraseña</p>";
            }
          
    }else{
        print "<p align='center'>Error no Existe el usuario</p>";
    }
}




App::showFooter();
?>