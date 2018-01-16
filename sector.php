<?php
include_once "App.php";

$app = new App();

$app->validateSession();
$app::show_head("Lista sectores");


$rowsSector  = $app->showSector($_REQUEST['id_dependency'])->fetchAll();




    if(count($rowsSector) > 0){
    print "<table border='1' class='table-condensed'>";
    print "<tr>";
    print "<th>ID</th>";
    print "<th>Nombre</th>";
    print "<th>Nombre corto</th>";
    print "<th>descripcion</th>";
    print "</tr>";


    foreach($rowsSector as $row){
    
       print "<tr>";
      print "<td>".$row['id'] ."</td>";
       print "<td>".$row['name'] ."</td>";
        print "<td>".$row['shortname'] ."</td>";
        print "<td>".$row['description'] ."</td>";
        print "</tr>";
    }


   
print "</table>";

}else{
    print "<p>No hay datos en la base de datos</p>";
}


$app::show_foot();

?>