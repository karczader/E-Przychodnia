<?php

    session_start();
    if (!isset($_SESSION['ifLoginP'])) header('Location: index.php');

    require_once "connect.php";
    $connection= @new mysqli($host, $db_user, $db_password, $db_name);
    if($connection->connect_errno!=0){
        echo "Error: ".$connection->conncect_errno;
    }
    else{
        $id_message=$_SESSION['IdMessage'];
        $asRead="UPDATE Message SET IfRead='1' WHERE IdMessage='$id_message'";
        $results=$connection->query($asRead);
        $_SESSION['counterRead']++;
        header('Location: message_archives.php');
    }

