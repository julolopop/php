<?php
include "biblioteca.php";



$cateto1=$_REQUEST['cateto1'];
$cateto2=$_REQUEST['cateto2'];
$check  =isset($_REQUEST['ckeck']);

function calculo ($cateto1,$cateto2){
    return sqrt(pow($cateto1,2)+pow($cateto2,2));
}


show_head("hipotenusa");



print "<p>_REQUEST</p>";
print_r($_REQUEST);
print "<p>_POST</p>";
print_r($_POST);
print "<p>_GET</p>";
print_r($_GET);
print "<br/><br/><br/>";

if($check)
    echo "<p>la Hipotenusa del cateto $cateto1 y $cateto2 es : ".calculo($cateto1,$cateto2)."</p>";
else
    echo "<p>la Hipotenusa es : ".calculo($cateto1,$cateto2)."</p>";


show_foot();
?>