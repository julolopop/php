<?php
function show_head($titulo){
    print "<!DOCTYPE html>
    <html>
    <head lang = \"es\">
    <meta charset=\"UTF-8\">
    <title>$titulo</title>
    <!-- Bootstrap core CSS -->
    <link href=\"bootstrap/css/bootstrap.css\" rel=\"stylesheet\">
    <!--<script src=\"bootstrap/js/http://code.jquery.com/jquery.js\"/>
    <script src=\"bootstrap/js/bootstrap.min.js\"/>-->
    </head>
    <body>";
}

function show_foot(){
print "</body>
</html>";
}
?>