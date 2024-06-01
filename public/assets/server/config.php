<?php
    $dbuser="root";
    $dbpass="";
    $host="localhost";
    $db="sfnepal";
    $mysqli=new mysqli($host,$dbuser, $dbpass, $db);
    if($mysqli->connect_errno !=0){
        die("connection failed ".$mysqli->connect_errno);
    }
    
?>