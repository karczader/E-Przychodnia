<?php
session_start();
    require_once "connect.php";
    $connection= @new mysqli($host, $db_user, $db_password, $db_name);

    if($connection->connect_errno!=0){
        echo "Error: ".$connection->conncect_errno;
    }
    else{
        $id=$_SESSION['IdPatient'];
        $ifUpdate=false;

        if ($_POST['newFirstName']!=$_SESSION['FirstName']){
            $name=$_POST['newFirstName'];
            $_SESSION['FirstName']=$_POST['newFirstName'];
            $ifUpdate=true;
        
            $connection->query("UPDATE Patiens SET FirstName='$name' WHERE IdPatient=$id");
        }

        if ($_POST['newSecondName']!=$_SESSION['SecondName']){
            $name=$_POST['newSecondName'];
            $_SESSION['SecondName']=$_POST['newSecondName'];
            $ifUpdate=true;
        
            $connection->query("UPDATE Patiens SET SecondName='$name' WHERE IdPatient=$id");
        }

        if ($_POST['newDateOfBirth']!=$_SESSION['DateOfBirth']){
            $name=$_POST['newDateOfBirth'];
            $_SESSION['DateOfBirth']=$_POST['newDateOfBirth'];
            $ifUpdate=true;
        
            $connection->query("UPDATE Patiens SET DateOfBirth='$name' WHERE IdPatient=$id");
        }

        if ($_POST['newEmail']!=$_SESSION['Email']){
            $name=$_POST['newEmail'];
            $_SESSION['Email']=$_POST['newEmail'];
            $ifUpdate=true;
        
            $connection->query("UPDATE Patiens SET Email='$name' WHERE IdPatient=$id");
        }

        if ($_POST['newPesel']!=$_SESSION['Pesel']){
            $name=$_POST['newPesel'];
            $_SESSION['Pesel']=$_POST['newPesel'];
            $ifUpdate=true;
        
            $connection->query("UPDATE Patiens SET Pesel='$name' WHERE IdPatient=$id");
        }

        if ($_POST['newPhoneNumber']!=$_SESSION['PhoneNumber']){
            $name=$_POST['newPhoneNumber'];
            $_SESSION['PhoneNumber']=$_POST['newPhoneNumber'];
            $ifUpdate=true;
        
            $connection->query("UPDATE Patiens SET PhoneNumber='$name' WHERE IdPatient=$id");
        }






        if($ifUpdate) $_SESSION['update_okay']='<span style="margin-left: 5px">Zaktualizowano dane</span>';
        header('Location: edit_data_patient.php');
        $connection->close();
    }