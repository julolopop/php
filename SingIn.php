<?php
include_once "App.php";
session_start();


print App::show_head("Inicio Sesión");

    print "
<div class=\"container\" >
    <div class=\"row \">
        <div class=\"col-12 col-md-4 offset-md-4\">
            <h1 class=\"text-center\">Inicia sesión</h1>
            <form method=\"POST\" action=".$_SERVER['PHP_SELF'].">
                <div class=\"form-group\">
                    <label for=\"inputUser\">Usuario</label>
                    <input type=\"text\" name=\"user\" id=\"inputUser\" required=\"required\" autofocus=\"autofocus\" class=\"form-control\"/>
                </div>
                <div class=\"form-group\">
                    <label for=\"inputPassword\" class=\"\">Contraseña</label>
                    <input type=\"text\" name=\"password\" id=\"inputPassword\"  required=\"required\" class=\"form-control\" />
                </div>
                <div class=\"text-center\">
                    <button class=\"btn btn-primary\"  type=\"submit\">Inicia sesión</button>
                </div>
                </form>
        </div> <!--col-md-4 -->    
    </div>
</div> <!-- Container -->";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $user = $_POST['user'];
    $password = $_POST['password'];
    
    if(empty($user)){
        print "<p>Error Debe introducir un nombre de usuario</p>";
    }else if(empty($password)){
        print "<p>Error Debe introducir una contraseña de usuario</p>";
    }else{
        //realizamos una conesion a la base de datos
        
        $app = new App();

        if($app->getDao()->isConnective())
            print "<p>.$app->getDao()->error</p>";
        else if($app->getDao()->validateUser($user,$password)){
            $app->init_sesion($user);
            //guardamos la sesion de usuario y redirecionamos a otra pagina.
            print "<script language=\"javascript\">window.location.href=\"inventory.php\"</script>";
            
        }

    }
       
        

}
print App::show_foot();
?>
