<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Hola Mundo</title>
</head>
<body>
    <?php
        $saluda= "Hola Mundo";
        $pregunta = "¿Como estas?";
        
        print "<h1>$saluda</h1>";
        echo "<h1>".$saluda."</h1>";
        /**
         * Ejemplo en el que se demuestra que las comillas 
         * dobles interpretan las variables ,
         * mientras que las comillas simples no
         */
        echo '<p>$pregunta</p>';
        print '<p>'.$pregunta.'</p>';
    ?>
</body>
</html>