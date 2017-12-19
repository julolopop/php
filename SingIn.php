<?php
include_once "biblioteca.php";
include_once "dao.php";

print show_head("Inicio Sesión");

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
        $dao = new Dao();
        if($dao->isConnective())
            print "<p>.$dao->error</p>";
        else if($dao->validateUser($user,$password)){
            //guardamos la sesion de usuario y redirecionamos a otra pagina.
            print "<script language=\"javascript\">window.location.href=\"inventory.php\"</script>";
            
        }

    }
       
        

}
print show_foot();
?>
