<?php
include_once "App.php";
$app = new App();

$app->validateSession();

$rows  = $app->showProductos();
App::show_head("Inicio Sesión");




print "<div class=\"container\" >
<div class=\"row \">
    <div class=\"col-12 col-md-4 offset-md-4\">";

print "<table class='table-condensed'>";
foreach($rows as $row){
    print "<tr>";
    print "<td>".$row['ID'] ."</td>";
    print "<td>".$row['nombre'] ."</td>";
    print "<td>".$row['precio'] ."</td>";
    print "</tr>";
}

print "</table>
        </div> <!--col-md-4 -->    
    </div>
</div> <!-- Container -->";
App::show_foot();
?>