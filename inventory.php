<?php
include_once "App.php";
$app = new App();

$app->validateSession();

$rows  = $app->showDependency();
App::show_head("Lista Dependencia");




    

    if(count($rows) > 0){
print "<table border='1' class='table-condensed'>";
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
    print"<td align='center'><a href='sector.php?id_dependency=".$row['id']."'><img src='./img/gps.png' height='35' width='35'/></a></td>";
    
    print "</tr>";
}

/**
 * no hay datos
 * no se puede encontrar la base de datos
 */

print "</table>";
}else{
    print "<p>No hay datos en la base de datos</p>";
}




App::show_foot();
?>
