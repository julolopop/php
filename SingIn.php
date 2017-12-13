<?php
include "biblioteca.php";
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

print show_foot();
?>