<?php
include_once "App.php";

    session_start();
    $app = new App();
    $app->delete_session();
    

?>