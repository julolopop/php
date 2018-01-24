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
    <p>Usuario &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type='text' class='texto' name='user' required/></p><br/>
    <p>Nick &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type='text' class='texto' name='nick' required/></p><br/>
    <p>Contraseña &nbsp;: <input type='password' class='texto' name='pas1' required/></p><br/>
    <p>Contraseña2 : <input type='password' class='texto' name='pas2' required/></p><br/>
    <br/>
    <input type='submit' class='boton' name='registrarse' value='Registrarse' />    
    </form>
";

if(isset($_REQUEST['registrarse'])){
    if($_REQUEST['pas1'] != $_REQUEST['pas2']){
        print "<br/><br/><p align='center'>La contraseña tiene que ser identica</p>";
    }else{
        if($app->ValidarNick($_REQUEST['nick'])){
            print "<br/><br/><p align='center'>EL nick ya existe</p>";
        }else{
            print "<script language=\"javascript\">window.location.href=\"Login.php\"</script>";
        } 
    }
}



App::showFooter();
?>