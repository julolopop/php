<?php
print "<!DOCTYPE html>
<html>
<head>
<meta charset=\"UTF-8\">
<title>Informacion de la superGlobal Server</title>
</head>
<body>";

print("<pre>".print_r($_SERVER,true)."</pre>");
echo "<p> el nombre es ".$_SERVER['REQUEST_URI']."<p>";
print "</body>
</html>";
?>