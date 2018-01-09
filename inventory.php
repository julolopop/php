<?php
include_once "App.php";
$app = new App();

$app->validateSession();

$rows  = $app->showDependency();
App::show_head("Inicio Sesión");




print "<div class=\"container\" >
<div class=\"row \">
    <div class=\"col-12 col-md-4 offset-md-4\">
    <h1>Listado de dependencias</h1>";
print "<table border='1' class='table-condensed'>";

;
print "<tr>";
print "<th>".$rows->getColumnMeta(0)['name']."</th>";
print "<th>".$rows->getColumnMeta(1)['name']."</th>";
print "<th>".$rows->getColumnMeta(2)['name']."</tthd>";
print "<th>".$rows->getColumnMeta(3)['name']."</th>";
print "<th>Sector</th>";
print "</tr>";

foreach($rows as $row){
    print "<tr>";
    print "<td>".$row['id'] ."</td>";
    print "<td>".$row['name'] ."</td>";
    print "<td>".$row['shortname'] ."</td>";
    print "<td>".$row['description'] ."</td>";
    print"<td align='center'><img src='./img/gps.png' height='35' width='35' href=''/></td>";
    print "</tr>";
}

/**
 * no hay datos
 * no se puede encontrar la base de datos
 */

print "</table>
        </div> <!--col-md-4 -->    
    </div>
</div> <!-- Container -->";



App::show_foot();
?>
