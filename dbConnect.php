<?php
    error_reporting( E_ALL ^ E_WARNING);
    ini_set( "display_errors", 1 );

    $localhost = "127.0.0.1";
    $username = "root";
    $dbname = "studentdb";
    $passwword = "";
    
    $connect = new mysqli($localhost, $username, $password, $dbname);
    if ($connect->error) {
        die ("An error occured". $connect->error);
    }
?>	